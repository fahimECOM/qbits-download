<?php

namespace App\Exports;

use App\Models\AllHistory;
use App\Models\RawInventory;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithMapping;
use DB;

class UserExpport implements FromCollection,WithHeadings,WithColumnFormatting
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function headings(): array
    {
        return [
            ["$this->skd_category $this->search_type "],
            ['Date',
            'Journal',]
        ];
    }

    public function __construct($start_date,$end_date,$skd_category,$search_type)
    {
        $this->end_date = $end_date;
        $this->start_date = $start_date;
        $this->skd_category = $skd_category;
        $this->search_type = $search_type;
    }
    public function collection()
    {
        $skd_inventory = RawInventory::where('product_type',$this->skd_category)
      ->orderBy('id','DESC')
      ->where('ram_size',$this->search_type)
      ->orWhere('ssd_size',$this->search_type)
      ->orWhere('bb_processor',$this->search_type)
      ->get('ens_id');
      $ens_id = $skd_inventory[0]->ens_id;
      $skd_history = AllHistory::where('ens_id',$ens_id)->get();
        return AllHistory::select([
            'date',
            'journal',
            DB::raw("CONCAT('ENS',all_histories.ens_id,' ',ExtractValue(journal, '//text()')) as journal")
           ])->with('rawInventoryDetails')->whereHas('rawInventoryDetails', function($query) {
            $query->where('product_type', '=', $this->skd_category)->where('ram_size',$this->search_type)
            ->orWhere('ssd_size',$this->search_type)
            ->orWhere('bb_processor',$this->search_type);
        })->whereBetween('date', [$this->start_date, $this->end_date])->get('ens_id');
          
    }
    public function columnFormats(): array
    {
        return [
            // 'B' => 50

        ];
    }
}

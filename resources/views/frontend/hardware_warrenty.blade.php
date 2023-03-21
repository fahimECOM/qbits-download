<style>
 @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;500&display=swap');
 *{
    margin: 0px;
    padding: 0px;
    box-sizing: border-box;
 }
 .background-triangle{
    clip-path: polygon(0 0, 0 100%, 100% 0);
    background-color: #1d1d1d;
    height: 10%;
    width: 50%;
 }   
 .background-triangle-bottom{
    clip-path: polygon(100% 0, 0 100%, 100% 100%);
    background-color: #1d1d1d;
    height: 10%;
    width: 50%;
    position: absolute;
    bottom: 0;
    right: 0;
 }
 .left-content{
    position: relative;
    flex-basis: 50%;
 }
 .info-container{
    display: flex;
    justify-content: space-between;
    margin-top: 50px;
 }
 
 .right-content{
    position: relative;
    flex-basis: 50%;
   
 }
.card-container{
    width: 565px;
    height: 425.197px;
    border: 1px solid #1d1d1d;
    font-family: 'Roboto', sans-serif;
    display: flex;

}
.content{
    margin: 0px 20px;
}
p{
    font-size: 7px;
    line-height: 8px;
}
.s-1{
    margin: 15px 0px; 
}
.s-2{
    margin: 10px 0px;
}
li{
    text-decoration: none;
    list-style-type: none;
    display: flex;

}
h1{
    font-size: 12.5px;
    margin-top: 30px;
    margin-bottom: 15px;
}
h3{
    font-size: 7px;
}
.icon{
    width: 60px;
    position: absolute;
    top: 25px;
    right: 20px;
}
.warrenty-icon{
    width: 150px;
    margin-top: 20px;
}

</style>

<div class="card-container">
 <div class="left-content">
    <div class="background-triangle">
    </div>
    <div class="content">
    <ul>
        <li class="s-1"><p>Qbits warranty does not cover any defect or damage caused by improper handling/usage or any disassembly by end-user.</p></li>
        <li class="s-1"><p>Warranty will be invalid for any kind of damage due to inconsistent voltage, wrong connection of accessories or improper power supply.</p></li>
    <li class="s-1"><p>For the display, Qbits will not be liable if there are scratches or defects due to external causes.</p></li> 
    <li class="s-1"><p>Qbits will not be responsible for any loss of data due to NVMe SSD failure or motherboard failure. Users are encouraged to store all data on their other storage devices as a precaution against possible failures.</p></li>
    <li class="s-1"><p>Only ﬁrst buyers can avail of warranty services and is not transferable from one user to another.</p></li>
    <li class="s-1"><p>Any damage resulting from the use of paper towels or abrasive pads is not covered by the Qbits warranty service.</p></li>
    <li class="s-1"><p>Any product that has been modiﬁed from the original Qbits manufacturing standard or is being serviced or repaired by an untrained engineer or anyone else outside the authorized service provider. In this case, the warranty will be voided.</p></li>
    <li class="s-1"><p>Any defects caused due to exposing the products to water or liquid under any circumstances by the user.</p></li>
    <li class="s-1"><p>Any defect caused due to overclocking will be considered out of warranty coverage.</p></li>
    <li class="s-1"><p>In case of any loss of data due to the malfunction of the device, Qbiits will not be responsible. No claim or legal action shall be taken against Qbits. In this case, Qbits will provide warranty services for hardware if it is covered by the warranty policy.</p></li>
    </ul>
    </div>
    <div class="background-triangle-bottom">
    </div>   
</div>
<div class="right-content">
    <div class="background-triangle">
    </div>
    <img src="{{asset('qbits_logo_black_email.png')}}" class="icon" alt="qbits">
    <div class="content">
    <h1>2-Year Limited Hardware Warranty</h1>
    <p>Qbits offers a 2-year limited hardware warranty for all the products subject to the terms and conditions set forth in the warranty policy. Qbits provides immediate services for any component or hardware product, during the limited warranty period, that manifests a defect in any parts/components that are used to manufacture the product. The limited warranty period starts on the date of purchase from the Qbits authorized provider. For warranty service or repair, the customers are required to bring the warranty card along with the original purchase receipt for free warranty service. Qbits authorized service provider reserves the right to refuse or decline any warranty claim if the customers are found unable to provide a valid warranty card.</p>
    <img src="{{asset('Sigma-Warranty-card.png')}}" alt="warrently-icon" class="warrenty-icon">
    <ul>
        <li class="s-1"><p>Invoice: </p> <p>------------</p></li>
        <li class="s-1"><p>Product Serial Number:</p> <p>---------------</p></li>
        <li class="s-1"><p>Barcode: </p> </li>
    </ul>    

    <div class="info-container">
        <div class="left">
            <ul>
                <li><h3>Contact us:</h3></li>
                <li><p>Phone: 02-58055541</p></li>
                <li><p>Website: myqbits.com</p></li>
         </ul>
        </div>
        <div class="right">
        <ul>
                <li><h3>Address:</h3></li>
                <li ><p>793/1 Monipur, Mirpur-2 </p></li>
                <li ><p>Dhaka – 1216, Bangladesh.</p></li>
         </ul>
        </div>
    </div>
</div>

 

    <div class="background-triangle-bottom">
    </div>   
</div>
</div>

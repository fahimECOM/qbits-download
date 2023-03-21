@extends('frontend.layouts.master')
@section('title','Sigma')
@section('content')
<section class="middle-tab-area">
    <div class="container">
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
              <div class="card">
                  <div class="container">
                      <div class="row">
                        <p style="padding-top: 20px !important;text-align:left;">Which laptop is right for you? Take a tour here, Qbits laptop finder can help you to find the best laptop.</p>
                        <div class="tab">
                            <button id="tab_btn_1" class="tablinks active" onclick="type()">Type</button>
                            <button id="tab_btn_2" class="tablinks" onclick="screen()">Screen Size</button>
                            <button id="tab_btn_3" class="tablinks" onclick="purpose()">Purpose</button>
                            <button id="tab_btn_4" class="tablinks" onclick="type()">Feature</button>
                            <button id="tab_btn_5" class="tablinks" onclick="type()">Budgett</button>
                        </div>
                      </div>
                    </div>
                    <div class="container">
                        <div class="tab-area-white-space" style="margin-top:20px;margin-top:20px;height: 200px;border-radius: 15px;margin-bottom:30px">
                            <div id="tabcontent1" class="tabcontent" style="padding: 25px;">
                              <h6 style="text-align: left;">Which laptop are you looking for?</h6>
                              <form >
                                  <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="check1" name="option1" value="something" checked>
                                    <label class="form-check-label" for="check1" style="float: left;">Standard Laptop</label>
                                  </div>
                                  <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="check2" name="option2" value="something">
                                    <label class="form-check-label" for="check2" style="float: left;">Premium Quality</label>
                                  </div>
                                  <div class="form-check">
                                    <input type="checkbox" class="form-check-input">
                                    <label class="form-check-label" style="float: left;">Netbook</label>
                                  </div>
                                  <div class="form-check">
                                      <input type="checkbox" class="form-check-input">
                                      <label class="form-check-label" style="float: left;">Ultraportable</label>
                                    </div>
                                    <div class="form-check">
                                      <input type="checkbox" class="form-check-input">
                                      <label class="form-check-label" style="float: left;">Gaming PCs</label>
                                    </div>
                                </form>
                            </div>
                            
                            <div id="tabcontent2" class="tabcontent" style="padding: 25px;">
                              <h6 style="text-align: left;">Which laptop are you looking for?</h6>
                              <form action="/action_page.php">
                                  <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="check1" name="option1" value="something" checked>
                                    <label class="form-check-label" for="check1" style="float: left;">13.3 Inch</label>
                                  </div>
                                  <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="check2" name="option2" value="something">
                                    <label class="form-check-label" for="check2" style="float: left;">15.6 Inch</label>
                                  </div>
                                </form> 
                            </div>
                            
                            <div id="tabcontent3" class="tabcontent" style="padding: 25px;">
                              <h6 style="text-align: left;">What kind of work you'll do with this new laptop?</h6>
                              <form action="/action_page.php">
                                  <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="check1" name="option1" value="something" checked>
                                    <label class="form-check-label" for="check1" style="float: left;">Everyday Use</label>
                                  </div>
                                  <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="check2" name="option2" value="something">
                                    <label class="form-check-label" for="check2" style="float: left;">Freelancing</label>
                                  </div>
                                  <div class="form-check">
                                    <input type="checkbox" class="form-check-input">
                                    <label class="form-check-label" style="float: left;">Business</label>
                                  </div>
                                  <div class="form-check">
                                      <input type="checkbox" class="form-check-input">
                                      <label class="form-check-label" style="float: left;">Gaming</label>
                                    </div>
                                </form>
                            </div>
                            <div id="tabcontent4" class="tabcontent" style="padding: 25px;">
                              <h6 style="text-align: left;">What are the tasks that need to be executed with your laptop?</h6>
                              <form action="/action_page.php">
                                  <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="check1" name="option1" value="something" checked>
                                    <label class="form-check-label" for="check1" style="float: left;">Photo and Video Editing</label>
                                  </div>
                                  <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="check2" name="option2" value="something">
                                    <label class="form-check-label" for="check2" style="float: left;">Education and Learning </label>
                                  </div>
                                  <div class="form-check">
                                    <input type="checkbox" class="form-check-input">
                                    <label class="form-check-label" style="float: left;">Official Task</label>
                                  </div>
                                  <div class="form-check">
                                      <input type="checkbox" class="form-check-input">
                                      <label class="form-check-label" style="float: left;">Programming </label>
                                    </div>
                                    <div class="form-check">
                                      <input type="checkbox" class="form-check-input">
                                      <label class="form-check-label" style="float: left;">Playing Game </label>
                                    </div>
                                </form>
                            </div>
                            <div id="tabcontent5" class="tabcontent" style="padding: 25px;">
                              <h6 style="text-align: left;">What is your best budget?</h6>
                              <form action="/action_page.php">
                                  <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="check1" name="option1" value="something" checked>
                                    <label class="form-check-label" for="check1" style="float: left;">20,000৳ to 40,000৳</label>
                                  </div>
                                  <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="check2" name="option2" value="something">
                                    <label class="form-check-label" for="check2" style="float: left;">40,000৳ to 60,000৳ </label>
                                  </div>
                                  <div class="form-check">
                                    <input type="checkbox" class="form-check-input">
                                    <label class="form-check-label" style="float: left;">60,000৳ to 1,00,000৳</label>
                                  </div>
                                </form>
                            </div>
                      </div>
                        <div class="tab">
                            <button class="tablinks">Previous</button>
                            <button class="tablinks">Next</button>
                        </div>
                    </div>
                    
              </div>
            </div>
            <div class="col-sm-2"></div>
        </div>
    </div>
</section>

<script>
    function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
 
@endsection




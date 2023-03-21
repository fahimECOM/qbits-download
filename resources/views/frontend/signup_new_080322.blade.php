@extends('frontend.layouts.master')
@section('title','Sigma')
@section('content')
<Section class="qbits-top-middle">
    <div class="container">
        <div class="middle-qbits-menu">
            <div class="row">
                <div class="col-sm-3">
                    <div class="middle-menu-li d-flex justify-content-start">
                        <a href="{{ route('driver')}}">Drivers & Manuals</a>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="middle-menu-li d-flex justify-content-center">
                        <a href="{{ route('product_registration')}}">Registration</a>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="middle-menu-li d-flex justify-content-center" style="margin-left: 60px;">
                        <a href="{{route('warranty')}}">Warranty</a>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="middle-menu-li d-flex justify-content-end">
                        <a>Contact</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</Section>



<section class="signin-area">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
              <div class="signin-form">
                <p style="padding-top:20px;color:#2699fb;font-weight:bold;">Create your Qbits Account</p>
					<form action="">
						<div class="col">
						   <input class="form-control" type="email" name="email" placeholder="Email">
						</div>
						<div class="col">
						    <input class="form-control" type="password" name="password" placeholder="Password">
						</div>
                        <div class="col">
						    <input class="form-control" type="password" name="password" placeholder="Confirm Password">
						</div>
                        <div class="col">
						    <input class="form-control" type="text" name="f_name" placeholder="First Name">
						</div>
                        <div class="col">
						    <input class="form-control" type="text" name="l_name" placeholder="Last Name">
						</div>
                        <div class="row">
                            <div class="col-sm-4">
                                <input class="form-control" type="text" name="month" placeholder="Month">
                            </div>
                            <div class="col-sm-4">
                                <input class="form-control" type="text" name="day" placeholder="Day">
                            </div>
                            <div class="col-sm-4">
                                <input class="form-control" type="text" name="year" placeholder="Year">
                            </div>
                        </div>
                        <div class="col">
						    <input class="form-control" type="text" name="address" placeholder="Address">
						</div>
						<div class="col">
                            <button type="submit" class="btn btn-primary signin-button" style="background-color: transparent;color:black;padding:10px 60px;border:1px solid">Cancel</button>
							<button type="submit" class="btn btn-primary signin-button">Sign up</button>
						</div>
                        
                        
						<div class="row">
							<div class="col-6">
								<p style="padding-bottom: 50px;">Already have account ?</p>
							</div>
							<div class="col-6">
								<a href="{{ route("signin_new")}}" style="margin-right: 50px;">Sign in</a>
							</div>
						</div>
					</form>
              </div>
            </div>
        </div>
		<div class="signin-social-button">
			<div class="row">
				<div class="col-6">
					<div class="signin-google-button">
					<img src="{{ asset('frontend/sigma/icons/google.png') }}" alt=""><span>Continue with google</span>
					</div>
				</div>

				<div class="col-6">
					<div class="signin-facebook-button">
						<img src="{{ asset('frontend/sigma/icons/facebook.png') }}" alt=""><span>Continue with facebook</span>
					</div>
				</div>
			</div>
		</div>
    </div>
</section>
 
@endsection




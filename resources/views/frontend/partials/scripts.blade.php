<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TweenMax.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.8/ScrollMagic.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.8/plugins/animation.gsap.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
    integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
{!! Toastr::message() !!}
<script src="{{asset('frontend/assets/exzoom/jquery.exzoom.js')}}"></script>

<script src="frontend/main.js"></script>

</body>

</html>

<script>
    $(document).ready(function () {
        $(".search-btn").hover(function (e) {
            $("#searchbar").fadeIn("active");
            $(":input[name=search]").focus();
        });

        // document.addEventListener('contextmenu', event => event.preventDefault());

        $(document).keydown(function(event) {
            var pressedKey = String.fromCharCode(event.keyCode).toLowerCase();
            
            if (event.ctrlKey && (pressedKey == "c" || pressedKey == "u")) {
            //disable key press porcessing
            return false;
            }
        });

        document.onkeypress = function (event) {
            event = (event || window.event);
            if (event.keyCode == 123) {
                return false;
            }
        }

        document.onmousedown = function (event) {
            event = (event || window.event);
            if (event.keyCode == 123) {
                return false;
            }
        }

        document.onkeydown = function (event) {
            event = (event || window.event);
            if (event.keyCode == 123) {
                return false;
            }
        }

    });

    $("#searchbar").on("mouseleave", function () {
        $(this).fadeToggle(400);
    });

    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-center",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }

    function wishlistCartModal() {
        $('#wishlistCartModalShow').modal('show');
    }

    //Email subscribe function
    function addSubscriber() {
        var sub_email = $('#subscribe_email').val();
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if (sub_email == "") {
            $('#email_subscribe_empty_email_modal').modal('show');
            return false;
        } else {
            if (!regex.test(sub_email)) {
                $('#email_subscribe_error_modal').modal('show');
                return false;
            } else {
                var spinner =
                    '<div class="spinner-border me-2" role="status"><span class="visually-hidden">Loading...</span></div>Wait...';
                $('#subscribe_email_btn').html(spinner);
                jQuery.ajax({
                    url: '/add_subscribe_email',
                    data: 'subscribe_email=' + sub_email + '&_token=' + jQuery("[name='_token']").val(),
                    type: 'post',
                    success: function (result) {
                        $('#subscribe_email_btn').html('Subscribe');
                        if (result.status == 'exists') {
                            $('#email_subscribe_exist_error_modal').modal('show');
                        } else if (result.status = 'added') {
                            $('#email_subscribe_success_modal').modal('show');
                            $('#subscribe_email').val('');
                        }
                    }
                });

            }
        }
    }

    //close empty email subscribe modal
    function closeSubscribeEmptyEmail() {
        $('#email_subscribe_empty_email_modal').modal('hide');
    }

    //close invalid email subscribe modal
    function closeSubscribeInvalidEmail() {
        $('#email_subscribe_error_modal').modal('hide');
    }

    //close already exist email subscribe modal
    function closeSubscribeErrorModal() {
        $('#email_subscribe_exist_error_modal').modal('hide');
    }

    //close email subscribe success modal
    function closeSubscribeSuccessModal() {
        $('#email_subscribe_success_modal').modal('hide');
    }

    //close reg exists email error modal
    function closeExistEmailErrorModal() {
        $('#reg_exist_email_error_modal').modal('hide');
    }

    //close forget password success message modal
    function closeForgetPasswordSuccessModal(){
        window.location.href = "{{route('signin')}}";
    }


    //5% offer code send
    function offerCode() {
        $('#offerCodeModalShow').modal('show');
        document.getElementById('free_coupon_err_msg_area').style.display = "none";
        document.getElementById('free_coupon_success_msg_area').style.display = "none";
        $('#free_coupon_err_msg').html('');
        $('#free_coupon_success_msg').html('');
        $("#user_coupon_email").val("");

    }


    function accessoriesModalOpen() {
        $('#accessoriesModalShow').modal('show');
    }

    function accessoriesModalClose() {
        $('#accessoriesModalShow').modal('hide');
    }

    function signinForSeeWishlist() {
        window.location.href = "{{ route('signin')}}";
    }

</script>

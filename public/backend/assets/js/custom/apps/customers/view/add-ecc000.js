"use strict";

// Class definition
var KTModalCustomersAdd = (function () {
    var submitButton;
    var cancelButton;
    var closeButton;
    // var validator;
    var form;
    var modal;
    var addBtn;
    var table;

    // Init form inputs
    var handleForm = function () {
        // Action buttons
        submitButton.addEventListener("click", function (e) {
            e.preventDefault();

            // Validate form before submit
            submitButton.setAttribute("data-kt-indicator", "on");

            // Disable submit button whilst loading
            submitButton.disabled = true;

            setTimeout(function () {
                submitButton.removeAttribute("data-kt-indicator");

                Swal.fire({
                    text: "Form has been successfully submitted!",
                    icon: "success",
                    buttonsStyling: false,
                    confirmButtonText: "Ok, got it!",
                    customClass: {
                        confirmButton: "btn btn-primary",
                    },
                }).then(function (result) {
                    if (result.isConfirmed) {
                        // Submit form
                        form.submit();

                        // Hide modal
                        modal.hide();

                        // Enable submit button after loading
                        submitButton.disabled = false;

                        // Redirect to customers list page
                        // window.location = form.getAttribute("data-kt-redirect");
                    }
                });
            }, 2000);
        });

        cancelButton.addEventListener("click", function (e) {
            e.preventDefault();

            Swal.fire({
                text: "Are you sure you would like to cancel?",
                icon: "warning",
                showCancelButton: true,
                buttonsStyling: false,
                confirmButtonText: "Yes, cancel it!",
                cancelButtonText: "No, return",
                customClass: {
                    confirmButton: "btn btn-primary",
                    cancelButton: "btn btn-active-light",
                },
            }).then(function (result) {
                if (result.value) {
                    form.reset(); // Reset form
                    modal.hide(); // Hide modal
                }
            });
        });

        closeButton.addEventListener("click", function (e) {
            e.preventDefault();
            console.log("submti btn");

            Swal.fire({
                text: "Are you sure you would like to cancel?",
                icon: "warning",
                showCancelButton: true,
                buttonsStyling: false,
                confirmButtonText: "Yes, cancel it!",
                cancelButtonText: "No, return",
                customClass: {
                    confirmButton: "btn btn-primary",
                    cancelButton: "btn btn-active-light",
                },
            }).then(function (result) {
                if (result.value) {
                    form.reset(); // Reset form
                    modal.hide(); // Hide modal
                }
            });
        });

        addBtn.addEventListener("click", function (e) {
            form.reset();
            e.preventDefault();
            const modalHeaderText = form.querySelector("h2.fw-bolder");
            const primaryID = form.querySelector('[name="id"]');
            const setModalHeader = $(this).attr("data-modal-header");
            if (setModalHeader !== undefined) {
                console.log(setModalHeader);
                modalHeaderText.innerText = setModalHeader;
            } else {
                modalHeaderText.innerText = "Add";
            }

            if (primaryID !== null || primaryID !== undefined) {
                $(primaryID).attr("value", null);
            }
        });
    };
    var handleMillerEditRows = () => {
        table = document.querySelector("#kt_customers_table");

        // Select all delete buttons
        const editButtons = table.querySelectorAll(
            '[data-kt-customer-table-filter="edit_miller_row"]'
        );

        // console.log(editButtons);

        // targeting modal to show loading spin
        var blockModal = new KTBlockUI(form, {
            message:
                '<div class="blockui-message"><span class="spinner-border text-primary"></span> Loading...</div>',
        });

        editButtons.forEach((d) => {
            // Delete button on click
            d.addEventListener("click", function (e) {
                e.preventDefault();

                // // blocking modal.
                blockModal.block();

                // Get data-* values
                const editRoute = e.target.getAttribute("data-ecc-route");
                // console.log(editRoute);

                // csrf token
                const token = $('meta[name="csrf-token"]').attr("content");

                // change the modal header h2 tag.
                const modalHeaderText = form.querySelector("h2.fw-bolder");
                const setModalHeader = $(this).attr("data-modal-header");
                if (setModalHeader !== undefined) {
                    console.log(setModalHeader);
                    modalHeaderText.innerText = setModalHeader;
                } else {
                    modalHeaderText.innerText = "Update";
                }

                // showing modal
                modal.show();

                // if (blockModal.isBlocked() === true) {
                $.ajax({
                    url: editRoute,
                    type: "GET",
                    data: {
                        _token: token,
                    },
                    success: function (res) {
                        /**
                         * NOTE:
                         * placing value as per DB column name.
                         * So input values name should be same as DB Column name.
                         */
                        $.map(res, function (v, k) {
                            // console.log(res.banks.length);
                            // for input fields only this condition will work
                            if ($('input[name="' + k + '"]')) {
                                $('input[name="' + k + '"]').val(v);
                            }

                            // if(res.banks.length > 0){
                            //     var div2 = document.getElementById("data-repeater-item-bank");

                            //     console.log(div2);

                            //     $.map(div2, function(v, k) {
                            //         if ($('input[name="'+k+'"]')) {
                            //             $('input[name="'+k+'"]').val(v);
                            //         }
                            //     })

                            // }

                            //first I have to check the length of bank
                            //if bank > 0 then I have to select a div to place all the values with map function

                            // for select fields this condition will work. select fields must be use select2 plugin.
                            if ($('select[name="' + k + '"]')) {
                                var stringNum = "" + v; // converting this value to string
                                $('select[name="' + k + '"]').select2("val", [
                                    stringNum,
                                ]);
                                if (k === "upazila_id") {
                                    // used setTimeout function bcz after selecting the district another ajax request is going for getting upazila's.
                                    setTimeout(function () {
                                        $('select[name="' + k + '"]').select2(
                                            "val",
                                            [stringNum]
                                        );
                                        // console.log(k);
                                    }, 3000);
                                }
                            }
                        });

                        // console.log(res);

                        if (
                            (res.banks !== undefined && res.banks.length > 0) ||
                            (res.transports !== undefined &&
                                res.transports.length > 0)
                        ) {
                            $.map(
                                res.banks,
                                function (v, k, array) {
                                    if (k !== 0) $("#addMoreBanks").click();

                                    for (const [key, value] of Object.entries(
                                        v
                                    )) {
                                        if (
                                            $(
                                                'input[name="kt_docs_repeater_advanced[' +
                                                    k +
                                                    "][" +
                                                    key +
                                                    ']"]'
                                            )
                                        ) {
                                            $(
                                                'input[name="kt_docs_repeater_advanced[' +
                                                    k +
                                                    "][" +
                                                    key +
                                                    ']"]'
                                            ).val(value);
                                            // console.log(v);
                                            // console.log('input[name="kt_docs_repeater_advanced['+k+']['+key+']"]');
                                        }
                                    }
                                },
                                res.banks
                            );
                        }

                        // for editing purpose we have add primary ID.
                        var primaryID = $('input[name="id"]');
                        if (primaryID.length === 0) {
                            $(form).append(
                                "<input type='hidden' name='id' value='" +
                                    res.id +
                                    "'>"
                            );
                        }
                        blockModal.release();
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        Swal.fire(
                            "Error Editing!",
                            "Please try again ",
                            "error"
                        );
                    },
                });
                // }
            });
        });
    };

    return {
        // Public functions
        init: function () {
            // Elements
            modal = new bootstrap.Modal(
                document.querySelector("#kt_modal_add_customer")
            );
            addBtn = document.querySelector(
                '[data-bs-target="#kt_modal_add_customer"]'
            );

            form = document.querySelector("#kt_modal_add_customer_form");
            submitButton = form.querySelector("#kt_modal_add_customer_submit");
            cancelButton = form.querySelector("#kt_modal_add_customer_cancel");
            closeButton = form.querySelector("#kt_modal_add_customer_close");

            handleForm();
            handleMillerEditRows();
        },
    };
})();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTModalCustomersAdd.init();
});

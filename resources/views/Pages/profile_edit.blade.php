@extends('layouts.app')
@section('title', 'Image Processing')
@section('main-content')
    <div class="app-main flex-column flex-row-fluid " id="kt_app_main">
        <div class="d-flex flex-column flex-column-fluid">
            <div id="kt_app_toolbar" class="app-toolbar  py-3 py-lg-6 ">
                <div id="kt_app_toolbar_container" class="app-container  container-xxl d-flex flex-stack ">
                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3 ">
                        <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">
                            Account Overview
                        </h1>
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                            <li class="breadcrumb-item text-muted">
                                <a href="../index.html" class="text-muted text-hover-primary">
                                    Home </a>
                            </li>
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-500 w-5px h-2px"></span>
                            </li>
                            <li class="breadcrumb-item text-muted">
                                Account </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div id="kt_app_content" class="app-content  flex-column-fluid ">
                <div id="kt_app_content_container" class="app-container  container-xxl ">
                    <div class="card mb-5 mb-xl-10">
                        <div class="card-body pt-9 pb-0">
                            <div class="d-flex flex-wrap flex-sm-nowrap">
                                <div class="me-7 mb-4">
                                    <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                                        <img src="{{ asset(Auth::user()->picture) }}" alt="image" />
                                        <div
                                            class="position-absolute translate-middle bottom-0 start-100 mb-6 bg-success rounded-circle border border-4 border-body h-20px w-20px">
                                        </div>
                                    </div>
                                </div>
                                <!--end::Pic-->

                                <!--begin::Info-->
                                <div class="flex-grow-1">
                                    <!--begin::Title-->
                                    <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                                        <!--begin::User-->
                                        <div class="d-flex flex-column">
                                            <!--begin::Name-->
                                            <div class="d-flex align-items-center mb-2">
                                                <a href="{{ route('dashboard.profile') }}"
                                                    class="text-gray-900 text-hover-primary fs-2 fw-bold me-1">
                                                    {{ ucfirst(Auth::user()->first_name) }}
                                                    {{ Auth::user()->last_name !== null ? ' ' . Str::ucfirst(Auth::user()->last_name) : '' }}
                                                </a>
                                            </div>
                                            <div class="d-flex flex-wrap fw-semibold fs-6 mb-4 pe-2">
                                                <a href="{{ route('dashboard.profile') }}"
                                                    class="d-flex align-items-center text-gray-500 text-hover-primary me-5 mb-2">
                                                    <span class="path1"></span><span class="path2"></span><span
                                                        class="path3"></span></i> {{ __('Admin') }}
                                                </a>
                                                <a href="{{ route('dashboard.profile') }}"
                                                    class="d-flex align-items-center text-gray-500 text-hover-primary me-5 mb-2">
                                                    <i class="fas fa-map-marker-alt fs-4 me-1">
                                                        <span class="path1"></span><span class="path2"></span>
                                                    </i>
                                                    {{ Auth::user()->address !== null ? ' ' . Str::ucfirst(Auth::user()->address) : '' }}

                                                </a>
                                                <a href="{{ route('dashboard.profile') }}"
                                                    class="d-flex align-items-center text-gray-500 text-hover-primary mb-2">
                                                    <i class="fas fa-envelope-square fs-4"><span class="path1"></span><span
                                                            class="path2 ms-2"></span></i> {{ Auth::user()->email }}
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-wrap flex-stack">
                                        <div class="d-flex flex-column flex-grow-1 pe-8">
                                            <div class="d-flex flex-wrap">
                                                <div
                                                    class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                                    <div class="d-flex align-items-center">
                                                        <i class="fas fa-thumbs-up fs-3 text-success me-2"><span
                                                                class="path1"></span><span class="path2"></span></i>
                                                        <div class="fs-2 fw-bold" data-kt-countup="true"
                                                            data-kt-countup-value="100" data-kt-countup-prefix="%">0</div>
                                                    </div>
                                                    <div class="fw-semibold fs-6 text-gray-500">Success Rate
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @if (Auth::user()->country == '' &&
                                                Auth::user()->state == '' &&
                                                Auth::user()->city == '' &&
                                                Auth::user()->zip_code == '' &&
                                                Auth::user()->address == '' &&
                                                Auth::user()->contact_no == '')
                                            @php
                                                $completion = 50;
                                            @endphp
                                        @else
                                            @php
                                                $completion = 100;
                                            @endphp
                                        @endif
                                        <div class="d-flex align-items-center w-200px w-sm-300px flex-column mt-3">
                                            <div class="d-flex justify-content-between w-100 mt-auto mb-2">
                                                <span class="fw-semibold fs-6 text-gray-500">Profile
                                                    Completion</span>
                                                <span class="fw-bold fs-6">{{ $completion }}%</span>
                                            </div>

                                            <div class="h-5px mx-3 w-100 bg-light mb-3">
                                                <div class="bg-success rounded h-5px" role="progressbar"
                                                    style="width: {{ $completion }}%;"
                                                    aria-valuenow="{{ $completion }}" aria-valuemin="0"
                                                    aria-valuemax="{{ $completion }}"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold">
                                <li class="nav-item mt-2">
                                    <a class="nav-link text-active-primary ms-0 me-10 py-5"
                                        href="{{ route('dashboard.profile') }}">
                                        Overview </a>
                                </li>
                                <li class="nav-item mt-2">
                                    <a class="nav-link text-active-primary ms-0 me-10 py-5 active"
                                        href="{{ route('dashboard.profile.edit') }}">
                                        Edit Profile </a>
                                </li>

                            </ul>
                        </div>
                    </div>
                    <div class="card mb-5 mb-xl-10">
                        <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
                            data-bs-target="#kt_account_profile_details" aria-expanded="true"
                            aria-controls="kt_account_profile_details">
                            <div class="card-title m-0">
                                <h3 class="fw-bold m-0">Profile Details</h3>
                            </div>
                        </div>
                        <div id="kt_account_settings_profile_details" class="collapse show">
                            <form id="form_update" method="POST">
                                @method('PUT')
                                <div class="card-body border-top p-9">
                                    <div class="row mb-6">
                                        <label class="col-lg-4 col-form-label fw-semibold fs-6">Avatar</label>
                                        <div class="col-lg-8">
                                            <div class="image-input image-input-outline" data-kt-image-input="true"
                                                style="background-image: url('../assets/media/svg/avatars/blank.svg')">
                                                <div class="image-input-wrapper w-125px h-125px"
                                                    style="background-image: url({{ asset(Auth::user()->picture) }})">
                                                </div>
                                                <label
                                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                    data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                                    title="Change avatar">
                                                    <i class="fas fa-pencil-alt fs-7"><span class="path1"></span><span
                                                            class="path2"></span></i>
                                                    <input type="file" name="picture" accept=".png, .jpg, .jpeg" />
                                                </label>
                                            </div>
                                            <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                                        </div>
                                    </div>
                                    <div class="row mb-6">
                                        <label class="col-lg-4 col-form-label fw-semibold fs-6">Full Name</label>
                                        <div class="col-lg-8">
                                            <div class="row">
                                                <div class="col-lg-6 fv-row">
                                                    <input type="hidden" id="id" value="{{ Auth::user()->id }}">
                                                    <input type="text" name="first_name"
                                                        class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                                        placeholder="First name" />
                                                </div>
                                                <div class="col-lg-6 fv-row">
                                                    <input type="text" name="last_name"
                                                        class="form-control form-control-lg form-control-solid"
                                                        placeholder="Last name" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-6">
                                        <label class="col-lg-4 col-form-label fw-semibold fs-6">Contact Number</label>
                                        <div class="col-lg-8">
                                            <input type="number" name="contact_no"
                                                class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                                placeholder="Contact Number" />
                                        </div>
                                    </div>
                                    <div class="row mb-6">
                                        <label class="col-lg-4 col-form-label fw-semibold fs-6">Country</label>
                                        <div class="col-lg-8">
                                            <input type="number" name="country"
                                                class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                                placeholder="Country" />
                                        </div>
                                    </div>
                                    <div class="row mb-6">
                                        <label class="col-lg-4 col-form-label fw-semibold fs-6">State</label>
                                        <div class="col-lg-8">
                                            <input type="number" name="state"
                                                class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                                placeholder="State" />
                                        </div>
                                    </div>
                                    <div class="row mb-6">
                                        <label class="col-lg-4 col-form-label fw-semibold fs-6">City</label>
                                        <div class="col-lg-8">
                                            <input type="number" name="city"
                                                class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                                placeholder="City" />
                                        </div>
                                    </div>
                                    <div class="row mb-6">
                                        <label class="col-lg-4 col-form-label fw-semibold fs-6">Zip Postal Code</label>
                                        <div class="col-lg-8">
                                            <input type="number" name="zip_code"
                                                class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                                placeholder="Zip Postal Code" />
                                        </div>
                                    </div>
                                    <div class="row mb-6">
                                        <label class="col-lg-4 col-form-label fw-semibold fs-6">Address</label>
                                        <div class="col-lg-8">
                                            <textarea name="address" cols="3" placeholder="Address"
                                                class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer d-flex justify-content-end py-6 px-9">
                                    <button type="reset"
                                        class="btn btn-light btn-active-light-primary me-2">Discard</button>
                                    <button type="submit" class="btn btn-primary" id="update">Save Changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card  mb-5 mb-xl-10">
                        <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
                            data-bs-target="#kt_account_signin_method">
                            <div class="card-title m-0">
                                <h3 class="fw-bold m-0">Sign-in Method</h3>
                            </div>
                        </div>
                        <div id="kt_account_settings_signin_method" class="collapse show">
                            <div class="card-body border-top p-9">
                                <div class="d-flex flex-wrap align-items-center">
                                    <div id="kt_signin_email">
                                        <div class="fs-6 fw-bold mb-1">Email Address</div>
                                        <div class="fw-semibold text-gray-600">support@keenthemes.com</div>
                                    </div>
                                    <div id="kt_signin_email_edit" class="flex-row-fluid d-none">
                                        <form id="kt_signin_change_email" class="form" novalidate="novalidate">
                                            <div class="row mb-6">
                                                <div class="col-lg-6 mb-4 mb-lg-0">
                                                    <div class="fv-row mb-0">
                                                        <label for="emailaddress"
                                                            class="form-label fs-6 fw-bold mb-3">Enter New Email
                                                            Address</label>
                                                        <input type="email"
                                                            class="form-control form-control-lg form-control-solid"
                                                            id="emailaddress" placeholder="Email Address"
                                                            name="emailaddress" value="support@keenthemes.com" />
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="fv-row mb-0">
                                                        <label for="confirmemailpassword"
                                                            class="form-label fs-6 fw-bold mb-3">Confirm Password</label>
                                                        <input type="password"
                                                            class="form-control form-control-lg form-control-solid"
                                                            name="confirmemailpassword" id="confirmemailpassword" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <button id="kt_signin_submit" type="button"
                                                    class="btn btn-primary  me-2 px-6">Update Email</button>
                                                <button id="kt_signin_cancel" type="button"
                                                    class="btn btn-color-gray-500 btn-active-light-primary px-6">Cancel</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div id="kt_signin_email_button" class="ms-auto">
                                        <button class="btn btn-light btn-active-light-primary">Change Email</button>
                                    </div>
                                </div>
                                <div class="separator separator-dashed my-6"></div>
                                <div class="d-flex flex-wrap align-items-center mb-10">
                                    <div id="kt_signin_password">
                                        <div class="fs-6 fw-bold mb-1">Password</div>
                                        <div class="fw-semibold text-gray-600">************</div>
                                    </div>
                                    <div id="kt_signin_password_edit" class="flex-row-fluid d-none">
                                        <form id="kt_signin_change_password" class="form" novalidate="novalidate">
                                            <div class="row mb-1">
                                                <div class="col-lg-4">
                                                    <div class="fv-row mb-0">
                                                        <label for="currentpassword"
                                                            class="form-label fs-6 fw-bold mb-3">Current Password</label>
                                                        <input type="password"
                                                            class="form-control form-control-lg form-control-solid "
                                                            name="currentpassword" id="currentpassword" />
                                                    </div>
                                                </div>

                                                <div class="col-lg-4">
                                                    <div class="fv-row mb-0">
                                                        <label for="newpassword" class="form-label fs-6 fw-bold mb-3">New
                                                            Password</label>
                                                        <input type="password"
                                                            class="form-control form-control-lg form-control-solid "
                                                            name="newpassword" id="newpassword" />
                                                    </div>
                                                </div>

                                                <div class="col-lg-4">
                                                    <div class="fv-row mb-0">
                                                        <label for="confirmpassword"
                                                            class="form-label fs-6 fw-bold mb-3">Confirm New
                                                            Password</label>
                                                        <input type="password"
                                                            class="form-control form-control-lg form-control-solid "
                                                            name="confirmpassword" id="confirmpassword" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-text mb-5">Password must be at least 8 character and contain
                                                symbols</div>

                                            <div class="d-flex">
                                                <button id="kt_password_submit" type="button"
                                                    class="btn btn-primary me-2 px-6">Update Password</button>
                                                <button id="kt_password_cancel" type="button"
                                                    class="btn btn-color-gray-500 btn-active-light-primary px-6">Cancel</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div id="kt_signin_password_button" class="ms-auto">
                                        <button class="btn btn-light btn-active-light-primary">Reset Password</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="kt_app_footer" class="app-footer ">
            <div class="app-container  container-fluid d-flex flex-column flex-md-row flex-center flex-md-stack py-3 ">
                <div class="text-gray-900 order-2 order-md-1">
                    <span class="text-muted fw-semibold me-1">2024©</span>
                    <a href="https://keenthemes.com/" target="_blank"
                        class="text-gray-800 text-hover-primary">Keenthemes</a>
                </div>
                <ul class="menu menu-gray-600 menu-hover-primary fw-semibold order-1">
                    <li class="menu-item"><a href="https://keenthemes.com/" target="_blank"
                            class="menu-link px-2">About</a></li>
                    <li class="menu-item"><a href="https://devs.keenthemes.com/" target="_blank"
                            class="menu-link px-2">Support</a></li>
                    <li class="menu-item"><a href="https://1.envato.market/EA4JP" target="_blank"
                            class="menu-link px-2">Purchase</a></li>
                </ul>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $(document).on("click", "#update", function(stop) {
                stop.preventDefault();
                $.ajaxSetup({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                });
                var formData = new FormData(form_update);
                var id = $("#update")
                    .closest("#form_update")
                    .find("#id")
                    .val();
                // --------------------------loading button coading-------------------
                const button = document.getElementById("update");
                button.innerHTML =
                    "<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span> Processing...";
                button.setAttribute("disabled", "disabled");
                // --------------------------loading button coading-------------------
                $.ajax({
                    url: "/profile_update/" + id,
                    method: "POST",
                    contentType: false,
                    processData: false,
                    data: formData,
                    dataType: "json",
                    success: function(response) {
                        if (response.message == 200) {
                            toastr.success('Data Updated Successfully',
                                'Success', {
                                    "timeOut": "5000",
                                    "extendedTimeOut": "1000",
                                    "progressBar": true,
                                    "enableHtml": true
                                });
                                $("form").trigger("reset");
                                button.removeAttribute("disabled");
                                button.innerHTML = "Save Changes";
                            // $(".text-danger").text("");
                            // Swal.fire({
                            //     toast: true,
                            //     icon: "success",
                            //     title: module_name +
                            //         " Updated Successfully..!",
                            //     animation: false,
                            //     position: "top-right",
                            //     showConfirmButton: false,
                            //     timer: 3000,
                            //     timerProgressBar: true,
                            // });
                        } else {
                            // button.removeAttribute("disabled");
                            // button.innerHTML = "Update " + module_name + " >";
                            // Swal.fire({
                            //     toast: true,
                            //     icon: "error",
                            //     title: module_name +
                            //         " not Updated Successfully..!",
                            //     animation: false,
                            //     position: "top-right",
                            //     showConfirmButton: false,
                            //     timer: 3000,
                            //     timerProgressBar: true,
                            // });
                        }
                        $("form").trigger("reset");
                        form.classList.remove("was-validated");
                    },
                    error: function(error) {
                        button.removeAttribute("disabled");
                        button.innerHTML = "Update " + module_name + " >";
                        var error = error.responseJSON;
                        $.each(error.errors, function(index, value) {
                            $("#" + index).html(value);
                        });
                    },
                });
            })
        })
    </script>
@endsection

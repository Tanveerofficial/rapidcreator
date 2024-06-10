@extends('layouts.app')
@section('title', 'Rapid Creator')
@section('main-content')
    <div class="app-main flex-column flex-row-fluid " id="kt_app_main">
        <div class="d-flex flex-column flex-column-fluid">
            <div id="kt_app_toolbar" class="app-toolbar  py-3 py-lg-6 ">
                <div id="kt_app_toolbar_container" class="app-container  container-xxl d-flex flex-stack">
                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3 ">
                        <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">
                            @php
                                date_default_timezone_set('Asia/Karachi');
                                $currentHour = date('G');
                                $greeting;
                            @endphp
                            @if ($currentHour >= 5 && $currentHour < 12)
                                @php
                                    $greeting = 'Good Morning';
                                @endphp
                            @elseif ($currentHour >= 12 && $currentHour < 17)
                                @php
                                    $greeting = 'Good Afternoon';
                                @endphp
                            @elseif ($currentHour >= 17 && $currentHour < 19)
                                @php
                                    $greeting = 'Good Evening';
                                @endphp
                            @else
                                @php
                                    $greeting = 'Good Night';
                                @endphp
                            @endif
                            {{ $greeting }},
                            {{ Str::ucfirst(Auth::user()->first_name) . ' ' . Str::ucfirst(Auth::user()->last_name) }}!
                        </h1>
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                            <li class="breadcrumb-item text-muted">
                                <a href="{{ route('dashboard.dashboard') }}" class="text-muted text-hover-primary">
                                    Home </a>
                            </li>
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-500 w-5px h-2px"></span>
                            </li>
                            <li class="breadcrumb-item text-muted">
                                Dashboard</li>
                        </ul>
                    </div>
                </div>
                <div id="kt_app_toolbar_container" class="app-container  container text-end">
                    <div class="page-title d-flex flex-column justify-content-end flex-wrap me-3">
                        <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-end">
                            @php
                                date_default_timezone_set('Asia/Karachi');
                                $now = date('l j F Y');
                            @endphp
                            {{ $now }}
                        </h1>
                        <h1>
                            <span class="digital-clock badge badge-light-danger fs-base" id="digital-clock">11:40:21
                                AM</span>
                        </h1>
                        <input type="text" name="daterange" class="form-control" style="width: 70%;">
                        <button class="btn bg-gray-900 hoverable text-light" style="width:30%;margin-left:342px;margin-top:-43px;background-color:#071437;color:white;"
                                id="applyFilteration"><i class="fas fa-filter text-light"></i> Apply</button>
                    </div>
                </div>
            </div>
            <div id="kt_app_content" class="app-content  flex-column-fluid ">
                <div id="kt_app_content_container" class="app-container container-xxl">
                    <div class="row g-5 g-xl-8">
                        <div class="col-xl-{{\Illuminate\Support\Facades\Auth::user()->is_admin==0?'6':'4'}}">
                            <a href="{{url('fonts')}}" class="card bg-gray-900 hoverable card-xl-stretch mb-5 mb-xl-8">
                                <div class="card-body">
                                    <i class="fas fa-font fs-2 text-gray-100 fs-2x ms-n1"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></i>
                                    <div class="text-gray-100 fw-bold fs-2 mb-2 mt-5">
                                        Fonts
                                    </div>
                                    <div class="fw-semibold text-gray-100" id="active_fonts">
                                        {{ $activeFonts }} Active Fonts</div>
                                </div>
                            </a>
                        </div>
                        <div class="col-xl-{{\Illuminate\Support\Facades\Auth::user()->is_admin==0?'6':'4'}}">
                            <a href="{{url('csv')}}" class="card bg-gray-900 hoverable card-xl-stretch mb-5 mb-xl-8">
                                <div class="card-body">
                                    <i class="fas fa-file-csv fs-2 text-gray-100 fs-2x ms-n1"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></i>
                                    <div class="text-gray-100 fw-bold fs-2 mb-2 mt-5">
                                        CSV Files
                                    </div>
                                    <div class="fw-semibold text-gray-100" id="active_csvs">
                                        {{ $activeCSVs }} Active CSV Files</div>
                                </div>
                            </a>
                        </div>
                        <div class="col-xl-4 {{\Illuminate\Support\Facades\Auth::user()->is_admin==0?'d-none':'d-block'}}">
                            <a href="{{url('users')}}" class="card bg-gray-900 hoverable card-xl-stretch mb-5 mb-xl-8">
                                <div class="card-body">
                                    <i class="fas fa-users fs-2 text-gray-100 fs-2x ms-n1"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></i>
                                    <div class="text-gray-100 fw-bold fs-2 mb-2 mt-5">
                                        All Users
                                    </div>
                                    <div class="fw-semibold text-gray-100" id="active_users">
                                        {{ $activeUsers }} Active Users</div>
                                </div>
                            </a>
                        </div>
                        <div class="col-xl-4">
                            <a href="{{url('template')}}" class="card bg-gray-900 hoverable card-xl-stretch mb-5 mb-xl-8">
                                <div class="card-body">
                                    <i class="fas fa-images fs-2 text-gray-100 fs-2x ms-n1"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></i>
                                    <div class="text-gray-100 fw-bold fs-2 mb-2 mt-5">
                                        Today Templates
                                    </div>
                                    <div class="fw-semibold text-gray-100" id="active_csvs">
                                        {{ $todayTemplates }} Active Templates</div>
                                </div>
                            </a>
                        </div>
                        <div class="col-xl-4">
                            <a href="{{url('template')}}" class="card bg-gray-900 hoverable card-xl-stretch mb-5 mb-xl-8">
                                <div class="card-body">
                                    <i class="fas fa-images fs-2 text-gray-100 fs-2x ms-n1"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></i>
                                    <div class="text-gray-100 fw-bold fs-2 mb-2 mt-5">
                                        All Templates
                                    </div>
                                    <div class="fw-semibold text-gray-100" id="active_templates">
                                        {{ $uploadedtemplates }} Active Templates</div>
                                </div>
                            </a>
                        </div>
                        <div class="col-xl-4">
                            <a href="{{url('mockup/view')}}" class="card bg-gray-900 hoverable card-xl-stretch mb-5 mb-xl-8">
                                <div class="card-body">
                                    <i class="fas fa-images fs-2 text-gray-100 fs-2x ms-n1"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></i>
                                    <div class="text-gray-100 fw-bold fs-2 mb-2 mt-5">
                                        All Mockups
                                    </div>
                                    <div class="fw-semibold text-gray-100" id="active_mockups">
                                        {{ $uploadedMockups }} Active Mockups</div>
                                </div>
                            </a>
                        </div>
                        <div class="col-xl-12">
                            <div class="card card-xl-stretch mb-5 mb-xl-8" style="height: 465px;overflow: auto">
                                <div class="card-header border-0 pt-5">
                                    <h3 class="card-title align-items-start flex-column">
                                        <span class="card-label fw-bold fs-3 mb-1">Latest Products</span>
                                    </h3>
                                    <div class="card-toolbar">
                                        <ul class="nav" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-secondary fw-bold px-4 me-1 active" data-bs-toggle="tab" href="{{ url("#kt_table_widget_5_tab_1") }}" aria-selected="true" role="tab">Month</a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-secondary fw-bold px-4 me-1" data-bs-toggle="tab" href="{{ url("#kt_table_widget_5_tab_2") }}" aria-selected="false" tabindex="-1" role="tab">Week</a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-secondary fw-bold px-4" data-bs-toggle="tab" href="{{ url("#kt_table_widget_5_tab_3") }}" aria-selected="false" tabindex="-1" role="tab">Day</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-body py-3">
                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="kt_table_widget_5_tab_1" role="tabpanel">
                                            <div class="table-responsive">
                                                <table class="table table-row-dashed table-row-gray-200 align-middle gs-0 gy-4">
                                                    <thead>
                                                    <tr class="border-0">
                                                        <th class="p-0 min-w-200px"></th>
                                                        <th class="p-0 min-w-200px"></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($montnlyProdcts as $products)
                                                        <tr>
                                                            <td>
                                                                <div class="symbol symbol-80px me-2">
                                                <span class="symbol-label">
                                                    <img src="{{ asset($products->designed_mokup) }}" class="h-100 w-100 align-self-center" alt="Product">
                                                </span>
                                                                </div>
                                                            </td>
                                                            <td class="text-end">
                                                                <span class="badge badge-light-success">{{$products->mokup_status=0?"In-Process":"Active"}}</span>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                    <!--end::Table body-->
                                                </table>
                                            </div>
                                            <!--end::Table-->
                                        </div>
                                        <!--end::Tap pane-->

                                        <!--begin::Tap pane-->
                                        <div class="tab-pane fade " id="kt_table_widget_5_tab_2" role="tabpanel">
                                            <div class="table-responsive">
                                                <table class="table table-row-dashed table-row-gray-200 align-middle gs-0 gy-4">
                                                    <thead>
                                                    <tr class="border-0">
                                                        <th class="p-0 min-w-200px"></th>
                                                        <th class="p-0 min-w-200px"></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($weeklyProducts as $products)
                                                        <tr>
                                                            <td>
                                                                <div class="symbol symbol-80px me-2">
                                                <span class="symbol-label">
                                                    <img src="{{ asset($products->designed_mokup) }}" class="h-100 w-100 align-self-center" alt="Product">
                                                </span>
                                                                </div>
                                                            </td>
                                                            <td class="text-end">
                                                                <span class="badge badge-light-success">{{$products->mokup_status=0?"In-Process":"Active"}}</span>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                    <!--end::Table body-->
                                                </table>
                                            </div>
                                        </div>
                                        <!--end::Tap pane-->

                                        <!--begin::Tap pane-->
                                        <div class="tab-pane fade " id="kt_table_widget_5_tab_3" role="tabpanel">
                                            <div class="table-responsive">
                                                <table class="table table-row-dashed table-row-gray-200 align-middle gs-0 gy-4">
                                                    <thead>
                                                    <tr class="border-0">
                                                        <th class="p-0 min-w-200px"></th>
                                                        <th class="p-0 min-w-200px"></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($todayProducts as $products)
                                                        <tr>
                                                            <td>
                                                                <div class="symbol symbol-80px me-2">
                                                <span class="symbol-label">
                                                    <img src="{{ asset($products->designed_mokup) }}" class="h-100 w-100 align-self-center" alt="Product">
                                                </span>
                                                                </div>
                                                            </td>
                                                            <td class="text-end">
                                                                <span class="badge badge-light-success">{{$products->mokup_status=0?"In-Process":"Active"}}</span>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                    <!--end::Table body-->
                                                </table>
                                            </div>
                                        </div>
                                        <!--end::Tap pane-->
                                    </div>
                                </div>
                                <!--end::Body-->
                            </div>
                            <!--end::Tables Widget 5-->    </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="kt_app_footer" class="app-footer mt-5 bg-white">
            <div class="app-container  container-fluid py-3 ">
                <div class="text-gray-900 order-2 order-md-1">
                    <div class="row">
                        <div class="col-12 text-center">
                            <span class="text-muted fw-semibold me-1">© Copyright {{ date('Y') }} <a
                                    href="https://ibexstack.com/live/" target="_blank">Ibexstack</a>. All rights
                                reserved.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@if (session('success') == 200)
    @section('script')
        <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
        <script>
            $(function() {
                $('input[name="daterange"]').daterangepicker({
                    opens: 'left'
                }, function(start, end, label) {
                    console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end
                        .format('YYYY-MM-DD'));
                });
            });
            function updateDigitalClock() {
                const now = new Date();
                const hours = now.getHours();
                const minutes = now.getMinutes();
                const seconds = now.getSeconds();
                const ampm = (hours >= 12) ? 'PM' : 'AM';
                const formattedHours = (hours % 12 === 0) ? 12 : hours % 12;
                const digitalClock = document.getElementById('digital-clock');
                digitalClock.textContent =
                    `${formatTwoDigits(formattedHours)}:${formatTwoDigits(minutes)}:${formatTwoDigits(seconds)} ${ampm}`;
            }

            function formatTwoDigits(number) {
                return (number < 10) ? `0${number}` : number;
            }
            setInterval(updateDigitalClock, 1000);
            updateDigitalClock();
        </script>
        <script>
            $(document).ready(function() {
                $(document).on("click", "#applyFilteration", function(stop) {
                    stop.preventDefault();
                    $.ajaxSetup({
                        headers: {
                            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                                "content"
                            ),
                        },
                    });
                    var value = $('input[name="daterange"]').val();
                    var formData = new FormData();
                    formData.append("value", value);
                    $.ajax({
                        url: "{{ url('/apply_filteration/') }}" + value,
                        method: "POST",
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            alert(response);
                        }
                    });
                });
            });
        </script>
        <script>
            Swal.fire({
                toast: true,
                icon: 'success',
                title: 'Welcome Back to the Rapid Creator Dashboard...!',
                animation: false,
                position: 'top-right',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
            });
        </script>
    @endsection
@endif
@section('script')
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(function() {
            $('input[name="daterange"]').daterangepicker({
                opens: 'left'
            }, function(start, end, label) {
                console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end
                    .format('YYYY-MM-DD'));
            });
        });

        function updateDigitalClock() {
            const now = new Date();
            const hours = now.getHours();
            const minutes = now.getMinutes();
            const seconds = now.getSeconds();
            const ampm = (hours >= 12) ? 'PM' : 'AM';
            const formattedHours = (hours % 12 === 0) ? 12 : hours % 12;
            const digitalClock = document.getElementById('digital-clock');
            digitalClock.textContent =
                `${formatTwoDigits(formattedHours)}:${formatTwoDigits(minutes)}:${formatTwoDigits(seconds)} ${ampm}`;
        }

        function formatTwoDigits(number) {
            return (number < 10) ? `0${number}` : number;
        }
        setInterval(updateDigitalClock, 1000);
        updateDigitalClock();
    </script>
    <script>
        $(document).ready(function() {
            $(document).on("click", "#applyFilteration", function(stop) {
                stop.preventDefault();
                const button = document.getElementById("applyFilteration");
                button.innerHTML =
                    "<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span>";
                button.setAttribute("disabled", "disabled");
                $.ajaxSetup({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                });
                var value = $('input[name="daterange"]').val();
                var formData = new FormData();
                formData.append("value", value);
                $.ajax({
                    url: "{{ url('/apply_filteration') }}",
                    method: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        button.removeAttribute("disabled");
                        button.innerHTML = '<i class="fas fa-filter"></i> Apply';
                        if (response) {
                            $("#templates").empty();
                            $("#active_templates").empty();
                            $("#mockups").empty();
                            $("#active_mockups").empty();
                            $("#fonts").empty();
                            $("#active_fonts").empty();
                            $("#active_users").empty();
                            $("#active_fonts").append(response.activeFonts + " Active Fonts");
                            $("#active_users").append(response.activeUsers + " Active Users");
                            $("#fonts").append(response.totalFonts);
                            $("#active_fonts_percentage").empty();
                            $("#active_fonts_percentage").append(response
                                .percentageActiveFonts + "%");
                            $("#active_fonts_percentage_css").css("width", response
                                .percentageActiveFonts + "%");
                            $("#csvs").empty();
                            $("#active_csvs").empty();
                            $("#active_csvs").append(response.activeCSVs + " Active CSV Files");
                            $("#csvs").append(response.totalCSV);
                            $("#templates").append(response.uploadedtemplates);
                            $("#active_templates").append(response.uploadedTemplates +
                                " Active Templates");
                            $("#mockups").append(response.uploadedMockups);
                            $("#active_mockups").append(response.uploadedMockups +
                                " Active Mockups");
                            $("#active_csvs_percentage").empty();
                            $("#active_csvs_percentage").append(response
                                .percentageActiveCsvs + "%");
                            $("#active_csvs_percentage_css").css("width", response
                                .percentageActiveCsvs + "%");
                        }
                    },error:function (error){
                        button.removeAttribute("disabled");
                        button.innerHTML = '<i class="fas fa-filter"></i> Apply';
                        console.log(error.getError());
                    }
                });
            });
        });
    </script>
@endsection

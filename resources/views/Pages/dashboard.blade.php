@extends('layouts.app')
@section('title', 'Image Processing')
@section('main-content')
    <div class="app-main flex-column flex-row-fluid " id="kt_app_main">
        <div class="d-flex flex-column flex-column-fluid">
            <div id="kt_app_toolbar" class="app-toolbar  py-3 py-lg-6 ">
                <div id="kt_app_toolbar_container" class="app-container  container-xxl d-flex flex-stack ">
                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3 ">
                        <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">
                            eCommerce Dashboard
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
                                Dashboards </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div id="kt_app_content" class="app-content  flex-column-fluid ">
                <div id="kt_app_content_container" class="app-container  container-xxl">
                    <div class="row g-5 g-xl-10 mb-xl-10">
                        <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-md-5 mb-xl-10">
                            <div class="card card-flush h-md-50 mb-5 mb-xl-10">
                                <div class="card-header pt-5">
                                    <div class="card-title d-flex flex-column">
                                        <div class="d-flex align-items-center">
                                            <span class="fs-4 fw-semibold text-gray-500 me-1 align-self-start">$</span>
                                            <span class="fs-2hx fw-bold text-gray-900 me-2 lh-1 ls-n2">69,700</span>
                                            <span class="badge badge-light-success fs-base">
                                                <i class="ki-duotone ki-arrow-up fs-5 text-success ms-n1"><span
                                                        class="path1"></span><span class="path2"></span></i>
                                                2.2%
                                            </span>
                                        </div>
                                        <span class="text-gray-500 pt-1 fw-semibold fs-6">Expected
                                            Earnings</span>
                                    </div>
                                </div>
                                <div class="card-body pt-2 pb-4 d-flex align-items-center">
                                    <div class="d-flex flex-center me-5 pt-2">
                                        <div id="kt_card_widget_4_chart" style="min-width: 70px; min-height: 70px"
                                            data-kt-size="70" data-kt-line="11">
                                            <span></span><canvas height="70" width="70"></canvas>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column content-justify-center w-100">
                                        <div class="d-flex fs-6 fw-semibold align-items-center">
                                            <div class="bullet w-8px h-6px rounded-2 bg-danger me-3"></div>
                                            <div class="text-gray-500 flex-grow-1 me-4">Shoes</div>
                                            <div class="fw-bolder text-gray-700 text-xxl-end">$7,660</div>
                                        </div>
                                        <div class="d-flex fs-6 fw-semibold align-items-center my-3">
                                            <div class="bullet w-8px h-6px rounded-2 bg-primary me-3">
                                            </div>
                                            <div class="text-gray-500 flex-grow-1 me-4">Gaming</div>
                                            <div class="fw-bolder text-gray-700 text-xxl-end">$2,820</div>
                                        </div>
                                        <div class="d-flex fs-6 fw-semibold align-items-center">
                                            <div class="bullet w-8px h-6px rounded-2 me-3"
                                                style="background-color: #E4E6EF"></div>
                                            <div class="text-gray-500 flex-grow-1 me-4">Others</div>
                                            <div class=" fw-bolder text-gray-700 text-xxl-end">$45,257
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card card-flush h-md-50 mb-xl-10">
                                <div class="card-header pt-5">
                                    <div class="card-title d-flex flex-column">
                                        <div class="d-flex align-items-center">
                                            <span class="fs-2hx fw-bold text-gray-900 me-2 lh-1 ls-n2">1,836</span>
                                            <span class="badge badge-light-danger fs-base">
                                                <i class="ki-duotone ki-arrow-down fs-5 text-danger ms-n1"><span
                                                        class="path1"></span><span class="path2"></span></i>
                                                2.2%
                                            </span>
                                        </div>
                                        <span class="text-gray-500 pt-1 fw-semibold fs-6">Orders This
                                            Month</span>
                                    </div>
                                </div>
                                <div class="card-body d-flex align-items-end pt-0">
                                    <div class="d-flex align-items-center flex-column mt-3 w-100">
                                        <div class="d-flex justify-content-between w-100 mt-auto mb-2">
                                            <span class="fw-bolder fs-6 text-gray-900">1,048 to Goal</span>
                                            <span class="fw-bold fs-6 text-gray-500">62%</span>
                                        </div>
                                        <div class="h-8px mx-3 w-100 bg-light-success rounded">
                                            <div class="bg-success rounded h-8px" role="progressbar" style="width: 62%;"
                                                aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <!--end::Progress-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Card widget 5-->
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-md-5 mb-xl-10">
                            <!--begin::Card widget 6-->
                            <div class="card card-flush  h-md-50 mb-5 mb-xl-10">
                                <!--begin::Header-->
                                <div class="card-header pt-5">
                                    <!--begin::Title-->
                                    <div class="card-title d-flex flex-column">
                                        <!--begin::Info-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Currency-->
                                            <span class="fs-4 fw-semibold text-gray-500 me-1 align-self-start">$</span>
                                            <!--end::Currency-->

                                            <!--begin::Amount-->
                                            <span class="fs-2hx fw-bold text-gray-900 me-2 lh-1 ls-n2">2,420</span>
                                            <!--end::Amount-->

                                            <!--begin::Badge-->
                                            <span class="badge badge-light-success fs-base">
                                                <i class="ki-duotone ki-arrow-up fs-5 text-success ms-n1"><span
                                                        class="path1"></span><span class="path2"></span></i>
                                                2.6%
                                            </span>
                                            <!--end::Badge-->
                                        </div>
                                        <!--end::Info-->

                                        <!--begin::Subtitle-->
                                        <span class="text-gray-500 pt-1 fw-semibold fs-6">Average Daily
                                            Sales</span>
                                        <!--end::Subtitle-->
                                    </div>
                                    <!--end::Title-->
                                </div>
                                <!--end::Header-->

                                <!--begin::Card body-->
                                <div class="card-body d-flex align-items-end px-0 pb-0">
                                    <!--begin::Chart-->
                                    <div id="kt_card_widget_6_chart" class="w-100" style="height: 80px; min-height: 80px;">
                                        <div id="apexchartsyyd5jngk"
                                            class="apexcharts-canvas apexchartsyyd5jngk apexcharts-theme-light"
                                            style="width: 494px; height: 80px;"><svg id="SvgjsSvg3340" width="494"
                                                height="80" xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev"
                                                class="apexcharts-svg" xmlns:data="ApexChartsNS"
                                                transform="translate(0, 0)" style="background: transparent;">
                                                <foreignObject x="0" y="0" width="494" height="80">
                                                    <div class="apexcharts-legend" xmlns="http://www.w3.org/1999/xhtml"
                                                        style="max-height: 40px;"></div>
                                                </foreignObject>
                                                <g id="SvgjsG3386" class="apexcharts-yaxis" rel="0"
                                                    transform="translate(-18, 0)"></g>
                                                <g id="SvgjsG3342" class="apexcharts-inner apexcharts-graphical"
                                                    transform="translate(47.96666666666667, 4.5)">
                                                    <defs id="SvgjsDefs3341">
                                                        <clipPath id="gridRectMaskyyd5jngk">
                                                            <rect id="SvgjsRect3344" width="487" height="111"
                                                                x="-44.96666666666667" y="-20" rx="0"
                                                                ry="0" opacity="1" stroke-width="0"
                                                                stroke="none" stroke-dasharray="0" fill="#fff">
                                                            </rect>
                                                        </clipPath>
                                                        <clipPath id="forecastMaskyyd5jngk"></clipPath>
                                                        <clipPath id="nonForecastMaskyyd5jngk"></clipPath>
                                                        <clipPath id="gridRectMarkerMaskyyd5jngk">
                                                            <rect id="SvgjsRect3345" width="410.06666666666666"
                                                                height="75" x="-2" y="-2" rx="0"
                                                                ry="0" opacity="1" stroke-width="0"
                                                                stroke="none" stroke-dasharray="0" fill="#fff">
                                                            </rect>
                                                        </clipPath>
                                                    </defs>
                                                    <g id="SvgjsG3365" class="apexcharts-grid">
                                                        <g id="SvgjsG3366" class="apexcharts-gridlines-horizontal"
                                                            style="display: none;">
                                                            <line id="SvgjsLine3369" x1="-33.96666666666667"
                                                                y1="0" x2="440.0333333333333" y2="0"
                                                                stroke="#dbdfe9" stroke-dasharray="4"
                                                                stroke-linecap="butt" class="apexcharts-gridline"></line>
                                                            <line id="SvgjsLine3370" x1="-33.96666666666667"
                                                                y1="17.75" x2="440.0333333333333" y2="17.75"
                                                                stroke="#dbdfe9" stroke-dasharray="4"
                                                                stroke-linecap="butt" class="apexcharts-gridline"></line>
                                                            <line id="SvgjsLine3371" x1="-33.96666666666667"
                                                                y1="35.5" x2="440.0333333333333" y2="35.5"
                                                                stroke="#dbdfe9" stroke-dasharray="4"
                                                                stroke-linecap="butt" class="apexcharts-gridline"></line>
                                                            <line id="SvgjsLine3372" x1="-33.96666666666667"
                                                                y1="53.25" x2="440.0333333333333" y2="53.25"
                                                                stroke="#dbdfe9" stroke-dasharray="4"
                                                                stroke-linecap="butt" class="apexcharts-gridline"></line>
                                                            <line id="SvgjsLine3373" x1="-33.96666666666667"
                                                                y1="71" x2="440.0333333333333" y2="71"
                                                                stroke="#dbdfe9" stroke-dasharray="4"
                                                                stroke-linecap="butt" class="apexcharts-gridline"></line>
                                                        </g>
                                                        <g id="SvgjsG3367" class="apexcharts-gridlines-vertical"
                                                            style="display: none;"></g>
                                                        <line id="SvgjsLine3375" x1="0" y1="71"
                                                            x2="406.06666666666666" y2="71" stroke="transparent"
                                                            stroke-dasharray="0" stroke-linecap="butt">
                                                        </line>
                                                        <line id="SvgjsLine3374" x1="0" y1="1"
                                                            x2="0" y2="71" stroke="transparent"
                                                            stroke-dasharray="0" stroke-linecap="butt"></line>
                                                    </g>
                                                    <g id="SvgjsG3368" class="apexcharts-grid-borders"
                                                        style="display: none;"></g>
                                                    <g id="SvgjsG3346"
                                                        class="apexcharts-bar-series apexcharts-plot-series">
                                                        <g id="SvgjsG3347" class="apexcharts-series" rel="1"
                                                            seriesName="Sales" data:realIndex="0">
                                                            <path id="SvgjsPath3352"
                                                                d="M -18.61138888888889 65.001 L -18.61138888888889 50.376 C -18.61138888888889 47.376 -15.61138888888889 44.376 -12.61138888888889 44.376 L 3.6113888888888894 44.376 C 6.611388888888889 44.376 9.61138888888889 47.376 9.61138888888889 50.376 L 9.61138888888889 65.001 C 9.61138888888889 68.001 6.611388888888889 71.001 3.6113888888888894 71.001 L -12.61138888888889 71.001 C -15.61138888888889 71.001 -18.61138888888889 68.001 -18.61138888888889 65.001 Z "
                                                                fill="rgba(27,132,255,0.85)" fill-opacity="1"
                                                                stroke="transparent" stroke-opacity="1"
                                                                stroke-linecap="round" stroke-width="9"
                                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                                index="0" clip-path="url(#gridRectMaskyyd5jngk)"
                                                                pathTo="M -18.61138888888889 65.001 L -18.61138888888889 50.376 C -18.61138888888889 47.376 -15.61138888888889 44.376 -12.61138888888889 44.376 L 3.6113888888888894 44.376 C 6.611388888888889 44.376 9.61138888888889 47.376 9.61138888888889 50.376 L 9.61138888888889 65.001 C 9.61138888888889 68.001 6.611388888888889 71.001 3.6113888888888894 71.001 L -12.61138888888889 71.001 C -15.61138888888889 71.001 -18.61138888888889 68.001 -18.61138888888889 65.001 Z "
                                                                pathFrom="M -18.61138888888889 71.001 L -18.61138888888889 71.001 L 9.61138888888889 71.001 L 9.61138888888889 71.001 L 9.61138888888889 71.001 L 9.61138888888889 71.001 L 9.61138888888889 71.001 L -18.61138888888889 71.001 Z"
                                                                cy="44.375" cx="14.11138888888889" j="0"
                                                                val="30" barHeight="26.625"
                                                                barWidth="37.22277777777778"></path>
                                                            <path id="SvgjsPath3354"
                                                                d="M 49.06638888888889 65.001 L 49.06638888888889 23.751 C 49.06638888888889 20.751 52.06638888888889 17.751 55.06638888888889 17.751 L 71.28916666666666 17.751 C 74.28916666666666 17.751 77.28916666666666 20.751 77.28916666666666 23.751 L 77.28916666666666 65.001 C 77.28916666666666 68.001 74.28916666666666 71.001 71.28916666666666 71.001 L 55.06638888888889 71.001 C 52.06638888888889 71.001 49.06638888888889 68.001 49.06638888888889 65.001 Z "
                                                                fill="rgba(27,132,255,0.85)" fill-opacity="1"
                                                                stroke="transparent" stroke-opacity="1"
                                                                stroke-linecap="round" stroke-width="9"
                                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                                index="0" clip-path="url(#gridRectMaskyyd5jngk)"
                                                                pathTo="M 49.06638888888889 65.001 L 49.06638888888889 23.751 C 49.06638888888889 20.751 52.06638888888889 17.751 55.06638888888889 17.751 L 71.28916666666666 17.751 C 74.28916666666666 17.751 77.28916666666666 20.751 77.28916666666666 23.751 L 77.28916666666666 65.001 C 77.28916666666666 68.001 74.28916666666666 71.001 71.28916666666666 71.001 L 55.06638888888889 71.001 C 52.06638888888889 71.001 49.06638888888889 68.001 49.06638888888889 65.001 Z "
                                                                pathFrom="M 49.06638888888889 71.001 L 49.06638888888889 71.001 L 77.28916666666666 71.001 L 77.28916666666666 71.001 L 77.28916666666666 71.001 L 77.28916666666666 71.001 L 77.28916666666666 71.001 L 49.06638888888889 71.001 Z"
                                                                cy="17.75" cx="81.78916666666666" j="1"
                                                                val="60" barHeight="53.25"
                                                                barWidth="37.22277777777778"></path>
                                                            <path id="SvgjsPath3356"
                                                                d="M 116.74416666666667 65.001 L 116.74416666666667 29.963500000000007 C 116.74416666666667 26.963500000000007 119.74416666666667 23.963500000000007 122.74416666666667 23.963500000000007 L 138.96694444444444 23.963500000000007 C 141.96694444444444 23.963500000000007 144.96694444444444 26.963500000000007 144.96694444444444 29.963500000000007 L 144.96694444444444 65.001 C 144.96694444444444 68.001 141.96694444444444 71.001 138.96694444444444 71.001 L 122.74416666666667 71.001 C 119.74416666666667 71.001 116.74416666666667 68.001 116.74416666666667 65.001 Z "
                                                                fill="rgba(27,132,255,0.85)" fill-opacity="1"
                                                                stroke="transparent" stroke-opacity="1"
                                                                stroke-linecap="round" stroke-width="9"
                                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                                index="0" clip-path="url(#gridRectMaskyyd5jngk)"
                                                                pathTo="M 116.74416666666667 65.001 L 116.74416666666667 29.963500000000007 C 116.74416666666667 26.963500000000007 119.74416666666667 23.963500000000007 122.74416666666667 23.963500000000007 L 138.96694444444444 23.963500000000007 C 141.96694444444444 23.963500000000007 144.96694444444444 26.963500000000007 144.96694444444444 29.963500000000007 L 144.96694444444444 65.001 C 144.96694444444444 68.001 141.96694444444444 71.001 138.96694444444444 71.001 L 122.74416666666667 71.001 C 119.74416666666667 71.001 116.74416666666667 68.001 116.74416666666667 65.001 Z "
                                                                pathFrom="M 116.74416666666667 71.001 L 116.74416666666667 71.001 L 144.96694444444444 71.001 L 144.96694444444444 71.001 L 144.96694444444444 71.001 L 144.96694444444444 71.001 L 144.96694444444444 71.001 L 116.74416666666667 71.001 Z"
                                                                cy="23.962500000000006" cx="149.46694444444444" j="2"
                                                                val="53" barHeight="47.037499999999994"
                                                                barWidth="37.22277777777778"></path>
                                                            <path id="SvgjsPath3358"
                                                                d="M 184.42194444444445 65.001 L 184.42194444444445 37.063500000000005 C 184.42194444444445 34.063500000000005 187.42194444444445 31.0635 190.42194444444445 31.0635 L 206.64472222222224 31.0635 C 209.64472222222224 31.0635 212.64472222222224 34.063500000000005 212.64472222222224 37.063500000000005 L 212.64472222222224 65.001 C 212.64472222222224 68.001 209.64472222222224 71.001 206.64472222222224 71.001 L 190.42194444444445 71.001 C 187.42194444444445 71.001 184.42194444444445 68.001 184.42194444444445 65.001 Z "
                                                                fill="rgba(27,132,255,0.85)" fill-opacity="1"
                                                                stroke="transparent" stroke-opacity="1"
                                                                stroke-linecap="round" stroke-width="9"
                                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                                index="0" clip-path="url(#gridRectMaskyyd5jngk)"
                                                                pathTo="M 184.42194444444445 65.001 L 184.42194444444445 37.063500000000005 C 184.42194444444445 34.063500000000005 187.42194444444445 31.0635 190.42194444444445 31.0635 L 206.64472222222224 31.0635 C 209.64472222222224 31.0635 212.64472222222224 34.063500000000005 212.64472222222224 37.063500000000005 L 212.64472222222224 65.001 C 212.64472222222224 68.001 209.64472222222224 71.001 206.64472222222224 71.001 L 190.42194444444445 71.001 C 187.42194444444445 71.001 184.42194444444445 68.001 184.42194444444445 65.001 Z "
                                                                pathFrom="M 184.42194444444445 71.001 L 184.42194444444445 71.001 L 212.64472222222224 71.001 L 212.64472222222224 71.001 L 212.64472222222224 71.001 L 212.64472222222224 71.001 L 212.64472222222224 71.001 L 184.42194444444445 71.001 Z"
                                                                cy="31.0625" cx="217.14472222222224" j="3"
                                                                val="45" barHeight="39.9375"
                                                                barWidth="37.22277777777778"></path>
                                                            <path id="SvgjsPath3360"
                                                                d="M 252.09972222222223 65.001 L 252.09972222222223 23.751 C 252.09972222222223 20.751 255.09972222222223 17.751 258.0997222222222 17.751 L 274.3225 17.751 C 277.3225 17.751 280.3225 20.751 280.3225 23.751 L 280.3225 65.001 C 280.3225 68.001 277.3225 71.001 274.3225 71.001 L 258.0997222222222 71.001 C 255.09972222222223 71.001 252.09972222222223 68.001 252.09972222222223 65.001 Z "
                                                                fill="rgba(27,132,255,0.85)" fill-opacity="1"
                                                                stroke="transparent" stroke-opacity="1"
                                                                stroke-linecap="round" stroke-width="9"
                                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                                index="0" clip-path="url(#gridRectMaskyyd5jngk)"
                                                                pathTo="M 252.09972222222223 65.001 L 252.09972222222223 23.751 C 252.09972222222223 20.751 255.09972222222223 17.751 258.0997222222222 17.751 L 274.3225 17.751 C 277.3225 17.751 280.3225 20.751 280.3225 23.751 L 280.3225 65.001 C 280.3225 68.001 277.3225 71.001 274.3225 71.001 L 258.0997222222222 71.001 C 255.09972222222223 71.001 252.09972222222223 68.001 252.09972222222223 65.001 Z "
                                                                pathFrom="M 252.09972222222223 71.001 L 252.09972222222223 71.001 L 280.3225 71.001 L 280.3225 71.001 L 280.3225 71.001 L 280.3225 71.001 L 280.3225 71.001 L 252.09972222222223 71.001 Z"
                                                                cy="17.75" cx="284.8225" j="4" val="60"
                                                                barHeight="53.25" barWidth="37.22277777777778"></path>
                                                            <path id="SvgjsPath3362"
                                                                d="M 319.77750000000003 65.001 L 319.77750000000003 10.438500000000001 C 319.77750000000003 7.438500000000001 322.77750000000003 4.4385 325.77750000000003 4.4385 L 342.0002777777778 4.4385 C 345.0002777777778 4.4385 348.0002777777778 7.438500000000001 348.0002777777778 10.438500000000001 L 348.0002777777778 65.001 C 348.0002777777778 68.001 345.0002777777778 71.001 342.0002777777778 71.001 L 325.77750000000003 71.001 C 322.77750000000003 71.001 319.77750000000003 68.001 319.77750000000003 65.001 Z "
                                                                fill="rgba(27,132,255,0.85)" fill-opacity="1"
                                                                stroke="transparent" stroke-opacity="1"
                                                                stroke-linecap="round" stroke-width="9"
                                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                                index="0" clip-path="url(#gridRectMaskyyd5jngk)"
                                                                pathTo="M 319.77750000000003 65.001 L 319.77750000000003 10.438500000000001 C 319.77750000000003 7.438500000000001 322.77750000000003 4.4385 325.77750000000003 4.4385 L 342.0002777777778 4.4385 C 345.0002777777778 4.4385 348.0002777777778 7.438500000000001 348.0002777777778 10.438500000000001 L 348.0002777777778 65.001 C 348.0002777777778 68.001 345.0002777777778 71.001 342.0002777777778 71.001 L 325.77750000000003 71.001 C 322.77750000000003 71.001 319.77750000000003 68.001 319.77750000000003 65.001 Z "
                                                                pathFrom="M 319.77750000000003 71.001 L 319.77750000000003 71.001 L 348.0002777777778 71.001 L 348.0002777777778 71.001 L 348.0002777777778 71.001 L 348.0002777777778 71.001 L 348.0002777777778 71.001 L 319.77750000000003 71.001 Z"
                                                                cy="4.4375" cx="352.5002777777778" j="5"
                                                                val="75" barHeight="66.5625"
                                                                barWidth="37.22277777777778"></path>
                                                            <path id="SvgjsPath3364"
                                                                d="M 387.4552777777778 65.001 L 387.4552777777778 29.963500000000007 C 387.4552777777778 26.963500000000007 390.4552777777778 23.963500000000007 393.4552777777778 23.963500000000007 L 409.67805555555555 23.963500000000007 C 412.67805555555555 23.963500000000007 415.67805555555555 26.963500000000007 415.67805555555555 29.963500000000007 L 415.67805555555555 65.001 C 415.67805555555555 68.001 412.67805555555555 71.001 409.67805555555555 71.001 L 393.4552777777778 71.001 C 390.4552777777778 71.001 387.4552777777778 68.001 387.4552777777778 65.001 Z "
                                                                fill="rgba(27,132,255,0.85)" fill-opacity="1"
                                                                stroke="transparent" stroke-opacity="1"
                                                                stroke-linecap="round" stroke-width="9"
                                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                                index="0" clip-path="url(#gridRectMaskyyd5jngk)"
                                                                pathTo="M 387.4552777777778 65.001 L 387.4552777777778 29.963500000000007 C 387.4552777777778 26.963500000000007 390.4552777777778 23.963500000000007 393.4552777777778 23.963500000000007 L 409.67805555555555 23.963500000000007 C 412.67805555555555 23.963500000000007 415.67805555555555 26.963500000000007 415.67805555555555 29.963500000000007 L 415.67805555555555 65.001 C 415.67805555555555 68.001 412.67805555555555 71.001 409.67805555555555 71.001 L 393.4552777777778 71.001 C 390.4552777777778 71.001 387.4552777777778 68.001 387.4552777777778 65.001 Z "
                                                                pathFrom="M 387.4552777777778 71.001 L 387.4552777777778 71.001 L 415.67805555555555 71.001 L 415.67805555555555 71.001 L 415.67805555555555 71.001 L 415.67805555555555 71.001 L 415.67805555555555 71.001 L 387.4552777777778 71.001 Z"
                                                                cy="23.962500000000006" cx="420.17805555555555" j="6"
                                                                val="53" barHeight="47.037499999999994"
                                                                barWidth="37.22277777777778"></path>
                                                            <g id="SvgjsG3349" class="apexcharts-bar-goals-markers">
                                                                <g id="SvgjsG3351" className="apexcharts-bar-goals-groups"
                                                                    class="apexcharts-hidden-element-shown"
                                                                    clip-path="url(#gridRectMarkerMaskyyd5jngk)">
                                                                </g>
                                                                <g id="SvgjsG3353" className="apexcharts-bar-goals-groups"
                                                                    class="apexcharts-hidden-element-shown"
                                                                    clip-path="url(#gridRectMarkerMaskyyd5jngk)">
                                                                </g>
                                                                <g id="SvgjsG3355" className="apexcharts-bar-goals-groups"
                                                                    class="apexcharts-hidden-element-shown"
                                                                    clip-path="url(#gridRectMarkerMaskyyd5jngk)">
                                                                </g>
                                                                <g id="SvgjsG3357" className="apexcharts-bar-goals-groups"
                                                                    class="apexcharts-hidden-element-shown"
                                                                    clip-path="url(#gridRectMarkerMaskyyd5jngk)">
                                                                </g>
                                                                <g id="SvgjsG3359" className="apexcharts-bar-goals-groups"
                                                                    class="apexcharts-hidden-element-shown"
                                                                    clip-path="url(#gridRectMarkerMaskyyd5jngk)">
                                                                </g>
                                                                <g id="SvgjsG3361" className="apexcharts-bar-goals-groups"
                                                                    class="apexcharts-hidden-element-shown"
                                                                    clip-path="url(#gridRectMarkerMaskyyd5jngk)">
                                                                </g>
                                                                <g id="SvgjsG3363" className="apexcharts-bar-goals-groups"
                                                                    class="apexcharts-hidden-element-shown"
                                                                    clip-path="url(#gridRectMarkerMaskyyd5jngk)">
                                                                </g>
                                                            </g>
                                                            <g id="SvgjsG3350"
                                                                class="apexcharts-bar-shadows apexcharts-hidden-element-shown">
                                                            </g>
                                                        </g>
                                                        <g id="SvgjsG3348"
                                                            class="apexcharts-datalabels apexcharts-hidden-element-shown"
                                                            data:realIndex="0"></g>
                                                    </g>
                                                    <line id="SvgjsLine3376" x1="-33.96666666666667" y1="0"
                                                        x2="440.0333333333333" y2="0" stroke="#b6b6b6"
                                                        stroke-dasharray="0" stroke-width="1" stroke-linecap="butt"
                                                        class="apexcharts-ycrosshairs"></line>
                                                    <line id="SvgjsLine3377" x1="-33.96666666666667" y1="0"
                                                        x2="440.0333333333333" y2="0" stroke-dasharray="0"
                                                        stroke-width="0" stroke-linecap="butt"
                                                        class="apexcharts-ycrosshairs-hidden"></line>
                                                    <g id="SvgjsG3378" class="apexcharts-xaxis"
                                                        transform="translate(0, 0)">
                                                        <g id="SvgjsG3379" class="apexcharts-xaxis-texts-g"
                                                            transform="translate(0, -4)"></g>
                                                    </g>
                                                    <g id="SvgjsG3387" class="apexcharts-yaxis-annotations"></g>
                                                    <g id="SvgjsG3388" class="apexcharts-xaxis-annotations"></g>
                                                    <g id="SvgjsG3389" class="apexcharts-point-annotations"></g>
                                                </g>
                                            </svg>
                                            <div class="apexcharts-tooltip apexcharts-theme-light"
                                                style="left: 276.996px; top: -26px;">
                                                <div class="apexcharts-tooltip-title"
                                                    style="font-family: inherit; font-size: 12px;">Feb: 6
                                                </div>
                                                <div class="apexcharts-tooltip-series-group apexcharts-active"
                                                    style="order: 1; display: flex;"><span
                                                        class="apexcharts-tooltip-marker"
                                                        style="background-color: rgba(27, 132, 255, 0.85);"></span>
                                                    <div class="apexcharts-tooltip-text"
                                                        style="font-family: inherit; font-size: 12px;">
                                                        <div class="apexcharts-tooltip-y-group"><span
                                                                class="apexcharts-tooltip-text-y-label">Sales:
                                                            </span><span class="apexcharts-tooltip-text-y-value">75%</span>
                                                        </div>
                                                        <div class="apexcharts-tooltip-goals-group"><span
                                                                class="apexcharts-tooltip-text-goals-label"></span><span
                                                                class="apexcharts-tooltip-text-goals-value"></span>
                                                        </div>
                                                        <div class="apexcharts-tooltip-z-group"><span
                                                                class="apexcharts-tooltip-text-z-label"></span><span
                                                                class="apexcharts-tooltip-text-z-value"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div
                                                class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
                                                <div class="apexcharts-yaxistooltip-text"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Chart-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Card widget 6-->


                            <!--begin::Card widget 7-->
                            <div class="card card-flush h-md-50 mb-xl-10">
                                <!--begin::Header-->
                                <div class="card-header pt-5">
                                    <!--begin::Title-->
                                    <div class="card-title d-flex flex-column">
                                        <!--begin::Amount-->
                                        <span class="fs-2hx fw-bold text-gray-900 me-2 lh-1 ls-n2">6.3k</span>
                                        <!--end::Amount-->

                                        <!--begin::Subtitle-->
                                        <span class="text-gray-500 pt-1 fw-semibold fs-6">New Customers
                                            This
                                            Month</span>
                                        <!--end::Subtitle-->
                                    </div>
                                    <!--end::Title-->
                                </div>
                                <!--end::Header-->

                                <!--begin::Card body-->
                                <div class="card-body d-flex flex-column justify-content-end pe-0">
                                    <!--begin::Title-->
                                    <span class="fs-6 fw-bolder text-gray-800 d-block mb-2">Today’s
                                        Heroes</span>
                                    <!--end::Title-->

                                    <!--begin::Users group-->
                                    <div class="symbol-group symbol-hover flex-nowrap">
                                        <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip"
                                            data-bs-original-title="Alan Warden" data-kt-initialized="1">
                                            <span class="symbol-label bg-warning text-inverse-warning fw-bold">A</span>
                                        </div>
                                        <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip"
                                            aria-label="Michael Eberon" data-bs-original-title="Michael Eberon"
                                            data-kt-initialized="1">
                                            <img alt="Pic" src="../assets/media/avatars/300-11.jpg">
                                        </div>
                                        <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip"
                                            data-bs-original-title="Susan Redwood" data-kt-initialized="1">
                                            <span class="symbol-label bg-primary text-inverse-primary fw-bold">S</span>
                                        </div>
                                        <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip"
                                            aria-label="Melody Macy" data-bs-original-title="Melody Macy"
                                            data-kt-initialized="1">
                                            <img alt="Pic" src="../assets/media/avatars/300-2.jpg">
                                        </div>
                                        <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip"
                                            data-bs-original-title="Perry Matthew" data-kt-initialized="1">
                                            <span class="symbol-label bg-danger text-inverse-danger fw-bold">P</span>
                                        </div>
                                        <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip"
                                            aria-label="Barry Walter" data-bs-original-title="Barry Walter"
                                            data-kt-initialized="1">
                                            <img alt="Pic" src="../assets/media/avatars/300-12.jpg">
                                        </div>
                                        <a href="#" class="symbol symbol-35px symbol-circle" data-bs-toggle="modal"
                                            data-bs-target="#kt_modal_view_users">
                                            <span class="symbol-label bg-light text-gray-400 fs-8 fw-bold">+42</span>
                                        </a>
                                    </div>
                                    <!--end::Users group-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Card widget 7-->
                        </div>
                        <!--end::Col-->

                        <!--begin::Col-->
                        <div class="col-lg-12 col-xl-12 col-xxl-6 mb-5 mb-xl-0">
                            <!--begin::Chart widget 3-->
                            <div class="card card-flush overflow-hidden h-md-100">
                                <!--begin::Header-->
                                <div class="card-header py-5">
                                    <!--begin::Title-->
                                    <h3 class="card-title align-items-start flex-column">
                                        <span class="card-label fw-bold text-gray-900">Sales This
                                            Months</span>
                                        <span class="text-gray-500 mt-1 fw-semibold fs-6">Users from all
                                            channels</span>
                                    </h3>
                                    <!--end::Title-->

                                    <!--begin::Toolbar-->
                                    <div class="card-toolbar">
                                        <!--begin::Menu-->
                                        <button
                                            class="btn btn-icon btn-color-gray-500 btn-active-color-primary justify-content-end"
                                            data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end"
                                            data-kt-menu-overflow="true">

                                            <i class="ki-duotone ki-dots-square fs-1"><span class="path1"></span><span
                                                    class="path2"></span><span class="path3"></span><span
                                                    class="path4"></span></i>
                                        </button>


                                        <!--begin::Menu 2-->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px"
                                            data-kt-menu="true">
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <div class="menu-content fs-6 text-gray-900 fw-bold px-3 py-4">
                                                    Quick Actions</div>
                                            </div>
                                            <!--end::Menu item-->

                                            <!--begin::Menu separator-->
                                            <div class="separator mb-3 opacity-75"></div>
                                            <!--end::Menu separator-->

                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3">
                                                    New Ticket
                                                </a>
                                            </div>
                                            <!--end::Menu item-->

                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3">
                                                    New Customer
                                                </a>
                                            </div>
                                            <!--end::Menu item-->

                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3" data-kt-menu-trigger="hover"
                                                data-kt-menu-placement="right-start">
                                                <!--begin::Menu item-->
                                                <a href="#" class="menu-link px-3">
                                                    <span class="menu-title">New Group</span>
                                                    <span class="menu-arrow"></span>
                                                </a>
                                                <!--end::Menu item-->

                                                <!--begin::Menu sub-->
                                                <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a href="#" class="menu-link px-3">
                                                            Admin Group
                                                        </a>
                                                    </div>
                                                    <!--end::Menu item-->

                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a href="#" class="menu-link px-3">
                                                            Staff Group
                                                        </a>
                                                    </div>
                                                    <!--end::Menu item-->

                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a href="#" class="menu-link px-3">
                                                            Member Group
                                                        </a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                </div>
                                                <!--end::Menu sub-->
                                            </div>
                                            <!--end::Menu item-->

                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3">
                                                    New Contact
                                                </a>
                                            </div>
                                            <!--end::Menu item-->

                                            <!--begin::Menu separator-->
                                            <div class="separator mt-3 opacity-75"></div>
                                            <!--end::Menu separator-->

                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <div class="menu-content px-3 py-3">
                                                    <a class="btn btn-primary  btn-sm px-4" href="#">
                                                        Generate Reports
                                                    </a>
                                                </div>
                                            </div>
                                            <!--end::Menu item-->
                                        </div>
                                        <!--end::Menu 2-->

                                        <!--end::Menu-->
                                    </div>
                                    <!--end::Toolbar-->
                                </div>
                                <!--end::Header-->

                                <!--begin::Card body-->
                                <div class="card-body d-flex justify-content-between flex-column pb-1 px-0">
                                    <!--begin::Statistics-->
                                    <div class="px-9 mb-5">
                                        <!--begin::Statistics-->
                                        <div class="d-flex mb-2">
                                            <span class="fs-4 fw-semibold text-gray-500 me-1">$</span>
                                            <span class="fs-2hx fw-bold text-gray-800 me-2 lh-1 ls-n2">14,094</span>
                                        </div>
                                        <!--end::Statistics-->

                                        <!--begin::Description-->
                                        <span class="fs-6 fw-semibold text-gray-500">Another $48,346 to
                                            Goal</span>
                                        <!--end::Description-->
                                    </div>
                                    <!--end::Statistics-->

                                    <!--begin::Chart-->
                                    <div id="kt_charts_widget_3" class="min-h-auto ps-4 pe-6"
                                        style="height: 300px; min-height: 315px;">
                                        <div id="apexchartsnr3t0tqs"
                                            class="apexcharts-canvas apexchartsnr3t0tqs apexcharts-theme-light"
                                            style="width: 989.5px; height: 300px;"><svg id="SvgjsSvg3101" width="989.5"
                                                height="300" xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev"
                                                class="apexcharts-svg apexcharts-zoomable" xmlns:data="ApexChartsNS"
                                                transform="translate(0, 0)" style="background: transparent;">
                                                <foreignObject x="0" y="0" width="989.5" height="300">
                                                    <div class="apexcharts-legend" xmlns="http://www.w3.org/1999/xhtml"
                                                        style="max-height: 150px;"></div>
                                                </foreignObject>
                                                <rect id="SvgjsRect3130" width="0" height="0" x="0" y="0"
                                                    rx="0" ry="0" opacity="1" stroke-width="0"
                                                    stroke="none" stroke-dasharray="0" fill="#fefefe"></rect>
                                                <g id="SvgjsG3193" class="apexcharts-yaxis" rel="0"
                                                    transform="translate(37.53971862792969, 0)">
                                                    <g id="SvgjsG3194" class="apexcharts-yaxis-texts-g">
                                                        <text id="SvgjsText3196" font-family="inherit" x="20" y="31.4"
                                                            text-anchor="end" dominant-baseline="auto" font-size="12px"
                                                            font-weight="400" fill="#99a1b7"
                                                            class="apexcharts-text apexcharts-yaxis-label "
                                                            style="font-family: inherit;">
                                                            <tspan id="SvgjsTspan3197">$24K</tspan>
                                                            <title>$24K</title>
                                                        </text><text id="SvgjsText3199" font-family="inherit" x="20"
                                                            y="86.855" text-anchor="end" dominant-baseline="auto"
                                                            font-size="12px" font-weight="400" fill="#99a1b7"
                                                            class="apexcharts-text apexcharts-yaxis-label "
                                                            style="font-family: inherit;">
                                                            <tspan id="SvgjsTspan3200">$20.5K</tspan>
                                                            <title>$20.5K</title>
                                                        </text><text id="SvgjsText3202" font-family="inherit" x="20"
                                                            y="142.31" text-anchor="end" dominant-baseline="auto"
                                                            font-size="12px" font-weight="400" fill="#99a1b7"
                                                            class="apexcharts-text apexcharts-yaxis-label "
                                                            style="font-family: inherit;">
                                                            <tspan id="SvgjsTspan3203">$17K</tspan>
                                                            <title>$17K</title>
                                                        </text><text id="SvgjsText3205" font-family="inherit" x="20"
                                                            y="197.76500000000001" text-anchor="end"
                                                            dominant-baseline="auto" font-size="12px" font-weight="400"
                                                            fill="#99a1b7" class="apexcharts-text apexcharts-yaxis-label "
                                                            style="font-family: inherit;">
                                                            <tspan id="SvgjsTspan3206">$13.5K</tspan>
                                                            <title>$13.5K</title>
                                                        </text><text id="SvgjsText3208" font-family="inherit" x="20"
                                                            y="253.22" text-anchor="end" dominant-baseline="auto"
                                                            font-size="12px" font-weight="400" fill="#99a1b7"
                                                            class="apexcharts-text apexcharts-yaxis-label "
                                                            style="font-family: inherit;">
                                                            <tspan id="SvgjsTspan3209">$10K</tspan>
                                                            <title>$10K</title>
                                                        </text>
                                                    </g>
                                                </g>
                                                <g id="SvgjsG3103" class="apexcharts-inner apexcharts-graphical"
                                                    transform="translate(67.53971862792969, 30)">
                                                    <defs id="SvgjsDefs3102">
                                                        <clipPath id="gridRectMasknr3t0tqs">
                                                            <rect id="SvgjsRect3107" width="918.9602813720703"
                                                                height="237.82" x="-5" y="-8" rx="0"
                                                                ry="0" opacity="1" stroke-width="0"
                                                                stroke="none" stroke-dasharray="0" fill="#fff">
                                                            </rect>
                                                        </clipPath>
                                                        <clipPath id="forecastMasknr3t0tqs"></clipPath>
                                                        <clipPath id="nonForecastMasknr3t0tqs"></clipPath>
                                                        <clipPath id="gridRectMarkerMasknr3t0tqs">
                                                            <rect id="SvgjsRect3108" width="915.9602813720703"
                                                                height="225.82" x="-2" y="-2" rx="0"
                                                                ry="0" opacity="1" stroke-width="0"
                                                                stroke="none" stroke-dasharray="0" fill="#fff">
                                                            </rect>
                                                        </clipPath>
                                                        <linearGradient id="SvgjsLinearGradient3113" x1="0"
                                                            y1="0" x2="0" y2="1">
                                                            <stop id="SvgjsStop3114" stop-opacity="0.4"
                                                                stop-color="rgba(23,198,83,0.4)" offset="0"></stop>
                                                            <stop id="SvgjsStop3115" stop-opacity="0"
                                                                stop-color="rgba(255,255,255,0)" offset="0.8"></stop>
                                                            <stop id="SvgjsStop3116" stop-opacity="0"
                                                                stop-color="rgba(255,255,255,0)" offset="1"></stop>
                                                        </linearGradient>
                                                    </defs>
                                                    <g id="SvgjsG3119" class="apexcharts-grid">
                                                        <g id="SvgjsG3120" class="apexcharts-gridlines-horizontal">
                                                            <line id="SvgjsLine3124" x1="0" y1="55.455"
                                                                x2="911.9602813720703" y2="55.455" stroke="#dbdfe9"
                                                                stroke-dasharray="4" stroke-linecap="butt"
                                                                class="apexcharts-gridline"></line>
                                                            <line id="SvgjsLine3125" x1="0" y1="110.91"
                                                                x2="911.9602813720703" y2="110.91" stroke="#dbdfe9"
                                                                stroke-dasharray="4" stroke-linecap="butt"
                                                                class="apexcharts-gridline"></line>
                                                            <line id="SvgjsLine3126" x1="0" y1="166.365"
                                                                x2="911.9602813720703" y2="166.365" stroke="#dbdfe9"
                                                                stroke-dasharray="4" stroke-linecap="butt"
                                                                class="apexcharts-gridline"></line>
                                                        </g>
                                                        <g id="SvgjsG3121" class="apexcharts-gridlines-vertical"></g>
                                                        <line id="SvgjsLine3129" x1="0" y1="221.82"
                                                            x2="911.9602813720703" y2="221.82" stroke="transparent"
                                                            stroke-dasharray="0" stroke-linecap="butt">
                                                        </line>
                                                        <line id="SvgjsLine3128" x1="0" y1="1"
                                                            x2="0" y2="221.82" stroke="transparent"
                                                            stroke-dasharray="0" stroke-linecap="butt"></line>
                                                    </g>
                                                    <g id="SvgjsG3122" class="apexcharts-grid-borders">
                                                        <line id="SvgjsLine3123" x1="0" y1="0"
                                                            x2="911.9602813720703" y2="0" stroke="#dbdfe9"
                                                            stroke-dasharray="4" stroke-linecap="butt"
                                                            class="apexcharts-gridline"></line>
                                                        <line id="SvgjsLine3127" x1="0" y1="221.82"
                                                            x2="911.9602813720703" y2="221.82" stroke="#dbdfe9"
                                                            stroke-dasharray="4" stroke-linecap="butt"
                                                            class="apexcharts-gridline"></line>
                                                    </g>
                                                    <g id="SvgjsG3109"
                                                        class="apexcharts-area-series apexcharts-plot-series">
                                                        <g id="SvgjsG3110" class="apexcharts-series" zIndex="0"
                                                            seriesName="Sales" data:longestSeries="true" rel="1"
                                                            data:realIndex="0">
                                                            <path id="SvgjsPath3117"
                                                                d="M 0 221.82 L 0 95.06571428571425C8.444076679371022, 95.06571428571425, 33.77630671748409, 95.06571428571425, 50.664460076226135, 95.06571428571425S84.44076679371022, 63.377142857142815, 101.32892015245227, 63.377142857142815S135.10522686993636, 63.377142857142815, 151.9933802286784, 63.377142857142815S185.7696869461625, 95.06571428571425, 202.65784030490454, 95.06571428571425S236.4341470223886, 95.06571428571425, 253.32230038113065, 95.06571428571425S287.09860709861476, 31.68857142857138, 303.9867604573568, 31.68857142857138S337.7630671748409, 31.68857142857138, 354.65122053358294, 31.68857142857138S388.42752725106703, 63.377142857142815, 405.3156806098091, 63.377142857142815S439.09198732729317, 63.377142857142815, 455.9801406860352, 63.377142857142815S489.75644740351925, 95.06571428571425, 506.6446007622613, 95.06571428571425S540.4209074797453, 95.06571428571425, 557.3090608384874, 95.06571428571425S591.0853675559715, 63.377142857142815, 607.9735209147136, 63.377142857142815S641.7498276321976, 63.377142857142815, 658.6379809909397, 63.377142857142815S692.4142877084239, 95.06571428571425, 709.3024410671659, 95.06571428571425S743.07874778465, 95.06571428571425, 759.966901143392, 95.06571428571425S793.743207860876, 63.377142857142815, 810.6313612196182, 63.377142857142815S844.4076679371021, 63.377142857142815, 861.2958212958442, 63.377142857142815S905.8906446141522, 35.484883827033656, 911.9602813720704, 31.68857142857138 L 911.9602813720704 221.82 L 0 221.82M 0 95.06571428571425z"
                                                                fill="url(#SvgjsLinearGradient3113)" fill-opacity="1"
                                                                stroke-opacity="1" stroke-linecap="butt" stroke-width="0"
                                                                stroke-dasharray="0" class="apexcharts-area"
                                                                index="0" clip-path="url(#gridRectMasknr3t0tqs)"
                                                                pathTo="M 0 221.82 L 0 95.06571428571425C8.444076679371022, 95.06571428571425, 33.77630671748409, 95.06571428571425, 50.664460076226135, 95.06571428571425S84.44076679371022, 63.377142857142815, 101.32892015245227, 63.377142857142815S135.10522686993636, 63.377142857142815, 151.9933802286784, 63.377142857142815S185.7696869461625, 95.06571428571425, 202.65784030490454, 95.06571428571425S236.4341470223886, 95.06571428571425, 253.32230038113065, 95.06571428571425S287.09860709861476, 31.68857142857138, 303.9867604573568, 31.68857142857138S337.7630671748409, 31.68857142857138, 354.65122053358294, 31.68857142857138S388.42752725106703, 63.377142857142815, 405.3156806098091, 63.377142857142815S439.09198732729317, 63.377142857142815, 455.9801406860352, 63.377142857142815S489.75644740351925, 95.06571428571425, 506.6446007622613, 95.06571428571425S540.4209074797453, 95.06571428571425, 557.3090608384874, 95.06571428571425S591.0853675559715, 63.377142857142815, 607.9735209147136, 63.377142857142815S641.7498276321976, 63.377142857142815, 658.6379809909397, 63.377142857142815S692.4142877084239, 95.06571428571425, 709.3024410671659, 95.06571428571425S743.07874778465, 95.06571428571425, 759.966901143392, 95.06571428571425S793.743207860876, 63.377142857142815, 810.6313612196182, 63.377142857142815S844.4076679371021, 63.377142857142815, 861.2958212958442, 63.377142857142815S905.8906446141522, 35.484883827033656, 911.9602813720704, 31.68857142857138 L 911.9602813720704 221.82 L 0 221.82M 0 95.06571428571425z"
                                                                pathFrom="M -1 380.2628571428571 L -1 380.2628571428571 L 50.664460076226135 380.2628571428571 L 101.32892015245227 380.2628571428571 L 151.9933802286784 380.2628571428571 L 202.65784030490454 380.2628571428571 L 253.32230038113065 380.2628571428571 L 303.9867604573568 380.2628571428571 L 354.65122053358294 380.2628571428571 L 405.3156806098091 380.2628571428571 L 455.9801406860352 380.2628571428571 L 506.6446007622613 380.2628571428571 L 557.3090608384874 380.2628571428571 L 607.9735209147136 380.2628571428571 L 658.6379809909397 380.2628571428571 L 709.3024410671659 380.2628571428571 L 759.966901143392 380.2628571428571 L 810.6313612196182 380.2628571428571 L 861.2958212958442 380.2628571428571 L 911.9602813720704 380.2628571428571">
                                                            </path>
                                                            <path id="SvgjsPath3118"
                                                                d="M 0 95.06571428571425C8.444076679371022, 95.06571428571425, 33.77630671748409, 95.06571428571425, 50.664460076226135, 95.06571428571425S84.44076679371022, 63.377142857142815, 101.32892015245227, 63.377142857142815S135.10522686993636, 63.377142857142815, 151.9933802286784, 63.377142857142815S185.7696869461625, 95.06571428571425, 202.65784030490454, 95.06571428571425S236.4341470223886, 95.06571428571425, 253.32230038113065, 95.06571428571425S287.09860709861476, 31.68857142857138, 303.9867604573568, 31.68857142857138S337.7630671748409, 31.68857142857138, 354.65122053358294, 31.68857142857138S388.42752725106703, 63.377142857142815, 405.3156806098091, 63.377142857142815S439.09198732729317, 63.377142857142815, 455.9801406860352, 63.377142857142815S489.75644740351925, 95.06571428571425, 506.6446007622613, 95.06571428571425S540.4209074797453, 95.06571428571425, 557.3090608384874, 95.06571428571425S591.0853675559715, 63.377142857142815, 607.9735209147136, 63.377142857142815S641.7498276321976, 63.377142857142815, 658.6379809909397, 63.377142857142815S692.4142877084239, 95.06571428571425, 709.3024410671659, 95.06571428571425S743.07874778465, 95.06571428571425, 759.966901143392, 95.06571428571425S793.743207860876, 63.377142857142815, 810.6313612196182, 63.377142857142815S844.4076679371021, 63.377142857142815, 861.2958212958442, 63.377142857142815S905.8906446141522, 35.484883827033656, 911.9602813720704, 31.68857142857138"
                                                                fill="none" fill-opacity="1" stroke="#17c653"
                                                                stroke-opacity="1" stroke-linecap="butt" stroke-width="3"
                                                                stroke-dasharray="0" class="apexcharts-area"
                                                                index="0" clip-path="url(#gridRectMasknr3t0tqs)"
                                                                pathTo="M 0 95.06571428571425C8.444076679371022, 95.06571428571425, 33.77630671748409, 95.06571428571425, 50.664460076226135, 95.06571428571425S84.44076679371022, 63.377142857142815, 101.32892015245227, 63.377142857142815S135.10522686993636, 63.377142857142815, 151.9933802286784, 63.377142857142815S185.7696869461625, 95.06571428571425, 202.65784030490454, 95.06571428571425S236.4341470223886, 95.06571428571425, 253.32230038113065, 95.06571428571425S287.09860709861476, 31.68857142857138, 303.9867604573568, 31.68857142857138S337.7630671748409, 31.68857142857138, 354.65122053358294, 31.68857142857138S388.42752725106703, 63.377142857142815, 405.3156806098091, 63.377142857142815S439.09198732729317, 63.377142857142815, 455.9801406860352, 63.377142857142815S489.75644740351925, 95.06571428571425, 506.6446007622613, 95.06571428571425S540.4209074797453, 95.06571428571425, 557.3090608384874, 95.06571428571425S591.0853675559715, 63.377142857142815, 607.9735209147136, 63.377142857142815S641.7498276321976, 63.377142857142815, 658.6379809909397, 63.377142857142815S692.4142877084239, 95.06571428571425, 709.3024410671659, 95.06571428571425S743.07874778465, 95.06571428571425, 759.966901143392, 95.06571428571425S793.743207860876, 63.377142857142815, 810.6313612196182, 63.377142857142815S844.4076679371021, 63.377142857142815, 861.2958212958442, 63.377142857142815S905.8906446141522, 35.484883827033656, 911.9602813720704, 31.68857142857138"
                                                                pathFrom="M -1 380.2628571428571 L -1 380.2628571428571 L 50.664460076226135 380.2628571428571 L 101.32892015245227 380.2628571428571 L 151.9933802286784 380.2628571428571 L 202.65784030490454 380.2628571428571 L 253.32230038113065 380.2628571428571 L 303.9867604573568 380.2628571428571 L 354.65122053358294 380.2628571428571 L 405.3156806098091 380.2628571428571 L 455.9801406860352 380.2628571428571 L 506.6446007622613 380.2628571428571 L 557.3090608384874 380.2628571428571 L 607.9735209147136 380.2628571428571 L 658.6379809909397 380.2628571428571 L 709.3024410671659 380.2628571428571 L 759.966901143392 380.2628571428571 L 810.6313612196182 380.2628571428571 L 861.2958212958442 380.2628571428571 L 911.9602813720704 380.2628571428571"
                                                                fill-rule="evenodd"></path>
                                                            <g id="SvgjsG3111"
                                                                class="apexcharts-series-markers-wrap apexcharts-hidden-element-shown"
                                                                data:realIndex="0">
                                                                <g class="apexcharts-series-markers">
                                                                    <circle id="SvgjsCircle3213" r="0" cx="0"
                                                                        cy="0"
                                                                        class="apexcharts-marker w08vnimu no-pointer-events"
                                                                        stroke="#17c653" fill="#17c653" fill-opacity="1"
                                                                        stroke-width="3" stroke-opacity="0.9"
                                                                        default-marker-size="0"></circle>
                                                                </g>
                                                            </g>
                                                        </g>
                                                        <g id="SvgjsG3112" class="apexcharts-datalabels"
                                                            data:realIndex="0"></g>
                                                    </g>
                                                    <line id="SvgjsLine3131" x1="0" y1="0"
                                                        x2="0" y2="221.82" stroke="#17c653"
                                                        stroke-dasharray="3" stroke-linecap="butt"
                                                        class="apexcharts-xcrosshairs" x="0" y="0" width="1"
                                                        height="221.82" fill="#b1b9c4" filter="none" fill-opacity="0.9"
                                                        stroke-width="1"></line>
                                                    <line id="SvgjsLine3132" x1="0" y1="0"
                                                        x2="911.9602813720703" y2="0" stroke="#b6b6b6"
                                                        stroke-dasharray="0" stroke-width="1" stroke-linecap="butt"
                                                        class="apexcharts-ycrosshairs"></line>
                                                    <line id="SvgjsLine3133" x1="0" y1="0"
                                                        x2="911.9602813720703" y2="0" stroke-dasharray="0"
                                                        stroke-width="0" stroke-linecap="butt"
                                                        class="apexcharts-ycrosshairs-hidden"></line>
                                                    <g id="SvgjsG3134" class="apexcharts-xaxis"
                                                        transform="translate(0, 0)">
                                                        <g id="SvgjsG3135" class="apexcharts-xaxis-texts-g"
                                                            transform="translate(0, -10)"><text id="SvgjsText3137"
                                                                font-family="inherit" x="0" y="244.82" text-anchor="end"
                                                                dominant-baseline="auto" font-size="12px"
                                                                font-weight="400" fill="#99a1b7"
                                                                class="apexcharts-text apexcharts-xaxis-label "
                                                                style="font-family: inherit;" transform="rotate(0 1 -1)">
                                                                <tspan id="SvgjsTspan3138"></tspan>
                                                                <title></title>
                                                            </text><text id="SvgjsText3140" font-family="inherit"
                                                                x="50.66446007622612" y="244.82" text-anchor="end"
                                                                dominant-baseline="auto" font-size="12px"
                                                                font-weight="400" fill="#99a1b7"
                                                                class="apexcharts-text apexcharts-xaxis-label "
                                                                style="font-family: inherit;" transform="rotate(0 1 -1)">
                                                                <tspan id="SvgjsTspan3141"></tspan>
                                                                <title></title>
                                                            </text><text id="SvgjsText3143" font-family="inherit"
                                                                x="101.32892015245224" y="244.82" text-anchor="end"
                                                                dominant-baseline="auto" font-size="12px"
                                                                font-weight="400" fill="#99a1b7"
                                                                class="apexcharts-text apexcharts-xaxis-label "
                                                                style="font-family: inherit;" transform="rotate(0 1 -1)">
                                                                <tspan id="SvgjsTspan3144"></tspan>
                                                                <title></title>
                                                            </text><text id="SvgjsText3146" font-family="inherit"
                                                                x="151.99338022867838" y="244.82" text-anchor="end"
                                                                dominant-baseline="auto" font-size="12px"
                                                                font-weight="400" fill="#99a1b7"
                                                                class="apexcharts-text apexcharts-xaxis-label "
                                                                style="font-family: inherit;"
                                                                transform="rotate(0 153.13470458984375 239.32000732421875)">
                                                                <tspan id="SvgjsTspan3147">Apr 04</tspan>
                                                                <title>Apr 04</title>
                                                            </text><text id="SvgjsText3149" font-family="inherit"
                                                                x="202.6578403049045" y="244.82" text-anchor="end"
                                                                dominant-baseline="auto" font-size="12px"
                                                                font-weight="400" fill="#99a1b7"
                                                                class="apexcharts-text apexcharts-xaxis-label "
                                                                style="font-family: inherit;" transform="rotate(0 1 -1)">
                                                                <tspan id="SvgjsTspan3150"></tspan>
                                                                <title></title>
                                                            </text><text id="SvgjsText3152" font-family="inherit"
                                                                x="253.32230038113065" y="244.82" text-anchor="end"
                                                                dominant-baseline="auto" font-size="12px"
                                                                font-weight="400" fill="#99a1b7"
                                                                class="apexcharts-text apexcharts-xaxis-label "
                                                                style="font-family: inherit;" transform="rotate(0 1 -1)">
                                                                <tspan id="SvgjsTspan3153"></tspan>
                                                                <title></title>
                                                            </text><text id="SvgjsText3155" font-family="inherit"
                                                                x="303.9867604573568" y="244.82" text-anchor="end"
                                                                dominant-baseline="auto" font-size="12px"
                                                                font-weight="400" fill="#99a1b7"
                                                                class="apexcharts-text apexcharts-xaxis-label "
                                                                style="font-family: inherit;"
                                                                transform="rotate(0 305.0556335449219 239.32000732421875)">
                                                                <tspan id="SvgjsTspan3156">Apr 07</tspan>
                                                                <title>Apr 07</title>
                                                            </text><text id="SvgjsText3158" font-family="inherit"
                                                                x="354.65122053358294" y="244.82" text-anchor="end"
                                                                dominant-baseline="auto" font-size="12px"
                                                                font-weight="400" fill="#99a1b7"
                                                                class="apexcharts-text apexcharts-xaxis-label "
                                                                style="font-family: inherit;" transform="rotate(0 1 -1)">
                                                                <tspan id="SvgjsTspan3159"></tspan>
                                                                <title></title>
                                                            </text><text id="SvgjsText3161" font-family="inherit"
                                                                x="405.3156806098091" y="244.82" text-anchor="end"
                                                                dominant-baseline="auto" font-size="12px"
                                                                font-weight="400" fill="#99a1b7"
                                                                class="apexcharts-text apexcharts-xaxis-label "
                                                                style="font-family: inherit;" transform="rotate(0 1 -1)">
                                                                <tspan id="SvgjsTspan3162"></tspan>
                                                                <title></title>
                                                            </text><text id="SvgjsText3164" font-family="inherit"
                                                                x="455.9801406860352" y="244.82" text-anchor="end"
                                                                dominant-baseline="auto" font-size="12px"
                                                                font-weight="400" fill="#99a1b7"
                                                                class="apexcharts-text apexcharts-xaxis-label "
                                                                style="font-family: inherit;"
                                                                transform="rotate(0 457.22869873046875 239.32000732421875)">
                                                                <tspan id="SvgjsTspan3165">Apr 10</tspan>
                                                                <title>Apr 10</title>
                                                            </text><text id="SvgjsText3167" font-family="inherit"
                                                                x="506.64460076226135" y="244.82" text-anchor="end"
                                                                dominant-baseline="auto" font-size="12px"
                                                                font-weight="400" fill="#99a1b7"
                                                                class="apexcharts-text apexcharts-xaxis-label "
                                                                style="font-family: inherit;" transform="rotate(0 1 -1)">
                                                                <tspan id="SvgjsTspan3168"></tspan>
                                                                <title></title>
                                                            </text><text id="SvgjsText3170" font-family="inherit"
                                                                x="557.3090608384874" y="244.82" text-anchor="end"
                                                                dominant-baseline="auto" font-size="12px"
                                                                font-weight="400" fill="#99a1b7"
                                                                class="apexcharts-text apexcharts-xaxis-label "
                                                                style="font-family: inherit;" transform="rotate(0 1 -1)">
                                                                <tspan id="SvgjsTspan3171"></tspan>
                                                                <title></title>
                                                            </text><text id="SvgjsText3173" font-family="inherit"
                                                                x="607.9735209147135" y="244.82" text-anchor="end"
                                                                dominant-baseline="auto" font-size="12px"
                                                                font-weight="400" fill="#99a1b7"
                                                                class="apexcharts-text apexcharts-xaxis-label "
                                                                style="font-family: inherit;"
                                                                transform="rotate(0 609.1517639160156 239.32000732421875)">
                                                                <tspan id="SvgjsTspan3174">Apr 13</tspan>
                                                                <title>Apr 13</title>
                                                            </text><text id="SvgjsText3176" font-family="inherit"
                                                                x="658.6379809909396" y="244.82" text-anchor="end"
                                                                dominant-baseline="auto" font-size="12px"
                                                                font-weight="400" fill="#99a1b7"
                                                                class="apexcharts-text apexcharts-xaxis-label "
                                                                style="font-family: inherit;" transform="rotate(0 1 -1)">
                                                                <tspan id="SvgjsTspan3177"></tspan>
                                                                <title></title>
                                                            </text><text id="SvgjsText3179" font-family="inherit"
                                                                x="709.3024410671657" y="244.82" text-anchor="end"
                                                                dominant-baseline="auto" font-size="12px"
                                                                font-weight="400" fill="#99a1b7"
                                                                class="apexcharts-text apexcharts-xaxis-label "
                                                                style="font-family: inherit;" transform="rotate(0 1 -1)">
                                                                <tspan id="SvgjsTspan3180"></tspan>
                                                                <title></title>
                                                            </text><text id="SvgjsText3182" font-family="inherit"
                                                                x="759.9669011433917" y="244.82" text-anchor="end"
                                                                dominant-baseline="auto" font-size="12px"
                                                                font-weight="400" fill="#99a1b7"
                                                                class="apexcharts-text apexcharts-xaxis-label "
                                                                style="font-family: inherit;"
                                                                transform="rotate(0 760.9669189453125 239.32000732421875)">
                                                                <tspan id="SvgjsTspan3183">Apr 16</tspan>
                                                                <title>Apr 16</title>
                                                            </text><text id="SvgjsText3185" font-family="inherit"
                                                                x="810.6313612196178" y="244.82" text-anchor="end"
                                                                dominant-baseline="auto" font-size="12px"
                                                                font-weight="400" fill="#99a1b7"
                                                                class="apexcharts-text apexcharts-xaxis-label "
                                                                style="font-family: inherit;"
                                                                transform="rotate(0 1 -1)">
                                                                <tspan id="SvgjsTspan3186"></tspan>
                                                                <title></title>
                                                            </text><text id="SvgjsText3188" font-family="inherit"
                                                                x="861.2958212958439" y="244.82" text-anchor="end"
                                                                dominant-baseline="auto" font-size="12px"
                                                                font-weight="400" fill="#99a1b7"
                                                                class="apexcharts-text apexcharts-xaxis-label "
                                                                style="font-family: inherit;"
                                                                transform="rotate(0 1 -1)">
                                                                <tspan id="SvgjsTspan3189"></tspan>
                                                                <title></title>
                                                            </text><text id="SvgjsText3191" font-family="inherit"
                                                                x="911.96028137207" y="244.82" text-anchor="end"
                                                                dominant-baseline="auto" font-size="12px"
                                                                font-weight="400" fill="#99a1b7"
                                                                class="apexcharts-text apexcharts-xaxis-label "
                                                                style="font-family: inherit;"
                                                                transform="rotate(0 1 -1)">
                                                                <tspan id="SvgjsTspan3192"></tspan>
                                                                <title></title>
                                                            </text></g>
                                                    </g>
                                                    <g id="SvgjsG3210" class="apexcharts-yaxis-annotations"></g>
                                                    <g id="SvgjsG3211" class="apexcharts-xaxis-annotations"></g>
                                                    <g id="SvgjsG3212" class="apexcharts-point-annotations"></g>
                                                    <rect id="SvgjsRect3214" width="0" height="0" x="0" y="0"
                                                        rx="0" ry="0" opacity="1"
                                                        stroke-width="0" stroke="none" stroke-dasharray="0"
                                                        fill="#fefefe" class="apexcharts-zoom-rect">
                                                    </rect>
                                                    <rect id="SvgjsRect3215" width="0" height="0" x="0" y="0"
                                                        rx="0" ry="0" opacity="1"
                                                        stroke-width="0" stroke="none" stroke-dasharray="0"
                                                        fill="#fefefe" class="apexcharts-selection-rect"></rect>
                                                </g>
                                            </svg>
                                            <div class="apexcharts-tooltip apexcharts-theme-light">
                                                <div class="apexcharts-tooltip-title"
                                                    style="font-family: inherit; font-size: 12px;"></div>
                                                <div class="apexcharts-tooltip-series-group" style="order: 1;"><span
                                                        class="apexcharts-tooltip-marker"
                                                        style="background-color: rgb(23, 198, 83);"></span>
                                                    <div class="apexcharts-tooltip-text"
                                                        style="font-family: inherit; font-size: 12px;">
                                                        <div class="apexcharts-tooltip-y-group"><span
                                                                class="apexcharts-tooltip-text-y-label"></span><span
                                                                class="apexcharts-tooltip-text-y-value"></span>
                                                        </div>
                                                        <div class="apexcharts-tooltip-goals-group"><span
                                                                class="apexcharts-tooltip-text-goals-label"></span><span
                                                                class="apexcharts-tooltip-text-goals-value"></span>
                                                        </div>
                                                        <div class="apexcharts-tooltip-z-group"><span
                                                                class="apexcharts-tooltip-text-z-label"></span><span
                                                                class="apexcharts-tooltip-text-z-value"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div
                                                class="apexcharts-xaxistooltip apexcharts-xaxistooltip-bottom apexcharts-theme-light">
                                                <div class="apexcharts-xaxistooltip-text"
                                                    style="font-family: inherit; font-size: 12px;"></div>
                                            </div>
                                            <div
                                                class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
                                                <div class="apexcharts-yaxistooltip-text"></div>
                                            </div>
                                        </div>
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
@if (session('success') == 200)
    @section('script')
        <script>
            toastr.success('Welcome Back to the Rapid Creator Dashboard...!', 'Success', {
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "progressBar": true,
                "enableHtml": true
            });
        </script>
    @endsection
@endif
@section('script')
    <script>
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
@endsection

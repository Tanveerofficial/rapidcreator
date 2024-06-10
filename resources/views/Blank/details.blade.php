@extends('layouts.app')
@section('title', 'Rapid Creator')
@section('main-content')
    <div class="app-main flex-column flex-row-fluid " id="kt_app_main">
        <div class="d-flex flex-column flex-column-fluid">
            <div id="kt_app_toolbar" class="app-toolbar  py-3 py-lg-6 ">
                <div id="kt_app_toolbar_container" class="app-container  container-xxl d-flex flex-stack ">
                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3 ">
                        <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">
                            Mockup
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
                                Mockup Details </li>
                        </ul>
                    </div>
                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3 ">
                        <a href="{{url('/mockup/view')}}" class="btn btn-primary btn-sm">
                            <i class="fas fa-long-arrow-alt-left"></i> Go Back
                        </a>
                    </div>
                </div>
            </div>
            <div id="kt_app_content" class="app-content  flex-column-fluid ">
                <div id="kt_app_content_container" class="app-container  container-xxl">
                    <div class="row d-flex">
                        <div class="col-lg-6 col-xl-6 col-md-6 mx-auto" id="getting_preview" style="text-align: -webkit-center">
                            <div class="card custom-card bg-dark" style="width:502px">
                                <div class="card-body pt-9 pb-0" style="background-color: #2d3250;width:500px">
                                    <div id="capture_preview" class="bg-dark">
                                        <div id="container" class="ui-widget-content" style="width: {{$template->container_width."px"}};height: {{$template->container_height."px"}};left: {{$template->position_x."px"}};top:{{$template->position_y."px"}};cursor: no-drop">
                                            <img src="https://rapidcreator.ibexstack.com/images/drag&drop.webp" style="width: {{$template->container_width."px"}};height: {{$template->container_height."px"}}">
{{--                                            <div id="input">Text Here</div>--}}
                                        </div>
                                        <img src="{{ asset($template->image_path) }}" alt="Image not found"
                                             style="width: {{$template->image_width."px"}};height: {{$template->image_height."px"}}">
                                    </div>
                                    <br><br>
                                </div>
                            </div>
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
    </div>
@endsection

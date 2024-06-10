@extends('layouts.app')
@section('title', 'Rapid Creator')
@section('main-content')
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <div class="d-flex flex-column flex-column-fluid">
            <div id="kt_app_toolbar" class="app-toolbar  py-3 py-lg-6 ">
                <div id="kt_app_toolbar_container" class="app-container  container-xxl d-flex flex-stack ">
                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3 ">
                        <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">
                            Templates
                        </h1>
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                            <li class="breadcrumb-item text-muted">
                                <a href="{{ url('/dashbaord') }}" class="text-muted text-hover-primary">
                                    Home </a>
                            </li>
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-500 w-5px h-2px"></span>
                            </li>
                            <li class="breadcrumb-item text-muted">
                                Manage Templates </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div id="kt_app_content" class="app-content flex-column-fluid">
                <div id="kt_app_content_container" class="app-container container-xxl">
                    <div class="row">
                        @forelse ($alltemplates as $templates)
                            @if (isset($array_designs[$templates->id]))
                                @if($array_designs[$templates->id]['design_status']!=0)
                                    <div class="col-md-3 col-xxl-3 mt-4">
                                        <div class="card template_status bg-secondary">
                                            <a class="d-block overlay" data-fslightbox="lightbox-basic"
                                               href="{{ asset($array_designs[$templates->id]['design_status']!=0 ? $array_designs[$templates->id]['design_image']:$templates->template_picture) }}">
                                                <div
                                                    class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover min-h-200px">
                                                    <div class="symbol symbol-200px mb-5 bg-dark" style="width: 100%;height: 220px;border-radius: 0px">
                                                        <img src="{{ asset($array_designs[$templates->id]['design_status']!=0 ? $array_designs[$templates->id]['design_image']:$templates->template_picture) }}"
                                                             alt="image" style="width: 100%;height: 220px;">
                                                    </div>
                                                </div>
                                                <div class="overlay-layer bg-dark bg-opacity-25 shadow">
                                                    <i class="bi bi-eye-fill text-white fs-3x"></i>
                                                </div>
                                            </a>
                                            <div class="text-center mb-5 mt-3">
                                                <div class="btn-group mt-2" role="group" aria-label="First group" style="width: 92%;">
                                                    <a href="{{ url('design-products/' . $array_designs[$templates->id]['template_id']) }}"
                                                       type="button" class="btn btn-icon btn-light-facebook mr-2 fw-bold"
                                                       data-id="{{ $array_designs[$templates->id]['template_id'] }}"
                                                       title="Template Products Create">+ Create Products</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endif
                        @empty
                            <div class="col-md-12 col-xxl-12 mt-2">
                                <div class="card">
                                    <div class="card-body d-flex flex-center flex-column pt-12 p-9">
                                        <h3
                                            class="fs-4 text-danger fw-bold mb-0 text-capitalize text-center">No Record
                                            Found !!</h3>
                                    </div>
                                </div>
                            </div>
                        @endforelse
                    </div>
                    @if ($alltemplates->links() != '')
                        <div class="row justify-content-center pt-5 rounded fs-4 bg-light-info mt-5">
                            <div class="col-11 mb-4">
                                {{ $alltemplates->links('pagination::bootstrap-5') }}
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <div id="kt_app_footer" class="app-footer mt-5 bg-white">
                <div class="app-container  container-fluid py-3 ">
                    <div class="text-gray-900 order-2 order-md-1">
                        <div class="row">
                            <div class="col-12 text-center">
                                <span class="text-muted fw-semibold me-1">© Copyright {{ date('Y') }} <a href="https://ibexstack.com/live/" target="_blank">Ibexstack</a>. All rights reserved.</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

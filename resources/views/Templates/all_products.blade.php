@extends('layouts.app')
@section('title', 'Rapid Creator')
@section('main-content')
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <div class="d-flex flex-column flex-column-fluid">
            <div class="modal fade" id="all_design_products" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable mw-1000px">
                    <div class="modal-content rounded">
                        <div class="modal-header pb-0 border-0 justify-content-end">
                            <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                                <i class="fas fa-times fs-1"><span class="path1"></span><span class="path2"></span></i>
                            </div>
                        </div>
                        <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                            <div class="row" id="all_designed_products">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
                        <button type="hidden" class="btn d-none" id="buttonClick"  data-bs-toggle="modal" data-bs-target="#all_design_products"></button>
                        @forelse ($alltemplates as $templates)
                            @if (isset($array_designs[$templates->id]))
                                @if($array_designs[$templates->id]['design_status']!=0 && $array_products[$templates->id]>=0)
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
                                            <div class="text-center mt-3">
                                                @if($array_products[$templates->id]>=0)
                                                    <h5 class="text-info fw-6">Products Count: {{$array_products[$templates->id]}}</h5>
                                                @endif
                                            </div>
                                            <div class="text-center mb-5 mt-3">
                                                <div class="btn-group mt-2" role="group" aria-label="First group" style="width: 92%;">
                                                    <button type="button" class="btn btn-icon btn-light-facebook mr-2 fw-bold" id="productDetails"
                                                            data-id="{{ $array_designs[$templates->id]['template_id'] }}"
                                                            title="Template Products Details"><i class="fas fa-eye me-2"></i> View</button>
                                                    @if($array_products[$templates->id]>0)
                                                        <a href="{{url('products-download/'.$array_designs[$templates->id]['template_id'])}}" type="button" class="btn btn-icon btn-light-instagram mr-2 fw-bold"
                                                           title="Template Products Download"><i class="fas fa-download me-2"></i> Download</a>
                                                    @endif
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
@section('script')
    <script>
        $(document).ready(function (){
            $(document).on("click", "#productDetails", function (event){
                event.preventDefault();
                var template_id = $(this).data("id");
                $.ajax({
                    url: `{{ url('template_products/${template_id}') }}`,
                    method: "GET",
                    success: function (response) {
                        if (response) {
                            $("#buttonClick").trigger('click');
                            $("#all_designed_products").empty();
                            var baseUrl = '{{ asset('') }}';
                            if (response.length > 0) {
                                $.each(response, function (key, value) {
                                    $("#all_designed_products").append(
                                        '<div class="col-4 text-center" style="border: 6px double lightgray;">' +
                                        '<img class="img-fluid" src="' + baseUrl + value.designed_mokup + '" alt="Img Not Found">' +
                                        '</div>'
                                    );
                                });
                            } else {
                                $("#all_designed_products").append(
                                    '<h2 class="text-center text-danger">No Products Found!</h2>'
                                );
                            }
                        }
                    }
                });
            });
        });
    </script>

@endsection

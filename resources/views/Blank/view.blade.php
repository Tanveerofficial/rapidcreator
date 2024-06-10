@extends('layouts.app')
@section('title', 'Rapid Creator')
@section('main-content')
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <div class="d-flex flex-column flex-column-fluid">
            <div class="modal fade" id="product_details" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered mw-650px">
                    <div class="modal-content rounded">
                        <div class="modal-header pb-0 border-0 justify-content-end">
                            <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                                <i class="fas fa-times fs-1"><span class="path1"></span><span class="path2"></span></i>
                            </div>
                        </div>
                        <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                            <div class="card custom-card bg-secondary mx-auto" style="width:502px">
                                <div class="card-body pt-9 pb-0" style="background-color: #76777b;width:500px">
                                    <div id="capture_preview" class="bg-secondary">
                                        <div id="container" class="ui-widget-content">
                                            <img src="###" id="dummy_image">
                                            {{--                                            <div id="input">Text Here</div>--}}
                                        </div>
                                        <img src="##" alt="Image not found"
                                             id="get_image">
                                    </div>
                                    <br><br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="kt_app_toolbar" class="app-toolbar  py-3 py-lg-6 ">
                <div id="kt_app_toolbar_container" class="app-container  container-xxl d-flex flex-stack ">
                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3 ">
                        <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">
                            Mockups
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
                                Mockups </li>
                        </ul>
                    </div>
                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3 ">
                        <a href="{{url('/mockup/upload')}}" class="btn btn-primary btn-sm">
                            + Add Mockup
                        </a>
                    </div>
                </div>
            </div>
            <div id="kt_app_content" class="app-content flex-column-fluid">
                <div id="kt_app_content_container" class="app-container container-xxl">
                    <input type="hidden" id="get_url_view" value="{{ url('/gettingData') }}">
                    <input type="hidden" id="get_url" value="{{ url('/template') }}">
                    <input type="hidden" id="module_name" value="Template">
                    <input type="hidden" id="image_base_url" value="{{ url('uploads') }}">
                    <div class="row">
                        @forelse ($allblanktemplates as $blanktemplates)
                            <div class="col-md-3 col-xxl-3 mt-2">
                                <div class="card template_status bg-secondary">
                                    <img src="{{ asset($blanktemplates->image_path) }}" class="d-block overlay"
                                         alt="image" width="100%" height="100%">
                                    <div class="text-center mb-5 mt-3">
                                        <div class="btn-group mt-2" role="group" aria-label="First group" style="width: 92%;">
                                            <button data-bs-toggle="modal" data-bs-target="#product_details" data-id="{{$blanktemplates->id}}" id="templateDetails"
                                                    type="button" class="btn btn-icon btn-light-facebook mr-2"
                                                    title="View Product Design"><i class="fas fa-eye"></i></button>
                                            <a href="{{ url('/mockup/edit/' . $blanktemplates->id) }}"
                                               type="button" class="btn btn-icon btn-light-linkedin mr-2"
                                               title="Edit Product"><i class="fas fa-edit"></i></a>
                                            <button type="button" class="btn btn-icon btn-light-instagram mr-2"
                                                    onclick="deleteData(this,'{{ url('/mockup/destroy/') }}','{{ $blanktemplates->id }}','Product')"
                                                    title="Delete Template"><i class="fas fa-trash"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                    @if ($allblanktemplates->links() != '')
                        <div class="row justify-content-center pt-5 rounded fs-4 bg-light-info mt-5">
                            <div class="col-11 mb-4">
                                {{ $allblanktemplates->links('pagination::bootstrap-5') }}
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
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function (){
            $(document).on("click","#templateDetails",function (stop){
                stop.preventDefault();
                var id=$(this).data("id");
                $.ajax({
                    url: `{{url('/mockup/details/${id}')}}`,
                    method: "GET",
                    success: function(response) {
                        var baseURL="{{asset('')}}";
                        if (response) {
                            $("#get_image").css({
                                "width": response.image_width + "px",
                                "height": response.image_height + "px"
                            }).attr("src", baseURL + response.image_path);
                            $("#dummy_image").css({
                                "width": response.image_width + "px",
                                "height": response.image_height + "px"
                            }).attr("src", '###');
                            $("#container").css({
                                "width": response.container_width + "px",
                                "height": response.container_height + "px",
                                "left": response.position_x + "px",
                                "top": response.position_y + "px",
                                "cursor": 'no-drop'
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("Error:", error);
                    }
                });
            })
        })
    </script>
@endsection

@extends('layouts.app')
@section('title', 'Rapid Creator')
@section('main-content')
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <div class="d-flex flex-column flex-column-fluid">
            <div class="modal fade" id="all_mokups" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered mw-650px">
                    <div class="modal-content rounded">
                        <div class="modal-header pb-0 border-0 justify-content-end">
                            <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                                <i class="fas fa-times fs-1"><span class="path1"></span><span class="path2"></span></i>
                            </div>
                        </div>
                        <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                            <div class="row" id="all_mokups_images">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="kt_app_toolbar" class="app-toolbar  py-3 py-lg-6 ">
                <div id="kt_app_toolbar_container" class="app-container  container-xxl d-flex flex-stack ">
                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3 ">
                        <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">
                            Template
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
                                Template Products </li>
                        </ul>
                    </div>
                    <div class="d-flex align-items-center gap-2 gap-lg-3">
                        <a href="{{url('/create_products')}}" class="btn btn-sm fw-bold btn-primary">
                            <i class="fas fa-long-arrow-alt-left"></i> Go Back
                        </a>
                    </div>
                </div>
            </div>
            <div id="kt_app_content" class="app-content flex-column-fluid">
                <div id="kt_app_content_container" class="app-container container-xxl">
                    <div class="row">
                        <div class="col-lg-6 col-xl-6 col-md-6">
                            <div class="card custom-card">
                                <div class="card-body" style="overflow: scroll;width:500px;height:666px">
                                    <div class="row" style="display: none" id="checkboxes">
                                        <div class="col-md-12 col-xxl-12 mt-2">
                                            <label class="checkbox">
                                                <input type="checkbox" id="inputCheckboxes" value="1">
                                                <span></span>
                                                Select All
                                            </label>
                                            </label>
                                        </div>
                                        <div class="col-md-12 col-xxl-12 mt-2">
                                            <div class="images_checkbox">
                                                <ul class="d-flex">
                                                    <div class="row" id="allDesigns">
                                                        {{--                                                        @foreach($alldesigns as $index => $design)--}}
                                                        {{--                                                           --}}
                                                        {{--                                                        @endforeach--}}
                                                    </div>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-6 col-md-6 mx-auto" id="image_upload" style="display: block">
                            <div class="file-uploader-wrapper" style="width: 502px;height:666px;text-align: -webkit-center;padding-top:20%">
                                <header>Select Mockup</header>
                                <form id="form_upload_file" data-bs-toggle="modal" data-bs-target="#all_mokups">
                                    <i class="fas fa-cloud-upload-alt"></i>
                                    <p class="fw-bold">Click Here to Select Mockup</p>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-6 col-md-6" id="getting_preview" style="text-align: -webkit-center;display: none">
                            <div class="card custom-card bg-dark" style="width:502px">
                                <div class="card-body pt-9 pb-0" style="background-color: #2d3250;width:500px">
                                    <div id="capture_preview" class="bg-dark">
                                        <div id="container" class="ui-widget-content">
                                            <img src="https://rapidcreator.ibexstack.com/images/design.png" id="getImage">
                                        </div>
                                        <img alt="Image not found" id="image">
                                    </div>
                                    <br><br>
                                </div>
                                <div class="card-footer p-3 text-center"
                                     style="display: block;background-color: #2d3250;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;">
                                    <button type="submit" class="btn" id="preview"
                                            style="background-color:white;">
                                        <span class="indicator-label">
                                            Generate Products
                                        </span>
                                        <i class="fas fa-arrow-right text-dark"></i>
                                    </button>
                                    <button type="submit" class="btn" id="change_mokup" data-bs-toggle="modal" data-bs-target="#all_mokups"
                                            style="background-color:white;">
                                        <span class="indicator-label">
                                            Change Mockup
                                        </span>
                                        <i class="fas fa-arrow-right text-dark"></i>
                                    </button>
                                </div>
                            </div>
                            <div id="previewImageContainer" class="bg-dark"></div>
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
@section('script')
    <script>
        $(document).ready(function (){
            $(document).on("click", "#change_mokup", function (event) {
                event.preventDefault();
                $.ajax({
                    url: "{{ url('get_all_mokups') }}",
                    method: "GET",
                    success: function (response) {
                        $("#all_mokups_images").empty();
                        var baseUrl = '{{ asset('') }}';
                        $.each(response.data, function (key, value) {
                            $("#all_mokups_images").append(
                                '<div class="col-4 text-center" style="border: 6px double lightgray;">' +
                                '<img class="img-fluid" src="' + baseUrl + '/' + value.image_path + '" alt="Img Not Found">' +
                                '<button class="btn btn-secondary btn-sm mb-2" data-id="'+value.id+'" id="selectMokup">Select Mokup</button>' +
                                '</div>'
                            );
                        });
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });
            $(document).on("click", "#form_upload_file", function (event) {
                event.preventDefault();
                $.ajax({
                    url: "{{ url('get_all_mokups') }}",
                    method: "GET",
                    success: function (response) {
                        $("#all_mokups_images").empty();
                        var baseUrl = '{{ asset('') }}';
                        $.each(response.data, function (key, value) {
                            $("#all_mokups_images").append(
                                '<div class="col-4 text-center" style="border:6px double lightgray">' +
                                '<img class="img-fluid" src="' + baseUrl + '/' + value.image_path + '" alt="Img Not Found">' +
                                '<button class="btn btn-secondary btn-sm mb-2" data-id="'+value.id+'" id="selectMokup">Select Mokup</button>' +
                                '</div>'
                            );
                        });
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });

            $(document).on("click", "#selectMokup", function (event) {
                event.preventDefault();

                const button = $(this);
                const id = button.data("id");
                const template_id = '{{$alldesigns[0]->template_id}}';

                button.html("<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span> Processing...");
                button.prop("disabled", true);

                const formData = new FormData();
                formData.append("mokup_id", id);
                formData.append("template_id", template_id);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: `{{url('select_mokup')}}`,
                    method: "POST",
                    contentType: false,
                    processData: false,
                    data: formData,
                    dataType: "JSON",
                    success: function (response) {
                        if (response) {
                            $("#input_checkboxes_all").prop("checked", false);
                            button.prop("disabled", false);
                            $("[data-bs-dismiss=modal]").trigger("click");

                            $("#container").css({
                                "width": response.mokup.container_width + "px",
                                "height": response.mokup.container_height + "px",
                                "left": response.mokup.position_x + "px",
                                "top": response.mokup.position_y + "px",
                                "cursor": 'no-drop'
                            });
                            $("#getImage").css({
                                "width": response.mokup.container_width + "px",
                                "height": response.mokup.container_height + "px"
                            });
                            $("#image").css({
                                'background-color': "#B6BBC4",
                                "width": response.mokup.image_width,
                                "height": response.mokup.image_height
                            });

                            const baseURL = '{{asset('')}}';
                            $("#getting_preview").css("display", "block");
                            $("#image_upload").css("display", "none");
                            $("#image").attr("src", baseURL + response.mokup.image_path);
                            $("#checkboxes").css("display", 'block');
                            $("#allDesigns").empty();
                            $("#getImage").attr("src","");
                            $("#getImage").attr("src","https://rapidcreator.ibexstack.com/images/design.png");
                            $.each(response.designs, function (index, design) {
                                $("#allDesigns").append(`
                        <div class="col-4">
                            <li>
                                <input type="checkbox" class="input_checkboxes_all"
                                    ${!response.array_designs_id?.hasOwnProperty(design.id) ? '' : 'checked'}
                                    ${!response.array_designs_id?.hasOwnProperty(design.id) ? '' : 'disabled'}
                                    value="${design.id}" id="myCheckbox${index}1" />
                                <label for="myCheckbox${index}1">
                                    <img src="${baseURL}${design.design_image}" style="width: 100px; height: 100px" />
                                </label>
                            </li>
                        </div>
                    `);
                            });
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error("Error occurred:", error);
                        button.prop("disabled", false);
                        button.html("Try Again");
                    }
                });
            });
            $(document).on("change","#inputCheckboxes",function (stop){
                stop.preventDefault();
                if ($('#getting_preview').css('display') === 'none') {
                    Swal.fire({
                        toast: true,
                        icon: 'error',
                        title: 'Please select the Mokup First..!',
                        animation: false,
                        position: 'top-right',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                    });
                    $(this).prop("checked",false);
                    return false;
                }
                var value=$(this).val();
                var baseURL='{{asset('')}}';
                if(value==1){
                    $(this).val(0);
                    $(".input_checkboxes_all").prop("checked",true);
                }else{
                    $(this).val(1);
                    $(".input_checkboxes_all").prop("checked",false);
                }
                $.ajax({
                    url:`{{url('checeked_all/'.$alldesigns[0]->template_id)}}`,
                    method:"GET",
                    success:function (response){
                        if(response){
                            if(value==1){
                                $("#getImage").attr("src","");
                                $("#getImage").attr("src",baseURL+response.design_image);
                            }else{
                                $("#getImage").attr("src","");
                                $("#getImage").attr("src","https://rapidcreator.ibexstack.com/images/design.png");
                            }
                        }
                    }
                })
            })
            $(document).on("change",".input_checkboxes_all",function (stop){
                stop.preventDefault();
                if ($('#getting_preview').css('display') === 'none') {
                    Swal.fire({
                        toast: true,
                        icon: 'error',
                        title: 'Please select the Mokup First..!',
                        animation: false,
                        position: 'top-right',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                    });
                    $(this).prop("checked",false);
                    return false;
                }
                if ($(this).prop('checked')) {
                    var value=$(this).val();
                    var baseURL='{{asset('')}}';
                    $.ajax({
                        url:`{{url('checked_single/${value}')}}`,
                        method:"GET",
                        success:function (response){
                            if(response){
                                $("#getImage").attr("src","");
                                $("#getImage").attr("src",baseURL+response.design_image);
                            }
                        }
                    })
                }else{
                    $("#getImage").attr("src","");
                    $("#getImage").attr("src","https://rapidcreator.ibexstack.com/images/design.png");
                }
            })
            $(document).on("click", "#preview", function (event) {
                event.preventDefault();
                const button = $(this);
                button.html("<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span> Processing...");
                button.prop("disabled", true);
                var ids = [];
                $(".input_checkboxes_all:checked:not(:disabled)").each(function() {
                    var id = $(this).val();
                    ids.push(id);
                });
                if (ids.length === 0) {
                    button.html('<span class="indicator-label">Generate Products</span> <i class="fas fa-arrow-right text-dark"></i>');
                    button.prop("disabled", false);
                    Swal.fire({
                        toast: true,
                        icon: 'error',
                        title: 'Please select at least 1 Image..!',
                        animation: false,
                        position: 'top-right',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                    });
                    return false;
                }
                const containerElement = $('#container');
                const inputElement = $('#getImage');
                const imageElement = $('#image');
                const imageRect = imageElement[0].getBoundingClientRect();
                const inputRect = inputElement[0].getBoundingClientRect();
                const imageCurrentWidth = imageRect.width;
                const imageCurrentHeight = imageRect.height;
                const scaleWidth = imageCurrentWidth / imageElement[0].naturalWidth;
                const scaleHeight = imageCurrentHeight / imageElement[0].naturalHeight;
                const inputRelativeX = (inputRect.left - imageRect.left) / scaleWidth;
                const inputRelativeY = (inputRect.top - imageRect.top) / scaleHeight;
                const adjustedX = inputRelativeX * scaleWidth;
                const adjustedY = inputRelativeY * scaleHeight;
                var formData = new FormData();
                formData.append("ids", JSON.stringify(ids));
                formData.append("mokup_path", $("#image").attr("src"));
                formData.append("position_x", adjustedX);
                formData.append("position_y", adjustedY);
                formData.append("mokup_current_width", imageCurrentWidth);
                formData.append("mokup_current_height", imageCurrentHeight);
                formData.append("design_height", inputElement.height());
                formData.append("design_width", inputElement.width());
                formData.append("template_id", '{{$alldesigns[0]->template_id}}');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: `{{url('make_design_products')}}`,
                    method: "POST",
                    contentType: false,
                    processData: false,
                    data: formData,
                    success: function(response) {
                        button.html('<span class="indicator-label">Generate Products</span> <i class="fas fa-arrow-right text-dark"></i>');
                        button.prop("disabled", false);
                        if(response.message){
                            Swal.fire({
                                toast: true,
                                icon: 'success',
                                title: 'Products Created Successfully',
                                animation: false,
                                position: 'top-right',
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                            });
                        }else{
                            Swal.fire({
                                toast: true,
                                icon: 'error',
                                title: 'Something Went Wrong',
                                animation: false,
                                position: 'top-right',
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                            });
                        }
                    },error:function (error){
                        Swal.fire({
                            toast: true,
                            icon: 'error',
                            title: 'Something Went Wrong',
                            animation: false,
                            position: 'top-right',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                        });
                        button.html('<span class="indicator-label">Generate Products</span> <i class="fas fa-arrow-right text-dark"></i>');
                        button.prop("disabled", false);
                    }
                });
            });
        })
    </script>
@endsection

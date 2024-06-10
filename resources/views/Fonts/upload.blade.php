@extends('layouts.app')
@section('title', 'Rapid Creator')
@section('main-content')
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <div class="d-flex flex-column flex-column-fluid">
            <div id="kt_app_toolbar" class="app-toolbar  py-3 py-lg-6 ">
                <div id="kt_app_toolbar_container" class="app-container  container-xxl d-flex flex-stack ">
                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3 ">
                        <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">
                            Fonts
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
                                Upload Font Files </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div id="kt_app_content" class="app-content  flex-column-fluid ">
                <div id="kt_app_content_container" class="app-container  container-xxl">
                    <div class="row justify-content-center">
                        <div class="col-lg-6 mx-auto">
                            <div class="card">
                                <div class="card-header align-items-center d-flex pt-3">
                                    <h4 class="card-title mb-0 flex-grow-1">Upload Fonts</h4>
                                    {{--                                    <span class="fw-bold text-danger bg-light-info text-center fs-8 p-3">Note: If you have the ttf file only then compress it to the zip first then Upload!</span> --}}
                                </div>
                                <div class="card-body">
                                    <div class="live-preview">
                                        <form id="form_submit" method="POST" class="row g-3 needs-validation" novalidate>
                                            {{--                                            <div class="col-md-12"> --}}
                                            {{--                                                <label class="form-label">Font Name *</label> --}}
                                            {{--                                               --}}
                                            {{--                                                <input type="text" name="font_name" class="form-control" id="file" --}}
                                            {{--                                                   required placeholder="Enter Font Name" /> --}}
                                            {{--                                                <strong class="text-danger" id="font_name"></strong> --}}
                                            {{--                                            </div> --}}
                                            <div class="col-md-12">
                                                <label class="form-label">File Type *</label>
                                                <input type="hidden" id="end_point_url" value="{{ url('/fonts') }}">
                                                <input type="hidden" id="module_name" value="Font">
                                                <input type="hidden" id="button_text" value="Upload">
                                                <select class="form-control" name="file_type" id="fileType" required>
                                                    <option selected disabled>--Select File Type--</option>
                                                    <option value="zip">ZIP</option>
                                                    <option value="ttf">TTF</option>
                                                </select>
                                                <strong class="text-danger" id="font_name"></strong>
                                            </div>
                                            <div class="col-md-12" id="zip_file_div" style="display: none">
                                                <label class="form-label">Upload File *</label>
                                                <input type="file" name="font_file_zip" class="form-control"
                                                    onchange="previewFileZip(this)" id="file_zip" accept=".zip"
                                                    title="Please Select the File First" />
                                                <strong class="text-danger font_file_zip_error" id="font_file"></strong>
                                            </div>
                                            <div class="col-md-12" id="ttf_file_div" style="display: none">
                                                <label class="form-label">Upload File *</label>
                                                <input type="file" name="font_file_ttf[]" multiple class="form-control"
                                                    onchange="previewFileTTF(this)" id="file_ttf" accept=".ttf"
                                                    title="Please Select the File First" />
                                                <strong class="text-danger font_file_ttf_error" id="font_file"></strong>
                                            </div>
                                            <div class="col-md-12" id="previewDivZip"
                                                style="background-color: whitesmoke;border-radius: 4px;display:none">
                                                <img id="previewImgZip" src="/examples/images/transparent.png"
                                                    alt="Placeholder" style="width: 54px;">
                                            </div>
                                            <div class="col-md-12" id="previewDivTTF"
                                                style="background-color: whitesmoke;border-radius: 4px;display:none">
                                                <img id="previewImgTTF" src="/examples/images/transparent.png"
                                                    alt="Placeholder" style="width: 54px;">
                                            </div>
                                            <div class="col-md-12">
                                                <div class="progress">
                                                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary"
                                                        role="progressbar" aria-valuenow="0" aria-valuemin="0"
                                                        aria-valuemax="100" style="width:0%"></div>
                                                </div>
                                                <strong class="badge text-dark d-flex justify-content-end"
                                                    id="percentage"></strong>
                                            </div>
                                            <div class="col-6">
                                                <a href="{{ url('/fonts') }}" type="submit" id="button_move"
                                                    class="btn rounded-pill btn-light text-dark waves-effect waves-light">
                                                    < Go back</a>
                                            </div>

                                            <div class="col-6 text-end">
                                                <button class="btn rounded-pill btn-primary waves-effect waves-light"
                                                    type="submit" id="insert">Upload
                                                    Font >
                                                </button>
                                            </div>
                                        </form>
                                    </div>
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
@section('script')
    <script>
        function previewFileZip(input) {
            var file = $("#file_zip").get(0).files[0];
            if (file) {
                var reader = new FileReader();
                reader.onload = function() {
                    $("#previewDivZip").fadeIn();
                    $("#previewImgZip").attr("src", "https://cdn-icons-png.flaticon.com/512/337/337960.png");
                }
                reader.readAsDataURL(file);
            }
        }

        function previewFileTTF(input) {
            var files = $("#file_ttf").get(0).files;
            $("#previewDivTTF").empty();
            if (files.length > 0) {
                $("#previewDivTTF").fadeIn();
                for (var i = 0; i < files.length; i++) {
                    var file = files[i];
                    var reader = new FileReader();
                    reader.onload = (function(fileIndex) {
                        return function(e) {
                            var img = $("<img>", {
                                src: "https://cdn-icons-png.flaticon.com/512/9704/9704778.png",
                                alt: "Placeholder",
                                style: "width: 54px; margin-right: 10px;"
                            });
                            $("#previewDivTTF").append(img);
                        };
                    })(i);
                    reader.readAsDataURL(file);
                }
            }
        }
    </script>
    <script>
        $(document).ready(function() {
            $(document).on("change", "#fileType", function(event) {
                event.preventDefault();
                var value = $(this).val();
                if (value === "ttf") {
                    $("#zip_file_div").css("display", "none");
                    $("#ttf_file_div").css("display", "block");
                    $("#file_ttf").attr("required", true);
                    $("#file_zip").attr("required", false);
                } else {
                    $("#zip_file_div").css("display", "block");
                    $("#ttf_file_div").css("display", "none");
                    $("#file_ttf").attr("required", false);
                    $("#file_zip").attr("required", true);
                }
            });
        });
        $(document).ready(function() {
            $("#file_zip").on("change", function(event) {
                let zipFile = $(this)[0].files[0];
                if (zipFile) {
                    let fileExtension = zipFile.name.split('.').pop().toLowerCase();
                    if (fileExtension !== 'zip') {
                        $(this).val("");
                        $('.font_file_zip_error').text('Please upload a valid zip file.');
                        event.preventDefault();
                        return false;
                    }
                }
                $('.font_file_zip_error').text('');
            });
            $("#file_ttf").on("change", function(event) {
                let ttfFiles = $(this)[0].files;
                for (let i = 0; i < ttfFiles.length; i++) {
                    let fileExtension = ttfFiles[i].name.split('.').pop().toLowerCase();
                    if (fileExtension !== 'ttf') {
                        $(this).val("");
                        $('.font_file_ttf_error').text('Please upload valid ttf files.');
                        event.preventDefault();
                        return false;
                    }
                }
                $('.font_file_ttf_error').text('');
            });
        });
    </script>
@endsection

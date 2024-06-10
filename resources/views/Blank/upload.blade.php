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
                                Upload </li>
                        </ul>
                    </div>
                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3 ">
                        <a href="{{url('/mockup/view')}}" class="btn btn-primary btn-sm">
                            + Manage Mockup
                        </a>
                    </div>
                </div>
            </div>
            <div id="kt_app_content" class="app-content  flex-column-fluid ">
                <div id="kt_app_content_container" class="app-container  container-xxl">
                    <div class="row d-flex">
                        <div class="col-lg-6 col-xl-6 col-md-6 mx-auto" id="image_upload" style="display: block">
                            <div class="file-uploader-wrapper" style="width: 502px;height:502px;text-align: -webkit-center">
                                <header>Mockup Upload</header>
                                <form id="form_upload_file">
                                    <input class="file-input" type="file" name="file" hidden>
                                    <i class="fas fa-cloud-upload-alt"></i>
                                    <p class="fw-bold">Browse File to Upload</p>
                                </form>
                                <section class="progress-area"></section>
                                <section class="uploaded-files-area"></section>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-6 col-md-6 mx-auto" id="getting_preview" style="text-align: -webkit-center">
                            <div class="card custom-card bg-dark" style="width:502px">
                                <div class="card-body pt-9 pb-0" style="background-color: #2d3250;width:500px">
                                    <div id="capture_preview" class="bg-dark">
                                        <div id="container" class="ui-widget-content">
                                            <div id="input">Drag & Resize</div>
                                        </div>
                                        <img src="{{ asset('/images/gallery.png') }}" alt="Image not found"
                                             style="background-color:#B6BBC4;" class="img-fluid" id="image">
                                    </div>
                                    <br><br>
                                </div>
                                <div class="card-footer p-3 text-center" id="preview_image"
                                     style="display: none;background-color: #2d3250;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;">
                                    <button type="submit" class="btn" id="preview"
                                            style="background-color:white;">
                                        <span class="indicator-label">
                                            Generate Mockup
                                        </span>
                                        <i class="fas fa-arrow-right text-dark"></i>
                                    </button>
                                </div>
                                <div class="card-footer p-3 text-center" id="edit_image"
                                     style="display: none;background-color: #2d3250;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;">
                                    <button type="submit" class="btn" id="edit"
                                            style="background-color:white;">
                                        <span class="indicator-label">
                                            Edit Mockup
                                        </span>
                                        <i class="fas fa-edit text-dark"></i>
                                    </button>
                                    <a href="{{ url('details') }}" type="button" class="btn" id="details"
                                       style="background-color:white;">
                                        <span class="indicator-label">
                                            View Details
                                        </span>
                                        <i class="fas fa-eye text-dark"></i>
                                    </a>
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
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#container").on("resize", function(event, ui) {
                var srcTag = $("#image").attr("src");
                if (srcTag.includes("gallery.png")) {
                    Swal.fire({
                        toast: true,
                        icon: 'error',
                        title: 'Please upload a design before making changes!',
                        animation: false,
                        position: 'top-right',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                    });
                    $("#container").resizable("disable");
                    $("#container").draggable("disable");
                } else {
                    $("#container").resizable("enable");
                    $("#container").draggable("enable");
                }
            });
            $("#container").on("drag", function(event, ui) {
                var srcTag = $("#image").attr("src");
                if (srcTag.includes("gallery.png")) {
                    Swal.fire({
                        toast: true,
                        icon: 'error',
                        title: 'Please upload a design before making changes!',
                        animation: false,
                        position: 'top-right',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                    });
                    $("#container").resizable("disable");
                    $("#container").draggable("disable");
                } else {
                    $("#container").resizable("enable");
                    $("#container").draggable("enable");
                }
            });
        });
    </script>
    <script>
        const MAX_WIDTH = $('#container').width();
        const MAX_HEIGHT = $('#container').height();
        const MAX_FONT_SIZE = 100;
        const MIN_FONT_SIZE = 12;
        const LEFT_OFFSET = 28.875;

        function onChange(e) {
            const el = e.target;
            const container = $('#container');
            const maxWidth = container.width();
            let fontSize = MAX_FONT_SIZE;
            el.style.fontSize = fontSize + 'px';
            while (fontSize > MIN_FONT_SIZE && el.scrollWidth > maxWidth) {
                fontSize--;
                el.style.fontSize = fontSize + 'px';
            }
        }

        function onLoad() {
            const container = $("#container");
            const input = $("#input");
            container.resizable({
                aspectRatio: false,
                handles: "se",
                containment: "#image",
                resize: function(event, ui) {
                    onChange({
                        target: input[0]
                    });
                }
            }).draggable({
                containment: "#image"
            });
            let isDragging = false;
            container.mousedown(function() {
                isDragging = false;
            }).mousemove(function() {
                isDragging = true;
            }).mouseup(function(event) {
                if (isDragging) {
                    isDragging = false;
                    event.stopPropagation();
                    return;
                }
            });
            input.focus(function() {
                container.resizable("enable");
                container.draggable("enable");
            });
            input.blur(function() {
                container.resizable("enable");
                container.draggable("enable");
            });
            const image = $("#image");
            const imageRect = image[0].getBoundingClientRect();
            const initialLeft = (imageRect.width - MAX_WIDTH) / 2 + LEFT_OFFSET;
            const initialTop = (imageRect.height - MAX_HEIGHT) / 2;
            container.css({
                left: initialLeft + 'px',
                top: initialTop + 'px',
                width: MAX_WIDTH + 'px',
                height: MAX_HEIGHT + 'px',
            });
            input.css({
                fontSize: MAX_FONT_SIZE + 'px',
            });
            input.on('input', onChange);
            input.focus();
            onChange({
                target: input[0]
            });
        }
        window.addEventListener('load', onLoad);
        $(document).ready(function() {
            $(document).on("click", "#preview", function(event) {
                event.preventDefault();
                const button = $(this);
                button.html("<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span> Processing...");
                button.prop("disabled", true);
                createTemplate();
            });
        });
        function createTemplate() {
            var containerDiv = $("#getting_preview #container");
            containerDiv.draggable("destroy").resizable("destroy");
            containerDiv.css({
                border: "none",
                userSelect: "none",
                MozUserSelect: "none",
                WebkitUserSelect: "none",
                msUserSelect: "none",
                touchAction: "none",
                cursor: "auto",
            });
            var screenshotData=[];
            const position = calculatePosition();
            screenshotData.push({
                positionX: position.x,
                positionY: position.y,
                containerWidth: position.containerWidth,
                containerHeight: position.containerHeight,
                currentWidth: position.currentWidth,
                currentHeight: position.currentHeight,
            });
            sendAjaxRequest(screenshotData);
        }

        function calculatePosition() {
            const container = $('#container');
            const input = $('#input');
            const image = $('#image');
            if (!container.length || !input.length || !image.length) {
                console.error("One or more elements are missing.");
                return;
            }
            const containerPosition = container.position();
            const currentWidth = image.width();
            const currentHeight = image.height();
            const containerWidth = container.width();
            const containerHeight = container.height();
            return {
                x: containerPosition.left,
                y: containerPosition.top,
                currentWidth: currentWidth,
                currentHeight: currentHeight,
                containerWidth: containerWidth,
                containerHeight: containerHeight,
            };
        }


        function sendAjaxRequest(dataArray) {
            var image_path = $("#image").attr("src");
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ url('/blank/store') }}",
                method: 'POST',
                data: {
                    data: dataArray,
                    image_path: image_path,
                },
                success: function(response) {
                    if (response.message === 200) {
                        var button = $("#preview");
                        button.html(
                            "<span class='indicator-label'>Generate Mockup</span> <i class='fas fa-arrow-right text-dark'></i>"
                        );
                        button.prop("disabled", false);
                        Swal.fire({
                            toast: true,
                            icon: 'success',
                            title: 'Area Added Successfully...!',
                            animation: false,
                            position: 'top-right',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                        });
                        location.reload(true);
                    } else {
                        var button = $("#preview");
                        button.html(
                            "<span class='indicator-label'>Generate Mockup</span> <i class='fas fa-arrow-right text-dark'></i>"
                        );
                        button.prop("disabled", false);
                        Swal.fire({
                            toast: true,
                            icon: 'success',
                            title: 'Area not Added Successfully...!',
                            animation: false,
                            position: 'top-right',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                        });
                    }
                },
                error: function(xhr, status, error) {
                    alert("Error occurred while processing the request: " + error);
                    var button = $("#preview");
                    button.html(
                        "<span class='indicator-label'>Generate Mockup</span> <i class='fas fa-arrow-right text-dark'></i>"
                    );
                    button.prop("disabled", false);
                }
            });
        }

    </script>
    <script>
        $(document).ready(function () {
            const $fileInput = $('.file-input');
            const $progressArea = $('.progress-area');
            const $uploadedFilesArea = $('.uploaded-files-area');
            const $uploadedImage = $('#uploaded-image');

            $('#form_upload_file').click(function (event) {
                if (event.target !== $('.file-input')[0]) {
                    $('.file-input').click();
                }
            });

            $fileInput.change(function (event) {
                const file = event.target.files[0];
                if (file) {
                    const fileName = file.name.length >= 12 ? file.name.substring(0, 13) + "... ." + file.name.split('.')[1] : file.name;
                    const fileExtension = file.name.split('.').pop().toLowerCase();
                    if (fileExtension !== 'jpg' && fileExtension !== 'png') {
                        Swal.fire({
                            toast: true,
                            icon: 'error',
                            title: 'Please select an image with a extension of either png, or jpg...!',
                            animation: false,
                            position: 'top-right',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                        });
                        $(this).val("");
                        return false;
                    }
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        const img = new Image();
                        img.onload = function () {
                            if (img.width < 4500 || img.height < 5400) {
                                Swal.fire({
                                    toast: true,
                                    icon: 'error',
                                    title: 'Maximum dimension is 4500x5400!',
                                    animation: false,
                                    position: 'top-right',
                                    showConfirmButton: false,
                                    timer: 3000,
                                    timerProgressBar: true,
                                });
                                $fileInput.val("");
                            } else {
                                simulateProgressBar(fileName);
                            }
                        };
                        img.src = e.target.result;
                    };
                    reader.readAsDataURL(file);
                }
            });
            function simulateProgressBar(name) {
                let progress = 0;
                const interval = setInterval(function () {
                    progress += 10;
                    if (progress <= 100) {
                        updateProgressBar(name, progress);
                        $("#preview").prop("disabled", false);
                    } else {
                        clearInterval(interval);
                        displayUploadedFile(name);
                    }
                }, 500);
            }
            function updateProgressBar(name, progress) {
                $progressArea.html(`
            <li class="progress-row">
                <i class="fas fa-file-alt"></i>
                <div class="progress-content">
                    <div class="details">
                        <span class="file-name">${name} • Uploading</span>
                        <span class="percent">${progress}%</span>
                    </div>
                    <div class="progress-bar">
                        <div class="progress" style="width: ${progress}%"></div>
                    </div>
                </div>
            </li>`);
            }
            function displayUploadedFile(name) {
                $progressArea.html("");
                let uploadedHTML = `
            <li class="progress-row">
                <i class="fas fa-file-alt"></i>
                <div class="progress-content">
                    <div class="details">
                        <span class="file-name">${name} • Uploaded</span>
                    </div>
                </div>
                <i class="fas fa-check"></i>
            </li>`;
                $uploadedFilesArea.prepend(uploadedHTML);
                applyImageProcessing();
            }
            function applyImageProcessing() {
                const file = $fileInput[0].files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function (event) {
                        $("#image_processing").css("display", "block");
                        $("#image_upload").css("display", "none");
                        $("#preview_image").css({
                            "display": "block",
                            "background-color": "#2d3250",
                            "border-bottom-right-radius": "8px",
                            "border-bottom-left-radius": "8px"
                        });
                        $("#image").css('background-color', '#B6BBC4');
                        $("#image").attr('src', event.target.result);
                        $("#container").resizable("enable");
                        $("#container").draggable("enable");
                    };
                    reader.readAsDataURL(file);
                }
            }
        });
    </script>
@endsection

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
                                <a href="{{ url('/dashboard') }}" class="text-muted text-hover-primary">
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
                    <div class="row">
                        <div class="col-lg-6 col-xl-6 col-md-6">
                            <div class="card custom-card">
                                <div class="card-header">
                                    <div class="card-title mb-0">Add Information</div>
                                </div>
                                <div class="card-body">
                                    <form id="form_submit" data-parsley-validate="">
                                        <div class="">
                                            <div class="row">
                                                <div class="fv-row mb-7">
                                                    <label class="fs-6 fw-semibold mb-2">CSV Text</label>
                                                    <input type="text" class="form-control form-control-solid"
                                                        id="csv_text" placeholder="Enter CSV Title" required=""
                                                        type="text" />
                                                </div>

                                                <div class="fv-row mb-7">
                                                    <label for="fs-6 fw-semibold mb-2">Choose CSV File</label>
                                                    <br>
                                                    <select class="form-control form-control-solid" id="gettingCSV">
                                                        <option value="" selected disabled>--Choose CSV File--
                                                        </option>
                                                        @foreach ($csv_files as $csv_file)
                                                            @php
                                                                $explode_name = explode('.csv', $csv_file);
                                                            @endphp
                                                            <option value="{{ $csv_file }}">{{ $explode_name[0] }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="fv-row mb-7" style="display: none" id="csv_names">
                                                    <label for="fs-6 fw-semibold mb-2">Choose Title</label>
                                                    <br>
                                                    <select class="form-control form-control-solid" id="getting_names">
                                                        <option value="" selected disabled>--Choose Title--</option>
                                                    </select>
                                                </div>
                                                <div class="fv-row mb-7">
                                                    <label for="fs-6 fw-semibold mb-2">Choose Font Family</label>
                                                    <br>
                                                    <select class="form-control form-control-solid" id="applyFont">
                                                        <option value="" selected disabled>--Choose Font Family--
                                                        </option>
                                                        @foreach ($fontFamilies as $family)
                                                            <option value="{{ $family }}">{{ Str::ucfirst($family) }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="fv-row mb-7">
                                                    <label for="fs-6 fw-semibold mb-2">Add Effects to Fonts</label>
                                                    <br>
                                                    <select id="fontEffectSelect" class="form-control form-control-solid">
                                                        <option value="normal">Normal</option>
                                                        <option value="italic">Italic</option>
                                                        <option value="bold">Bold</option>
                                                        <option value="underline">Underline</option>
                                                        <option value="line-through">Line Through</option>
                                                        <option value="uppercase">Uppercase</option>
                                                        <option value="lowercase">Lowercase</option>
                                                        <option value="capitalize">Capitalize</option>
                                                        <option value="letter-spacing">Letter Spacing</option>
                                                        <option value="word-spacing">Word Spacing</option>
                                                        <option value="text-shadow">Text Shadow</option>
                                                        <option value="small-caps">Small Caps</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-6 col-md-6" id="getting_preview">
                            <div class="card custom-card bg-dark">
                                <div class="card-body pt-9 pb-0">
                                    <div id="capture_preview" class="bg-dark">
                                        <div id="container" class="ui-widget-content">
                                            <div id="input" contenteditable="false">Text Here</div>
                                        </div>
                                        <img src="{{ asset('/images/template.png') }}" alt="Image not found"
                                            class="img-fluid" id="image">
                                    </div>
                                    <br><br>
                                </div>
                                <div class="card-footer p-3 text-center bg-light" id="preview_image" style="display: block">
                                    <button type="submit" class="btn" id="preview"
                                        style="background-color:#2D3250;color:white">
                                        <span class="indicator-label">
                                            Generate Template
                                        </span>
                                        <i class="fas fa-arrow-right text-white"></i>
                                    </button>
                                </div>
                                <div class="card-footer p-3 text-center bg-light" id="edit_image" style="display: none">
                                    <button type="submit" class="btn" id="edit"
                                        style="background-color:#2D3250;color:white">
                                        <span class="indicator-label">
                                            Edit Template
                                        </span>
                                        <i class="fas fa-edit text-white"></i>
                                    </button>
                                </div>
                            </div>
                            <div id="previewImageContainer" class="bg-dark"></div>
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
                                class="menu-link px-2">About</a>
                        </li>
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
            const MAX_WIDTH = $('#container').width();
            const MAX_HEIGHT = $('#container').height();
            const MAX_FONT_SIZE = 50;
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
                    resize: function(event, ui) {
                        onChange({
                            target: input[0]
                        });
                    }
                }).draggable();

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
                $(document).on("input", "#csv_text", function(event) {
                    event.preventDefault();
                    var csvText = $("#csv_text").val().replace(/(\r\n|\n|\r)/g, "");
                    $("#input").html(csvText);
                    $("#input").trigger("input");
                });

                $(document).on("change", "#applyFont", function(stop) {
                    stop.preventDefault();
                    var selectedFont = $(this).val();
                    $("#input").css("font-family", selectedFont);
                    $('#input').trigger("input");
                });

                $(document).on("change", "#gettingCSV", function(stop) {
                    stop.preventDefault();
                    var selectedCSV = $(this).val();
                    $.ajax({
                        url: '/getting_csv_data/' + selectedCSV,
                        method: 'GET',
                        success: function(response) {
                            if (response.message == 200) {
                                $("#csv_names")
                                    .css({
                                        opacity: 0,
                                    })
                                    .slideDown("slow")
                                    .animate({
                                        opacity: 1,
                                    });
                                $("#csv_names").prop("required", true);
                                $("#getting_names").empty();
                                $("#getting_names").append(
                                    "<option value='' selected disabled>--Select Name--</option>"
                                );
                                $.each(response.data, function(key, value) {
                                    $("#getting_names").append("<option value='" + value +
                                        "'>" +
                                        value +
                                        "</option>");
                                });
                            } else {
                                toastr.error(
                                    'Sorry! Your request to retrieve data from the <strong>' +
                                    selectedCSV +
                                    '</strong> file has failed.', 'Error', {
                                        "timeOut": "5000",
                                        "extendedTimeOut": "1000",
                                        "progressBar": true,
                                        "enableHtml": true
                                    });
                            }
                        },
                        error: function(error) {
                            console.error('Error fetching CSV data:', error);
                        }
                    });
                });

                $(document).on("change", "#getting_names", function(stop) {
                    stop.preventDefault();
                    var selectName = $(this).val();
                    var gettingText = selectName.replace(/(\r\n|\n|\r)/g, "");
                    $("#input").html(gettingText);
                    $("#csv_text").val(gettingText);
                    $('#input').trigger('input');
                });

                $(document).on("change", "#fontEffectSelect", function(stop) {
                    stop.preventDefault();
                    var effect = $(this).val();
                    $("#input").removeClass().addClass('box ' + effect + '-text');
                    $('#input').trigger('input');
                });
            });

            $(document).ready(function() {
                $(document).on("click", "#preview", function(stop) {
                    stop.preventDefault();
                    const button = $(this);
                    button.html(
                        "<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span> Processing..."
                    );
                    button.prop("disabled", true);
                    setTimeout(function() {
                        button.html(
                            "<span class='indicator-label'>Generate Template</span> <i class='fas fa-arrow-right text-white'></i>"
                        );
                        button.prop("disabled", false);
                        createTemplate();
                    }, 1000);
                });

                $(document).on("click", "#edit", function(stop) {
                    stop.preventDefault();
                    const button = $(this);
                    button.html(
                        "<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span> Processing..."
                    );
                    button.prop("disabled", true);
                    setTimeout(function() {
                        button.html(
                            "<span class='indicator-label'>Edit Template</span> <i class='fas fa-edit text-white'></i>"
                        );
                        button.prop("disabled", false);
                        editImage();
                    }, 1000);
                });
            });

            function createTemplate() {
                $("#preview_image").css("display", "none");
                $("#edit_image").css("display", "block");
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
                disableForm();
                captureScreenshoot();
            }
            function captureScreenshoot() {
                html2canvas(document.querySelector("#capture_preview"), {
                    useCORS: true,
                }).then(function(canvas) {
                    $("#container").css({
                        top: "",
                        left: "",
                        margin: "",
                        padding: "",
                        userSelect: "none",
                        MozUserSelect: "none",
                        WebkitUserSelect: "none",
                        msUserSelect: "none",
                        touchAction: "none",
                    });
                    $("#input").css({
                        top: "",
                        left: "",
                        margin: "",
                        padding: "",
                    });
                    var imageData = canvas.toDataURL("image/png");
                    var randomImageName = generateRandomName() + ".png";
                    saveImageToServer(imageData, randomImageName);
                    var previewImage = new Image();
                    previewImage.src = imageData;
                    $("#previewImageContainer").html("");
                    $("#previewImageContainer").append(previewImage);
                });
            }

            function generateRandomName() {
                return Math.floor(Math.random() * (900000 - 100000 + 1)) + 100000;
            }

            function saveImageToServer(imageData, imageName) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "POST",
                    url: "/div",
                    data: {
                        imageData: imageData,
                        imageName: imageName,
                    },
                    success: function(response) {
                        console.log("Image saved successfully");
                    },
                    error: function(error) {
                        console.error("Error saving image: ", error);
                    },
                });
            }

            // function captureScreenshoot() {
            //     html2canvas(document.querySelector("#capture_preview"), {
            //         useCORS: true,
            //     }).then(function(canvas) {
            //         $("#container").css({
            //             top: "",
            //             left: "",
            //             margin: "",
            //             padding: "",
            //             userSelect: "none",
            //             MozUserSelect: "none",
            //             WebkitUserSelect: "none",
            //             msUserSelect: "none",
            //             touchAction: "none",
            //         });
            //         $("#input").css({
            //             top: "",
            //             left: "",
            //             margin: "",
            //             padding: "",
            //         });
            //         var imageData = canvas.toDataURL("image/png");
            //         var previewImage = new Image();
            //         previewImage.src = imageData;
            //         $("#previewImageContainer").html("");
            //         $("#previewImageContainer").append(previewImage);
            //     });
            // }

            function editImage() {
                $("#preview_image").css("display", "block");
                $("#edit_image").css("display", "none");

                var containerDiv = $("#getting_preview #container");

                const container = $("#container");
                const input = $("#input");

                container.resizable({
                    aspectRatio: false,
                    handles: "se",
                    resize: function(event, ui) {
                        onChange({
                            target: input[0]
                        });
                    }
                }).draggable();

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

                containerDiv.css({
                    border: "",
                    userSelect: "",
                    MozUserSelect: "",
                    WebkitUserSelect: "",
                    msUserSelect: "",
                    touchAction: "",
                    cursor: "move",
                });
                enableForm();
            }

            function disableForm() {
                var form = document.getElementById("form_submit");
                var elements = form.elements;

                for (var i = 0; i < elements.length; i++) {
                    elements[i].disabled = true;
                }
            }

            function enableForm() {
                var form = document.getElementById("form_submit");
                var elements = form.elements;

                for (var i = 0; i < elements.length; i++) {
                    elements[i].disabled = false;
                }
            }
        </script>

    @endsection

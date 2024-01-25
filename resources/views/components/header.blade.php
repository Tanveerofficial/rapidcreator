<meta charset="utf-8" />
<title>{{ __('ibex | ') }} @yield('title')</title>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="shortcut icon" href="{{ asset('assets/media/logos/favicon.ico') }}" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
<link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/plugins/custom/vis-timeline/vis-timeline.bundle.css') }}" rel="stylesheet"
    type="text/css" />
<link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/plugins/select2/css/select2-bootstrap4.css') }}" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-37564768-1"></script>\
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
<link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">

<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/flick/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.min.js"
    integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous">
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'UA-37564768-1');
</script>
<script>
    if (window.top != window.self) {
        window.top.location.replace(window.self.location.href);
    }
</script>
<style>
    #container {
        position: absolute;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        text-align: center;
        word-wrap: normal;
        border: 1px dashed white;
        background-color: transparent;
        color: black;
        font-weight: bold;
        font-size: 30px;
        /* padding: 10px; */
        cursor: move;
    }

    .ui-resizable-handle {
    color: white;
}


    #input {
        text-align: center;
        word-wrap: normal;
        background-color: transparent;
        color: white;
        font-weight: bold;
        font-size: 30px;
        /* padding: 10px; */
        border: none;
        outline: none;
    }

    #image {
        /* margin-top: 10px; */
    }

    .italic-text {
        font-style: italic;
    }

    .bold-text {
        font-weight: bold;
    }

    .underline-text {
        text-decoration: underline;
    }

    .line-through-text {
        text-decoration: line-through;
    }

    .uppercase-text {
        text-transform: uppercase;
    }

    .lowercase-text {
        text-transform: lowercase;
    }

    .capitalize-text {
        text-transform: capitalize;
    }

    .letter-spacing-text {
        letter-spacing: 2px;
    }

    .word-spacing-text {
        word-spacing: 5px;
    }

    .text-shadow-effect {
        text-shadow: 2px 2px 4px #000000;
    }

    .small-caps-text {
        font-variant: small-caps;
    }
</style>
{{-- <style>
    .container {
        position: relative;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .img-container {
        position: relative;
        z-index: 0;
        margin-top: 10px;
    }

    .img-container img {
        max-width: 100%;
        height: auto;
        display: block;
        margin: 0 auto;
    }

    #createImageButton {
        margin-top: 20px;
    }

    #previewImageContainer {
        margin-top: 20px;
    }

    #textContainer {
        font-size: 16px;
        transition: font-size 0.3s ease;
        margin-top: 20px;
    }



    .box {
        position: absolute;
        user-select: none;
        transform: translate(-50%, -50%);
        left: 50%;
        top: 50%;
        width: auto;
        height: auto;
        border: 1px dashed white;
        color: white;
        font-weight: bold;
        font-size: 30px;
        text-align: center;
        z-index: 1;
        cursor: move;
        padding: 0px;
        margin: 0 auto;
        overflow: hidden;
    }

    .resize-handler {
        height: 10px;
        width: 10px;
        background-color: white;
        position: absolute;
        cursor: auto;
        border-radius: 100px;
        border: 1px solid #ffffff;
        user-select: none;
        display: none;
    }

    .resize-handler:hover {
        background-color: white;
    }

    .resize-handler.rotate {
        cursor: url('https://findicons.com/files/icons/1620/crystal_project/16/rotate_ccw.png'), auto;
    }
</style> --}}



<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="{{ asset('/assets/') }}" data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"/>

    <title>{{ $cms->website_name }} - Admin</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="description" content="" />

    <link rel="icon" type="image/x-icon" href="{{ asset('/assets/image_content/' . $cms->logo) }}" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet"/>

    <link rel="stylesheet" href="{{ asset('/assets/vendor/fonts/boxicons.css') }}" />

    <link rel="stylesheet" href="{{ asset('/assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('/assets/vendor/css/theme-default.css') }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('/assets/css/demo.css') }}" />

    <link rel="stylesheet" href="{{ asset('/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

    <link rel="stylesheet" href="{{ asset('/assets/vendor/libs/apex-charts/apex-charts.css') }}" />

    <script src="{{ asset('/assets/vendor/js/helpers.js') }}"></script>

    <script src="{{ asset('/assets/js/config.js') }}"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

    <style>
      .text-primary {
        color: 	{{ $cms->secondary_color }} !important;
      }
      .bg-primary {
        background-color: 	{{ $cms->secondary_color }} !important;
      }
      .dropdown-notifications-item:not(.mark-as-read) .dropdown-notifications-read span {
        background-color: 	{{ $cms->secondary_color }};
      }
      .bg-label-primary {
        background-color: #e7e7ff !important;
        color: 	{{ $cms->secondary_color }} !important;
      }
      .page-item.active .page-link, .page-item.active .page-link:hover, .page-item.active .page-link:focus,
      .pagination li.active > a:not(.page-link),
      .pagination li.active > a:not(.page-link):hover,
      .pagination li.active > a:not(.page-link):focus {
        border-color: 	{{ $cms->secondary_color }};
        background-color: 	{{ $cms->secondary_color }};
        color: #fff;
        box-shadow: 0 0.125rem 0.25rem rgba(105, 108, 255, 0.4);
      }

      .progress-bar {
        background-color: 	{{ $cms->secondary_color }};
        color: #fff;
        box-shadow: 0 2px 4px 0 rgba(105, 108, 255, 0.4);
      }

      .list-group-item-primary {
        background-color: #e1e2ff;
        color: 	{{ $cms->secondary_color }} !important;
      }

      a.list-group-item-primary,
      button.list-group-item-primary {
        color: 	{{ $cms->secondary_color }};
      }
      a.list-group-item-primary:hover, a.list-group-item-primary:focus,
      button.list-group-item-primary:hover,
      button.list-group-item-primary:focus {
        background-color: #d6d7f2;
        color: 	{{ $cms->secondary_color }};
      }
      a.list-group-item-primary.active,
      button.list-group-item-primary.active {
        border-color: 	{{ $cms->secondary_color }};
        background-color: 	{{ $cms->secondary_color }};
        color: 	{{ $cms->secondary_color }};
      }

      .list-group-item.active, .list-group-item.active:hover, .list-group-item.active:focus {
        border-color: 	{{ $cms->secondary_color }};
        background-color: 	{{ $cms->secondary_color }};
      }

      .alert-primary {
        background-color: #e7e7ff;
        border-color: #d2d3ff;
        color: 	{{ $cms->secondary_color }};
      }
      .alert-primary .btn-close {
        background-image: url("data:image/svg+xml,%3Csvg width='150px' height='151px' viewBox='0 0 150 151' version='1.1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'%3E%3Cdefs%3E%3Cpolygon id='path-1' points='131.251657 0 74.9933705 56.25 18.7483426 0 0 18.75 56.2450278 75 0 131.25 18.7483426 150 74.9933705 93.75 131.251657 150 150 131.25 93.7549722 75 150 18.75'%3E%3C/polygon%3E%3C/defs%3E%3Cg id='🎨-%5BSetup%5D:-Colors-&amp;-Shadows' stroke='none' stroke-width='1' fill='none' fill-rule='evenodd'%3E%3Cg id='Artboard' transform='translate(-225.000000, -250.000000)'%3E%3Cg id='Icon-Color' transform='translate(225.000000, 250.500000)'%3E%3Cuse fill='%23696cff' xlink:href='%23path-1'%3E%3C/use%3E%3Cuse fill-opacity='0.5' fill='%23696cff' xlink:href='%23path-1'%3E%3C/use%3E%3C/g%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
      }
      .alert-primary .alert-link {
        color: 	{{ $cms->secondary_color }};
      }
      .card .alert-primary hr {
        background-color: 	{{ $cms->secondary_color }} !important;
      }
      .btn-primary {
        color: #fff;
        background-color: 	{{ $cms->secondary_color }};
        border-color: 	{{ $cms->secondary_color }};
        box-shadow: 0 0.125rem 0.25rem 0 rgba(105, 108, 255, 0.4);
      }
      .btn-outline-primary {
        color: 	{{ $cms->secondary_color }};
        border-color: 	{{ $cms->secondary_color }};
        background: transparent;
      }
      .btn-outline-primary .badge {
        background: 	{{ $cms->secondary_color }};
        border-color: 	{{ $cms->secondary_color }};
        color: #fff;
      }

      .btn-outline-primary:hover .badge,
      .btn-outline-primary:focus:hover .badge,
      .btn-outline-primary:active .badge,
      .btn-outline-primary.active .badge,
      .show > .btn-outline-primary.dropdown-toggle .badge {
        background: #fff;
        border-color: #fff;
        color: 	{{ $cms->secondary_color }};
      }

      .dropdown-item:not(.disabled).active,
      .dropdown-item:not(.disabled):active {
        background-color: rgba(105, 108, 255, 0.08);
        color: 	{{ $cms->secondary_color }} !important;
      }

      .dropdown-menu > li:not(.disabled) > a:not(.dropdown-item):active,
      .dropdown-menu > li.active:not(.disabled) > a:not(.dropdown-item) {
        background-color: rgba(105, 108, 255, 0.08);
        color: 	{{ $cms->secondary_color }} !important;
      }

      .nav .nav-link:hover, .nav .nav-link:focus {
        color: #5f61e6;
      }

      .nav-pills .nav-link.active, .nav-pills .nav-link.active:hover, .nav-pills .nav-link.active:focus {
        background-color: 	{{ $cms->secondary_color }};
        color: #fff;
        box-shadow: 0 2px 4px 0 rgba(105, 108, 255, 0.4);
      }

      .form-control:focus,
      .form-select:focus {
        border-color: 	{{ $cms->secondary_color }};
      }

      .input-group:focus-within .form-control,
      .input-group:focus-within .input-group-text {
        border-color: 	{{ $cms->secondary_color }};
      }

      .form-check-input:focus {
        border-color: 	{{ $cms->secondary_color }};
        box-shadow: 0 2px 4px 0 rgba(105, 108, 255, 0.4);
      }
      .form-check-input:disabled {
        background-color: #eceef1;
      }
      .form-check-input:checked, .form-check-input[type=checkbox]:indeterminate {
        background-color: 	{{ $cms->secondary_color }};
        border-color: 	{{ $cms->secondary_color }};
        box-shadow: 0 2px 4px 0 rgba(105, 108, 255, 0.4);
      }
      .custom-option.checked {
        border: 1px solid 	{{ $cms->secondary_color }};
      }
      .form-control:focus ~ .form-label {
        border-color: 	{{ $cms->secondary_color }};
      }
      .form-control:focus ~ .form-label::after {
        border-color: inherit;
      }
      .divider.divider-primary .divider-text:before, .divider.divider-primary .divider-text:after {
        border-color: 	{{ $cms->secondary_color }};
      }
      .navbar.bg-primary {
        background-color: 	{{ $cms->secondary_color }} !important;
        color: #e0e1ff;
      }
      .navbar.bg-primary .search-input-wrapper .search-input,
      .navbar.bg-primary .search-input-wrapper .search-toggler {
        background-color: 	{{ $cms->secondary_color }} !important;
        color: #e0e1ff;
      }
      .menu.bg-primary {
        background-color: 	{{ $cms->secondary_color }} !important;
        color: #e0e1ff;
      }
      .menu.bg-primary .menu-inner-shadow {
        background: linear-gradient(	{{ $cms->secondary_color }} 41%, rgba(105, 108, 255, 0.11) 95%, rgba(105, 108, 255, 0));
      }
      .footer.bg-primary {
        background-color: 	{{ $cms->secondary_color }} !important;
        color: #e0e1ff;
      }
      .bg-primary.toast .toast-header .btn-close, .bg-primary.bs-toast .toast-header .btn-close {
        background-color: 	{{ $cms->secondary_color }} !important;
        background-image: url("data:image/svg+xml,%3Csvg width='150px' height='151px' viewBox='0 0 150 151' version='1.1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'%3E%3Cdefs%3E%3Cpolygon id='path-1' points='131.251657 0 74.9933705 56.25 18.7483426 0 0 18.75 56.2450278 75 0 131.25 18.7483426 150 74.9933705 93.75 131.251657 150 150 131.25 93.7549722 75 150 18.75'%3E%3C/polygon%3E%3C/defs%3E%3Cg id='🎨-%5BSetup%5D:-Colors-&amp;-Shadows' stroke='none' stroke-width='1' fill='none' fill-rule='evenodd'%3E%3Cg id='Artboard' transform='translate(-225.000000, -250.000000)'%3E%3Cg id='Icon-Color' transform='translate(225.000000, 250.500000)'%3E%3Cuse fill='%23fff' xlink:href='%23path-1'%3E%3C/use%3E%3Cuse fill-opacity='1' fill='%23fff' xlink:href='%23path-1'%3E%3C/use%3E%3C/g%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        box-shadow: 0 0.1875rem 0.375rem 0 rgba(105, 108, 255, 0.4) !important;
      }
      .form-floating > .form-control:not(:-moz-placeholder-shown) ~ label {
        color: 	{{ $cms->secondary_color }};
      }
      .form-floating > .form-control:focus ~ label,
      .form-floating > .form-control:not(:placeholder-shown) ~ label,
      .form-floating > .form-select ~ label {
        color: 	{{ $cms->secondary_color }};
      }
      .form-floating > .form-control:-webkit-autofill ~ label {
        color: 	{{ $cms->secondary_color }};
      }
      .svg-illustration svg {
        fill: 	{{ $cms->secondary_color }};
      }
      html:not([dir=rtl]) .border-primary,
      html[dir=rtl] .border-primary {
        border-color: 	{{ $cms->secondary_color }} !important;
      }
      a {
        color: 	{{ $cms->secondary_color }};
      }
      a:hover {
        color: #787bff;
      }
      .fill-primary {
        fill: 	{{ $cms->secondary_color }};
      }
      .bg-menu-theme .menu-inner .menu-sub > .menu-item.active .menu-icon {
        color: 	{{ $cms->secondary_color }};
      }
      .bg-menu-theme .menu-inner > .menu-item.active > .menu-link {
        color: 	{{ $cms->secondary_color }};
        background-color: rgba(105, 108, 255, 0.16) !important;
      }
      .bg-menu-theme .menu-inner > .menu-item.active:before {
        background: 	{{ $cms->secondary_color }};
      }
      .bg-menu-theme .menu-sub > .menu-item.active > .menu-link:not(.menu-toggle):before {
        background-color: 	{{ $cms->secondary_color }} !important;
        border: 3px solid #e7e7ff !important;
      }
      .app-brand .layout-menu-toggle {
        background-color: 	{{ $cms->secondary_color }};
        border: 7px solid #f5f5f9;
      }
      .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0,0,0);
            background-color: rgba(0,0,0,0.4);
        }

        .modal-content {
          FONT-WEIGHT: 500;
          background-color: #fefefe;
          margin: 15% auto;
          padding: 20px;
          border: 1px solid #888;
          width: 50%;
          margin-right: 200px;
          margin-top: 100px;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
    </head>
    
    <body>
      <div class="layout-wrapper layout-content-navbar">
          <div class="layout-container">
            
            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
              <div class="app-brand demo">
                <a href="{{ url('/dashboard') }}" class="app-brand-link">
                  <span class="app-brand-logo demo">
                    <img style="width:130px" src="{{ asset('/assets/image_content/'. $cms->logo ) }}">
                  </span>
                </a>

                <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                  <i class="bx bx-chevron-left bx-sm align-middle"></i>
                </a>
              </div>

              <div class="menu-inner-shadow"></div>
<!doctype html>

<html
  lang="{{ str_replace('_', '-', app()->getLocale()) }}"
  class="layout-navbar-fixed layout-menu-fixed layout-compact"
  dir="ltr"
  data-skin="default"
  data-assets-path="{{ asset('assets/')}}"
  data-template="vertical-menu-template"
  data-bs-theme="light">
  <meta>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Dashboard | Vuexy</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&ampdisplay=swap"
      rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/iconify-icons.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/node-waves/node-waves.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/pickr/pickr-themes.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/core.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/flag-icons.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/cards-advance.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/swiper/swiper.css')}}" />

    
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/notyf/notyf.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/animate-css/animate.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/dropzone/dropzone.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.css')}}" />

    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/tagify/tagify.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/@form-validation/form-validation.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/bs-stepper/bs-stepper.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/bootstrap-select/bootstrap-select.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/flatpickr/flatpickr.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/nouislider/nouislider.css')}}" />
    @if (request()->routeIs('login') || request()->routeIs('register') || request()->routeIs('verification.notice') || request()->routeIs('password.request') || request()->routeIs('password.reset'))
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-auth.css')}}" />
    @elseif (request()->routeIs('dashboard'))
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css')}}" />
    @endif

    <script src="{{ asset('assets/vendor/js/helpers.js')}}"></script>
    <script src="{{ asset('assets/js/config.js')}}"></script>
  </head>

  <body>


    {{ $slot }}

    

    <script src="{{ asset('assets/vendor/libs/jquery/jquery.js')}}"></script>
    <script src="{{ asset('assets/vendor/libs/popper/popper.js')}}"></script>
    <script src="{{ asset('assets/vendor/js/bootstrap.js')}}"></script>
    <script src="{{ asset('assets/vendor/libs/node-waves/node-waves.js')}}"></script>
    <script src="{{ asset('assets/vendor/libs/@algolia/autocomplete-js.js')}}"></script>
    <script src="{{ asset('assets/vendor/libs/pickr/pickr.js')}}"></script>
    <script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
    <script src="{{ asset('assets/vendor/libs/hammer/hammer.js')}}"></script>
    <script src="{{ asset('assets/vendor/libs/i18n/i18n.js')}}"></script>
    <script src="{{ asset('assets/vendor/js/menu.js')}}"></script>
    <script src="{{ asset('assets/js/main.js')}}"></script>
    <script src="{{ asset('assets/vendor/libs/notyf/notyf.js')}}"></script>
    <script src="{{ asset('assets/vendor/libs/moment/moment.js')}}"></script>
    <script src="{{ asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')}}"></script>
    <script src="{{ asset('assets/vendor/libs/select2/select2.js')}}"></script>
    <script src="{{ asset('assets/vendor/libs/tagify/tagify.js')}}"></script>
    <script src="{{ asset('assets/vendor/libs/@form-validation/popular.js')}}"></script>
    <script src="{{ asset('assets/vendor/libs/@form-validation/bootstrap5.js')}}"></script>
    <script src="{{ asset('assets/vendor/libs/@form-validation/auto-focus.js')}}"></script>
    <script src="{{ asset('assets/vendor/libs/cleave-zen/cleave-zen.js')}}"></script>
    <script src="{{ asset('assets/vendor/libs/dropzone/dropzone.js')}}"></script>
    <script src="{{ asset('assets/js/forms-file-upload.js')}}"></script>
    <script src="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.js')}}"></script>
    <script src="{{ asset('assets/vendor/libs/bs-stepper/bs-stepper.js')}}"></script>
    <script src="{{ asset('assets/vendor/libs/jquery-repeater/jquery-repeater.js')}}"></script>
    <script src="{{ asset('assets/js/forms-extras.js')}}"></script>
    <script src="{{ asset('assets/vendor/libs/bootstrap-select/bootstrap-select.js')}}"></script>
    <script src="{{ asset('assets/vendor/libs/flatpickr/flatpickr.js')}}"></script>
    <script src="{{ asset('assets/vendor/libs/nouislider/nouislider.js')}}"></script>
    <script src="{{ asset('assets/js/forms-pickers.js')}}"></script>


    @if (request()->routeIs('login') || request()->routeIs('register') || request()->routeIs('verification.notice') || request()->routeIs('password.request') || request()->routeIs('password.reset'))
    <script src="{{ asset('assets/js/pages-auth.js')}}"></script>
    @elseif (request()->routeIs('dashboard'))
    <script src="{{ asset('assets/js/dashboards-analytics.js')}}"></script>
    @elseif (request()->routeIs('membres.view'))
    <script src="{{ asset('assets/js/modal-create-app.js')}}"></script>
    <script src="{{ asset('assets/js/app-user-list.js')}}"></script>
    @elseif (request()->routeIs('clients.view'))
    <script src="{{ asset('assets/js/app-client-list.js')}}"></script>
    @elseif (request()->routeIs('clients.new_particulier'))
    <script src="{{ asset('assets/js/new_client_form_particulier.js')}}"></script>
    @elseif ( request()->routeIs('Getstarted.create'))
    <script src="{{ asset('assets/js/Getstarted.js')}}"></script>
    @elseif (request()->routeIs('user.edit'))
    <script src="{{ asset('assets/js/new_client_form_particulier_edit.js')}}"></script>
    @elseif (request()->routeIs('clients.new_entreprise'))
    <script src="{{ asset('assets/js/new_client_form_entreprise.js')}}"></script>
    @elseif (request()->routeIs('dossiers.new_view'))
    <script src="{{ asset('assets/js/new_dossier.js')}}"></script>
    @elseif (request()->routeIs('projets.view'))
    <script src="{{ asset('assets/js/forms-tagify.js')}}"></script>
    @elseif (request()->routeIs('permissions.view'))
    <script src="{{ asset('assets/js/modal-add-role.js')}}"></script>
    @endif


    <script src="{{ asset('assets/js/core.js')}}"></script>

  </body>
</html>

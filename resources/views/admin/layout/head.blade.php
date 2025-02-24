<head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>@yield('title')</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href={{ url("admin/assets/img/favicon/favicon.ico")}} />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&ampdisplay=swap"
      rel="stylesheet" />

    <link rel="stylesheet" href={{ url("admin/assets/vendor/fonts/tabler-icons.css")}} />
    <!-- <link rel="stylesheet" href="../../assets/vendor/fonts/fontawesome.css")}} /> -->
    <!-- <link rel="stylesheet" href="../../assets/vendor/fonts/flag-icons.css")}} /> -->

    <!-- Core CSS -->
    <link rel="stylesheet" href={{ url("admin/assets/vendor/css/rtl/core.css")}} class="template-customizer-core-css" />
    <link rel="stylesheet" href={{ url("admin/assets/vendor/css/rtl/theme-default.css")}} class="template-customizer-theme-css" />
    <link rel="stylesheet" href={{ url("admin/assets/css/demo.css")}} />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href={{ url("admin/assets/vendor/libs/node-waves/node-waves.css")}} />
    <link rel="stylesheet" href={{ url("admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css")}} />

    <!-- Page CSS -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">


    @yield('css')

    <!-- Helpers -->
    <script src={{ url("admin/assets/vendor/js/helpers.js")}}></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    {{-- <script src={{ url("admin/assets/vendor/js/template-customizer.js")}}></script> --}}
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src={{ url("admin/assets/js/config.js")}}></script>


</head>

<!doctype html>
<html lang="en">
<!-- [Head] start -->

<head>
    <title>Home</title>
    <!-- [Meta] -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0,minimal-ui" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="author" content="Codedthemes" />
    <!-- [Favicon] icon -->
    <link rel="icon" href="{{ asset('template/assets/images/favicon.svg') }}" type="image/x-icon" />
    <!-- [Google Font : Public Sans] icon -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@700..700&display=swap" rel="stylesheet" />
    <!-- [phosphor Icons] https://phosphoricons.com/ -->
    <link rel="stylesheet" href="{{asset('template/assets/fonts/phosphor/duotone/style.css')}}" />
    <!-- [Tabler Icons] https://tablericons.com -->
    <link rel="stylesheet" href="{{asset('template/assets/fonts/tabler-icons.min.css')}}" />
    <!-- [Feather Icons] https://feathericons.com -->
    <link rel="stylesheet" href="{{asset('template/assets/fonts/feather.css')}}" />
    <!-- [Font Awesome Icons] https://fontawesome.com/icons -->
    <link rel="stylesheet" href="{{asset('template/assets/fonts/fontawesome.css')}}" />
    <!-- [Material Icons] https://fonts.google.com/icons -->
    <link rel="stylesheet" href="{{asset('template/assets/fonts/material.css')}}" />
    <!-- [Template CSS Files] -->
    <link rel="stylesheet" href="{{ asset('template/assets/css/style.css') }}" id="main-style-link" />
    @livewireStyles
</head><!-- [Head] end -->
<!-- [Body] Start -->

<body data-pc-preset="preset-1" data-pc-sidebar-theme="dark" data-pc-header-theme="light" data-pc-sidebar-caption="true"
    data-pc-direction="ltr" data-pc-theme="light">
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="pc-loader">
            <div class="loader-fill"></div>
        </div>
    </div>
    <!-- [ Pre-loader ] End -->
    <!-- [ Sidebar Menu ] start -->
    @include('layout.sidebar')
    <!-- [ Sidebar Menu ] end -->
    <!-- [ Header Topbar ] start -->

    @include('layout.headbar')
    <!-- [ Header ] end -->
    <!-- [ Main Content ] start -->
    <div class="pc-container">
        <div class="pc-content">
            <!-- [ breadcrumb ] start -->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center g-0">
                        <div class="col-sm-auto">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="javascript: void(0)">Home</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="javascript: void(0)">Dashboard</a>
                                </li>
                                <!-- <li
                                        class="breadcrumb-item"
                                        aria-current="page"
                                    >
                                        Home
                                    </li> -->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->
            <!-- [ Main Content ] start -->
            <div class="row">
                <!-- support-section start -->
                <div class="col-md-12">

                    @yield('content')
                </div>
            </div>
            <!-- [ Main Content ] end -->
        </div>
    </div>
    <!-- [ Main Content ] end -->
    <footer class="pc-footer">
        <div class="footer-wrapper container-fluid">
            <div class="row">
                <div class="col my-1">
                    <p class="m-0">
                        Dashboardkit &#9829; crafted by Team
                        <a href="https://codedthemes.com/" target="_blank">CodedThemes</a>
                    </p>
                </div>

            </div>
        </div>
    </footer>
    <!-- [Page Specific JS] start -->
    <script src="{{asset('template/assets/js/pages/dashboard-default.js')}}"></script>
    <!-- [Page Specific JS] end -->
    <!-- Required Js -->
    @livewireScripts
    @stack('script')

    <script src="{{asset('template/assets/js/plugins/popper.min.js')}}"></script>
    <script src="{{asset('template/assets/js/plugins/simplebar.min.js')}}"></script>
    <script src="{{asset('template/assets/js/plugins/bootstrap.min.js')}}"></script>
    <script src="{{asset('template/assets/js/fonts/custom-font.js')}}"></script>
    <script src="{{asset('template/assets/js/pcoded.js')}}"></script>
    <script src="{{asset('template/assets/js/plugins/feather.min.js')}}"></script>
    <script>
        layout_change("light");
    </script>
    <script>
        layout_sidebar_change("dark");
    </script>
    <!-- --------------------- -->
    <script>
        layout_sidebar_change("dark");
    </script>
    <!-- --------------------- -->
    <script>
        change_box_container("false");
    </script>
    <script>
        layout_caption_change("true");
    </script>
    <script>
        layout_rtl_change("false");
    </script>
    <script>
        preset_change("preset-1");
    </script>
</body>
<!-- [Body] end -->

</html>
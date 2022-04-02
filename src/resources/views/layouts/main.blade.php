<!DOCTYPE html>
<html>

    @include('layouts.head')

    <style type="text/css">
        #footer {
          position: fixed;
          bottom: 0;
          width: 100%;
          height: 3.0rem;
        }
    </style>

    <body class="alt-menu sidebar-noneoverflow">
        <div id="load_screen"> 
            <div class="loader"> 
                <div class="loader-content">
                    <div class="spinner-grow align-self-center"></div>
                </div>
            </div>
        </div>

        <div class="header-container">
            @include('layouts.header')
        </div>

        <div class="main-container" id="container">
            <div class="overlay"></div>
            <div class="search-overlay"></div>

            @include('layouts.topbar')

            <div id="content" class="main-content">
                <div class="layout-px-spacing">

                    <div class="page-header">
                        @include('layouts.breadcrumb')
                    </div>

                    <div class="row layout-top-spacing">
                        @yield('content')
                    </div>

                    <footer id="footer">
                        <div class="footer-wrapper">
                            @include('layouts.footer')
                        </div>
                    </footer>
                </div>
            </div>
        </div>

        @include('layouts.javascript')

    </body>
</html>
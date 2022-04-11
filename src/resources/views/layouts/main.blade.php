<!DOCTYPE html>
<html>

    @include('layouts.head')

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

                    @yield('content')

                    <footer id="">
                        <div class="footer-wrapper" style="font-weight: 1000;">
                            @include('layouts.footer')
                        </div>
                    </footer>
                </div>
            </div>
        </div>

        @include('layouts.javascript')

    </body>
</html>
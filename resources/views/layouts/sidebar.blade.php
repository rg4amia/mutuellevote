<div class="sidebar-wrapper">
    <div>
        <div class="logo-wrapper"><a href="#">
                <img class="for-light" src="{{ asset('images/mudts.png') }}" height="50" alt="looginpage">
                <img class="for-dark" src="{{ asset('images/mudts.png') }}" height="50" alt="looginpage">
            </a>
            <div class="back-btn"><i class="fa fa-angle-left"></i></div>
            <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
        </div>
        <div class="logo-icon-wrapper"><a href="index.html"><img class="img-fluid" src="assets_admin/images/logo/logo-icon.png" alt=""></a></div>
        <nav class="sidebar-main">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar">
                    <li class="back-btn"><a href="index.html"><img class="img-fluid" src="assets_admin/images/logo/logo-icon.png" alt=""></a>
                        <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
                    </li>
                    <li class="sidebar-main-title">
                        <div>
                            <h6 class="lan-1">General</h6>
                            <p class="lan-2">Information generale</p>
                        </div>
                    </li>
                    <li class="sidebar-list">
                        {{--<label class="badge badge-success">2</label>--}}
                        <a class="sidebar-link sidebar-title" href="#">
                            <i data-feather="home"></i>
                            <span class="lan-3">
                                Importation
                            </span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li><a class="lan-4" href="{{ route('admin.import') }}">Importer</a></li>
                            <li><a class="lan-5" href="dashboard-02.html">Importer</a></li>
                        </ul>
                    </li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i data-feather="airplay"></i><span class="lan-6">Widgets  ooo</span></a>
                        <ul class="sidebar-submenu">
                            <li><a href="general-widget.html">General</a></li>
                            <li><a href="chart-widget.html">Chart</a></li>
                        </ul>
                    </li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i data-feather="layout"></i><span class="lan-7">Page layout</span></a>
                        <ul class="sidebar-submenu">
                            <li><a href="box-layout.html">Boxed</a></li>
                            <li><a href="layout-rtl.html">RTL</a></li>
                            <li><a href="layout-dark.html">Dark Layout</a></li>
                            <li><a href="hide-on-scroll.html">Hide Nav Scroll</a></li>
                            <li><a href="footer-light.html">Footer Light</a></li>
                            <li><a href="footer-dark.html">Footer Dark</a></li>
                            <li><a href="footer-fixed.html">Footer Fixed</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </nav>
    </div>
</div>

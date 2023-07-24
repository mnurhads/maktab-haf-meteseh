<div class="mobile-menu-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="mobile-menu">
                    <nav id="dropdown">
                        <ul class="mobile-menu-nav">
                            <li><a data-toggle="collapse" data-target="#Charts" href="#">Home</a>
                                <ul class="collapse dropdown-header-top">
                                    <li><a href="<?= $log->baseUrl() ?>/admin/dash">Dashboard</a></li>
                                </ul>
                            </li>
                            <li><a data-toggle="collapse" data-target="#demoevent" href="#">Sektor</a>
                                <ul id="demoevent" class="collapse dropdown-header-top">
                                    <li><a href="<?= $log->baseUrl() ?>/admin/sektor">Sektor</a></li>
                                </ul>
                            </li>
                            <li><a data-toggle="collapse" data-target="#demoevent" href="#">Koordinator</a>
                                <ul id="demoevent" class="collapse dropdown-header-top">
                                    <li><a href="<?= $log->baseUrl() ?>/admin/co">Koordinator</a></li>
                                </ul>
                            </li>
                            <li><a data-toggle="collapse" data-target="#democrou" href="#">Maktab</a>
                                <ul id="democrou" class="collapse dropdown-header-top">
                                    <li><a href="<?= $log->baseUrl() ?>/admin/maktab">Maktab</a></li>
                                </ul>
                            </li>
                            <li><a data-toggle="collapse" data-target="#Pagemob" href="#"><?= ucwords($_SESSION['username']); ?></a>
                                <ul id="Pagemob" class="collapse dropdown-header-top">
                                    <li><a href="<?= $log->baseUrl() ?>/admin/profil">My Profil</a>
                                    </li>
                                    <li><a href="<?= $log->baseUrl() ?>/auth/logout">Logout</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Mobile Menu end -->
<!-- Main Menu area start-->
<div class="main-menu-area mg-tb-40">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <ul class="nav nav-tabs notika-menu-wrap menu-it-icon-pro">
                    <li class="active"><a data-toggle="tab" href="#Home"><i class="notika-icon notika-house"></i> Home</a>
                    </li>
                    <li><a data-toggle="tab" href="#mailbox"><i class="notika-icon notika-mail"></i> Sektor</a>
                    </li>
                    <li><a data-toggle="tab" href="#koordi"><i class="notika-icon notika-support"></i> Koordinator</a>
                    </li>
                    <li><a data-toggle="tab" href="#Interface"><i class="notika-icon notika-edit"></i> Maktab</a>
                    </li>
                    <li><a data-toggle="tab" href="#Page"><i class="notika-icon notika-support"></i> <?= ucwords($_SESSION['username']); ?></a>
                    </li>
                </ul>
                <div class="tab-content custom-menu-content">
                    <div id="Home" class="tab-pane in active notika-tab-menu-bg animated flipInX">
                        <ul class="notika-main-menu-dropdown">
                            <li><a href="<?= $log->baseUrl() ?>/admin/dash">Dashboard</a>
                            </li>
                        </ul>
                    </div>
                    <div id="mailbox" class="tab-pane notika-tab-menu-bg animated flipInX">
                        <ul class="notika-main-menu-dropdown">
                            <li><a href="<?= $log->baseUrl() ?>/admin/sektor">Sektor</a>
                            </li>
                        </ul>
                    </div>
                    <div id="koordi" class="tab-pane notika-tab-menu-bg animated flipInX">
                        <ul class="notika-main-menu-dropdown">
                            <li><a href="<?= $log->baseUrl() ?>/admin/co">Koordinator</a>
                            </li>
                        </ul>
                    </div>
                    <div id="Interface" class="tab-pane notika-tab-menu-bg animated flipInX">
                        <ul class="notika-main-menu-dropdown">
                            <li><a href="<?= $log->baseUrl() ?>/admin/maktab">Maktab</a>
                            </li>
                        </ul>
                    </div>
                    <div id="Page" class="tab-pane notika-tab-menu-bg animated flipInX">
                        <ul class="notika-main-menu-dropdown">
                            <li><a href="<?= $log->baseUrl() ?>/admin/profil">My Profil</a>
                            </li>
                            <li><a href="<?= $log->baseUrl() ?>/auth/logout">Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Main Menu area End-->
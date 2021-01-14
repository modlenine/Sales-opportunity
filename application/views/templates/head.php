<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="msapplication-tap-highlight" content="no">

    <link rel="shortcut icon" type="image/x-icon" href="slc.ico">



    <link href="<?= base_url() ?>main.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/custom.css" type="text/css" />

    <!-- Import html theme file -->
    <link rel="stylesheet" href="<?= base_url() ?>style.css" type="text/css" />


    <!-- DataTable -->
    <link href="<?= base_url() ?>assets/css/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="<?= base_url() ?>assets/js/datatables/jquery-3.5.1.js"></script>
    <script src="<?= base_url() ?>assets/js/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>assets/js/datatables/dataTables.bootstrap4.min.js"></script>
    <!-- DataTable -->

    <!-- jQuery Control + Function -->
    <script type="text/javascript" src="<?= base_url() ?>assets/js/function.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/js/control.js"></script>
    <!-- jQuery Control + Function -->

    <!-- Icon -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/fonts/et-line.css" type="text/css" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/fonts/font-icons.css" type="text/css" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/fonts/font-icons2.css" type="text/css" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/fonts/medical-icons.css" type="text/css" />
    <!-- Icon -->

    <!-- Tiny Editer -->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>simditor/site/assets/styles/simditor.css" />
    <script type="text/javascript" src="<?= base_url() ?>simditor/site/assets/scripts/module.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>simditor/site/assets/scripts/hotkeys.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>simditor/site/assets/scripts/uploader.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>simditor/site/assets/scripts/simditor.js"></script>


    <!-- Chart -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/series-label.js"></script>
    <script src="https://code.highcharts.com/modules/variable-pie.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>



    <style>
        /* thai */
        @font-face {
            font-family: 'Sarabun';
            font-style: normal;
            font-weight: 400;
            font-display: swap;
            src: local('Sarabun Regular'), local('Sarabun-Regular'), url(<?= base_url('assets/fonts/DtVjJx26TKEr37c9aAFJn2QN.woff2') ?>) format('woff2');
            unicode-range: U+0E01-0E5B, U+200C-200D, U+25CC;
        }

        /* vietnamese */
        @font-face {
            font-family: 'Sarabun';
            font-style: normal;
            font-weight: 400;
            font-display: swap;
            src: local('Sarabun Regular'), local('Sarabun-Regular'), url(<?= base_url('assets/fonts/DtVjJx26TKEr37c9aBpJn2QN.woff2') ?>) format('woff2');
            unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+1EA0-1EF9, U+20AB;
        }

        /* latin-ext */
        @font-face {
            font-family: 'Sarabun';
            font-style: normal;
            font-weight: 400;
            font-display: swap;
            src: local('Sarabun Regular'), local('Sarabun-Regular'), url(<?= base_url('assets/fonts/DtVjJx26TKEr37c9aBtJn2QN.woff2') ?>) format('woff2');
            unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
        }

        /* latin */
        @font-face {
            font-family: 'Sarabun';
            font-style: normal;
            font-weight: 400;
            font-display: swap;
            src: local('Sarabun Regular'), local('Sarabun-Regular'), url(<?= base_url('assets/fonts/DtVjJx26TKEr37c9aBVJnw.woff2') ?>) format('woff2');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
        }

        * {
            font-family: 'Sarabun', sans-serif;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        label {
            font-family: 'Sarabun', sans-serif !important;
        }

        body {
            font-size: .85rem !important;
        }

        .form-control {
            font-size: .85rem !important;
        }

        .process-steps li h5 {
            font-size: .85rem !important;
        }

        .col-search-input {
            width: 100% !important;
        }

        table {
            margin: 0 auto;
            width: 100%;
            clear: both;
            border-collapse: collapse;
            table-layout: fixed; 
            word-wrap: break-word;
        }
    </style>
</head>
<?= getModal() ?>


<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        <!-- Main div -->



        <div class="app-header header-shadow">
            <!-- Top nav -->

            <!-- Logo Zone -->
            <div class="app-header__logo">
                <div class="logo-src"></div>
                <div class="header__pane ml-auto">
                    <div>
                        <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Logo Zone -->


            <!-- Mobile Menu -->
            <div class="app-header__mobile-menu">
                <div>
                    <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
            <!-- Mobile Menu -->


            <!-- Header menu -->
            <div class="app-header__menu">
                <span>
                    <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                        <span class="btn-icon-wrapper">
                            <i class="fa fa-ellipsis-v fa-w-6"></i>
                        </span>
                    </button>
                </span>
            </div>
            <!-- Header menu -->



            <div class="app-header__content">
                <!-- Header Content -->
                <div class="app-header-left">
                </div>
                <div class="app-header-right">
                    <div class="header-btn-lg pr-0">
                        <div class="widget-content p-0">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="btn-group">
                                        <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
                                            <img width="42" class="rounded-circle" src="<?= linkImg(getUser()->file_img) ?>" alt="">
                                            <!-- <i class="fa fa-angle-down ml-2 opacity-8"></i> -->
                                        </a>
                                        <!-- <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                                            <button type="button" tabindex="0" class="dropdown-item">User Account</button>
                                            <button type="button" tabindex="0" class="dropdown-item">Settings</button>
                                            <h6 tabindex="-1" class="dropdown-header">Header</h6>
                                            <button type="button" tabindex="0" class="dropdown-item">Actions</button>
                                            <div tabindex="-1" class="dropdown-divider"></div>
                                            <button type="button" tabindex="0" class="dropdown-item">Dividers</button>
                                        </div> -->
                                    </div>
                                </div>
                                <div class="widget-content-left  ml-3 header-user-info">
                                    <div class="widget-heading">
                                        <?= getUser()->Fname . " " . getUser()->Lname ?>
                                    </div>
                                    <div class="widget-subheading">
                                        <?= getUser()->ecode ?>
                                    </div>
                                </div>
                                <div class="widget-content-right header-user-info ml-3">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- Header Content -->
        </div><!-- Top nav -->



        <!-- Setting Option -->
        <div class="ui-theme-settings">
            <div class="theme-settings__inner">
                <div class="scrollbar-container">

                </div>
            </div>
        </div>
        <!-- Setting Option -->



        <div class="app-main">
            <div class="app-sidebar sidebar-shadow">
                <div class="app-header__logo">
                    <div class="logo-src"></div>
                    <div class="header__pane ml-auto">
                        <div>
                            <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="app-header__mobile-menu">
                    <div>
                        <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
                <div class="app-header__menu">
                    <span>
                        <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                            <span class="btn-icon-wrapper">
                                <i class="fa fa-ellipsis-v fa-w-6"></i>
                            </span>
                        </button>
                    </span>
                </div>
                <div class="scrollbar-sidebar">
                    <div class="app-sidebar__inner">
                        <ul class="vertical-nav-menu">
                            <input hidden type="text" name="checkPage" id="checkPage" value="<?= $this->uri->segment(1) ?>">
                            <li class="app-sidebar__heading">Dashboards</li>
                            <li>
                                <a id="mainpage" href="<?= base_url() ?>" class="">
                                    <i class="metismenu-icon icon-dashboard" style="color:#FF9900;"></i>
                                    Dashboard
                                </a>
                            </li>

                            <li class="app-sidebar__heading">Projects Menu</li>
                            <li>
                                <a id="listpage" href="<?= base_url('projectlist.html') ?>" class="">
                                    <i class="metismenu-icon icon-list-alt2" style="color:#FF9900;"></i>
                                    Opportunity List
                                </a>
                            </li>
                            <li>
                                <a id="listpage" href="<?= base_url('report.html') ?>" class="">
                                    <i class="metismenu-icon icon-archive1" style="color:#FF9900;"></i>
                                    Opportunity Report
                                </a>
                            </li>

                            <li class="app-sidebar__heading">Customer Menu</li>
                            <li>
                                <a id="listpage" href="<?= base_url('cusvisit_list.html') ?>" class="">
                                    <i class="metismenu-icon icon-child" style="color:#006400;"></i>
                                    Customers Visit
                                </a>
                            </li>



                            <li class="app-sidebar__heading">User Menu</li>
                            <!-- <li>
                                <a href="javascript:void(0)">
                                    <i class="metismenu-icon icon-user21" style="color:seagreen;"></i>
                                    Profile
                                </a>
                            </li> -->
                            <li>
                                <a href="<?= base_url('login/logout') ?>" onclick="confirm('คุณต้องการออกจากระบบใช่หรือไม่')">
                                    <i class="metismenu-icon icon-signout" style="color:red;"></i>
                                    Logout
                                </a>
                            </li>

                            <li class="app-sidebar__heading">Setting Menu</li>
                            <li>
                                <a href="javascript:void(0)">
                                    <i class="metismenu-icon icon-user-cog" style="color:#696969;"></i>
                                    User Setting
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <i class="metismenu-icon icon-user-tag" style="color:#696969;"></i>
                                    User Log
                                </a>
                            </li>
                            <!-- <li>
                                <a href="<?= base_url('login/logout') ?>" onclick="confirm('คุณต้องการออกจากระบบใช่หรือไม่')">
                                    <i class="metismenu-icon icon-signout" style="color:red;"></i>
                                    Logout
                                </a>
                            </li> -->
                            <!-- <li class="app-sidebar__heading">Forms</li>
                                <li>
                                    <a href="forms-controls.html">
                                        <i class="metismenu-icon pe-7s-mouse">
                                        </i>Forms Controls
                                    </a>
                                </li>
                                <li>
                                    <a href="forms-layouts.html">
                                        <i class="metismenu-icon pe-7s-eyedropper">
                                        </i>Forms Layouts
                                    </a>
                                </li>
                                <li>
                                    <a href="forms-validation.html">
                                        <i class="metismenu-icon pe-7s-pendrive">
                                        </i>Forms Validation
                                    </a>
                                </li> -->


                            <!-- <li class="app-sidebar__heading">Charts</li>
                                <li>
                                    <a href="charts-chartjs.html">
                                        <i class="metismenu-icon pe-7s-graph2">
                                        </i>ChartJS
                                    </a>
                                </li> -->

                        </ul>
                    </div>
                </div>
            </div>
            <div class="app-main__outer">
                <!-- Content Section -->
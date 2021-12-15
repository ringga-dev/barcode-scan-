<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8">
    <title>PT Etowa Packaging Indonesia - User</title>
    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/tamplate/vendors/styles/core.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/tamplate/vendors/styles/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/tamplate/vendors/styles/style.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/style/jquery.dataTables.min.css">


    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-119386393-1');
    </script>
    <!-- js -->
    <script src="<?= base_url() ?>/tamplate/vendors/scripts/core.js"></script>
    <script src="<?= base_url() ?>/tamplate/vendors/scripts/script.min.js"></script>
    <script src="<?= base_url() ?>/tamplate/vendors/scripts/process.js"></script>
    <script src="<?= base_url() ?>/tamplate/vendors/scripts/layout-settings.js"></script>
    <script src="<?= base_url('style') ?>/lottie-player.js"></script>



    </body>
</head>

<body>
    <div class="pre-loader">
        <div class="pre-loader-box">
            <lottie-player src="<?= base_url('suara') ?>/67893-load-to-check.json" background="transparent" speed="1" style="width: 500px; height: 500px;" loop autoplay></lottie-player>
            <div class='loader-progress' id="progress_div">
                <div class='bar' id='bar1'></div>
            </div>
            <div class='percent' id='percent1'>0%</div>
            <div class="loading-text">
                Loading...
            </div>
        </div>
    </div>



    <div class="header">
        <div class="header-left">
            <div class="menu-icon dw dw-menu"></div>
        </div>

        <div class="header-right">


            <div class="user-info-dropdown mr-2">
                <div class="dropdown">
                    <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                        <span class="user-icon">
                            <img src="<?= base_url() ?>/tamplate/vendors/images/photo1.jpg" alt="">
                        </span>
                        <span class="user-name"><?= session()->get('user') ?></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">

                        <a class="dropdown-item" href="<?= base_url('auth/logout') ?>"><i class="dw dw-logout"></i> Log Out</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="left-side-bar">

        <div class="menu-block customscroll">
            <div class="sidebar-menu">
                <ul id="accordion-menu">
                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon dw dw-house-1"></span><span class="mtext">Home</span>
                        </a>
                        <ul class="submenu">
                            <li><a href="<?= site_url('home') ?>">Home</a></li>
                            <?php if (session()->get('stts') == 2) { ?>
                                <li><a href="<?= site_url('home/company') ?>">Company</a></li>
                                <li><a href="<?= site_url('home/produc') ?>">Daftar Produk</a></li>
                                <li><a href="<?= base_url('home/post_list') ?>">List Report</a></li>
                            <?php } elseif (session()->get('stts') == 1) { ?>
                                <li><a href="<?= base_url('home/data_master') ?>">Master Data</a></li>
                                <li><a href="<?= base_url('home/data_staff') ?>">Staff</a></li>
                                <li><a href="<?= base_url('home/post_list') ?>">List Report Staff</a></li>
                            <?php } ?>
                        </ul>
                    </li>

                    <li>
                        <div class="sidebar-small-cap">User</div>
                    </li>

                    <li>
                        <a href="<?= base_url('auth/logout') ?>" class="dropdown-toggle no-arrow">
                            <span class="micon dw dw-paper-plane1"></span>
                            <span class="mtext">Log Out <img src="<?= base_url() ?>/tamplate/vendors/images/coming-soon.png" alt="" width="25"></span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="mobile-menu-overlay"></div>

    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header bg-secondary">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4><?= session()->get('user') ?></h4>
                            </div>
                            <div class="notif">
                                <?php if (session()->getFlashdata('pesan')) : ?>
                                    <?= session()->getFlashdata('pesan') ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pd-20 bg-secondary border-radius-4 box-shadow mb-30">
                    <?= $this->renderSection('conten'); ?>
                </div>
            </div>
            <div class="footer-wrap pd-20 mb-20 card-box bg-secondary">
                Bootstrap 4 Admin Template By <b> Etowa Packaging Indonesia</b>
            </div>
        </div>
    </div>

    <!-- add sweet alert js & css in footer -->
    <script src="<?= base_url() ?>/tamplate/src/plugins/sweetalert2/sweetalert2.all.js"></script>
    <script src="<?= base_url() ?>/tamplate/src/plugins/sweetalert2/sweet-alert.init.js"></script>

    <script src="<?= base_url() ?>/style/jquery.dataTables.min.js"></script>
    <!-- js -->
    <!-- <script src="<?= base_url() ?>/tamplate/src/plugins/jQuery-Knob-master/jquery.knob.min.js"></script>
    <script src="<?= base_url() ?>/tamplate/src/plugins/highcharts-6.0.7/code/highcharts.js"></script>
    <script src="<?= base_url() ?>/tamplate/src/plugins/highcharts-6.0.7/code/highcharts-more.js"></script>
    <script src="<?= base_url() ?>/tamplate/src/plugins/jvectormap/jquery-jvectormap-2.0.3.min.js"></script>
    <script src="<?= base_url() ?>/tamplate/src/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="<?= base_url() ?>/tamplate/vendors/scripts/dashboard2.js"></script> -->
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });

        $(document).ready(function() {
            $('#myTabel').DataTable();
        });
    </script>

</body>

</html>
<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8">
    <title>PT Etowa Packaging Indonesia - LOGIN</title>

    <!-- Site favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="vendors/images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="vendors/images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="vendors/images/favicon-16x16.png">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/tamplate/vendors/styles/core.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/tamplate/vendors/styles/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/tamplate/vendors/styles/style.css">

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
</head>

<body class="login-page">
    <div class="login-header box-shadow">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <div class="brand-logo">
                <a href="login.html">
                    <h1 style="color: blue;">
                        PT Etowa Packaging Indonesia</h1>
                </a>
            </div>
            <?php if (session()->getFlashdata('pesan')) : ?>
                <?= session()->getFlashdata('pesan') ?>
            <?php endif; ?>

        </div>
    </div>
    <div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
        <div class="container">


            <div class="row align-items-center">
                <div class="col-md-6 col-lg-7">
                    <img src="<?= base_url() ?>/tamplate/vendors/images/login-page-img.png" alt="">
                </div>
                <div class="col-md-6 col-lg-5">
                    <div class="login-box bg-white box-shadow border-radius-10">
                        <div class="login-title">
                            <h2 class="text-center text-primary">Login My App</h2>
                        </div>


                        <form action="<?= base_url('auth/cek_data') ?>" method="POST">
                            <div class="select-role">
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    <label class="btn active">
                                        <input type="radio" name="options" id="admin" active>
                                        <div class="icon"><img src="<?= base_url() ?>/tamplate/vendors/images/briefcase.svg" class="svg" alt=""></div>
                                        <span>I'm</span>
                                        Staff
                                    </label>

                                </div>
                            </div>
                            <div class="input-group custom">
                                <input type="text" class="form-control form-control-lg" placeholder="Username" name="name" id="name" required>
                                <div class="invalid-feedback">
                                    Please choose a username.
                                </div>
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
                                </div>
                            </div>
                            <div class="input-group custom">
                                <input type="password" class="form-control form-control-lg" placeholder="**********" name="pass" id="pass" required>
                                <div class="invalid-feedback">
                                    Please choose a password.
                                </div>
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="input-group mb-0">

                                        <button class="btn btn-primary btn-lg btn-block" id="button" type="submit">Sign In</button>
                                    </div>
                                    <div class="font-16 weight-600 pt-10 pb-10 text-center" data-color="#707373">Login User Staff</div>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- js -->

    <script src="<?= base_url() ?>/tamplate/vendors/scripts/core.js"></script>
    <script src="<?= base_url() ?>/tamplate/vendors/scripts/script.min.js"></script>
    <script src="<?= base_url() ?>/tamplate/vendors/scripts/process.js"></script>
    <script src="<?= base_url() ?>/tamplate/vendors/scripts/layout-settings.js"></script>
    <script>
        $(document).ready(function() {
            $("#name").on("change keyup paste", function() {
                $("#name").removeClass("is-invalid")
                $('#name').addClass('form-control-success')
            })
            $("#pass").on("change keyup paste", function() {
                $("#pass").removeClass("is-invalid")
                $('#pass').addClass('form-control-success')
            })

            $("#button").click(function() {
                var nama = $("#name").val();
                var pass = $("#pass").val();

                if (!name & !pass) {
                    $("#name").addClass("is-invalid");
                    $("#pass").addClass("is-invalid");
                } else if (!nama) {
                    $("#name").addClass("is-invalid");
                } else if (pass) {
                    $("#pass").addClass("is-invalid");
                }
            })
        })

        window.setTimeout(function() {
            $('.alert').fadeTo(1500, 0).sliceUp(15000, function() {
                $(this).remove()
            }, 15000)
        })
    </script>
</body>

</html>
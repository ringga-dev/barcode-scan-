<?= $this->extend('auth/tamplate'); ?>
<?= $this->section('conten'); ?>


<div class="pd-20 bg-secondary border-radius-4 box-shadow mb-30 bg-info">
    <div class="row">
        <div class="col-lg  mb-2 mx-auto">
            <div class="card  card-box  ">
                <div class="card-img" alt="Card image">
                    <div class="card-img" alt="Card image"></div>
                    <h4 class="weight-700 text-center"><?= $pro['name_com'] ?></h4>
                    <h5 class="mt-3 text-center">Nama Produk : <?= $pro['name_produc'] ?></h5>
                    <h4 class="mt-3 text-center">Code : <?= $pro['code'] ?></h4>
                </div>
            </div>
        </div>

        <div class="col-lg  mb-2 mx-auto">
            <input type="text" name="user_id" id="user_id" value="<?= session()->get('id') ?>" hidden>
            <input type="text" name="id_user" id="id_produc" value="<?= $pro['id'] ?>" hidden>
        </div>

    </div>


</div>

<div class="row">
    <div class="col-md-6 col-lg-6">
        <div class="login-box bg-white box-shadow border-radius-10">
            <form>
                <div class="input-group custom">
                    <input type="text" class="form-control form-control-lg" placeholder="Code" name="code" id="code" required autofocus>
                    <div class="invalid-feedback">
                        Please choose a Code.
                    </div>
                    <div class="input-group-append custom">
                        <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="input-group mb-0">
                            <a class="btn btn-info btn-lg btn-block" id="button">Cek</a>
                            <a class="btn btn-warning btn-lg btn-block" id="reset">Reset</a>
                            <a class="btn btn-success btn-lg btn-block" id="import">Import Data Scan </a>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="col-md-6 col-lg-6">
        <div class="login-box bg-white box-shadow border-radius-10">
            <div class="login-title">
                <h2 class="text-center text-success">Scan: <label id="jumlah">0</label>
                </h2>
                <h3 class="text-center text-danger">Total Perpack: <label id="total"><?= $pro['jbl_pack'] ?></label>
                </h3>
                <h3 class="text-center text-warning">Jumlah Ikatan: <label id="ikatan">0</label>
                </h3>
                <div class="text-center text-warning">
                    <div class="row ">
                        <a type="submit" class="badge badge-info sm col-lg-3" id="kurang"><i class="fa fa-window-minimize fa-2x"></i> </a>
                        <h1 class="col-lg-6" id="total-scan">0</h1>
                        <a class="badge badge-info sm col-lg-3" type="submit" id="tambah"><i class="fa fa-plus fa-2x"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {

        $('#kurang').on('click', function(e) {
            const scan = $("#total-scan").text();
            if (scan > 0) {
                let totalScan = parseInt(scan) - 1;
                $("#total-scan").text(`${totalScan}`);
            }
        })

        $('#tambah').on('click', function(e) {
            const scan = $("#total-scan").text();
            let totalScan = parseInt(scan) + 1;
            $("#total-scan").text(`${totalScan}`);
        })



        $("#import").on('click', function(e) {
            e.preventDefault()
            const scan = $("#total-scan").text();
            const user_id = $("#user_id").val();
            const id_produc = $("#id_produc").val();
            // if (user_id && id_produc) {
            //     console.log(`data ada ${user_id}`)
            // }
            if (scan > 0) {
                $.ajax({
                    type: "post",
                    url: "<?= site_url('home/save_job') ?>",
                    data: {
                        'admin_id': parseInt(user_id),
                        'produc_id': parseInt(id_produc),
                        'jumlah': parseInt(scan),
                    },
                    dataType: "json",
                    beforeSend: function() {
                        $('#import').attr('disable', 'disabled')
                        $('#import').html('<i class="fas fa-sponner fa-pulse"></i>')
                    },
                    complete: function() {
                        $('#import').attr('disable', 'disabled')
                        $('#import').html('Import Data Scan')
                    },
                    success: function(response) {
                        console.log(response)
                        if (response.data == true) {
                            pesanAlert("data sudah di simpan, silahkan di cek pada report!")
                            bunyi("ok")
                            $("#jumlah").text(`0`)
                            $("#ikatan").text(`0`)
                            $("#total-scan").text(`0`)
                        }

                    },
                    error: function(xhr, opsi, errors) {
                        console.log(xhr.status + "\n" + xhr.responseText + "\n" + errors);
                    }
                });
            } else {
                bunyi("scan")
            }

        })

        $("#code").on("change keyup paste", function() {
            $("#code").removeClass("is-invalid")
            $('#code').addClass('form-control-success')
        })

        $(document).on('keypress', function(e) {
            if (e.which == 13) {
                var code = $("#code").val();

                if (!code) {
                    $("#code").addClass("is-invalid");
                } else {
                    cek_data(code)
                }

            }
        });

        $("#button").on('click', function() {
            var code = $("#code").val();
            if (!code) {
                $("#code").addClass("is-invalid");
            } else {
                cek_data(code)
            }
        })

        $('#reset').on('click', function() {
            let jumlah = $('#jumlah').text();

            if (parseInt(jumlah) == 0) {
                $('.notif').prepend("<div class='alert alert-danger alert-dismissible fade show' role='alert' id='error'> <strong> anda belum melakukan scan satupun!</strong> <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>")
                bunyi("scan")
            } else {
                $("#jumlah").text(`0`);
                $(".alert").remove();

                const nilai = $("#ikatan").text();
                let data = parseInt(nilai) + 1;
                $("#ikatan").text(`${data}`);
                $('.notif').prepend("<div class='alert alert-success alert-dismissible fade show' role='alert' id='error'> <strong> Data sudah di ikat!</strong> <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>")
                bunyi("ikat")
                SetFocus()
            }

        })


        function cek_data(code) {
            let codeProduk = "<?= $pro['code'] ?>";
            let ikatan = <?= $pro['jbl_pack'] ?>;
            $(".alert").remove();

            if (code == codeProduk) {
                const nilai = $("#jumlah").text();
                const scan = $("#total-scan").text();
                if (nilai >= ikatan) {
                    $('.notif').prepend("<div class='alert alert-warning alert-dismissible fade show' role='alert' id='error'> <strong> Barang Sudah Dapat Di Ikat</strong> <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>")
                    bunyi("siap")
                } else {
                    let totalScan = parseInt(scan) + 1;
                    let data = parseInt(nilai) + 1;
                    $("#total-scan").text(`${totalScan}`)
                    $("#jumlah").text(`${data}`);
                    bunyi("ok")
                    $('.notif').prepend("<div class='alert alert-success alert-dismissible fade show' role='alert' id='error'> <strong> DATA OK </strong> <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>")
                }

            } else {
                $('.notif').prepend("<div class='alert alert-danger alert-dismissible fade show' role='alert' id='error'> <strong> DATA SALAH </strong> <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>")
                bunyi("error")
            }
            $("#code").val("");
        }

        function bunyi(data) {
            var ok = new Audio("<?= site_url('suara/ok.mp3') ?>");
            var siap = new Audio("<?= site_url('suara/siap.mp3') ?>");
            var error = new Audio("<?= site_url('suara/wrong.mp3') ?>");
            var scan = new Audio("<?= site_url('suara/scan.mp3') ?>");
            var ikat = new Audio("<?= site_url('suara/ikat.mp3') ?>");

            if (data == "ok") {
                ok.play();
            } else if (data == "siap") {
                siap.play()
            } else if (data == "error") {
                error.play()
            } else if (data == "scan") {
                scan.play()
            } else if (data == "ikat") {
                ikat.play()
            }

        }

        function SetFocus() {
            var input = document.getElementById("code");
            input.focus();
        }

        function pesanAlert(pesan) {
            swal({
                title: 'Good job!',
                text: pesan,
                type: 'success',
                showCancelButton: true,
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger'
            })
        }
    })
</script>
<?= $this->endSection() ?>
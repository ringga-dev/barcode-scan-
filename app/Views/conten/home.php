<?= $this->extend('auth/tamplate'); ?>
<?= $this->section('conten'); ?>

<div class="row pb-10">
    <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
        <div class="card-box height-100-p widget-style3">
            <div class="d-flex flex-wrap">
                <div class="widget-data">
                    <div class="weight-700 font-24 text-dark" id="jam">75</div>
                    <div class="font-14 text-secondary weight-500">Waktu sekarang</div>
                </div>
                <div class="widget-icon">
                    <div class="icon" data-color="#00eccf"><i class="icon-copy dw dw-24-hours"></i></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
        <div class="card-box height-100-p widget-style3">
            <div class="d-flex flex-wrap">
                <div class="widget-data">
                    <div class="weight-700 font-24 text-dark" id="tanggalwaktu"></div>
                    <div class="font-14 text-secondary weight-500">Tanggal Sekarang</div>
                </div>
                <div class="widget-icon">
                    <div class="icon" data-color="#ff5b5b"><i class="icon-copy dw dw-calendar-1"></i></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
        <div class="card-box height-100-p widget-style3">
            <div class="d-flex flex-wrap">
                <div class="widget-data">
                    <div class="weight-700 font-24 text-dark" id="hari"></div>
                    <div class="font-14 text-secondary weight-500">Hari ini</div>
                </div>
                <div class="widget-icon">
                    <div class="icon"><i class="icon-copy dw dw-calendar"></i></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
        <div class="card-box height-100-p widget-style3">
            <div class="d-flex flex-wrap">
                <div class="widget-data">
                    <div class="weight-700 font-24 text-dark"><?= $com ?></div>
                    <div class="font-14 text-secondary weight-500">Jumlah User</div>
                </div>
                <div class="widget-icon">
                    <div class="icon" data-color="#09cc06"><i class="icon-copy dw dw-user-2"></i></div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    // 1 detik = 1000
    window.setTimeout("waktu()", 1000);

    function waktu() {
        var tanggal = new Date();
        setTimeout("waktu()", 1000);
        var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum&#39;at', 'Sabtu'];
        document.getElementById("jam").innerHTML = tanggal.getHours() + ":" + tanggal.getMinutes() + ":" + tanggal.getSeconds();
        document.getElementById("tanggalwaktu").innerHTML = tanggal.getDate() + "-" + tanggal.getMonth() + "-" + tanggal.getFullYear()
        document.getElementById("hari").innerHTML = myDays[tanggal.getDay()]
    }
</script>

<?= $this->endSection() ?>
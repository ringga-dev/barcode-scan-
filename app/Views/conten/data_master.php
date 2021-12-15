<?= $this->extend('auth/tamplate'); ?>
<?= $this->section('conten'); ?>

<!-- Button trigger modal -->

<div class="row bg-info m-2 p-2">

    <div class="col-md-6 col-lg-4">

        <div class="clearfix">
            <div class="pull-right">
                <button type="button" class="btn btn-light m-3 align-text-top" data-toggle="modal" data-target="#exampleModal">
                    Add New Data
                </button>
            </div>
        </div>
        <div class="col-lg-12 m-2 p-2">
            <table class="table table-hover" id="myTable">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name Compeny</th>
                        <th scope="col">aksi</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;

                    foreach ($compeny as $com) :
                    ?>
                        <tr>
                            <th scope="row"><?= $i++ ?></th>
                            <td><?= $com['name_com'] ?></td>
                            <td>
                                <a href="<?= site_url('home/delete_user/' . $com['id']) ?>" class="badge badge-danger"><i class="icon-copy dw dw-delete-3"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>


    <div class="col-md-6 col-lg-8">
        <div class="clearfix">
            <div class="pull-right">
                <button type="button" class="btn btn-light  m-3" data-toggle="modal" data-target="#exampleModal2">
                    Add New Produc
                </button>
            </div>
        </div>
        <div class="col-lg-12 m-2 p-2">
            <table class="table table-hover" id="myTabel">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Compeny</th>
                        <th scope="col">Nama Produk</th>
                        <th scope="col">Code</th>
                        <th scope="col">Jumlah Perpacks</th>
                        <th scope="col">aksi</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($produc as $p) :
                    ?>
                        <tr>
                            <th scope="row"><?= $i++ ?></th>
                            <td><?= $p['name_com'] ?></td>
                            <td><?= $p['name_produc'] ?></td>
                            <td><?= $p['code'] ?></td>
                            <td><?= $p['jbl_pack'] ?></td>
                            <td>
                                <a href="<?= site_url('home/delete_produc/' . $p['id']) ?>" class="badge badge-danger"><i class="icon-copy dw dw-delete-3"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>


</div>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Compeny</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open("home/tambah_user") ?>
            <div class="modal-body">

                <div class="input-group custom">
                    <input type="text" class="form-control form-control-lg" placeholder="Code" name="name_com" id="name_com" required>
                    <div class="invalid-feedback">
                        Please choose a company.
                    </div>
                    <div class="input-group-append custom">
                        <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
                    </div>
                </div>



            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="button">Save changes</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Produc</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open("home/tambah_produc") ?>
            <div class="modal-body">
                <div class="input-group custom">
                    <input type="text" class="form-control form-control-lg" placeholder="Nama Produk" name="name_produc" id="name_produc" onkeyup="myInput()" required>
                    <div class="input-group-append custom">
                        <span class="input-group-text"><i class="icon-copy dw dw-inbox"></i></span>
                    </div>
                </div>

                <div class="input-group custom">
                    <select class="custom-select form-control" name="user_id" id="user_id" required>
                        <option value="">Pilih Compeni</option>
                        <?php foreach ($compeny as $com) : ?>
                            <option value="<?= $com['id'] ?>"><?= $com['name_com'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="input-group custom">
                    <input type="text" class="form-control form-control-lg" placeholder="Code" name="code" id="code" onkeyup="myFunction()" required>
                    <div class="input-group-append custom">
                        <span class="input-group-text"><i class="icon-copy dw dw-loupe"></i></span>
                    </div>
                </div>



                <div class="input-group custom">
                    <input type="number" class="form-control form-control-lg" placeholder="Jumlah Perpack" name="jbl_pack" id="jbl_pack" required>
                    <div class="input-group-append custom">
                        <span class="input-group-text"><i class="icon-copy dw dw-package"></i></span>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $("#name_com").on("change keyup paste", function() {
            $("#name_com").removeClass("is-invalid")
            $('#name_com').addClass('form-control-success')
        })

        $(document).on('keypress', function(e) {
            if (e.which == 13) {
                var code = $("#name_com").val();

                if (!code) {
                    $("#name_com").addClass("is-invalid");
                }

            }
        });

        $("#button").on('click', function() {
            var code = $("#name_com").val();
            if (!code) {
                $("#name_com").addClass("is-invalid");
            } else {
                cek_data(code)
            }
        })

        var pesan = $('#alert').text();
        if (pesan) {
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

    function myFunction() {
        var x = document.getElementById("code");
        x.value = x.value.toUpperCase();
    }

    function myInput() {
        var x = document.getElementById("name_produc");
        x.value = x.value.toUpperCase();
    }
</script>

<?= $this->endSection() ?>
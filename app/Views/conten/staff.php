<?= $this->extend('auth/tamplate'); ?>
<?= $this->section('conten'); ?>

<!-- Button trigger modal -->

<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="clearfix">
            <div class="pull-right">
                <button type="button" class="btn btn-light  m-3" data-toggle="modal" data-target="#exampleModal2">
                    Add New Produc
                </button>
            </div>
        </div>
        <div class="col-md-12 col-lg-12 bg-info">


            <div class="col-lg-12 m-2 p-2">
                <table class="table table-hover" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Password</th>
                            <th scope="col">Status</th>
                            <th scope="col">aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($staff as $s) :
                        ?>
                            <tr>
                                <th scope="row"><?= $i++ ?></th>
                                <td><?= $s['name_admin'] ?></td>
                                <td><?= $s['pass'] ?></td>
                                <td><?php if ($s['stts'] == 1) {
                                        echo "Master";
                                    } elseif ($s['stts'] == 2) {
                                        echo "staff Produksi";
                                    } ?></td>
                                <td>
                                    <a href="<?= site_url('home/delete_staff/' . $s['id']) ?>" class="badge badge-danger"><i class="icon-copy dw dw-delete-3"></i></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Admin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open("home/tambah_admin") ?>
            <div class="modal-body">


                <div class="input-group custom">
                    <select class="custom-select form-control" name="stts" id="stts" required>
                        <option value="">Pilih Status</option>
                        <option value="1">Master</option>
                        <option value="2">Staff Produksi</option>

                    </select>
                </div>

                <div class="input-group custom">
                    <input type="text" class="form-control form-control-lg" placeholder="name" name="name" id="name" required>
                    <div class="input-group-append custom">
                        <span class="input-group-text"><i class="icon-copy dw dw-user-2"></i></i></span>
                    </div>
                </div>

                <div class="input-group custom">
                    <input type="text" class="form-control form-control-lg" placeholder="Password" name="pass" id="pass" required>
                    <div class="input-group-append custom">
                        <span class="input-group-text"><i class="icon-copy dw dw-password"></i></span>
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
    });
</script>
<?= $this->endSection() ?>
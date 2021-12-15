<?= $this->extend('auth/tamplate'); ?>
<?= $this->section('conten'); ?>

<!-- Button trigger modal -->

<div class="row">

    <div class="col-md-12 col-lg-12 bg-info">
        <div class="col-lg-12 m-2 p-2">
            <table class="table table-hover" id="myTable">
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
                                <a href="<?= site_url('home/scan/' . $p['id']) ?>" class="badge badge-info sm"><i class="icon-copy fa fa-barcode fa-2x" aria-hidden="true"></i></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
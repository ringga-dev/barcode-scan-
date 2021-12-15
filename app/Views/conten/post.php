<?= $this->extend('auth/tamplate'); ?>
<?= $this->section('conten'); ?>

<!-- Button trigger modal -->

<div class="row">
    <div class="col-md-12 col-lg-12">

        <div class="col-md-12 col-lg-12 bg-info m-2 p-2">


            <div class="col-lg-12 ">
                <table class="table table-hover" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Company</th>
                            <th scope="col">Produk</th>
                            <th scope="col">Code</th>
                            <th scope="col">Date</th>
                            <th scope="col">Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($post as $s) :
                        ?>
                            <tr>
                                <th scope="row"><?= $i++ ?></th>
                                <td><?= $s['name_admin'] ?></td>
                                <td><?= $s['name_com'] ?></td>
                                <td><?= $s['name_produc'] ?></td>
                                <td><?= $s['code'] ?></td>
                                <td><?= $s['tgl_post'] ?></td>
                                <td><?= $s['jumlah'] ?></td>

                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



<?= $this->endSection() ?>
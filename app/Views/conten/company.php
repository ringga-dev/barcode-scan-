<?= $this->extend('auth/tamplate'); ?>
<?= $this->section('conten'); ?>

<!-- Button trigger modal -->

<div class="row">

    <div class="col-md-12 col-lg-12 bg-info">
        <div class="col-lg-12 m-2 p-2">
            <table class="table table-hover " id="myTable">
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
                                <a href="<?= site_url('home/produc/' . $com['id']) ?>" class="badge badge-info"><i class="icon-copy dw dw-list3"></i></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    </div>
</div>
<?= $this->endSection() ?>
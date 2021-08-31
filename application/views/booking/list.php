<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Order_id</th>
                <th scope="col">Tanggal Pemesanan</th>
                <th scope="col">Kunjungan Wisata</th>
                <th scope="col">Tanggal Keberangkatan</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($list_transaksi as $lt) : ?>
                <tr>
                    <th scope="row"><?= $i; ?></th>
                    <th><?= $lt['order_id']; ?></th>
                    <th><?= $lt['tanggal_pemesanan']; ?></th>
                    <th><?= $lt['kunjungan_wisata']; ?></th>
                    <th><?= $lt['tanggal_berangkat']; ?></th>
                    <th><?= $lt['status']; ?></th>
                    <th>
                        <a href="<?= base_url(); ?>vtweb/vtweb_checkout" class="badge badge-warning">Detail</a>
                    </th>
                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>
        </tbody>
    </table>




</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
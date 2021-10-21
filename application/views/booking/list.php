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
            <?php foreach ($transaksi as $t) : $id = $t['order_id']; ?>
                <tr>
                    <th scope="row"><?= $i; ?></th>
                    <th><?= $t['order_id']; ?></th>
                    <th><?= $t['tanggal_booking']; ?></th>
                    <th><?= $t['tanggal_berangkat']; ?></th>
                    <th><?= $t['tanggal_pulang']; ?></th>
                    <th><?= $t['transaction_status']; ?></th>

                    <?php
                    if ($t['transaction_status'] == "Pending") {
                    ?>
                        <th>
                            <a href="<?= base_url(); ?>booking/detail_pemesanan/<?= $id; ?>" class="badge badge-warning">Detail</a>
                            <a href="<?= base_url(); ?>vtweb/vtweb_checkout/<?= $id; ?>" class="badge badge-success">Bayar</a>
                        </th>
                    <?php
                    } else {
                    ?>
                        <th>
                            <a href="<?= base_url(); ?>booking/detail_pemesanan/<?= $id; ?>" class="badge badge-warning">Detail</a>
                        </th>
                    <?php
                    }
                    ?>
                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
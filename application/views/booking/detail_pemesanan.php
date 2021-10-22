<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Detail Pemesanan</h6>
                </div>

                <!-- Card Body -->
                <div class="card-body">
                    <form action="<?= base_url('booking/listtransaksi'); ?>" method="post">
                        <?php foreach ($detail_transaksi as $dt) : $id = $dt['order_id']; ?>

                            <div class="div form-group row">
                                <label for="order_id" class="col-sm-2 col-form-label">ORDER ID</label>
                                <div class="div col-sm-10">
                                    <input type="text" class="form-control" id="order_id" name="order_id" value="<?= $dt['order_id']; ?>" readonly>
                                </div>
                            </div>

                            <div class="div form-group row">
                                <label for="va_number" class="col-sm-2 col-form-label">Virtual Number</label>
                                <div class="div col-sm-10">
                                    <input type="text" class="form-control" id="va_number" name="va_number" value="<?= $dt['va_number']; ?>" readonly>
                                </div>
                            </div>

                            <div class="div form-group row">
                                <label for="bank" class="col-sm-2 col-form-label">Bank Pembayaran</label>
                                <div class="div col-sm-10">
                                    <input type="text" class="form-control" id="bank" name="bank" value="<?= $dt['bank']; ?>" readonly>
                                </div>
                            </div>

                            <div class="div form-group row">
                                <label for="payment_type" class="col-sm-2 col-form-label">Payment Type</label>
                                <div class="div col-sm-10">
                                    <input type="text" class="form-control" id="payment_type" name="payment_type" value="<?= $dt['payment_type']; ?>" readonly>
                                </div>
                            </div>

                            <div class="div form-group row">
                                <label for="nama" class="col-sm-2 col-form-label">Nama Pengguna</label>
                                <div class="div col-sm-10">
                                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $dt['nama']; ?>" readonly>
                                </div>
                            </div>

                            <div class="div form-group row">
                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                <div class="div col-sm-10">
                                    <input type="email" class="form-control" id="email" name="email" value="<?= $dt['email']; ?>" readonly>
                                </div>
                            </div>

                            <div class="div form-group row">
                                <label for="phone" class="col-sm-2 col-form-label">Telepon</label>
                                <div class="div col-sm-10">
                                    <input type="number" class="form-control" id="phone" name="phone" value="<?= $dt['phone']; ?>" readonly>
                                </div>
                            </div>

                            <div class="div form-group row">
                                <label for="tanggal_booking" class="col-sm-2 col-form-label">Tanggal Booking</label>
                                <div class="div col-sm-10">
                                    <input type="text" class="form-control" id="tanggal_booking" name="tanggal_booking" value="<?= $dt['tanggal_booking']; ?>" readonly>
                                </div>
                            </div>

                            <div class="div form-group row">
                                <label for="tanggal_berangkat" class="col-sm-2 col-form-label">Tanggal Berangkat</label>
                                <div class="div col-sm-10">
                                    <input type="text" class="form-control" id="tanggal_berangkat" name="tanggal_berangkat" value="<?= $dt['tanggal_berangkat']; ?>" readonly>
                                </div>
                            </div>

                            <div class="div form-group row">
                                <label for="tanggal_pulang" class="col-sm-2 col-form-label">Tanggal Pulang</label>
                                <div class="div col-sm-10">
                                    <input type="text" class="form-control" id="tanggal_pulang" name="tanggal_pulang" value="<?= $dt['tanggal_pulang']; ?>" readonly>
                                </div>
                            </div>

                            <div class="div form-group row">
                                <label for="jumlah_bayar" class="col-sm-2 col-form-label">Jumlah Bayar</label>
                                <div class="div col-sm-10">
                                    <input type="text" class="form-control" id="jumlah_bayar" name="jumlah_bayar" value="<?= $dt['jumlah_bayar']; ?>" readonly>
                                </div>
                            </div>

                            <div class="div form-group row">
                                <label for="transaction_status" class="col-sm-2 col-form-label">Status Pembayaran</label>
                                <div class="div col-sm-10">
                                    <input type="text" class="form-control" id="transaction_status" name="transaction_status" value="<?= $dt['transaction_status']; ?>" readonly>
                                </div>
                            </div>

                            <div class="div form-group row">
                                <label for="kunjungan_penginapan" class="col-sm col-form-label">Kunjungan Penginapan</label>
                                <table class="table table-bordered" width>
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Kunjungan</th>
                                            <th scope="col">Tanggal</th>
                                            <th scope="col">Harga</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $no = 1;
                                        $i = 0;
                                        $wisata_arr = explode(';', $dt['kunjungan']);
                                        $tanggal_arr = explode(';', $dt['tanggal']);
                                        $harga_arr = explode(';', $dt['harga']);
                                        foreach ($wisata_arr as $kunjungan) {
                                        ?>
                                            <tr>
                                                <th scope="row"><?= $no++; ?></th>
                                                <th><?= $kunjungan . '<br>'; ?></th>
                                                <th><?= $tanggal_arr[$i]; ?></th>
                                                <th><?= $harga_arr[$i]; ?></th>
                                            </tr>
                                        <?php $i++;
                                        } ?>
                                        <tr>
                                            <th colspan="3" class="m-0 font-weight-bold text-primary">Jumlah</th>
                                            <th class="m-0 font-weight-bold text-primary"><?= $dt['jumlah_bayar']; ?></th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div><?php
                                    if ($dt['transaction_status'] == "Pending") {
                                    ?>
                                    <div class="form-group row justify-content-end">
                                        <div class="input-group">
                                            <a href="<?= base_url(); ?>vtweb/vtweb_checkout/<?= $id; ?>" class="btn btn-primary mr-1">Bayar</a>
                                            <button type="submit" class="btn btn-secondary">Kembali</button>
                                        </div>
                                    </div>
                                <?php
                                    } else {
                                ?>
                                    <div class="form-group row justify-content-end">
                                        <div class="input-group">
                                            <a href="<?= base_url(); ?>booking/print_kunjungan/<?= $id; ?>" class="btn btn-danger mr-1">Print Laporan Perjalanan</a>
                                            <button type="submit" class="btn btn-primary">Kembali</button>
                                        </div>
                                    </div>
                                <?php
                                    }
                                ?>
                            </div>
                    </form>
                <?php endforeach; ?>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
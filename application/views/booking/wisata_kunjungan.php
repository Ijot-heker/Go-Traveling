<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
        </div>
        <div class="card-body">
            <form action="<?= base_url('booking/simpanKunjungan'); ?>" method="post">
                <div class="table-responsive">
                    <?php for ($j = 0; $j < $hari; $j < $j++) { ?>
                        <?php
                        //Menampilkan tanggal sesuai dengan keberangkatan
                        $tambah_hari = '+' . $j . 'days';
                        $tgl = $this->input->post('tanggal_berangkat');
                        $tanggal_berangkat = date('Y-m-d', strtotime($tambah_hari, strtotime($tgl)));
                        ?>
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th colspan="4">
                                        <h6 class="m-0 font-weight-bold  text-primary">Kunjungan Wisata Hari Ke-<?= $j + 1; ?></h6>
                                    </th>
                                </tr>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Kunjungan</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Biaya</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php
                                $biaya[] = $penginapan[$j]['biaya'];
                                $biaya1  = $penginapan[$j]['biaya'];
                                $total_penginapan = array_sum($biaya);
                                // var_dump($penginapan[$j]['id']);
                                ?>
                                <tr>
                                    <th scope="row"><?= $i; ?></th>
                                    <th><input type="text" style="border: none; width: 500px;" id="nama_penginapan" name="nama_wisata[]" value="<?= $penginapan[$j]['nama']; ?>" readonly></th>
                                    <th><input type="text" style="border: none;" id="tanggal_berangkat" name="tanggal_berangkat" value="<?= $tanggal_berangkat;  ?>" readonly></th>
                                    <th><input type="text" style="border: none; width: 1;" id="biaya1" name="biaya[]" value="<?= $biaya1; ?>" readonly></th>
                                </tr>
                                <?php $i++; ?>


                                <?php foreach ($wisata as $w) : ?>
                                    <?php
                                    // print_r(array_slice($wisata, 1, 2, true));
                                    // print_r($wisata);
                                    // die();
                                    $harga[] = $w['biaya'];
                                    $harga1  = $w['biaya'];
                                    $total_wisata = array_sum($harga);
                                    $total_harga  = $total_penginapan + $total_wisata;
                                    ?>
                                    <tr>
                                        <th scope="row"><?= $i; ?></th>
                                        <th><input type="text" style="border: none; width: 500px;" id="nama_wisata" name="nama_wisata[]" value="<?= $w['nama']; ?>" readonly></th>
                                        <th><input type="text" style="border: none;" id="tanggal_berangkat" name="tanggal_berangkat" value="<?= $tanggal_berangkat;  ?>" readonly></th>
                                        <th><input type="text" style="border: none;" id="biaya" name="biaya[]" value="<?= $harga1; ?>" readonly></th>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>

                                <tr>
                                    <th><input type="text" style="border: none;" id="tanggal_pulang" name="tanggal_pulang" value="<?= $this->input->post('tanggal_pulang') ?>" hidden></th>
                                    <th colspan="2" class="m-0 font-weight-bold text-primary">Jumlah</th>
                                    <th><input type="text" class="font-weight-bold text-primary" style="border: none;" id="jumlah_bayar" name="jumlah_bayar" value="<?= $total_harga; ?>" readonly></th>
                                </tr>

                            </tbody>
                        </table>
                        <?php $tambah_hari++; ?>
                    <?php } ?>
                    <div class="input-group">
                        <input class="btn btn-primary mr-1" type="submit" name="submit">
                        <a href="<?= base_url(); ?>booking/index" class="btn btn-secondary">Kembali</a>
                    </div>

                </div>

        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
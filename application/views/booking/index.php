<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?> Tiket Wisata</h1>


    <div class="row">
        <div class="col-md-8">
            <form action="<?= base_url('menu/submenu'); ?>" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Masukan Budget yang dimiliki.." name="keyword" autocomplete="off" autofocus>
                </div>

                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="text" class="form-control" onfocus="(this.type='date')" id="tanggal_berangkat" name="tanggal_berangkat" placeholder="Tanggal Keberangkatan">
                        <?= form_error('tanggal_berangkat', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" onfocus="(this.type='date')" id="tanggal_pulang" name="tanggal_pulang" placeholder="Tanggal Kepulangan">
                        <?= form_error('tanggal_pulang', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>

                <div class="input-group-append">
                    <input class="btn btn-primary" type="submit" name="submit">
                </div>
            </form>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md">
            <div class="input-group mb-1">
                <h3 class="h5 mb-4">RUTE WISATA YANG DAPAT DIKUNJUNGI HARI KE 1</h3>
            </div>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Rute</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Daerah</th>
                        <th scope="col">Status</th>
                        <th scope="col">Harga Wisata</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>1</th>
                        <th>Hotel GH Universal</th>
                        <th>20 Mei 2021</th>
                        <th>Lembang</th>
                        <th>Penginapan</th>
                        <th>Rp.800,000</th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>








</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
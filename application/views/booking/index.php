<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?> Tiket Wisata</h1>


    <div class="row">
        <div class="col-md-8">
            <form action="<?= base_url('booking/getPaketWisata'); ?>" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Masukkan Budget yang dimiliki.." name="dana" id="dana" autocomplete="off" autofocus>
                    <?= form_error('dana', '<small class="text-danger pl-3">', '</small>'); ?>
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

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
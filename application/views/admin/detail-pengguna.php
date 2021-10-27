<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
                </div>

                <!-- Card Body -->
                <div class="card-body">
                    <form action="<?= base_url('admin/dataPengguna'); ?>" method="post">
                        <?php foreach ($detail_pengguna as $dp) : ?>

                            <div class="div form-group row">
                                <label for="id" class="col-sm-2 col-form-label">ID</label>
                                <div class="div col-sm-10">
                                    <input type="text" class="form-control" name="id" value="<?= $dp['id']; ?>" readonly>
                                </div>
                            </div>

                            <div class="div form-group row">
                                <label for="name" class="col-sm-2 col-form-label">Nama</label>
                                <div class="div col-sm-10">
                                    <input type="text" class="form-control" name="name" value="<?= $dp['name']; ?>" readonly>
                                </div>
                            </div>

                            <div class="div form-group row">
                                <label for="nik" class="col-sm-2 col-form-label">NIK</label>
                                <div class="div col-sm-10">
                                    <input type="text" class="form-control" name="nik" value="<?= $dp['nik']; ?>" readonly>
                                </div>
                            </div>

                            <div class="div form-group row">
                                <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                <div class="div col-sm-10">
                                    <input type="text" class="form-control" name="jenis_kelamin" value="<?= $dp['jenis_kelamin']; ?>" readonly>
                                </div>
                            </div>

                            <div class="div form-group row">
                                <label for="no_tlp" class="col-sm-2 col-form-label">Nomor HP</label>
                                <div class="div col-sm-10">
                                    <input type="text" class="form-control" name="no_tlp" value="<?= $dp['no_tlp']; ?>" readonly>
                                </div>
                            </div>

                            <div class="div form-group row">
                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                <div class="div col-sm-10">
                                    <input type="email" class="form-control" name="email" value="<?= $dp['email']; ?>" readonly>
                                </div>
                            </div>


                            <div class="div form-group row">
                                <label for="role_id" class="col-sm-2 col-form-label">Role</label>
                                <div class="div col-sm-10">
                                    <input type="text" class="form-control" name="role_id" value="<?= $dp['role_id'] == 1 ? 'Administrator' : 'User'; ?>" readonly>
                                </div>
                            </div>

                            <div class="div form-group row">
                                <label for="flag_active" class="col-sm-2 col-form-label">Status</label>
                                <div class="div col-sm-10">
                                    <input type="text" class="form-control" name="flag_active" value="<?= $dp['flag_active'] == 1 ? 'Aktif' : 'Tidak Aktif'; ?>" readonly>
                                </div>
                            </div>

                            <div class="div form-group row">
                                <label for="date_created" class="col-sm-2 col-form-label">Tanggal Pembuatan</label>
                                <div class="div col-sm-10">
                                    <input type="text" class="form-control" name="date_created" value="<?= date('d F Y', $dp['date_created']); ?>" readonly>
                                </div>
                            </div>

                            <div class="div form-group row">
                                <label for="image" class="col-sm-2 col-form-label">Foto</label>
                                <div class="col-md-3">
                                    <img src="<?= base_url('assets/img/profile/') . $dp['image']; ?>" class="card-img">
                                </div>
                            </div>

                            <div class="form-group justify-content">
                                <div class="input-group">
                                    <button type="submit" class="btn btn-primary">Kembali</button>
                                </div>
                            </div>
                    </form>
                <?php endforeach; ?>
                </div>
            </div>
        </div>

    </div>
    </ <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
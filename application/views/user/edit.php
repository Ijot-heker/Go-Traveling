<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="div col-lg-8">

            <?= form_open_multipart('user/edit'); ?>
            <div class="div form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="div col-sm-10">
                    <input type="text" class="form-control" id="email" name="email" value="<?= $user['email']; ?>" readonly>
                </div>
            </div>

            <div class="div form-group row">
                <label for="name" class="col-sm-2 col-form-label">Full Name</label>
                <div class="div col-sm-10">
                    <input type="text" class="form-control" id="name" name="name" value="<?= $user['name']; ?>">
                    <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>

            <div class="div form-group row">
                <label for="nik" class="col-sm-2 col-form-label">NIK</label>
                <div class="div col-sm-10">
                    <input type="text" class="form-control" id="nik" name="nik" value="<?= $user['nik']; ?>">
                    <?= form_error('nik', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>

            <div class="div form-group row">
                <label for="no_tlp" class="col-sm-2 col-form-label">No Telepon</label>
                <div class="div col-sm-10">
                    <input type="text" class="form-control" id="no_tlp" name="no_tlp" value="<?= $user['no_tlp']; ?>">
                    <?= form_error('no_tlp', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>

            <div class="div form-group row">
                <div class="div col-sm-2">Picture</div>
                <div class="div col-sm-10">
                    <div class="row">
                        <div class="col-sm-3">
                            <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="img-thumbnail">
                        </div>
                        <div class="col-sm-9">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="image" id="image">
                                <label class="custom-file-label" for="image">Choose File</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group row justify-content-end">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </div>

        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
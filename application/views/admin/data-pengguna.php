<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        <div class="col-lg">
            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash_pengguna'); ?>"></div>

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataPengguna" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">NIK</th>
                                    <th scope="col">Jenis Kelamin</th>
                                    <th scope="col">Nomor Telepon</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Gambar</th>
                                    <th scope="col">Password</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Tanggal Bergabung</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($pengguna as $peng) : ?>
                                    <tr>
                                        <th scope="row"><?= $i; ?></th>
                                        <th><?= $peng['name']; ?></th>
                                        <th><?= $peng['nik']; ?></th>
                                        <th><?= $peng['jenis_kelamin']; ?></th>
                                        <th><?= $peng['no_tlp']; ?></th>
                                        <th><?= $peng['email']; ?></th>
                                        <th><?= $peng['image']; ?></th>
                                        <th><?= $peng['password']; ?></th>
                                        <th><?= $peng['role_id'] == 1 ? 'Admin' : 'User'; ?></th>
                                        <th><?= $peng['flag_active'] == 1 ? 'Aktif' : 'Tidak Aktif'; ?></th>
                                        <th><?= date('d F Y', $peng['date_created']); ?></th>
                                        <th>
                                            <a href="" class="badge badge-warning">Detail</a>
                                            <a href="<?= base_url(); ?>admin/hapus_pengguna/<?= $peng['id']; ?>" class="badge badge-danger" onclick="return confirm('Anda yakin ingin menghapus user <?= $peng['name']; ?>?');">Delete</a>
                                        </th>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->

            <script>
                $(document).ready(function() {
                    $('#dataPengguna').DataTable();
                });
            </script>
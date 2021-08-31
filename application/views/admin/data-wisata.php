<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        <div class="col-lg">
            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash_wisata'); ?>"></div>

            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newWisataModal"><i class="fas fa-fw fa-plus-circle"></i> Tambahkan Objek Wisata</a>
            <a href="<?= ('print_wisata'); ?>" class="btn btn-danger mb-3"><i class=" fas fa-fw fa-print"></i> Print Data Wisata</a>


            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Kecamatan</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Biaya</th>
                                    <th scope="col">Foto</th>
                                    <th scope="col">Detail</th>
                                    <th scope="col">Latitude,Longitude</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($wisata as $w) : ?>
                                    <tr>
                                        <th scope="row"><?= $i; ?></th>
                                        <th><?= $w['kecamatan']; ?></th>
                                        <th><?= $w['nama']; ?></th>
                                        <th><?= $w['status']; ?></th>
                                        <th><?= $w['biaya']; ?></th>
                                        <th class="col-sm-7"><img src="<?= base_url('assets/') . $w['foto']; ?>" class="img-thumbnail"></th>
                                        <th><?= substr($w['detail'], 0, 100); ?><a href="#"> More detail..</a></th>
                                        <th><?= $w['latitude']; ?>, <?= $w['longitude']; ?></th>
                                        <th><?= $w['flag_active'] == 1 ? 'Aktif' : 'Tidak Aktif'; ?></th>
                                        <th>
                                            <h5><a href="" class="badge badge-success btn-sm" data-toggle="modal" data-target="#editWisataModal<?= $w['id']; ?>"><i class="far fa-fw fa-edit"></i> Edit</a></h5>
                                            <h5><a href="<?= base_url(); ?>admin/hapus_wisata/<?= $w['id']; ?>" class="badge badge-danger" onclick="return confirm('Anda yakin ingin menghapus wisata <?= $w['nama']; ?>?');"><i class="far fa-fw fa-trash-alt"></i> Delete</a></h5>
                                            <h5><a href="<?= base_url() ?>admin/detail_wisata/<?= $w['id']; ?>" class="badge badge-warning"><i class="fas fa-fw fa-info-circle"></i> Detail</a></h5>
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

            <!-- Modal Tambah -->
            <div class="modal fade" id="newWisataModal" tabindex="-1" role="dialog" aria-labelledby="newWisataModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="newWisataModalLabel">Objek Wisata Baru</h5>
                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="<?= base_url('admin/dataWisata'); ?>" method="post">
                            <div class="modal-body">
                                <div class="form-group">
                                    <select name="id_kecamatan" id="id_kecamatan" class="form-control">
                                        <option value="">Pilih Kecamatan</option>
                                        <?php foreach ($kecamatan as $k) : ?>
                                            <option value="<?= $k['id']; ?>"><?= $k['kecamatan']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Wisata">
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control" id="status" name="status" placeholder="Status Pengelola">
                                </div>

                                <div class="form-group">
                                    <input type="number" class="form-control" id="biaya" name="biaya" placeholder="Biaya Kunjungan">
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control" id="foto" name="foto" placeholder="Foto Objek Wisata">
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control" id="latitude" name="latitude" placeholder="Latitude">
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control" id="longitude" name="longitude" placeholder="Longitude">
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control" id="detail" name="detail" placeholder="Detail Wisata">
                                </div>

                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" name="flag_active" id="flag_active" checked>
                                        <label class="form-check-label" for="flag_active">
                                            Active?
                                        </label>
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Modal Ubah -->
            <?php $no = 0;
            foreach ($wisata as $w) : $no++; ?>
                <div class="modal fade" id="editWisataModal<?= $w['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editWisataModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editWisataModalLabel">Edit Wisata</h5>
                                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="<?= base_url('admin/edit_wisata'); ?>" method="post">
                                <input type="hidden" name="id" value="<?= $w['id']; ?>">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <select name="id_kecamatan" id="id_kecamatan" class="form-control">
                                            <option value="<?= $w['id_kecamatan']; ?>"><?= $w['kecamatan']; ?></option>
                                            <?php foreach ($kecamatan as $k) : ?>
                                                <option value="<?= $k['id']; ?>"><?= $k['kecamatan']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $w['nama']; ?>">
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control" id="status" name="status" value="<?= $w['status']; ?>">
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control" id="biaya" name="biaya" value="<?= $w['biaya']; ?>">
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control" id="foto" name="foto" value="<?= $w['foto']; ?>">
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control" id="latitude" name="latitude" value="<?= $w['latitude']; ?>">
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control" id="longitude" name="longitude" value="<?= $w['longitude']; ?>">
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control" id="detail" name="detail" value="<?= $w['detail']; ?>">
                                    </div>

                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" name="flag_active" id="flag_active" checked>
                                            <label class="form-check-label" for="flag_active">
                                                Active?
                                            </label>
                                        </div>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Edit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <script>
                $(document).ready(function() {
                    $('#dataTable').DataTable();
                });
            </script>
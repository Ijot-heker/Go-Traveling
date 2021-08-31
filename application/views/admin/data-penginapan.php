<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        <div class="col-lg">
            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash_penginapan'); ?>"></div>

            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newPenginapanModal">Tambahkan Penginapan</a>

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataPenginapan" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Kecamatan</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Jenis</th>
                                    <th scope="col">Jumlah Kamar</th>
                                    <th scope="col">Biaya</th>
                                    <th scope="col">Latitude,Longitude</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($penginapan as $p) : ?>
                                    <tr>
                                        <th scope="row"><?= $i; ?></th>
                                        <th><?= $p['kecamatan']; ?></th>
                                        <th><?= $p['nama']; ?></th>
                                        <th><?= $p['jenis']; ?></th>
                                        <th><?= $p['jumlah_kamar']; ?></th>
                                        <th><?= $p['biaya']; ?></th>
                                        <th><?= $p['latitude']; ?>, <?= $p['longitude']; ?></th>
                                        <th><?= $p['flag_active'] == 1 ? 'Aktif' : 'Tidak Aktif'; ?></th>
                                        <th>
                                            <a href="" class="badge badge-success" data-toggle="modal" data-target="#editPenginapanModal<?= $p['id']; ?>">Edit</a>
                                            <a href="<?= base_url(); ?>admin/hapus_penginapan/<?= $p['id']; ?>" class="badge badge-danger" onclick="return confirm('Anda yakin ingin menghapus penginapan <?= $p['nama']; ?>?');">Delete</a>
                                            <a href="<?= base_url() ?>admin/detail_penginapan/<?= $p['id']; ?>" class="badge badge-warning">Detail</a>
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
            <div class="modal fade" id="newPenginapanModal" tabindex="-1" role="dialog" aria-labelledby="newPenginapanModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="newPenginapanModalLabel">Penginapan Baru</h5>
                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="<?= base_url('admin/dataPenginapan'); ?>" method="post">
                            <div class="modal-body">
                                <div class="form-group">
                                    <select name="id_hotel_perkecamatan" id="id_hotel_perkecamatan" class="form-control">
                                        <option value="">Pilih Kecamatan</option>
                                        <?php foreach ($kecamatan as $k) : ?>
                                            <option value="<?= $k['id']; ?>"><?= $k['kecamatan']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Penginapan">
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control" id="jenis" name="jenis" placeholder="Jenis Penginapan">
                                </div>

                                <div class="form-group">
                                    <input type="number" class="form-control" id="jumlah_kamar" name="jumlah_kamar" placeholder="Jumlah Kamar">
                                </div>

                                <div class="form-group">
                                    <input type="number" class="form-control" id="biaya" name="biaya" placeholder="Biaya Penginapan Permalam">
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control" id="latitude" name="latitude" placeholder="Latitude">
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control" id="longitude" name="longitude" placeholder="Longitude">
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
            foreach ($penginapan as $p) : $no++; ?>
                <div class="modal fade" id="editPenginapanModal<?= $p['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editPenginapanModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editPenginapanModalLabel">Edit Penginapan</h5>
                                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="<?= base_url('admin/edit_penginapan'); ?>" method="post">
                                <input type="hidden" name="id" value="<?= $p['id']; ?>">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <select name="id_hotel_perkecamatan" id="id_hotel_perkecamatan" class="form-control">
                                            <option value="<?= $p['id_hotel_perkecamatan']; ?>"><?= $p['kecamatan']; ?></option>
                                            <?php foreach ($kecamatan as $k) : ?>
                                                <option value="<?= $k['id']; ?>"><?= $k['kecamatan']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $p['nama']; ?>">
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control" id="jenis" name="jenis" value="<?= $p['jenis']; ?>">
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control" id="jumlah_kamar" name="jumlah_kamar" value="<?= $p['jumlah_kamar']; ?>">
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control" id="biaya" name="biaya" value="<?= $p['biaya']; ?>">
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control" id="latitude" name="latitude" value="<?= $p['latitude']; ?>">
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control" id="longitude" name="longitude" value="<?= $p['longitude']; ?>">
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
                    $('#dataPenginapan').DataTable();
                });
            </script>
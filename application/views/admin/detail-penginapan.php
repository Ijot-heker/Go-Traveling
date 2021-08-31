<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Detail Penginapan</h6>
                </div>

                <!-- Card Body -->
                <div class="card-body">
                    <form action="<?= base_url('admin/dataPenginapan'); ?>" method="post">
                        <?php foreach ($detail_penginapan as $dp) : ?>
                            <div class="div form-group row">
                                <label for="email" class="col-sm-2 col-form-label">ID</label>
                                <div class="div col-sm-10">
                                    <input type="text" class="form-control" id="id" name="id" value="<?= $dp['id']; ?>" readonly>
                                </div>
                            </div>

                            <div class="div form-group row">
                                <label for="kecamatan" class="col-sm-2 col-form-label">Kecamatan</label>
                                <div class="div col-sm-10">
                                    <input type="text" class="form-control" id="kecamatan" name="kecamatan" value="<?= $dp['kecamatan']; ?>" readonly>
                                </div>
                            </div>

                            <div class="div form-group row">
                                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                <div class="div col-sm-10">
                                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $dp['nama']; ?>" readonly>
                                </div>
                            </div>

                            <div class="div form-group row">
                                <label for="jenis" class="col-sm-2 col-form-label">Jenis</label>
                                <div class="div col-sm-10">
                                    <input type="text" class="form-control" id="jenis" name="jenis" value="<?= $dp['jenis']; ?>" readonly>
                                </div>
                            </div>

                            <div class="div form-group row">
                                <label for="jumlah_kamar" class="col-sm-2 col-form-label">Kamar</label>
                                <div class="div col-sm-10">
                                    <input type="text" class="form-control" id="jumlah_kamar" name="jumlah_kamar" value="<?= $dp['jumlah_kamar']; ?>" readonly>
                                </div>
                            </div>

                            <div class="div form-group row">
                                <label for="biaya" class="col-sm-2 col-form-label">Biaya</label>
                                <div class="div col-sm-10">
                                    <input type="text" class="form-control" id="biaya" name="biaya" value="<?= $dp['biaya']; ?>" readonly>
                                </div>
                            </div>

                            <div class="div form-group row">
                                <label for="latitude" class="col-sm-2 col-form-label">Latitude</label>
                                <div class="div col-sm-10">
                                    <input type="text" class="form-control" id="latitude" name="latitude" value="<?= $dp['latitude']; ?>" readonly>
                                </div>
                            </div>

                            <div class="div form-group row">
                                <label for="longitude" class="col-sm-2 col-form-label">Longitude</label>
                                <div class="div col-sm-10">
                                    <input type="text" class="form-control" id="longitude" name="longitude" value="<?= $dp['longitude']; ?>" readonly>
                                </div>
                            </div>

                            <div class="div form-group row">
                                <label for="flag_active" class="col-sm-2 col-form-label">Status</label>
                                <div class="div col-sm-10">
                                    <input type="text" class="form-control" id="flag_active" name="flag_active" value="<?= $dp['flag_active'] == 1 ? 'Aktif' : 'Tidak Aktif'; ?>" readonly>
                                </div>
                            </div>

                        <?php endforeach; ?>

                        <div class="form-group row justify-content-end">
                            <div class="col-2">
                                <button type="submit" class="btn btn-primary">Kembali</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Pie Chart -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Detail Lokasi</h6>
                </div>

                <!-- Card Body -->
                <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBqp5UtHcfmoDCnM6PGhf47Sjn5pwMK1dQ&callback=initialize"></script>
                <?php foreach ($detail_penginapan as $dp) : ?>
                    <script>
                        function initialize() {
                            var propertiPeta = {
                                center: new google.maps.LatLng(<?= $dp['latitude']; ?>, <?= $dp['longitude']; ?>),
                                zoom: 19,
                                mapTypeId: google.maps.MapTypeId.ROADMAP
                            };

                            var peta = new google.maps.Map(document.getElementById("googleMap"), propertiPeta);

                            // membuat Marker
                            var marker = new google.maps.Marker({
                                position: new google.maps.LatLng(<?= $dp['latitude']; ?>, <?= $dp['longitude']; ?>),
                                map: peta,
                                animation: google.maps.Animation.BOUNCE
                            });

                        }

                        // event jendela di-load  
                        google.maps.event.addDomListener(window, 'load', initialize);
                    </script>
                <?php endforeach; ?>

                <div id="googleMap" style="width:100%;height:380px;"></div>

            </div>
        </div>
    </div>

</div>

</div>
<!-- End of Main Content -->
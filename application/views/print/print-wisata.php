<!DOCTYPE html>
<html lang="en">
<style type="text/css">
    .detail {
        text-align: justify;
    }

    table {
        background: #fff;
        padding: 10px;
    }

    tr,
    td {
        border: table-cell;
        border: 1px solid #444;
    }

    tr,
    td {
        vertical-align: top !important;
    }

    @media print {
        body {
            font-size: 12px;
            color: #212121;
        }

        nav {
            display: none;
        }

        table {
            width: 100%;
            font-size: 12px;
            color: #212121;
        }

        tr,
        td {
            border: table-cell;
            border: 1px solid #444;
            padding: 8px !important;

        }

        tr,
        td {
            vertical-align: top !important;
        }

    }
</style>

<div>
    <div class="card-header py-3">
        <h1 class="m-0 font-weight-bold text-primary" align="center"><?= $title; ?></h1>
    </div>

    <body>
        <table border="1" cellpadding="10">
            <tr>
                <th>No</th>
                <th>Kecamatan</th>
                <th>Nama</th>
                <th>Status</th>
                <th>Biaya</th>
                <th>Foto</th>
                <th>Detail</th>
                <th>Latitude,Longitude</th>
                <th>Status</th>
            </tr>
            <?php $i = 1; ?>
            <?php foreach ($wisata as $w) : ?>
                <tr align="left">
                    <th scope="row"><?= $i; ?></th>
                    <th><?= $w['kecamatan']; ?></th>
                    <th><?= $w['nama']; ?></th>
                    <th><?= $w['status']; ?></th>
                    <th><?= $w['biaya']; ?></th>
                    <th><?= $w['foto']; ?></th>
                    <th class="detail"><?= $w['detail']; ?>
                    </th>
                    <th><?= $w['latitude']; ?>, <?= $w['longitude']; ?></th>
                    <th><?= $w['flag_active'] == 1 ? 'Aktif' : 'Tidak Aktif'; ?></th>
                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>
        </table>

        <script type="text/javascript">
            window.print();
        </script>

    </body>

</html>
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
        <?php foreach ($detail_transaksi as $dt) : ?>
            <table border="1" cellpadding="10">
                <tr>
                    <td id="right"><strong>ORDER ID</strong></td>
                    <td id="left" colspan="2"><?= $dt['order_id']; ?></td>
                </tr>

                <tr>
                    <td id="right"><strong>Virtual Number</strong></td>
                    <td id="left" colspan="2"><?= $dt['va_number']; ?></td>
                </tr>

                <tr>
                    <td id="right"><strong>Bank Pembayaran</strong></td>
                    <td id="left" colspan="2"><?= $dt['bank']; ?></td>
                </tr>

                <tr>
                    <td id="right"><strong>Payment Type</strong></td>
                    <td id="left" colspan="2"><?= $dt['payment_type']; ?></td>
                </tr>

                <tr>
                    <td id="right"><strong>Nama Pengguna</strong></td>
                    <td id="left" colspan="2"><?= $dt['nama']; ?></td>
                </tr>

                <tr>
                    <td id="right"><strong>Email</strong></td>
                    <td id="left" colspan="2"><?= $dt['email']; ?></td>
                </tr>

                <tr>
                    <td id="right"><strong>Telepon</strong></td>
                    <td id="left" colspan="2"><?= $dt['phone']; ?></td>
                </tr>

                <tr>
                    <td id="right"><strong>Tanggal Booking</strong></td>
                    <td id="left" colspan="2"><?= $dt['tanggal_booking']; ?></td>
                </tr>

                <tr>
                    <td id="right"><strong>Tanggal Berangkat</strong></td>
                    <td id="left" colspan="2"><?= $dt['tanggal_berangkat']; ?></td>
                </tr>

                <tr>
                    <td id="right"><strong>Tanggal Pulang</strong></td>
                    <td id="left" colspan="2"><?= $dt['tanggal_pulang']; ?></td>
                </tr>

                <tr>
                    <td id="right"><strong>Jumlah Bayar</strong></td>
                    <td id="left" colspan="2"><?= $dt['jumlah_bayar']; ?></td>
                </tr>

                <tr>
                    <td id="right"><strong>Status Pembayaran</strong></td>
                    <td id="left" colspan="2"><?= $dt['transaction_status']; ?></td>
                </tr>

                <tr>
                    <td id="right"><strong>Kunjungan</strong></td>
                    <td id="left" colspan="2"></td>
                </tr>

                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kunjungan</th>
                    <th scope="col">Harga</th>
                </tr>
                <?php $i = 1; ?>

                <?php
                $no = 1;
                $i = 0;
                $wisata_arr = explode(';', $dt['kunjungan']);
                $harga_arr = explode(';', $dt['harga']);
                foreach ($wisata_arr as $kunjungan) {
                ?>
                    <tr align="left">
                        <th scope="row"><?= $no++; ?></th>
                        <th><?= $kunjungan . '<br>'; ?></th>
                        <th><?= $harga_arr[$i]; ?></th>
                    </tr>
                <?php $i++;
                } ?>
                <?php $i++; ?>
                <tr>
                    <th colspan="2" class="m-0 font-weight-bold text-primary">Jumlah</th>
                    <th><?= $dt['jumlah_bayar']; ?></th>
                </tr>
            <?php endforeach; ?>
            </table>

            <script type="text/javascript">
                window.print();
            </script>

    </body>

</html>
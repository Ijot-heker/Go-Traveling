<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

<!-- sweetalert -->
<script src="<?= base_url('assets/'); ?>js/sweetalert2.all.min.js"></script>

<?php if ($this->session->flashdata('flash') || $this->session->flashdata('flash_error')) { ?>
    <script>
        const flashData = $('.flash-data').data('flashdata');

        Swal.fire({
            position: 'top-end',
            showConfirmButton: false,
            timer: 5000,
            toast: true,
            timerProgressBar: true,
            icon: '<?= $this->session->flashdata("flash") ? "success" : "error"; ?>',
            title: 'Reset Password ' + '<?= $this->session->flashdata("flash") ? "Berhasil" : "Gagal, Email tidak terdaftar atau belum diaktivasi!"; ?> ' + flashData,
            text: '<?= $this->session->flashdata("flash") ? $this->session->flashdata("success") : $this->session->flashdata("error"); ?>',
        });
    </script>
<?php } ?>

<?php if ($this->session->flashdata('flash_ubah')) { ?>
    <script>
        const flashData = $('.flash-data').data('flashdata');

        Swal.fire({
            position: 'top-end',
            showConfirmButton: false,
            timer: 5000,
            toast: true,
            timerProgressBar: true,
            icon: '<?= $this->session->flashdata("flash_ubah") ? "success" : "error"; ?>',
            title: 'Password ' + '<?= $this->session->flashdata("flash_ubah") ? "Berhasil diubah!" : "Gagal!"; ?> ',
            text: '<?= $this->session->flashdata("flash_ubah") ? $this->session->flashdata("success") : $this->session->flashdata("error"); ?>',
        });
    </script>
<?php } ?>

</body>

</html>
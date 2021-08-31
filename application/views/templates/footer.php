<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Go Traveling <?= date('Y'); ?></span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Anda yakin untuk keluar?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Pilih "Logout" apabila anda ingin keluar dari akun ini.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url('auth/logout') ?>">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="<?= base_url('assets/'); ?>vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url('assets/'); ?>js/demo/chart-area-demo.js"></script>
<script src="<?= base_url('assets/'); ?>js/demo/chart-pie-demo.js"></script>

<!-- Page level plugins -->
<script src="<?= base_url('assets/'); ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/datatables-demo.js"></script>

<!-- sweetalert -->
<script src="<?= base_url('assets/'); ?>js/sweetalert2.all.min.js"></script>

<script>
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });



    $('.form-check-input').on('click', function() {
        const menuId = $(this).data('menu');
        const roleId = $(this).data('role');

        $.ajax({
            url: "<?= base_url('admin/changeaccess'); ?>",
            type: 'post',
            data: {
                menuId: menuId,
                roleId: roleId
            },
            success: function() {
                document.location.href = "<?= base_url('admin/roleaccess/'); ?>" + roleId;
            }
        });
    });
</script>

<?php if ($this->session->flashdata('flash_menu')) { ?>
    <script>
        const flashData = $('.flash-data').data('flashdata');

        Swal.fire({
            position: 'top-end',
            showConfirmButton: false,
            timer: 5000,
            toast: true,
            timerProgressBar: true,
            icon: '<?= $this->session->flashdata("flash_menu") ? "success" : "error"; ?>',
            title: 'Menu ' + '<?= $this->session->flashdata("flash_menu") ? "Berhasil" : "Gagal!"; ?> ' + flashData,
            text: '<?= $this->session->flashdata("flash_menu") ? $this->session->flashdata("success") : $this->session->flashdata("error"); ?>',
        })
    </script>
<?php } ?>

<?php if ($this->session->flashdata('flash_sub_menu')) { ?>
    <script>
        const flashData = $('.flash-data').data('flashdata');

        Swal.fire({
            position: 'top-end',
            showConfirmButton: false,
            timer: 5000,
            toast: true,
            timerProgressBar: true,
            icon: '<?= $this->session->flashdata("flash_sub_menu") ? "success" : "error"; ?>',
            title: 'Submenu ' + '<?= $this->session->flashdata("flash_sub_menu") ? "Berhasil" : "Gagal!"; ?> ' + flashData,
            text: '<?= $this->session->flashdata("flash_sub_menu") ? $this->session->flashdata("success") : $this->session->flashdata("error"); ?>',
        })
    </script>
<?php } ?>

<?php if ($this->session->flashdata('flash_user')) { ?>
    <script>
        const flashData = $('.flash-data').data('flashdata');

        Swal.fire({
            position: 'top-end',
            showConfirmButton: false,
            timer: 5000,
            toast: true,
            timerProgressBar: true,
            icon: '<?= $this->session->flashdata("flash_user") ? "success" : "error"; ?>',
            title: 'Data User ' + '<?= $this->session->flashdata("flash_user") ? "Berhasil diubah" : "Gagal!"; ?> ',
            text: '<?= $this->session->flashdata("flash_user") ? $this->session->flashdata("success") : $this->session->flashdata("error"); ?>',
        })
    </script>
<?php } ?>

<?php if ($this->session->flashdata('flash_wisata')) { ?>
    <script>
        const flashData = $('.flash-data').data('flashdata');

        Swal.fire({
            position: 'top-end',
            showConfirmButton: false,
            timer: 5000,
            toast: true,
            timerProgressBar: true,
            icon: '<?= $this->session->flashdata("flash_wisata") ? "success" : "error"; ?>',
            title: 'Data Wisata ' + '<?= $this->session->flashdata("flash_wisata") ? "Berhasil" : "Gagal!"; ?> ' + flashData,
            text: '<?= $this->session->flashdata("flash_wisata") ? $this->session->flashdata("success") : $this->session->flashdata("error"); ?>',
        })
    </script>
<?php } ?>

<?php if ($this->session->flashdata('flash_penginapan')) { ?>
    <script>
        const flashData = $('.flash-data').data('flashdata');

        Swal.fire({
            position: 'top-end',
            showConfirmButton: false,
            timer: 5000,
            toast: true,
            timerProgressBar: true,
            icon: '<?= $this->session->flashdata("flash_penginapan") ? "success" : "error"; ?>',
            title: 'Data Penginapan ' + '<?= $this->session->flashdata("flash_penginapan") ? "Berhasil" : "Gagal!"; ?> ' + flashData,
            text: '<?= $this->session->flashdata("flash_penginapan") ? $this->session->flashdata("success") : $this->session->flashdata("error"); ?>',
        })
    </script>
<?php } ?>

</body>

</html>
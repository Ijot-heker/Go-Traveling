// const flashData = $('.flash-data').data('flashdata');

// if (flashData) {
//     // Swal({
//     //     title: 'Data Menu ',
//     //     text: 'Berhasil '  + flashData,
//     //     type: 'success'
//     // });

//     Swal.fire({
//         position: 'top-end',
//         showConfirmButton: false,
//         timer: 5000,
//         toast: true,
//         timerProgressBar: true,
//         icon: '<?= $this->session->flashdata("flash") ? "success" : "error"; ?>',
//         title: '<?= $this->session->flashdata("flash") ? "Berhasil!" : "Gagal!"; ?>',
//         text: '<?= $this->session->flashdata("flash") ? $this->session->flashdata("success") : $this->session->flashdata("error") ; ?>',
//       });
// }
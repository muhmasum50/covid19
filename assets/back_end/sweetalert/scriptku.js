// data table

$(document).ready(function () {

    $('#tableku').DataTable({
        "processing": true,
        stateSave: true,
        "order": []
    })
});


const flashData = $('.flash-data').data('flashdata');

if (flashData) {
    Swal.fire({

        title: 'Data Mahasiswa ',
        text: '' + flashData,
        icon: 'success'
    });
}

$('.tombol-hapus').on('click', function () {

    event.preventDefault();
    const ambillink = $(this).attr('idku');

    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.value == true) {
            document.location.href = ambillink;
        } else {
            Swal.fire(
                'Batal!',
                'Anda batal menghapus data',
                'error'
            )
        }
    })


});
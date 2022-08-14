$(document).ready(function() {
    // hilangkan tombol cari
    $('#cari').hide();

    // event ketika keyword ditulis
    $('#keywoard').on('keyup', function() {
        // munculkan icon loading
        $('.loader').show();

        // ajax menggunakan load
        // $('#container').load('ajax/mahasiswa.php?keyword=' + $('#keyword').val());

        // $.get()
        $.get('ajax/list.php?keyword=' + $('#keywoard').val(), function(data) {

            $('#list').html(data);
            $('.loader').hide();

        });

    });

});
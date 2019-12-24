$(document).ready(function() {

    // hilangkan tombol cari
    $('#tombol-cari').hide();

    $('#keyword').on('keyup', function() {
        // munculkan icon loader
       $('.loader').show();

    //    ajax menggunakan load
    //    $('#container').load('ajax/mahasiswa.php?keyword=' + $('#keyword').val());
    
    // $.get
        $.get('ajax/mahasiswa.php?keyword=' + $('#keyword').val(), function(data) {
            $('#container').html(data);
            $('.loader').hide();
        });
    });

});
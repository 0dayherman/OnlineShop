    <!--Footer -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
    

    <script type="text/javascript">
        $(document).ready(function () {
            $("#sidebar").mCustomScrollbar({
                theme: "minimal"
            });

            $('#sidebarCollapse').on('click', function () {
                $('#sidebar, #content').toggleClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            });
        });
    </script>
    
<script type="text/javascript">
$(document).ready(function(){
    // datepicker plugin
    $('.date-picker').datepicker({
        autoclose: true,
        todayHighlight: true
    });

    // menyembunyikan tabel laporan
    $('#tabelLaporan').hide();
    // menyembunyikan tombol export
    $('#btnExport').hide();

    // Tampilkan tabel laporan data penjualan
    $('#btnTampil').click(function(){
        // Validasi form input
        // jika tanggal awal kosong
        if ($('#tgl_awal').val()==""){
            // focus ke input tanggal awal
            $( "#tgl_awal" ).focus();
            // tampilkan peringatan data tidak boleh kosong
            swal("Peringatan!", "Tanggal awal tidak boleh kosong.", "warning");
        }
        // jika tanggal akhir kosong
        else if ($('#tgl_akhir').val()==""){
            // focus ke input tanggal akhir
            $( "#tgl_akhir" ).focus();
            // tampilkan peringatan data tidak boleh kosong
            swal("Peringatan!", "Tanggal akhir tidak boleh kosong.", "warning");
        // jika semua tanggal sudah diisi, jalankan perintah untuk menampilkan data
        } else {
            // membuat variabel untuk menampung data dari form filter
            var data = $('#formFilter').serialize();

            $.ajax({
                type : "GET",                               // mengirim data dengan method GET 
                url  : "modules/laporan/get_data.php",      // proses get data penjualan berdasarkan tanggal
                data : data,                                // data yang dikirim
                success: function(data){                    // ketika sukses get data
                    // menampilkan tabel laporan
                    $('#tabelLaporan').show();
                    // menampilkan data penjualan
                    $('#loadData').html(data);
                    // menampilkan tombol export
                    $('#btnExport').show();
                }
            });
        }
    });

    // saat tombol export diklik
    $('#btnExport').click(function(){
        // tampilkan pesan sukses export data
        swal("Sukses!", "Laporan Data Penjualan berhasil diexport.", "success");
    });
});
</script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<script type="text/javascript">
    $('#nama_karyawan').change(function() {
        var nama_karyawan = $(this).val();
        $.ajax({
            type: 'POST',
            url: 'ajax_karyawan.php',
            data: 'nama_karyawan=' + nama_karyawan,
            success: function(response) {
                var data = JSON.parse(response);
                $('#nik').val(data.nik);
                $('#kehadiran_karyawan').val(data.kehadiran_karyawan);
                $('#jabatan_karyawan').val(data.jabatan_karyawan);
            }
        });
    });
</script>

<script type="text/javascript">
    $('#nama_pera').change(function() {
        var nama_pera = $(this).val();
        $.ajax({
            type: 'POST',
            url: 'ajax_absen.php',
            data: 'nama_pera=' + nama_pera,
            success: function(response) {
                var data = JSON.parse(response);
                $('#kehadiran_pera').val(data.kehadiran_pera);
                $('#sd').val(data.sd);
                $('#pc').val(data.pc);
                $('#dt').val(data.dt);
                $('#i').val(data.i);
                $('#s').val(data.s);
                $('#a').val(data.a);
            }
        });
    });
</script>



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.5/umd/popper.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.16/js/dataTables.bootstrap4.js"></script>
<script src="./js/script.js"></script>
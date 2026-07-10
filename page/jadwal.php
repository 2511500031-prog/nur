<?php
// Proses Hapus Data Jadwal beserta Detailnya
if (isset($_GET['hapus'])) {
    $kd_jadwal = $_GET['hapus'];

    // Menghapus rincian detail jadwal terlebih dahulu
    mysqli_query($koneksi, "DELETE FROM detail_jadwal WHERE kd_jadwal = '$kd_jadwal'");
    
    // Lalu menghapus data induk master jadwal
    $hapus = mysqli_query($koneksi, "DELETE FROM jadwal WHERE kd_jadwal = '$kd_jadwal'");

    if ($hapus) {
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                <strong>Berhasil!</strong> Data jadwal telah dihapus dari sistem.
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button>
              </div>";
    }
}
?>

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Data Jadwal</h1>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <a href="index.php?page=tambah_jadwal" class="btn btn-primary btn-sm mb-3">Tambah Jadwal</a>
                
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Kode Jadwal</th>
                            <th>ID Kelas</th>
                            <th>Semester</th>
                            <th>Tahun Ajaran</th>
                            <th style="width: 280px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = mysqli_query($koneksi, "SELECT * FROM jadwal");
                        
                        while ($row = mysqli_fetch_assoc($query)) {
                            echo "<tr>";
                            echo "<td>" . $row['kd_jadwal'] . "</td>";
                            echo "<td>" . $row['id_kelas'] . "</td>";
                            echo "<td>" . $row['semester'] . "</td>";
                            echo "<td>" . $row['tahun_ajaran'] . "</td>";
                            echo "<td>
                                    <a href='index.php?page=detail_jadwal&kd_jadwal=" . $row['kd_jadwal'] . "' class='btn btn-info btn-sm'>Detail Jadwal</a>
                                    
                                    <a href='page/cetak_jadwal.php?kd_jadwal=" . $row['kd_jadwal'] . "' target='_blank' class='btn btn-success btn-sm'>Cetak</a>
                                    
                                    <a href='index.php?page=jadwal&hapus=" . $row['kd_jadwal'] . "' 
                                       onclick=\"return confirm('Yakin ingin menghapus data jadwal ini?')\" 
                                       class='btn btn-danger btn-sm'>Hapus</a>
                                  </td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
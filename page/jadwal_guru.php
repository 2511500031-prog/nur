<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Jadwal Mengajar Saya</h1>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">

                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Mata Pelajaran</th>
                            <th>Hari</th>
                            <th>Jam</th>
                            <th>ID Kelas</th>
                            <th>Semester / TA</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 0;
                        $kd_guru_login = isset($_SESSION['kd_guru']) ? $_SESSION['kd_guru'] : '';

                        // Mengambil jadwal guru berdasarkan letak kolom kd_guru di tabel detail_jadwal
                        $query = mysqli_query($koneksi, "SELECT dj.*, j.semester, j.tahun_ajaran, j.id_kelas, m.nm_mapel 
                                                         FROM detail_jadwal dj
                                                         JOIN jadwal j ON dj.kd_jadwal = j.kd_jadwal
                                                         JOIN mapel m ON dj.kd_mapel = m.kd_mapel
                                                         WHERE dj.kd_guru = '$kd_guru_login'
                                                         ORDER BY FIELD(dj.hari, 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'), dj.jam");

                        if (mysqli_num_rows($query) == 0) {
                            echo "<tr><td colspan='6' class='text-center text-muted'>Anda tidak memiliki jadwal mengajar atau belum login.</td></tr>";
                        }

                        while ($result = mysqli_fetch_array($query)) {
                            $no++;
                        ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $result['nm_mapel']; ?></td>
                                <td><?= $result['hari']; ?></td>
                                <td><?= $result['jam']; ?></td>
                                <td><span class="badge badge-info"><?= $result['id_kelas']; ?></span></td>
                                <td><?= $result['semester']; ?> (<?= $result['tahun_ajaran']; ?>)</td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
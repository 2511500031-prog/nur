<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Jadwal Pelajaran Kelas</h1>
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
                            <th>Hari</th>
                            <th>Jam</th>
                            <th>Mata Pelajaran</th>
                            <th>Guru Pengampu</th>
                            <th>Semester / TA</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 0;
                        $nis_siswa_login = isset($_SESSION['nis']) ? $_SESSION['nis'] : '';

                        // Menemukan id_kelas milik siswa berdasarkan NIS dari session login
                        $query_mhs = mysqli_query($koneksi, "SELECT id_kelas FROM siswa WHERE nis = '$nis_siswa_login'");
                        $data_mhs  = mysqli_fetch_array($query_mhs);
                        $id_kelas_siswa = isset($data_mhs['id_kelas']) ? $data_mhs['id_kelas'] : '';

                        // Menggabungkan data master berdasarkan id_kelas siswa
                        $query = mysqli_query($koneksi, "SELECT dj.*, j.semester, j.tahun_ajaran, g.nm_guru, m.nm_mapel 
                                                         FROM detail_jadwal dj
                                                         JOIN jadwal j ON dj.kd_jadwal = j.kd_jadwal
                                                         JOIN guru g ON dj.kd_guru = g.kd_guru
                                                         JOIN mapel m ON dj.kd_mapel = m.kd_mapel
                                                         WHERE j.id_kelas = '$id_kelas_siswa'
                                                         ORDER BY FIELD(dj.hari, 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'), dj.jam");

                        if (empty($id_kelas_siswa) || mysqli_num_rows($query) == 0) {
                            echo "<tr><td colspan='6' class='text-center text-muted'>Jadwal pelajaran kelas Anda belum tersedia atau Anda belum login.</td></tr>";
                        } else {
                            while ($result = mysqli_fetch_array($query)) {
                                $no++;
                            ?>
                                <tr>
                                    <td><?= $no; ?></td>
                                    <td><?= $result['hari']; ?></td>
                                    <td><?= $result['jam']; ?></td>
                                    <td><?= $result['nm_mapel']; ?></td>
                                    <td><?= $result['nm_guru']; ?></td>
                                    <td><?= $result['semester']; ?> (<?= $result['tahun_ajaran']; ?>)</td>
                                </tr>
                            <?php 
                            } 
                        } 
                        ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
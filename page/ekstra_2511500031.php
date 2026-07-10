<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Data ekstrakurikuler</h1>
            </div>
        </div>
    </div>
</div>

<?php
if (isset($_GET['action'])) {
    if ($_GET['action'] == "hapus") {
        $kd = $_GET['kd'];
        $query = mysqli_query($koneksi, "DELETE FROM ekstra_2511500031 where id_ekstra031 = '$kd' ");
        if ($query) {
            echo '
            <div class="alert alert-warning alert-dismissible">
                Berhasil Di Hapus
            </div>';
            echo '<meta http-equiv="refresh" content="1;url=index.php?page=ekstra_2511500031">';
        }
    }
}
?>

<div class="content">
    <div class="container-fluid">
    <div class="card">
        <div class="card-body">

            <a href="index.php?page=tambah_ekstra2511500031" class="btn btn-primary btn-sm">
                tambah ekstrakurikuler
            </a>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>id_ekstra031</th>
                        <th>nama_ekstra031</th>
                        <th>ket031</th>
                        <th>semester031</th>
                        <th>thn_ajaran031</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $no = 0;
                    $query = mysqli_query($koneksi, "SELECT * FROM ekstra_2511500031");

                    while ($result = mysqli_fetch_array($query)) {
                        $no++;
                    ?>
                        <tr>
                            <td><?= $no; ?></td>
                            <td><?= $result['id_ekstra031']; ?></td>
                            <td><?= $result['nama_ekstra031']; ?></td>
                            <td><?= $result['ket031']; ?></td>
                            <td><?= $result['semester031']; ?></td>
                            <td><?= $result['thn_ajaran031']; ?></td>
                            <td>
                                <a href="index.php?page=ekstra_2511500031&action=hapus&kd=<?= $result['id_ekstra031'] ?>" title="">
                                    <span class="badge badge-danger">Hapus</span>
                                </a>

                                <a href="index.php?page=edit_ekstra2511500031&kd=<?= $result['id_ekstra031'] ?>" title="">
                                    <span class="badge badge-warning">Edit</span>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>

            </table>

        </div>
    </div>
</div>
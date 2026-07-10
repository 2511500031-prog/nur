<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit ekstrakurikuler</h1>
            </div>
        </div>
    </div>
</div>

<?php
$kd = $_GET['kd'];
$edit = mysqli_fetch_array(mysqli_query($koneksi, "
    SELECT * FROM ekstra_2511500031 WHERE id_ekstra031='$kd'
"));

if (isset($_POST['tambah'])) {
    $id_ekstra031 = $_POST['id_ekstra031'];
    $nama_ekstra031 = $_POST['nama_ekstra031'];
    $ket031     = $_POST['ket031'];
    $semester031   = $_POST['semester031'];
    $thn_ajaran031  = $_POST['thn_ajaran031'];

    $insert = mysqli_query($koneksi, "
        UPDATE ekstra_2511500031 
        SET id_ekstra031='$id_ekstra031', nama_ekstra031 = '$nama_ekstra031', ket031 = '$ket031', semester031 ='$semester031', thn_ajaran031 = '$thn_ajaran031'
        WHERE id_ekstra031='$id_ekstra031'
    ");

    if ($insert) {
        echo '
        <div class="alert alert-info-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
            <h5><i class="icon fas fa-info"></i> Info</h5>
            <h4>Berhasil Disimpan</h4>
        </div>';
        
        echo '<meta http-equiv="refresh" content="1;url=index.php?page=ekstra_2511500031">';
    } else {
        echo '
        <div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
            <h5><i class="icon fas fa-info"></i> Info</h5>
            <h4>Gagal Disimpan</h4>
        </div>';
        die(mysqli_error($koneksi));
    }
}
?>

<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="card-body p-2">
                    <form method="POST" action="">
                        <div class="form-group">
    <label for="id_ekstra031">id_ekstra031</label>
    <input type="text" name="id_ekstra031" 
           value="<?= $edit['id_ekstra031']; ?>" 
           class="form-control" readonly>
</div>

<div class="form-group">
    <label for="nama_ekstra031">Nama_ekstra031</label>
    <input type="text" name="nama_ekstra031" 
           value="<?= $edit['nama_ekstra031']; ?>" 
           id="nama_ekstra031" 
           placeholder="nama_ekstra031" 
           class="form-control">
</div>

<div class="form-group">
    <label for="ket031">ket031</label>
    <input type="text" name="ket031" 
           value="<?= $edit['ket031']; ?>" 
           id="kkm" 
           placeholder="Ket031" 
           class="form-control">
</div>
<div class="form-group">
    <label for="semester031">semester031</label>
    <input type="text" name="semester031" 
           value="<?= $edit['semester031']; ?>" 
           id="semester031" 
           placeholder="semester031" 
           class="form-control">
</div>

    <label for="thn_ajaran031">thn_ajaran031</label>
    <input type="text" name="thn_ajaran031" 
           value="<?= $edit['thn_ajaran031']; ?>" 
           id="thn_ajaran031" 
           placeholder="thn_ajaran031" 
           class="form-control">
</div>
<div class="card-footer">
    <input type="submit" 
           class="btn btn-primary" 
           name="tambah" 
           value="simpan">
</div>

</form>
</div>
</div>
</div>
</div>
</section>
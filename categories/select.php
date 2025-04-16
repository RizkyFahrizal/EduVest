<?php  
// kalo pake beda page
    require_once "../config.php";
    $db=new DB;
    $jumlahdata=$db->rowCOUNT("SELECT id_category FROM categories");
    $banyak=5;

    $halaman=ceil($jumlahdata/$banyak);

    if (isset($_GET['p'])) {
            $p=$_GET['p'];
            $mulai=($p * $banyak)-$banyak;
        }else {
            $mulai=0;
        }

    $sql="SELECT * FROM categories ORDER BY id_category DESC LIMIT $mulai,$banyak";
    $row=$db->getALL($sql);

    $no=1+$mulai;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edu Vest | Aplikasi Edukasi Trading</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<!-- body 1 -->
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="../"><strong>EduVest</strong></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" 
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="/eduvest/categories/select.php">Kategori</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="/eduvest/courses/select.php">Kelas</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="/eduvest/lessons/select.php">Materi</a>
            </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <?php if (isset($_GET['success']) && $_GET['success'] == 1 && isset($_GET['category_name'])): ?>
            <div class="alert alert-success alert-dismissible fade show mx-3 mt-3" role="alert" id="alert">
                <strong>Berhasil!</strong> Data <strong><?php echo htmlspecialchars($_GET['category_name']); ?></strong> berhasil diubah.
                <button type="button" class="close" data-dismiss="alert" aria-label="Tutup">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>
        <div class="row mt-5">
            <div class="col">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="d-flex align-items-center">
                        <h3 class="mr-3 m-0">
                            <a href="../" class="text-decoration-none">
                                <i class="bi bi-arrow-left"></i>
                            </a>
                        </h3>
                        <h3 class="mb-0">Kategori</h3>
                    </div>
                    <a class="btn btn-primary" href="/eduvest/categories/add.php" role="button"><i class="bi bi-plus-lg mr-1"></i>Tambah Data</a>
                </div>
            </div>
        </div>
        <div class="table-responsive mt-4">
           <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kategori</th>
                        <th>Deskripsi</th>
                        <th>Ubah</th>
                        <th>Hapus</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($row as $r): ?>
                        <tr>
                            <td><?php echo $no++?></td>
                            <td><?php echo $r['category_name']?></td>
                            <td><?php echo $r['category_description']?></td>
                            <td><a href="/eduvest/categories/edit.php?id=<?php echo $r['id_category']?>" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i> Ubah</a></td>
                            <td><a href="/eduvest/categories/delete.php?id=<?php echo $r['id_category']?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="bi bi-trash"></i> Hapus</a></td>

                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
            <div class="container text-center mt-4">
                <nav>
                    <ul class="pagination justify-content-center">
                        <?php
                        for ($i = 1; $i <= $halaman; $i++) {
                            $active = (isset($_GET['p']) && $_GET['p'] == $i) ? 'active' : '';
                            echo '
                                <li class="page-item ' . $active . '">
                                    <a class="page-link" href="?f=categories&m=select&p=' . $i . '">' . $i . '</a>
                                </li>
                            ';
                        }
                        ?>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
<script>
    setTimeout(function () {
        let alert = document.getElementById('alert');
        if (alert) {
            alert.classList.remove('show');
            alert.classList.add('fade');
            setTimeout(() => alert.remove(), 300); // animasi fade out
        }
    }, 3000);
</script>
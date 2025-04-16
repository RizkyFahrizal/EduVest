<?php

require_once"config.php";
$db=new DB;
$sql="SELECT * FROM categories ORDER BY id_category";
$row=$db->getALL($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edu Vest | Aplikasi Edukasi Trading</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
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
        <div class="row mt-5">
            <!-- Sidebar Kategori -->
            <div class="col-md-3">
                <div class="card shadow-sm rounded-lg">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Kategori</h5>
                    </div>
                    <ul class="list-group list-group-flush">
                        <?php if (!empty($row)) : ?>
                            <?php foreach ($row as $r): ?>
                                <li class="list-group-item">
                                    <a class="text-decoration-none text-dark" href="?f=home&m=courses&id=<?php echo $r['id_category']; ?>">
                                        <i class="bi bi-folder-fill mr-2 text-primary"></i> <?php echo $r['category_name']; ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <li class="list-group-item text-muted">Tidak ada kategori</li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>

            <!-- Konten Kanan -->
            <div class="col-md-9">
                <?php 
                    if (isset($_GET['f']) && isset($_GET['m'])) {
                        $f = $_GET['f'];
                        $m = $_GET['m'];
                        $file = $f . '/' . $m . '.php';

                        require_once $file;
                    } else {
                        require_once "home/courses.php";
                    }
                ?>
            </div>
        </div>

        <footer class="text-center mt-4 text-muted small">
            &copy; <?php echo date('Y'); ?> - Copyright @ Fahrizal.com
        </footer>
    </div>
</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
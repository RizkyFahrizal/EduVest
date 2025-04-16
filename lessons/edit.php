<?php 
    require_once "../config.php";
    $db=new DB;
    if (isset($_GET['id'])) {
        $id=$_GET['id'];
        $sql="SELECT * FROM lessons WHERE  id_lesson=$id";
        $item=$db->getITEM($sql);
        $id_course=$item['id_course'];
    }
    $row=$db->getALL("SELECT * FROM courses ORDER BY course_name ASC");
    // var_dump($row);
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edu Vest | Aplikasi Edukasi Trading</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0"><a href="/eduvest/lessons/select.php" class="text-decoration-none"><i class="bi bi-arrow-left mr-1 text-light"></i></a> Tambah Materi</h4>
                    </div>
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="id_course">Kelas</label>
                                <select name="id_course" id="id_course" class="form-control" required>
                                <?php foreach ($row as $r): ?>
                                    <option <?php if ($id_course==$r['id_course']) echo "selected";?> value="<?php echo $r['id_course'] ?>"><?php echo $r['course_name'] ?></option>
                                <?php endforeach?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="lesson_name">Nama Materi</label>
                                <input type="text" name="lesson_name" id="lesson_name" value="<?php echo $item['lesson_name']?>" required placeholder="Nama Kelas" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="lesson_description">Deskripsi</label>
                                <input type="text" name="lesson_description" id="lesson_description" value="<?php echo $item['lesson_description']?>" required placeholder="Deskripsi" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="lesson_order">Urutan Materi</label>
                                <input type="number" name="lesson_order" id="lesson_order" value="<?php echo $item['lesson_order']?>" required placeholder="Urutan" class="form-control">
                            </div>
                            <div class="text-right">
                                <input type="submit" name="submit" value="Simpan" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
    
<?php 
    if (isset($_POST['submit'])) {
        $id_course=$_POST['id_course'];
        $lesson_name=$_POST['lesson_name'];
        $lesson_description=$_POST['lesson_description'];
        $lesson_order=$_POST['lesson_order'];

        $sql="UPDATE lessons SET id_course=$id_course, lesson_name='$lesson_name', lesson_description='$lesson_description',lesson_order=$lesson_order WHERE id_lesson=$id";
        $db->runSQL($sql);
        header("location:/eduvest/lessons/select.php?success=1&lesson_name=" . urlencode($lesson_name));exit;
    }
?>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
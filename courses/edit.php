<?php 
    require_once "../config.php";
    $db=new DB;
    if (isset($_GET['id'])) {
        $id=$_GET['id'];
        $sql="SELECT * FROM courses WHERE  id_course=$id";
        $item=$db->getITEM($sql);
        $id_category=$item['id_category'];
    }
    $row=$db->getALL("SELECT * FROM categories ORDER BY category_name ASC");
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

                <!-- Card Form -->
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0"><a href="/eduvest/courses/select.php" class="text-decoration-none"><i class="bi bi-arrow-left mr-2 text-light"></i></a>Update Kategori</h4>
                    </div>
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="id_category">Kategori</label>
                                <select name="id_category" id="id_category" class="form-control" required>
                                <?php foreach ($row as $r): ?>
                                    <option <?php if ($id_category==$r['id_category']) echo "selected";?> value="<?php echo $r['id_category'] ?>"><?php echo $r['category_name'] ?></option>
                                <?php endforeach?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="course_pictures">Foto</label>
                                <input type="file" name="course_pictures" id="course_pictures" class="form-control-file" accept="assets/*">
                            </div>
                            <div class="form-group">
                                <label for="course_name">Nama Kelas</label>
                                <input type="text" name="course_name" id="course_name" value="<?php echo $item['course_name']?>" required placeholder="Nama Kelas" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="course_description">Deskripsi</label>
                                <input type="text" name="course_description" id="course_description" value="<?php echo $item['course_description']?>" required placeholder="Deskripsi" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="course_price">Harga</label>
                                <input type="number" name="course_price" id="course_price" required placeholder="Harga" value="<?php echo $item['course_price']?>" class="form-control">
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
        $id_category=$_POST['id_category'];
        $course_name=$_POST['course_name'];
        $course_description=$_POST['course_description'];
        $course_price=$_POST['course_price'];
        $course_pictures=$item['course_pictures'];
        $temp=$_FILES['course_pictures']['tmp_name'];

        if (!empty($temp)) {
            $course_pictures=$_FILES['course_pictures']['name'];
            move_uploaded_file($temp,'../assets/media/'.$course_pictures);
        }
        $sql="UPDATE courses SET id_category=$id_category, course_name='$course_name', course_description='$course_description',course_price=$course_price,course_pictures='$course_pictures' WHERE id_course=$id";
        $db->runSQL($sql);
        header("location:/eduvest/courses/select.php?success=1&course_name=" . urlencode($course_name));exit;
    }
?>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
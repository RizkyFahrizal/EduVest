<?php 
    require_once "../config.php";
    $db=new DB;
    if (isset($_GET['id'])) {
    $id=$_GET['id'];
    // var_dump($id);die;
    $sql="SELECT * FROM categories WHERE id_category=$id";
    
    $row=$db->getITEM($sql);
    }
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
                        <h4 class="mb-0"><a href="/eduvest/categories/select.php" class="text-decoration-none"><i class="bi bi-arrow-left mr-2 text-light"></i></a>Update Kategori</h4>
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="category_name">Nama Kategori</label>
                                <input type="text" name="category_name" id="category_name" required value="<?php echo $row['category_name'] ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="category_description">Deskripsi Kategori</label>
                                <input type="text" name="category_description" id="category_description" required value="<?php echo $row['category_description'] ?>" class="form-control">
                            </div>
                            <div class="text-right">
                                <input type="submit" name="submit" value="Simpan Perubahan" class="btn btn-primary">
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
        $category_name=$_POST['category_name'];
        $category_description=$_POST['category_description'];

        $sql="UPDATE categories SET category_name='$category_name', category_description='$category_description' WHERE id_category=$id";
        echo $sql;
        $db->runSQL($sql);
        header("location:/eduvest/categories/select.php?success=1&category_name=" . urlencode($category_name));exit;
    }
?>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
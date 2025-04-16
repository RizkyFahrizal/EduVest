<h3>Courses</h3>
<div class="mb-4 mt-4">
    <?php 
        if(isset($_GET['id'])){
            $id=$_GET['id'];
        $where="WHERE courses.id_category = $id";
        $id="&id=".$id;
        }else {
            $where="";
            $id="";
        }  
    ?>
</div>
<?php
    $jumlahdata=$db->rowCOUNT("SELECT id_course FROM courses $where");
    $banyak=5;

    $halaman=ceil($jumlahdata/$banyak);

    if (isset($_GET['p'])) {
            $p=$_GET['p'];
            $mulai=($p * $banyak)-$banyak;
        }else {
            $mulai=0;
        }

    $sql="SELECT courses.*, categories.category_name 
    FROM courses 
    JOIN categories ON courses.id_category = categories.id_category
    $where ORDER BY course_name ASC LIMIT $mulai,$banyak";
    $row=$db->getALL($sql);

    $no=1+$mulai;
?>
<div class="container mt-4">
    <div class="row">
        <?php if (!empty($row)) : ?>
            <?php foreach ($row as $r) : ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <img src="/eduvest/assets/media/<?php echo $r['course_pictures']; ?>" class="card-img-top" alt="Course Image" style="height: 180px; object-fit: cover;">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title mb-1"><?php echo $r['course_name']; ?></h5>
                            <p class="text-muted mb-2"><i class="bi bi-tags"></i> <?php echo $r['category_name']; ?></p>
                            <p class="card-text" style="flex-grow: 1;"><?php echo substr($r['course_description'], 0, 100) . '...'; ?></p>
                            <h6 class="text-primary mb-3">Rp. <?php echo number_format($r['course_price'], 0, ',', '.'); ?></h6>
                            <a href="?f=home&m=lessons&id=<?php echo $r['id_course']; ?>" class="btn btn-primary btn-sm"><i class="bi bi-eye"></i> Lihat</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <div class="col-12">
                <div class="alert alert-info">Tidak ada course ditemukan.</div>
            </div>
        <?php endif; ?>
    </div>
</div>


<div style="clear:both;">
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
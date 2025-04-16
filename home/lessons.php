<?php  
require_once "config.php";
$db = new DB;

if (isset($_GET['id'])) {
    $id_course = $_GET['id'];

    // Query harus langsung digabung tanpa placeholder
    $sql = "SELECT lessons.*, courses.course_name 
            FROM lessons 
            JOIN courses ON lessons.id_course = courses.id_course 
            WHERE lessons.id_course = $id_course 
            ORDER BY lesson_order ASC";

    $row = $db->getALL($sql);
} else {
    echo "<div class='alert alert-warning'>ID Course tidak ditemukan.</div>";
    return;
}

$no = 1;
?>


<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Detail Materi</h4>
        <a href="?f=home&m=courses" class="btn btn-secondary btn-sm">
            <i class="bi bi-arrow-left"></i> Kembali ke Courses
        </a>
    </div>

    <?php if (!empty($row)): ?>
    <div class="table-responsive">
        <table class="table table-bordered table-hover shadow-sm">
            <thead class="thead-light">
                <tr>
                    <th>No</th>
                    <th>Materi</th>
                    <th>Deskripsi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($row as $r): ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo htmlspecialchars($r['lesson_name']); ?></td>
                    <td><?php echo htmlspecialchars($r['lesson_description']); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php else: ?>
        <div class="alert alert-info">Belum ada materi untuk course ini.</div>
    <?php endif; ?>
</div>

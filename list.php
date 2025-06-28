<?php
include './config.php';
// Konfigurasi Pagination
$limit = 5;
$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
$start = ($page - 1) * $limit;
// Ambil total data
$total_result = mysqli_query($conn, "SELECT COUNT(*) as total FROM
blog");
$total = mysqli_fetch_assoc($total_result)['total'];
$total_pages = ceil($total / $limit);
// Ambil data/sesuat Liatt dan offset
$data = mysqli_query($conn, "SELECT * FROM blog LIMIT $start, $limit");
?>
<h2>Daftar Blog</h2>
<a href="form_create.php">+ Tambah</a>
<table border="1" cellpadding="10" cellspacing="8">
<tr>
<th>ID</th>
<th>Nama</th>
<th>Judul</th>
<th>Aksi</th>
</tr>
<?php while($b = mysqli_fetch_assoc($data)): ?>
<tr>
<td><?= $b['id'] ?></td>
<td><?= htmlspecialchars($b['name']) ?></td>
<td><?= htmlspecialchars($b['title']) ?></td>
<td>
<a href="form_edit.php?id=<?= $b['id'] ?>">Edit</a> |
<a href="../proses/delete.php?id=<?= $b['id'] ?>" onclick="return confirm('Hapus?')">Hapus</a>
</td>
</tr>
<?php endwhile; ?>
</table>
<!-- Navigasi Halaman -->
<div style="margin-top:20px;">
    <?php if ($page > 1): ?>
     <a href="?page=<?= $page - 1?>">Prev</a>
    <?php endif; ?>

    <?php for ($i= 1; $i <= $total_pages; $i++): ?>
    <a href="?page=<?= $i ?>" style="<?= $i == $page ? 'font-weight:bold;' : ''?>">
    <?= $i ?>
    </a>
    <?php endfor; ?>

    <?php if($page < $total_pages): ?>
        <a href="?page=<?= $page + 1 ?>">Next </a>
    <?php endif; ?>
</div>
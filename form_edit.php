<?php
include './config.php';
$id = $_GET['id'];
$blog = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM blog WHERE id=$id"));
$content = json_decode($blog['content'], true); ?>
<h2>Edit Berita</h2>
<a href="list.php"> Kembali ke Daftar</a>
<form action="../proses/update.php" method="POST" style="margin-top: 20px; max-width: 600px;">
<input type="hidden" name="id" value="<?= $blog['id'] ?>">
<label for="title"><strong>Judul</strong></label><br>
<input type="text" name="title" value="<?=
htmlspecialchars($blog['title']) ?>" required style="width:100%; padding: 8px;"><br><br>
<label for="thumbnail"><strong>Thumbnail (base64 atau URL)</strong> </label><br>
<textarea name="thumbnail" rows="3" style="width: 100%; padding: 8px;"
placeholder="Masukkan URL atau base64..."><?=
htmlspecialchars($blog['thumbnail'])?></textarea><br><br>
<label><strong>Isi Konten:</strong></label><br>
<textarea name="content[]" rows="4" style="width:100%; padding: 8px;"
placeholder="Paragraf 1"><?= htmlspecialchars($content[0] ?? '') ?>
</textarea><br><br>
<textarea name="content[]" rows="4" style="width:100%; padding: 8px;" placeholder="Paragraf 2"><?= htmlspecialchars($content[1] ?? '') ?> </textarea><br><br>
<textarea name="content[]" rows="4" style="width: 100%; padding: 8px;" placeholder="Paragraf 3"><?= htmlspecialchars($content[2] ?? '') ?> </textarea><br><br>
<button type="submit" style="padding: 10px 20px;"> Update Berita</button> 
</form>
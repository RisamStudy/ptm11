<h2>Tambah Berita</h2>
<a href="list.php"> Kembali ke Daftar Berita</a>
<form action="../proccess/create.php" method="POST" style="margin-top: 20px; max-width: 600px;">
<label for="title"><strong>Judul</strong></label><br>
<input type="text" name="title" placeholder="Judul buku" required style="width:100%; padding: 8px; "><br><br>
<label for="thumbnail"><strong>Thumbnail</strong></label> <br>
<textarea name="thumbnail" placeholder="Masukkan URL atau base64 gambar" rows="3" style="width:100%; padding:8px;"> </textarea><br><br>
<label><strong>Isi Konten:</strong></label><br>
<textarea name="content[]" placeholder="Paragraf 1" rows="4" style="width:100%; padding: 8px; "></textarea><br> <br>
<textarea name="content[]" placeholder="Paragraf 2" rows="4" style="width:100%; padding: 8px; "></textarea><br> <br>
<textarea name="content[]" placeholder="Paragraf 3" rows="4" style="width:100%; padding: 8px; "></textarea><br> <br>
<button type="submit" style="padding: 10px 20px;">+ Simpan Buku</button>
</form>
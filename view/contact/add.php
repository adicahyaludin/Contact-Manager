<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
	table, th, td {
	    border: 1px solid black;
	    border-collapse: collapse;
	}
	.form-group {
	    margin-bottom: 15px;
	}
	.form-group label {
	    width: 70px;
	    display: inline-block;
	    vertical-align: top;
	}
	</style>
</head>
<body>

<h1>Add Contact</h1>
<a href="?c=contact">Kembali</a><br><br>
<form action="?c=contact&m=add" method="post">
	<div class="form-group">
		<label for="nama">Nama</label>
		<input type="text" name="nama" id="nama" value="<?php echo (isset($_POST['nama'])) ? $_POST['nama'] : '' ?>">
	</div>
	<div class="form-group">
		<label for="telepon">Telepon</label>
		<input type="text" name="telepon" id="telepon" value="<?php echo (isset($_POST['telepon'])) ? $_POST['telepon'] : '' ?>" >
	</div>
	<div class="form-group">
		<label for="email">Email</label>
		<input type="email" name="email" id="email" value="<?php echo (isset($_POST['email'])) ? $_POST['email'] : '' ?>">
	</div>
	<div class="form-group">
		<label for="alamat">Alamat</label>
		<textarea name="alamat" id="alamat" rows="7" cols="25"><?php echo (isset($_POST['alamat'])) ? $_POST['alamat'] : '' ?></textarea>
	</div>
	<div class="form-group">
		<label></label>
		<input type="submit" name="submit" value="Simpan">
	</div>
	<?php if ($errors) {
			?>
			<h3>Error:</h3>
			<ul>
				<?php foreach ($errors as $value) { ?>
					<li><?php echo $value; ?></li>
				<?php } ?>
			</ul>
	<?php } ?>
</form>

</body>
</html>
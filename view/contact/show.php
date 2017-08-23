<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
	table, th, td {
	    border: 1px solid black;
	    border-collapse: collapse;
	}
	</style>
</head>
<body>

<h1>Show <?php echo $contact['nama']; ?></h1>
<a href="?c=contact">Kembali</a><br><br>
<table>
	<tbody>
		<tr>
			<td>Nama</td>
			<td><?php echo $contact['nama']; ?></td>
		</tr>
		<tr>
			<td>Telepon</td>
			<td><a href="tel:<?php echo $contact['telepon']; ?>"><?php echo $contact['telepon']; ?></a></td>
		</tr>
		<tr>
			<td>Email</td>
			<td><a href="mailto:<?php echo $contact['email']; ?>"><?php echo $contact['email']; ?></a></td>
		</tr>
		<tr>
			<td>Alamat</td>
			<td><a href="https://www.google.com/maps?q=<?php echo $contact['alamat']; ?>"><?php echo $contact['alamat']; ?></td>
		</tr>
	</tbody>
</table>

</body>
</html>
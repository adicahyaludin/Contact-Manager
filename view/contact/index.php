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

<h1>Contact Manager</h1>
<a href="?c=contact&m=add">Add Contact</a><br><br>
<table>
	<thead>
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Telepon</th>
			<th>Email</th>
			<th>Alamat</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php
		if ($contacts) {
			foreach ($contacts as $k => $v) {
			?>
				<tr>
					<td><?php echo $k+1; ?></td>
					<td><a href="?c=contact&m=show&id=<?php echo $v['id']; ?>"><?php echo $v['nama']; ?></a></td>
					<td><a href="tel:<?php echo $v['telepon']; ?>"><?php echo $v['telepon']; ?></a></td>
					<td><a href="mailto:<?php echo $v['email']; ?>"><?php echo $v['email']; ?></a></td>
					<td><a href="https://www.google.com/maps?q=<?php echo $v['alamat']; ?>"><?php echo $v['alamat']; ?></a></td>
					<td>
						<a href="?c=contact&m=show&id=<?php echo $v['id']; ?>">Lihat</a>
						<a href="?c=contact&m=edit&id=<?php echo $v['id']; ?>">Edit</a>
						<a href="?c=contact&m=delete&id=<?php echo $v['id']; ?>">Delete</a>
					</td>
				</tr>
			<?php
			}
		} else { ?>
			<tr>
				<td colspan="6">Tidak ada kontak</td>
			</tr>
		<?php
		}
		?>
	</tbody>
</table>

</body>
</html>
<!DOCTYPE html>
<html>
<head>
	<title>Menghubungkan codeigniter dengan database mysql</title>
</head>
<body>
	<h1>Mengenal Model Pada Codeigniter | MalasNgoding.com</h1>
	<table border="1">
		<tr>
			<th>Nama</th>
			<th>nim</th>
			<th>alamat</th>
		</tr>
		<?php foreach($biodata as $u){ ?>
		<tr>
			<td><?php echo $u->nama ?></td>
			<td><?php echo $u->nim ?></td>
			<td><?php echo $u->alamat ?></td>
		</tr>
		<?php } ?>
	</table>
</body>
</html>
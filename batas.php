<html>
<head>
	<title>Limitasi Data</title>
</head>
<body>
	<form method="post" action="" name="frm_select">
		Tampilkan
		<?php
		$halaman = array(
    	"Pilih", 1, 5, 10, 20
  		); ?>
  		<select name="row_page"
                    onchange="document.frm_select.selectedIndex=0;
                              document.frm_select.submit();">
              <?php foreach ($halaman as $hal): ?>
                <?php
                  if ($_POST["row_page"] == $hal) $selected1 = "selected";
                  else $selected1 = ""; ?>        
                <option value="<?php echo $hal;?>" <?php echo $selected1; ?>>
                  <?php echo strtoupper($hal); ?>
                </option>
              <?php endforeach ?>
            </select>
	</form>
<?php
if (isset($_POST['row_page']) && $_POST['row_page']) {
	require "konek.php";
	$row = $_POST['row_page'];
	$sql = "SELECT * FROM mahasiswa LIMIT $row";
	$res = mysql_query($sql);
	if($res) {
	$num = mysql_num_rows($res);
	if($num) { ?>
		<table border=1 cellspacing=1 cellpadding=5>
			<tr>
				<th>#</th>
				<th width=100>NIM</th>
				<th width=150>Nama</th>
				<th>Alamat</th>
			</tr>
			<?php
			$i=1;
			while ($row = mysql_fetch_row($res)) { ?>
			<tr>
				<td>
					<?php echo $i;?>
				</td>
				<td>
					<?php echo $row[0];?>
				</td>
				<td>
					<?php echo $row[1];?>
				</td>
				<td>
					<?php echo $row[2];?>
				</td>
			</tr>
			<?php
			$i++;
			}
		?>
		</table>
	<?php
	} else {
		echo 'Data tidak ditemukan';
	}
}
}
?>
</body>

</html>
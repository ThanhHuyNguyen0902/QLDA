<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>
<div class="container-fluid">
	<div class="col-sm-4"></div>
	<div class="col-sm-4">
		<?php
		//code php 
		$lid = $_GET["id"];
		$conn = mysqli_connect("localhost", "root", "vertrigo", "qlsv");
		$sql = "SELECT * from lop where id=" . $lid;
		$lop = $conn->query($sql);
		$l = $lop->fetch_assoc();
		?>
		<h3>CẬP NHẬT LỚP</h3>
		<form class="form-horizontal" name="f" action="update.php" method="POST">
		<input type="hidden" name="txtid" value="<?php echo $l["id"]; ?>">	
		<div class="form-group">
			<label class="control-label" for="txtlop">Lớp</label>
			<input class="form-control" type="text" name="txtlop" value="<?php echo $l["lop"]; ?>">
		</div>
		<div class="form-group">
			<label class="control-label" for="txtmota">Mô tả</label>
			<input class="form-control" type="text" name="txtmota" value="<?php echo $l["mota"]; ?>">
		</div>
		<input class="btn btn-info"  type="submit" value="Cập nhật">
		</form>
	</div>
	<div class="col-sm-4"></div>
</div>
</body>
</html>
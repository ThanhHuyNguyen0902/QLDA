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
<div class="container">
	<div class="row">
		<div class="col-sm-4"></div>
		<div class="col-sm-4">
			<h1>Thêm lớp</h1>
			<form name="f" action="add.php" method="POST">
			<div class="form-group">
				<label for="">Lớp</label>		
				<input class="form-control" type="text" name="txtlop" placeholder="Nhập lớp">
			</div>
			<div class="form-group">
				<label for="">Mô tả</label>		
				<input class="form-control" type="text" name="txtmota" placeholder="Nhập mô tả">
			</div>
			<input class="btn btn-info" type="submit" value="Lưu">
			</form>
		</div>
		<div class="col-sm-4"></div>
	</div>
</div>
</body>
</html>
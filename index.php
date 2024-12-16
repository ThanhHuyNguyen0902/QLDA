<!DOCTYPE html>
<html>
	<head>
	  <meta charset="utf-8">
	  <title>Quản lý sinh viên</title>
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	<body>
		<!-- kết nối csdl-->

		<div class="container">
			 <div class="row">
				<!-- Hiện danh sách sinh viên-->
				<div class="col-sm-8">
					<a href="index.php"><h3>DANH SÁCH LỚP</h3></a>
					<table class="table table-hover">
						<tr><th>Lớp</th><th>Mô tả</th></tr>
						<?php
						$conn = mysqli_connect("localhost", "root", "vertrigo", "qlsv");
						$sql = "SELECT * FROM lop";
						$lop = mysqli_query($conn, $sql);
						if(mysqli_num_rows($lop) > 0) {
							while($l = mysqli_fetch_assoc($lop)) {
								echo "<tr>";
								echo "<td>". $l["lop"] . "</td>";
								echo "<td>". $l["mota"] . "</td>";
								echo "<td><a href=\"updateform.php?id=" . $l["id"] . "\">Sửa</a> | <a href=\"delete.php?id=" . $l["id"] . "\">Xóa</a></td>";
								echo "</tr>";
							}
						}
						?>
					</table>
					<div style="text-align:right;">
						<a class="btn btn-primary" href="addform.php"><span class="glyphicon glyphicon-plus"></span> Thêm lớp</a>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
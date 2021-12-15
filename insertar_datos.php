<?php 
	include_once 'api/conexion.php';
	////////////////////////// INSERT DE DATOS /////////////////////////////////////////////
	if(isset($_POST['guardar'])){
		$nombre=$_POST['nombre'];
		$precio=$_POST['precio'];
		$imagen1 = $_FILES['imagen1']['tmp_name'];
		$imagen2 = $_FILES['imagen2']['tmp_name'];
		$imagen3 = $_FILES['imagen3']['tmp_name'];
		if(!empty($nombre) && !empty($precio) && !empty($imagen1) && !empty($imagen2) && !empty($imagen3)){
        	$imgContent1 = file_get_contents($imagen1);
        	$imgContent2 = file_get_contents($imagen2);
        	$imgContent3 = file_get_contents($imagen3);
			$consulta_insert=$con->prepare('INSERT IGNORE INTO productos(nombre,precio,imagen,imagen2,imagen3) VALUES(:nombre,:precio,:imagen1,:imagen2,:imagen3)');
			$consulta_insert->execute(array(
				':nombre' =>$nombre,
				':precio' =>$precio,
				':imagen1' =>$imgContent1,
				':imagen2' =>$imgContent2,
				':imagen3' =>$imgContent3
			));
			echo "<script>alert('La carga de datos fue afectuada.');</script>";
		}else{
			echo "<script>alert('Los campos no pueden estar vacios para hacer el insert.');</script>";
		}
	}
	//////////////////////////////// UPDATE DE DATOS ////////////////////////////////////////
	if(isset($_POST['guardar2'])){
		$nombre2=$_POST['nombre2'];
		$precio2=$_POST['precio2'];
		$imagenE1 = $_FILES['imagenE1']['tmp_name'];
		$imagenE2 = $_FILES['imagenE2']['tmp_name'];
		$imagenE3 = $_FILES['imagenE3']['tmp_name'];
		$id = $_POST['id'];
        $stock = $_POST['stock'];
		if(!empty($id)){
			if($imagenE1){
				$imgContentE1 = file_get_contents($imagenE1);
				$consulta_insert=$con->prepare('UPDATE IGNORE productos SET imagen = :imagen1 WHERE id = :id');
				$consulta_insert->execute(array(
					':imagen1' =>$imgContentE1,
					':id' =>$id
				));
				echo "<script>alertify.alert('EDICION DE DATOS','La primera imagen fue editada.');</script>";
			}else{
				echo "<script>alert('La primera imagen no fue editada.');</script>";
			}
			if($imagenE2){
				$imgContentE2 = file_get_contents($imagenE2);
				$consulta_insert=$con->prepare('UPDATE IGNORE productos SET imagen2 = :imagen2 WHERE id = :id');
				$consulta_insert->execute(array(
					':imagen2' =>$imgContentE2,
					':id' =>$id
				));
				echo "<script>alert('La segunda imagen fue editada.');</script>";
			}else{
				echo "<script>alert('La segunda imagen no fue editada.');</script>";
			}
			if($imagenE3){
				$imgContentE3 = file_get_contents($imagenE3);
				$consulta_insert=$con->prepare('UPDATE IGNORE productos SET imagen3 = :imagen3 WHERE id = :id');
				$consulta_insert->execute(array(
					':imagen3' =>$imgContentE3,
					':id' =>$id
				));
				echo "<script>alert('La tercera imagen fue editada.');</script>";
			}else{
				echo "<script>alert('La tercera imagen no fue editada.');</script>";
			}
			if(!empty($nombre2)){
				$consulta_insert=$con->prepare('UPDATE IGNORE productos SET nombre = :nombre WHERE id = :id');
				$consulta_insert->execute(array(
					':nombre' =>$nombre2,
					':id' =>$id
				));
				echo "<script>alert('El nombre del producto fue editado.');</script>";
			}else{
				echo "<script>alert('El nombre del producto no fue editado.');</script>";
			}
			if(!empty($precio2)){
				$consulta_insert=$con->prepare('UPDATE IGNORE productos SET precio = :precio WHERE id = :id');
				$consulta_insert->execute(array(
					':precio' =>$precio2,
					':id' =>$id
				));
				echo "<script>alert('El precio del producto fue editado.');</script>";
			}else{
				echo "<script>alert('El precio del producto no fue editado.');</script>";
			}
            if(!empty($stock)){
				$consulta_insert=$con->prepare('UPDATE IGNORE productos SET stock = :stock WHERE id = :id');
				$consulta_insert->execute(array(
					':stock' =>$stock,
					':id' =>$id
				));
				echo "<script>alert('El stock del producto fue editado.');</script>";
			}else{
				echo "<script>alert('El stock del producto no fue editado.');</script>";
			}
		}else{
			echo "<script>alert('El campo ID no puede estar vacios para hacer la edicion.');</script>";
		}
	}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="wdth=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="libs/bootstrap4.6.1/css/bootstrap.css">
    <link rel="stylesheet" href="libs/bootstrap4.6.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <!--BootStrap MODAL-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- Alertify -->
    <script src="libs/alertifyjs/alertify.min.js"></script>
    <script src="libs/alertifyjs/settings.js?41541"></script>
    <link rel="stylesheet" href="libs/alertifyjs/css/alertify.min.css" />
    <link rel="stylesheet" href="libs/alertifyjs/css/themes/default.min.css" />
    <!-- Datepicker -->
    <link rel="stylesheet" href="libs/datepicker/jquery-ui.1.12.1.css">
    <script src="libs/datepicker/jquery-ui.1.12.1.js"></script>
    <script src="libs/datepicker/jquery-351.min.js" type="text/javascript"></script>
</head>
<body>
<a href="index.php"> VOLVER </a>
	<div class="container border p-5">
		<form action="" method="post" enctype="multipart/form-data" class="border p-5">
			<div align="center">
				<h2>Insertar datos</h2>
			</div>
			<hr>
			<div class="row">
				<div class="col-md-6">
					<label>Nombre del producto</label>
					<input type="text" name="nombre" placeholder="Nombre del producto" class="form-control" required>
					<br>
					<label>Precio del producto</label>
					<input type="text" name="precio" placeholder="Precio del producto" class="form-control" required>
				</div>
				<div class="col-md-6">
					<label>Primera imagen</label>
					<div class="border p-2 rounded-lg">
						<input type="file" name="imagen1" class="form-control-file" value="imag" required>
					</div>
					<label>Segunda imagen</label>
					<div class="border p-2 rounded-lg">
						<input type="file" name="imagen2" class="form-control-file" value="imag" required>
					</div>
					<label>Tercera imagen</label>
					<div class="border p-2 rounded-lg">
						<input type="file" name="imagen3" class="form-control-file" value="imag" required>
					</div>
				</div>
			</div>
			<hr>
			<div align="center">
					<a href="" class="btn btn-success col-3">Cancelar</a>
					<input type="submit" name="guardar" value="Guardar" class="btn btn-success col-3">
			</div>
		</form>
	</div>
	<div class="container border p-5">
		<form action="" method="post" enctype="multipart/form-data" class="border p-5">
			<div align="center">
				<h2>Editar datos</h2>
			</div>
			<hr>
			<div class="row">
				<div class="col-md-6">
					<label>Id del producto que quiere editar</label>
					<input type="text" name="id" placeholder="Id del producto que quiere editar" class="form-control" required>
					<br>
					<label>Nombre del producto</label>
					<input type="text" name="nombre2" placeholder="Nombre del producto" class="form-control">
					<br>
					<label>Precio del producto</label>
					<input type="text" name="precio2" placeholder="Precio del producto" class="form-control">
                    <br>
                    <label>Stock del producto</label><br>
                    <label>Si</label>
                    <input class="form-check-input position-static" type="radio" name="stock" checked="checked" id="blankRadio1" value="t" aria-label="...">
                    <label>  </label>
                    <label>No</label>
                    <input class="form-check-input position-static" type="radio" name="stock" id="blankRadio1" value="f" aria-label="...">
				</div>
				<div class="col-md-6">
					<label>Primera imagen</label>
					<div class="border p-2 rounded-lg">
						<input type="file" name="imagenE1" class="form-control-file" value="imag">
					</div>
					<label>Segunda imagen</label>
					<div class="border p-2 rounded-lg">
						<input type="file" name="imagenE2" class="form-control-file" value="imag">
					</div>
					<label>Tercera imagen</label>
					<div class="border p-2 rounded-lg">
						<input type="file" name="imagenE3" class="form-control-file" value="imag">
					</div>
				</div>
			</div>
			<hr>
			<div align="center">
					<a href="" class="btn btn-success col-3">Cancelar</a>
					<input type="submit" name="guardar2" value="Guardar" class="btn btn-success col-3">
			</div>
		</form>
	</div>
</body>
</html>

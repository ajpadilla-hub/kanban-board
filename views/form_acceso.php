<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin access</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="../assets/css/form_Acceso.css">
</head>

<body>
	<h1>Acceso </h1>
	<div class="container">

		<form action=" <?php echo $_SERVER['PHP_SELF'] ?>" method="post">
			<input type="hidden" name="action" value="access">
			<div class="form-group row">
				<label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="email">
				</div>
			</div>

			<div class="form-group row">
				<label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="password">
				</div>
			</div>
			<div class="form-group row">
				<div class="col-sm-2"></div>
				<div class="col-sm-10">
					<div class="form-check">
						<input type="checkbox" name="recordar">

						<label class="form-check-label" for="gridCheck1">
							Recuérdame
						</label>
						<label class="form-check-label register" for="gridCheck1">
							<a href="../index.php?section=registro">Regístrate</a>
						</label>
					</div>
				</div>
			</div>
			<div class="form-group row">
				<div class="col-sm-10">
					<button type="submit" class="btn btn-secondary">Acceder</button>
				</div>
			</div>
		</form>

	</div>
</body>

</html>
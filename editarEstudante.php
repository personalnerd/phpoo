<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Editar Estudante</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body class="bg-light">
	<div class="container mt-4">
		<div class="row justify-content-center mb-4">
			<div class="col-12 col-md-6 p-0">
				<a class="btn btn-dark rounded-pill px-4" href="index.php">← Voltar para a lista</a>
			</div>
		</div>

		<div class="row justify-content-center">
			<div class="col-12 col-md-6 bg-white p-4 rounded shadow">
				<h1 class="mb-5 text-center">Edição de Estudante</h1>

				<?php
				require './Pessoa.php';
				require './Estudante.php';

				$estudante = new Estudante($_GET['email']);

				if (isset($_POST['editarEstudante'])) {
					$formData = filter_input_array(INPUT_POST, FILTER_DEFAULT);
					$estudante = new Estudante($formData['email']);
					$estudanteDados = $estudante->editarEstudante($formData);
					if ($estudanteDados) {
						echo "<div class='alert alert-success text-center mt-4' role='alert'>Estudante editado com sucesso.</div>";
					} else {
						echo "<div class='alert alert-danger text-center mt-4' role='alert'>Falha ao editar estudante.</div>";
					}
				} else {
					$estudanteDados = $estudante->verEstudante();
				?>

					<form name="EdicaoEstudante" action="" method="POST">
						<input type="hidden" name="id" value="<?= $estudanteDados->id ?>" />
						<div class="form-group mb-2">
							<label for="nome">Nome</label>
							<input class="form-control" type="text" name="nome" value="<?= $estudanteDados->nome ?>">
						</div>
						<div class="form-group mb-2">
							<label for="telefone">Telefone</label>
							<input class="form-control" type="text" name="telefone" value="<?= $estudanteDados->telefone ?>">
						</div>
						<div class="form-group mb-2">
							<label for="email">E-mail</label>
							<input class="form-control" type="email" name="email" value="<?= $estudanteDados->email ?>">
						</div>
						<div class="form-group mb-2">
							<label for="data_nascimento">Data de Nascimento</label>
							<input class="form-control" type="text" name="data_nascimento" value="<?= $estudanteDados->data_nascimento ?>">
						</div>
						<div class="form-group mb-2">
							<label for="matricula">Matrícula</label>
							<input class="form-control" type="text" name="matricula" value="<?= $estudanteDados->matricula ?>">
						</div>
						<div class="d-flex justify-content-end mt-5">
							<input class="btn btn-primary rounded-pill px-4" type="submit" value="Editar" name="editarEstudante">
						</div>

					</form>
				<?php } ?>
			</div>
		</div>
</body>

</html>
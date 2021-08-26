<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Cadastro professor</title>

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
				<h1 class="mb-5 text-center">Cadastro de Professor</h1>
				<?php
				require './Pessoa.php';
				require './Professor.php';

				$formData = filter_input_array(INPUT_POST, FILTER_DEFAULT);

				if (!empty($formData)) {
					$professor = new Professor($formData['email']);
					$cadastro = $professor->criarProfessor($formData);

					if ($cadastro) {
						echo "<div class='alert alert-success text-center' role='alert'>Professor cadastrado com sucesso.</div>";						
					} else {
						echo "<div class='alert alert-danger text-center' role='alert'>Problema ao cadastrar professor.</div>";
					}
				}
				?>
				<form name="CadastroProfessor" action="" method="POST">
					<div class="form-group mb-2">
						<label for="nome">Nome</label>
						<input class="form-control" type="text" name="nome" required>
					</div>
					<div class="form-group mb-2">
						<label for="telefone">Telefone</label>
						<input class="form-control" type="text" name="telefone">
					</div>
					<div class="form-group mb-2">
						<label for="email">E-mail</label>
						<input class="form-control" type="email" name="email" required>
					</div>
					<div class="form-group mb-2">
						<label for="data_nascimento">Data de Nascimento</label>
						<input class="form-control" type="text" name="data_nascimento">
					</div>
					<div class="form-group mb-2">
						<label for="especialidade">Especialidade</label>
						<input class="form-control" type="text" name="especialidade">
					</div>
					<div class="form-group mb-2">
						<label for="salario">Salário</label>
						<input class="form-control" type="text" name="salario">
					</div>

					<div class="d-flex justify-content-end mt-5">
						<input class="btn btn-primary rounded-pill px-4" type="submit" value="Cadastrar" name="cadastrarProfessor">
					</div>
					

				</form>
			</div>
		</div>
</body>

</html>
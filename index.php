<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Sistema de Gestão Acadêmico</title>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body class="bg-light">
	<?php
	require './Pessoa.php';
	require './Estudante.php';
	require './Professor.php';
	?>
	<div class="container mt-4">
		<div class="row">
			<div class="col">
				<div class="bg-white me-1 p-4 rounded shadow">
					<h2 class="mb-5 text-center">Professores</h2>					
					<?php
						/*
						// listando um só item
						$professor = new Professor('debora@debora.com.br');
						$professorDados = $professor->verProfessor();
						echo "None: {$professorDados->nome} <br>";
						echo "Telefone: {$professorDados->telefone} <br>";
						echo "E-mail: {$professorDados->email} <br>";
						echo "Especialidade: {$professorDados->especialidade} <br>";
						echo "Salário: {$professorDados->salario} <br>";
						echo "Idade: {$professor->calculaIdade($professorDados->data_nascimento)} <br>";
						echo "Avaliação: {$professor->calculaAvaliacao()} <br>";
						*/
						
						$conexao = new Conn();
						$professores = $conexao->listarProfessores();
						
						echo "<table class='table'><thead><tr><th>Nome</th><th>Especialidade</th><th>Edição</th></tr></thead><tbody>";
						
						foreach ($professores as $key => $value) {
							echo "<tr><td>".$value['nome']."</td><td>".$value['especialidade']."</td><td><a class='badge bg-secondary rounded-pill text-decoration-none' href='editarProfessor.php?email={$value['email']}'>Editar</a></td>";
						}
						
						echo "</tbody></table>";
						?>
						<div class="d-flex justify-content-end mt-5">
							<a class="btn btn-primary rounded-pill px-4" href="cadastroProfessor.php">Cadastrar Professor</a>
						</div>
				</div>
			</div>		

			<div class="col">
				<div class="bg-white ms-1 p-4 rounded shadow">
					<h2 class="mb-5 text-center">Estudantes</h2>
					<?php
						$conexao = new Conn();
						$estudantes = $conexao->listarEstudantes();

						echo "<table class='table'><thead><tr><th>Nome</th><th>Matrícula</th><th>Edição</th></tr></thead><tbody>";

						foreach ($estudantes as $key => $value) {
							echo "<tr><td>".$value['nome']."</td><td>".$value['matricula']."</td><td><a class='badge bg-secondary rounded-pill text-decoration-none' href='editarEstudante.php?email={$value['email']}'>Editar</a></td>";
						}

						echo "</tbody></table>";
					?>
					<div class="d-flex justify-content-end mt-5">
						<a class="btn btn-primary rounded-pill px-4" href="cadastroEstudante.php">Cadastrar Estudante</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
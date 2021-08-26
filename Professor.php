<?php

class Professor extends Pessoa
{
  public string $especialidade;
  public float $salario;

  public function verProfessor(): object
  {
    $conn = new Conn();
    $conectar = $conn->connect();

    $sql = "SELECT id, nome, telefone, email, especialidade, salario, data_nascimento
            FROM php_oo.professor o
            LEFT JOIN php_oo.pessoa p
            ON o.pessoa_id = p.ID
            WHERE email = :email";
    $result = $conectar->prepare($sql);
    $result->execute(array(':email' => $this->email));
    return $result->fetchObject();
  }

  public function calculaAvaliacao()
  {
    $qtdDisciplinasMinistradas = 100;
    $qtdAnosInstituicao = 12;
    $resultado = $qtdDisciplinasMinistradas * $qtdAnosInstituicao;
    return $resultado;
  }

  public function criarProfessor(array $professor): bool
	{
		$conn = new Conn();
		$conexao = $conn->connect();

		$sql = "INSERT INTO pessoa (nome, telefone, email, data_nascimento)
            VALUES (:nome, :telefone, :email, :data_nascimento)";
		$result = $conexao->prepare($sql);
		$result->execute(array(
			':nome' => $professor['nome'],
			':telefone' => $professor['telefone'],
			':email' => $professor['email'],
			':data_nascimento' => $professor['data_nascimento'],
		));

		$idCriado = $conexao->lastInsertId();

		if ($idCriado) {
			$sql = "INSERT INTO professor (pessoa_id, especialidade, salario)
              VALUES (?, ?, ?)";
			$result = $conexao->prepare($sql);
			$result->execute(array($idCriado, $professor['especialidade'], $professor['salario']));
			if ($result->rowCount()) {
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}

  public function editarProfessor(array $professor):bool
    {
        $conn = new Conn();
        $conexao = $conn->connect();
        
        $sql = "UPDATE pessoa 
                SET nome=:nome, telefone=:telefone, email=:email, data_nascimento=:data_nascimento
                WHERE ID=:id";
        $result = $conexao->prepare($sql);
        $resultStatus = $result->execute(array(
                                ':nome' => $professor['nome'],
                                ':telefone' => $professor['telefone'],
                                ':email' => $professor['email'],
                                ':data_nascimento' => $professor['data_nascimento'],
                                ':id' => $professor['id']
                        ));
        if ($resultStatus) {
            $sql = "UPDATE professor
                    SET especialidade=:especialidade, salario=:salario
                    WHERE pessoa_id=:id";
            $result = $conexao->prepare($sql);
            $resultStatus = $result->execute(array(':especialidade' => $professor['especialidade'], ':salario' => $professor['salario'], ':id' => $professor['id']));
            
            if ($resultStatus) {
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
}

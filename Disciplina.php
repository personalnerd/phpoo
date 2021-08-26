<?php

class Disciplina
{
	public string $nome;
	public string $codigo;
	public int $creditos;
	public static $ministrada;

	public static function ministrarDisciplina()
	{
		self::$ministrada++;
	}

	public function verDisciplina()
	{
		return "{$this->nome} ({$this->codigo}) - {$this->creditos} créditos - ".self::$ministrada;
	}
}
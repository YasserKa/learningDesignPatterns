<?php

class MinionType
{
	const RED  = 'red clan';
	const BLUE = 'blue clan';
}

abstract class Minion
{
	protected $type;
	protected $name;

	public function getType(): int
	{
		return $this->type();
	}

	public function getName(): string
	{
		return $this->name();
	}

	public function getDetails(): string
	{
		return $this->name.' is a minion who works for the '.$this->type; 
	}
			
	public function setName(string $name)
	{
		$this->name = $name;
	}
			
	abstract function __clone();
}

class RedMinion extends Minion
{
	function __construct()
	{
		$this->type = MinionType::RED;
	}

	function __clone(){}
}

class BlueMinion extends Minion
{
	function __construct()
	{
		$this->type = MinionType::BLUE;
	}

	function __clone(){}
}

function main()
{
	$blueMinion = new BlueMinion();
	$redMinion  = new RedMinion();

	$james = clone $blueMinion;
	$james->setName('James');

	$maria = clone $redMinion;
	$maria->setName('Maria');

	echo $james->getDetails();
	echo PHP_EOL;
	echo $maria->getDetails();
	echo PHP_EOL;
}

main();

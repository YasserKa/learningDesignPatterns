<?php

abstract class Monster 
{
	abstract public function getAbility(): string;
	abstract public function getName(): string;

	public function getDescription()
	{
		return 'The monster name is '.$this->getName().
			' and his ability is '.$this->getAbility();
	}
}

class FlyingMonster extends Monster
{
	private $name;
	private $ability;

	public function __construct($name, $ability)
	{
		$this->name = $name;
		$this->ability = $ability;
	}

	public function getName(): string
	{
		return $this->name;
	}

	public function getAbility(): string
	{
		return $this->ability;
	}

	public function fly()
	{
		echo 'I am flying!';
	}
}


class SwimmingMonster extends Monster
{
	private $name;
	private $ability;

	public function __construct($name, $ability)
	{
		$this->name = $name;
		$this->ability = $ability;
	}

	public function getName(): string 
	{
		return $this->name;
	}

	public function getAbility(): string 
	{
		return $this->ability;
	}

	public function swim() 
	{
		echo 'I am swimming';
	}
}

class MonsterType 
{
	const FLYING = 0;
	const SWIMMING = 1;
}
class MonsterFactory 
{
	public static function instantiateMonster($monsterType, $name, $ability): Monster 
	{
		switch($monsterType)
		{
		case MonsterType::FLYING:
			return new FlyingMonster($name, $ability);
			break;
		case MonsterType::SWIMMING:
			return new SwimmingMonster($name, $ability);
			break;
		}
		return null;
	}
}

function main() 
{
	$flyingMonster = MonsterFactory::instantiateMonster(MonsterType::FLYING, 'anivia', 'snowballs');
	$swimmingMonster = MonsterFactory::instantiateMonster(MonsterType::SWIMMING, 'reksai', 'tunnelOfDoom');
	echo $flyingMonster->getDescription().PHP_EOL;
	$flyingMonster->fly().PHP_EOL;
	echo $swimmingMonster->getDescription().PHP_EOL;
}

main();

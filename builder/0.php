<?php

class Race 
{
	const ELF = 0;
	const CHARR = 1;
	const HUMAN = 2; 
}

class Profession 
{
	const RANGER = 0;
	const MESMER = 1;
	const WARRIOR = 3;
}

class Character 
{
	private $race;
	private $profession;
	private $name;

	function __construct() 
	{
	}

	public function getRace() 
	{
		return $this->race;
	}

	public function getProfession() 
	{
		return $this->profession;
	}
	
	public function getName() 
	{
		return $this->name;
	}

	public function setRace($race) 
	{
			$this->race = $race;
	}

	public function setProfession($profession) 
	{
			$this->profession = $profession;
	}

	public function setName($name) 
	{
			$this->name = $name;
	}
}

interface CharacterBuilder 
{
		function setRace($race);
		function setProfession($profession); 
		function setName($name);
		function generate(): Character;
}

class CharacterBuilderImp implements CharacterBuilder 
{
 		private $character;

		public function __construct() 
		{
				$this->character = new Character();
		}

		public function setRace($race) 
		{
				$this->character->setRace($race);
				return $this;
		}

		public function setProfession($profession) 
		{
				$this->character->setProfession($profession);
				return $this;
		}

		public function setName($name) 
		{
				$this->character->setName($name);
				return $this;
		}

		public function generate(): Character 
		{
				return $this->character;
		}
}

class ElfWarriorGenerator 
{
		private $characterBuilder;

		function __construct($characterBuilder) 
		{
			$this->characterBuilder = $characterBuilder;		
		}

		function make() 
		{
			return $this->characterBuilder->setRace(Race::ELF)
										     ->setProfession(Profession::WARRIOR)
										     ->setName('Angela')
										     ->generate();
		}
}

function main() 
{
	$characterBuilder = new characterBuilderImp();
	$elfWarriorGenerator = new ElfWarriorGenerator($characterBuilder);
	$character = $elfWarriorGenerator->make();
	var_dump($character);
}

main();

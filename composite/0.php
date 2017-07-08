<?php

interface Minion
{
	function attack();
	function retreat();
}

class DarkMinion implements Minion
{
	function attack()
	{
		echo 'DarkMinion is attacking';
	}

	function retreat()
	{
		echo 'DarkMinion is retreating';
	}
}

class LightMinion implements  Minion
{
	function attack()
	{
		echo 'LightMinion is attacking';
	}

	function retreat()
	{
		echo 'LightMinion is retreating';
	}
}

class HordeOfMinions implements Minion
{
	private $minions = array();

	public function attack()
	{
		foreach($this->minions as $minion)
		{
			$minion->attack();
		}
	}
	
	public function retreat()
	{
		foreach($this->minions as $minion)
		{
			$minion->retreate();
		}
	}

	public function add($minion)
	{
		array_push($this->minions, $minion);
	}
    
	//TODO: CHECK how to do this in php *The proper way*
	public function remove($minion)
	{
		array_push($this->minions, $minion);
	}

	public function clear()
	{
		//Empty $this->minions
		echo 'The horde is empty now';
	}
}

function main()
{
	$darkMinion  = new DarkMinion();
	$lightMinion = new LightMinion();

	$hordeOfMinions = new HordeOfMinions();

	$hordeOfMinions.add($darkMinion);
	$hordeOfMinions.add($lightMinion);

	$hordeOfMinions->attack();
	$hordeOfMinions->retreat();

	$hordeOfMinions->clear();
}

main();

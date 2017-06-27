<?php

interface AreaFactory {
	public function startEvent(): Event;
	public function spawnMonster(): Monster;
}

# List of Platforms
class Volcano implements AreaFactory {

		public function startEvent(): Event {
				return new CollectFireGlobs();
		}
		public function spawnMonster(): Monster {
				return new Lava();
		}
}


class Swamp implements AreaFactory {

		public function startEvent(): Event {
				return new HideFromTHeQueen();
		}
		public function spawnMonster(): Monster {
				return new MutatedFrog();
		}
}


class Town implements AreaFactory {

		public function startEvent(): Event {
				return new CatchTheTheif();
		}
		public function spawnMonster(): Monster {
				return new Spy();
		}
}

# Interfaces acting as components for the platforms
interface Event {
		public function goal();
}

interface Monster {
		public function attack();
}

# Components for each platform
class CollectFireGlobs implements Event {
		public function goal() {
				echo 'Collect 10 fire globs for the ironsmith';
		}
}

class HideFromTheQueen implements Event {
		public function goal() {
				echo 'Hide from Queen Zelda who you betrayed because of your beloved Maria';
		}
}
class CatchTheTheif implements Event {
		public function goal() {
				echo 'Catch the theif who stole your holy sword';
		}
}

class Lava implements Monster {
		public function attack() {
				echo 'Flaming breathe!';
		}
}

class MutatedFrog implements Monster {
		public function attack() {
				echo 'Toxic saliva!';
		}
}
class Spy implements Monster {
		public function attack() {
				echo 'Poisonous knives!';
		}
}

# Platforms as enums
class Arenas {
	const VOLCANO = 0;		
    const SWAMP = 1;		
	const TOWN = 2;		

  static function getConstants() {
        $oClass = new ReflectionClass(__CLASS__);
        return $oClass->getConstants();
    }
}

function createArena($arena) {

		$arenaFactory = null;
		switch($arena) { 
			case(Arenas::VOLCANO):
					$arenaFactory = new Volcano();
					break;
			case(Arenas::SWAMP):
					$arenaFactory = new Swamp();
					break;
			case(Arenas::TOWN):
					$arenaFactory = new Town();
					break;
			default:
					
		}
			return $arenaFactory;	
		
}


function getInput() {

	$arenas = Arenas::getConstants();
	var_dump($arenas);
	$total = count($arenas);

	echo 'Select the desired Arena:'.PHP_EOL;
	while(true) {
		foreach($arenas as $key => $value) {
			echo $value.'- '. $key.PHP_EOL;

		}
		$input = (int)readline('Select your desired arena using its number: ');
		
		if(is_int($input) && $input >= 0 && $input < $total) {
			echo 'here';
			return $input;
		}
	}
}

function main() {

	$arena = getInput();
	$currentArena = createArena($arena);

	# Generate its components
	$event = $currentArena->startEvent();
	$monster = $currentArena->spawnMonster();

	$event->goal();
	echo PHP_EOL;
	$monster->attack();
	echo PHP_EOL;
}

main();
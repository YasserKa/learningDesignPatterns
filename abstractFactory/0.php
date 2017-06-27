<?php

interface SeasonFactory {
	public function CreateClothing(): Clothing;
	public function CreateActivity(): Activity;
}

# List of Platforms
class Winter implements SeasonFactory {

		public function CreateClothing(): Clothing {
				return new WinterClothing();
		}
		public function CreateActivity(): Activity {
				return new WinterActivity();
		}
}

class Spring implements SeasonFactory {

		public function CreateClothing(): Clothing {
				return new SpringClothing();
		}
		public function CreateActivity(): Activity {
				return new SpringActivity();
		}
}

class Summer implements SeasonFactory {

		public function CreateClothing(): Clothing {
				return new SummerClothing();
		}
		public function CreateActivity(): Activity {
				return new SummerActivity();
		}
}

# Interfaces acting as components for the platforms
interface Clothing {
		public function wear();
}

interface Activity {
		public function doActivity();
}

# Components for each platform
class WinterClothing implements Clothing {
		public function wear() {
				echo 'Warm clothes!';
		}
}

class SummerClothing implements Clothing {
		public function wear() {
				echo 'Underwear!';
		}
}

class SpringClothing implements Clothing {
		public function wear() {
				echo 'Colorful clothes?!';
		}
}

class WinterActivity implements Activity {
		public function doActivity() {
				echo 'Skiing!';
		}
}

class SummerActivity implements Activity {
		public function doActivity() {
				echo 'Swimming!';
		}
}

class SpringActivity implements Activity {
		public function doActivity() {
				echo 'Smelling flowers?!';
		}
}

# Platforms as enums
class Seasons {
	const SUMMER = 0;		
    const SPRING = 1;		
	const WINTER = 2;		
}

function seasonCreation($season) {

		$seasonFactory = null;
		switch($season) { 
			case(Seasons::SUMMER):
					$seasonFactory = new Summer();
					break;
			case(Seasons::SPRING):
					$seasonFactory = new Spring();
					break;
			case(Seasons::WINTER):
					$seasonFactory = new Winter();
					break;
			default:
					break;
		}
			return $seasonFactory;	
		
}

# Choose the platform
$currentSeason = seasonCreation(Seasons::WINTER);

# Generate its componentsk
$clothing = $currentSeason->CreateClothing();
$activity = $currentSeason->CreateActivity();

$clothing->wear();
$activity->doActivity();

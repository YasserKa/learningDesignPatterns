<?php

class Car {

	private $color;
	private $speed;

	function __construct() {
	
	}

	public function getColor() {
		return $this->color;
	}
	
	public function getSpeed() {
		return $this->speed;
	}

	public function setColor($color) {
			$this->color = $color;
	}

	public function setSpeed($speed) {
			$this->speed = $speed;
	}
}

class Colors {

		const RED = 0;
		const BLUE = 1;
		const WHITE = 2;
		const DARK = 3;
}

interface CarBuilder {

		function setColor($color);
		function setSpeed($speed); 
		function build(): Car;
}

class CarBuilderImpl implements CarBuilder {

 		private $car;

        public function __construct() {
				$this->car = new Car();
		}
		public function setColor($color) {
				$this->car->setColor($color);
				return $this;
		}
		public function setSpeed($speed) {
				$this->car->setSpeed($speed);
				return $this;
		}
		public function build(): Car{
				return $this->car;
		}
}

class CarBuilderDirector {

		private $carBuilder;

		function __construct($carBuilder) {
			$this->carBuilder = $carBuilder;		
		}

		function make() {
			return $this->carBuilder->setSpeed(10)
							        ->setColor(Colors::BLUE)
									->build();
		}
}

function main() {

	$carBuilder = new CarBuilderImpl();
	$carBuilderDirector = new CarBuilderDirector($carBuilder);
	$car = $carBuilderDirector->make();
	var_dump($car);
}

main();

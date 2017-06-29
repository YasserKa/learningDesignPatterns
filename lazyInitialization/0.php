<?php
class Weapon 
{
    private $type;
    private static $types = array();

	private function __construct($type) 
	{
        $this->type = $type;
    }

	public static function getWeapon($type) 
	{
        // Lazy initialization takes place here
		if (!isset(self::$types[$type])) 
		{
            self::$types[$type] = new Weapon($type);
        }
        return self::$types[$type];
    }

	public static function printCurrentTypes() 
	{
        echo 'Number of instances made: ' . count(self::$types) . "\n";
		foreach (array_keys(self::$types) as $key) 
		{
            echo "$key\n";
        }
        echo "\n";
    }
}

Weapon::getWeapon('Ranged');
Weapon::printCurrentTypes();

Weapon::getWeapon('Melee');
Weapon::printCurrentTypes();

Weapon::getWeapon('Ranged');
Weapon::printCurrentTypes();

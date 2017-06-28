<?php

class BulletStatus {
	const BRAND_NEW = 0;
	const FIRED = 1;
}
class Bullet {
	
	private $status;
	private $number;
	
	function __construct() {
		$this->status = BulletStatus::FIRED;
	}

	public function getStatus() {
		return $this->status;
	}
	
	public function getNumber() {
		return $this->number;
	}
	
	public function setStatus($status) {
		return $this->status = $status;
	}
	public function setNumber($number) {
		return $this->number = $number;
	}
}

class BulletPool {

	private static $availableBullets = array();
	private static $inUseBullets = array(); 

	public static function fireBullet(): Bullet {
		if(count(self::$availableBullets) !== 0) {
			$bullet = self::$availableBullets[0];
			$bullet->setStatus(BulletStatus::FIRED);
			$bullet->setNumber(count(self::$inUseBullets));
			array_push(self::$inUseBullets, $bullet);
		} else
		{
			$bullet = new Bullet();
			array_push(self::$inUseBullets, $bullet);
		}
		return $bullet;
	}

	public static function rechargeBullet($bullet) {
		self::resetBullet($bullet);
		unset(self::$inUseBullets[$bullet->getNumber()]);
		array_push(self::$availableBullets, $bullet);		
	}

	private static function resetBullet($bullet) {
		$bullet->setStatus(BulletStatus::BRAND_NEW);
	}
}
	
function main() {

	$bullet = BulletPool::fireBullet();
	echo $bullet->getStatus();

	BulletPool::rechargeBullet($bullet);
	echo $bullet->getStatus();
}

main();

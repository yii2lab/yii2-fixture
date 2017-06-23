<?php

namespace yii2module\fixture\drivers;

use Yii;
use woop\extension\app\run\Env;
use woop\foundation\helpers\Helper;
use yii\db\Query;
use yii2module\fixture\interfaces\DriverInterface;

class DbDriver implements DriverInterface
{
	const DRIVER_NAMESPACE = 'yii2module\fixture\drivers\db';
	private $driver;
	
	public function __construct()
	{
		$db = Helper::getCurrentDbDriver();
		$this->driver = Yii::createObject(self::DRIVER_NAMESPACE . '\\' . ucfirst($db) . 'Driver');
	}
	
	public function loadData($table)
	{
		return $this->driver->loadData($table);
	}

	public function saveData($table, $data)
	{
		return $this->driver->saveData($table, $data);
	}
	
	public function getNameList()
	{
		return $this->driver->getNameList();
	}

}

<?php

namespace yii2lab\fixture\helpers;

use Yii;
use woop\foundation\helpers\Helper;
use yii\base\Component;

class Fixtures extends Component
{

	const DRIVER_NAMESPACE = 'yii2lab\fixture\drivers';
	private $dbDriver;
	private $diskDriver;
	
	public function init()
	{
		$this->dbDriver = Yii::createObject(self::DRIVER_NAMESPACE . '\\DbDriver');
		$this->diskDriver = Yii::createObject(self::DRIVER_NAMESPACE . '\\DiskDriver');
	}
	
	public function export($all)
	{
		return $this->copyAll($all, $this->dbDriver, $this->diskDriver);
	}
	
	public function import($all)
	{
		return $this->copyAll($all, $this->diskDriver, $this->dbDriver);
	}
	
	public function tableNameList()
	{
		$list = $this->dbDriver->getNameList();
		sort($list);
		reset($list);
		return $list;
	}
	
	public function fixtureNameList()
	{
		$list = $this->diskDriver->getNameList();
		sort($list);
		reset($list);
		return $list;
	}
	
	private function copyAll($all, $fromDriver, $toDriver)
	{
		$result = [];
		if(empty($all)) {
			return $result;
		}
		foreach($all as $table) {
			$copyResult = $this->copyData($table, $fromDriver, $toDriver);
			$result[] = $table . ' ' . ($copyResult ? '' : '[fail]') . '';
		}
		return $result;
	}
	
	private function copyData($table, $fromDriver, $toDriver)
	{
		$data = $fromDriver->loadData($table);
		if(empty($data)) {
			return false;
		}
		return $toDriver->saveData($table, $data);
	}
	
}

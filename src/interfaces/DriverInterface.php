<?php

namespace yii2module\fixture\interfaces;

interface DriverInterface
{
	
	public function loadData($table);
	public function saveData($table, $data);
	public function getNameList();

}

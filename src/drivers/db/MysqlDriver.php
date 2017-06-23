<?php

namespace yii2module\fixture\drivers\db;

use woop\foundation\helpers\Helper;

class MysqlDriver extends BaseDriver
{
	
	protected function disableForeignKeyChecks($table)
	{
		$this->executeSql('SET foreign_key_checks = 0');
	}
	
	protected function showTables()
	{
		$all = $this->createSql('SHOW TABLES')->queryAll();
		$dbname = Helper::getDbConfig('dbname');
		$result = [];
		foreach($all as $item) {
			$result[] = $item['Tables_in_' . $dbname];
		}
		return $result;
	}
	
}

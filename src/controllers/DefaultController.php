<?php

namespace yii2module\fixture\controllers;

use Yii;
use yii2lab\console\yii\console\Controller;
use yii2module\fixture\helpers\Fixtures;
use yii2lab\console\helpers\Output;
use yii2lab\console\helpers\input\Question;
use yii2lab\console\helpers\input\Select;
use yii2lab\console\helpers\input\Enter;

class DefaultController extends Controller
{
	
	
	/**
	 * Export or import fixtures
	 */
	public function actionIndex($option = null)
	{
		$fixtures = Yii::createObject(Fixtures::className());
		$option = Question::displayWithQuit('Select operation', ['Export', 'Import'], $option);
		if($option == 'e') {
			$allTables = $fixtures->tableNameList();
			if(!empty($allTables)) {
				$answer = Select::display('Select tables for export', $allTables, 1);
				$tables = $fixtures->export($answer);
				Output::items($tables, 'Exported tables');
			} else {
				Output::block("not tables for export!");
			}
		} elseif($option == 'i') {
			$allTables = $fixtures->fixtureNameList();
			if(!empty($allTables)) {
				$answer = Select::display('Select tables for import', $allTables, 1);
				$tables = $fixtures->import($answer);
				Output::items($tables, 'Imported tables');
			} else {
				Output::block("not tables for import!");
			}
		}
		
	}
	
	/**
	 * Export or import one table
	 */
	public function actionOne($option = null)
	{
		$fixtures = Yii::createObject(Fixtures::className());
		$option = Question::displayWithQuit('Select operation', ['Export', 'Import'], $option);
		if($option == 'e') {
			$table = Enter::display('Enter table name for export');
			$tables = $fixtures->export([$table]);
			Output::items($tables, 'Exported tables');
		} elseif($option == 'i') {
			$table = Enter::display('Enter table name for import');
			$tables = $fixtures->import([$table]);
			Output::items($tables, 'Imported tables');
		}
	}
	
}

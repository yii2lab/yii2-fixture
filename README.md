Фикстуры (fixtures)
===

## Описание

Модуль позволяет экпортировать и импортировать данные:

* из БД в дапм (экпортировать)
* из дампа в БД (импортировать)

## Установка

Устанавливаем зависимость:

```
composer require yii2module/yii2-fixture
```

Объявляем модуль:

```php
return [
	'modules' => [
		// ...
		'fixtures' => 'yii2module\fixture\Module',
		// ...
	],
];
```

## Документация

Модуль позволяет экпортировать и импортировать данные:

* из БД в дапм (экпортировать)
* из дампа в БД (импортировать)

Для экпорта/импорта таблиц по выбору:

```
php yii fixtures
```

Для экпорта/импорта таблицы по ее имени:

```
php yii fixtures/default/one
```
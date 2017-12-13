Установка
===
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
php-obscene-censor-rus
======================
[![Build Status](https://travis-ci.org/vearutop/php-obscene-censor-rus.png?branch=master)](https://travis-ci.org/vearutop/php-obscene-censor-rus) [![Total Downloads](https://poser.pugx.org/vearutop/php-obscene-censor-rus/downloads)](https://packagist.org/packages/vearutop/php-obscene-censor-rus)

Класс для фильтрации нецензурных выражений (матов).

Анализ на основе регулярных выражений с списком исключений, совместим с UTF8.

Использование:

```php
$text = 'Да пошел ты нахуй и в пиzdu huesos, ушлепок ебаный, ебать мой вялый хуй!
Мой дед ветеран твоего деда педрилу ебал :( Хуячечки';

ObsceneCensorRus::filterText($text);

echo $text;
//Да пошел ты ***** и в ***** ******, ушлепок ******, ***** мой вялый ***!
//Мой дед ветеран твоего деда ******* **** :( ********
```

```php
$text = ObsceneCensorRus::getFiltered($text);
```

```php
var_dump(ObsceneCensorRus::isAllowed($text));
// false
```

Вторым параметром можно указать кодировку если она отличается от UTF8
```php
ObsceneCensorRus::getFiltered('кто прочитает тот лол', 'CP1251')
```

Установка:
```
composer require vearutop/php-obscene-censor-rus
```

Тесты:
```
php phpunit.phar ./tests
```


Цензура, антимат, матерщинные слова, фильтр мата, обсценная лексика, нецензурная брань, треугольные сиськи.

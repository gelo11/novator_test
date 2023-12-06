<p align="center">
    <h1 align="center">Тестовое задание для NovatorGroup</h1>
    <br>
</p>

Проект на Yii 2 Basic.

Требования
------------

PHP 7.4.

Mysql 5.7


Установка
------------

Сделать клон этого проекта в папку Веб-сервера.

~~~
git clone
~~~

Устновить необходимые пакеты

~~~
composer update
~~~

Далее необходимо выполнить миграцию БД

~~~
yii migrate
~~~

### REST API

/book-apis

/book-apis/{id}

### Что не доделано

 - Красивые пути для REST API
 - Код не полностью покрыт тестами
 - TypeScript не использован. Фронт - это обычный ListView
#блог статей
файл index.php является по сути фронт-контроллером.
Например site/ или site/Index - просморт всез записей,а 
site/Admin - Это админ панель с функциями CRUD

трейт /Core/Magic.php - это магические методы php - __set, __get,
__isset для работы с массивом data в классе View.php

класс Model.php и потомок /Model/Article.php -реализация паттерна ActiveRecord

Косяк реализации /Templates/action.php, в котором данные вставляются и обновляются,
из-за него 100% MVC не получилось.


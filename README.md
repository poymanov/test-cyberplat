# Каталог товаров (тестовое задание) #

Каталог товаров с неограниченной вложенностью подкатегорий

Реализован на php-фреймворке Yii 2.0.8 и БД MySQL

## Тестовая площадка ##

[http://test-yii-catalog.poymanov-projects.ru/](http://test-yii-catalog.poymanov-projects.ru/)

## Функционал ##

1. Главная страница - отображение главных категорий
2. Отображение вложенных подкатегорий
3. Отображение товаров категории и всех её подкатегорий
4. Добавление/редактирование/удаление категорий и подкатегорий
5. Добавление/редактирование/удаление товаров


## Установка ##

1) Разместить файлы проекта в любой директории

    git clone git@bitbucket.org:poymanov/mentor-blog-laravel.git
   
2) Установить [Composer](https://getcomposer.org/) (если еще не установлен)

3) Установить компоненты необходимые компоненты проекта для composer:

    composer global require "fxp/composer-asset-plugin:~1.1.1"
    composer update

4) Подготовить новую таблицу в своей БД

    DROP DATABASE IF EXISTS `yii-catalog`;
    CREATE DATABASE IF NOT EXISTS `yii-catalog` DEFAULT CHARACTER SET utf8;
    GRANT ALL PRIVILEGES ON *.* TO yii-catalog@localhost IDENTIFIED BY 'secret';

5) Создать файл **config\db.php** и настроить подключение к БД:

    <?php
    return [
     'class' => 'yii\db\Connection',
     'dsn' => 'mysql:host=localhost;dbname=yii-catalog',
     'username' => 'root',
     'password' => 'root',
     'charset' => 'utf8',
    ];

4) Запустить миграции для БД:

    php yii migrate
    
5) Корневая директория проекта в настройках **nginx/apache**:

    ../web

## Использование ##

После установки проекта он сразу готов к использованию

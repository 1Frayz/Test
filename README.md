# My PHP Project

## Описание

Этот проект представляет собой PHP-приложение, использующее MySQL в качестве базы данных. Он включает в себя основные библиотеки для разработки и автозагрузки классов, а также дополнительные инструменты для удобства работы.

## Установка

Чтобы начать работу с этим проектом, выполните следующие шаги:

1. **Клонируйте репозиторий:**

   ```bash
   git clone https://github.com/ваш-репозиторий.git
   cd ваш-репозиторий
   ```

2. **Установите зависимости с помощью Composer:**

   Убедитесь, что у вас установлен Composer. Если нет, следуйте инструкциям на [официальном сайте Composer](https://getcomposer.org/download/).

   Затем выполните:

   ```bash
   composer install
   ```

   Это установит все зависимости, указанные в `composer.json`.

## Зависимости

### Основные зависимости

- **codin/dot**: Пакет для управления конфигурацией окружения. Версия: ^0.1.3.

### Зависимости для разработки

- **larapack/dd**: Библиотека для удобного вывода отладочной информации. Версия: ^1.1.

### Автозагрузка

Проект использует автозагрузку PSR-4 для классов в пространстве имен `App`. Все классы должны находиться в папке `app/`.

### База данных

Дамп тестового BD есть в проекте, импортируйте его.

Перед запуском приложения убедитесь, что вы настроили соединение с базой данных в файле config/database.php:
```
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ваша_база_данных
DB_USERNAME=ваш_пользователь
DB_PASSWORD=ваш_пароль
```
Есть 2 тестовых аккаунта
```
логин: admin
пароль: 1
```
```
логин: test
пароль: 1
```

# Снаружи докера:

* `./init.sh composer` - Запуск установки/обновления пакетов в композере

* `./init.sh migrations` - Запуск миграций
* `./init.sh migrations status` - Проверить статус миграций

* `./init.sh shell` - Провалиться в докер контейнер приложения


# Внутри докера:

* `[/var/app]/bin/huston` - Миграции Doctrine
* `[/var/app]/composer` - Композер

mysql -h db -u root -p12345 -e 'create database taskbook DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_general_ci;'
php vendor/bin/doctrine orm:schema-tool:update --dump-sql -f

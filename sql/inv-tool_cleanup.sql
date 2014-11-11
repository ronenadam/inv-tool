
DROP DATABASE IF EXISTS `invdemo`;

GRANT USAGE ON *.* TO 'inv_user'@'localhost';

DROP USER 'inv_user'@'localhost';

FLUSH PRIVILEGES;
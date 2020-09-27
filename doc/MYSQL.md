### Create User


```
mysql -u root
CREATE DATABASE dbname;
GRANT ALL PRIVILEGES ON dbname.* TO 'username'@'localhost' IDENTIFIED BY 'password';
FLUSH PRIVILEGES;
QUIT;
```




```
mysql -e "CREATE DATABASE dbname2;GRANT ALL PRIVILEGES ON dbname.* TO 'username'@'localhost' IDENTIFIED BY 'password';FLUSH PRIVILEGES;"
```










mysql -u root -e "create database somedb"





### Slow Query

```
SET GLOBAL slow_query_log=1;
SET GLOBAL slow_query_log_file='mariadb-slow.log';


SHOW VARIABLES LIKE 'slow_query_log_file';



```
#!/usr/bin/env sh
MYSQL="mysql -uroot -proot -h 127.0.0.1 --port 8889"

echo 'Drop database'
$MYSQL -e "DROP DATABASE api"
$MYSQL -e "DROP DATABASE api_backup"
$MYSQL -e "DROP DATABASE gw_rank"

echo 'Create database'
$MYSQL -e "CREATE DATABASE api DEFAULT CHARACTER SET UTF8"
$MYSQL -e "CREATE DATABASE api_backup DEFAULT CHARACTER SET UTF8"
$MYSQL -e "CREATE DATABASE gw_rank DEFAULT CHARACTER SET UTF8"

echo 'Create table'
$MYSQL api < ../data/schema_db.sql
$MYSQL api_backup < ../data/schema_db.sql
$MYSQL gw_rank < ../data/schema_rank.sql


for SQL in `find ../data | grep common_`
do
    echo "$MYSQL gw_rank < $SQL"
    $MYSQL gw_rank < $SQL
done


for SQL in `find ../data | grep user_`
do
    echo "$MYSQL api < $SQL"
    $MYSQL api < $SQL
done

for SQL in `find ../data | grep user_`
do
    echo "$MYSQL api_backup < $SQL"
    $MYSQL api_backup < $SQL
done

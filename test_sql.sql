# Дана таблица с деревом категорий
#
# CREATE TABLE category (
#     id integer not null primary key,
#     parent_category_id integer references category(id),
#     name varchar(100) not null
# );
#
# Напишите запросы (БД - “правильная”, умеющая делать подзапросы, различные соединения и прочее):
# 1. На выборку всех категорий верхнего уровня, начинающихся на “авто”
# 2. На выборку всех категорий, имеющих не более трёх подкатегорий следующего уровня (без глубины)
# 3. На выборку всех категорий нижнего уровня (т.е. не имеющих детей)
#
# Напишите индексы, которые позволят сделать эти запросы быстрее.
# Запросы должны корректно выполняться в MySql или PostgreSql.

# 1)
SELECT `name` FROM `category` WHERE (`name` LIKE 'авто%') AND (`parent_category_id` = 0);

# 2)
SELECT `parent`.`name` FROM (`category` as `parent`) WHERE (SELECT COUNT(*) FROM (`category` as `child`) WHERE `parent`.`id` = `child`.`parent_category_id`) <= 3;

# 3)
SELECT `parent`.`name` FROM (`category` as `parent`) WHERE NOT EXISTS (SELECT 1 FROM (`category` as `child`) WHERE `parent`.`id` = `child`.`parent_category_id`);

# Напишите индексы, которые позволят сделать эти запросы быстрее
CREATE INDEX `parent_category_id_index` ON category (parent_category_id);
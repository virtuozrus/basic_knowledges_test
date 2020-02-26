Дано:

```css
table .c { color: red }
.a .c { color: green }
```

```html
<table id="t">
    <tr>
        <td class="c">Текст</td>
    </tr>
</table>
```

Задача: написать JavaScript код, делающий "Текст" зелёным, предложите как минимум три варианта (можно больше) (1-2 могут использовать JS библиотеки) только самого кода (копировать задание в ответ не нужно).
___
Дана таблица с деревом категорий

```sql
CREATE TABLE category (
    id integer not null primary key,
    parent_category_id integer references category(id),
    name varchar(100) not null
);
```

Напишите запросы (БД - “правильная”, умеющая делать подзапросы, различные соединения и прочее):
1. На выборку всех категорий верхнего уровня, начинающихся на “авто”
2. На выборку всех категорий, имеющих не более трёх подкатегорий следующего уровня (без глубины)
3. На выборку всех категорий нижнего уровня (т.е. не имеющих детей)

Напишите индексы, которые позволят сделать эти запросы быстрее.
Запросы должны корректно выполняться в MySql или PostgreSql.
___
Дана строка текста.

Написать программу на рнр, которая определяет является ли строка текста палиндромом (читается с обоих сторон одинаково) и осуществляет вывод строки следующим способом:

а) если строка является палиндромом, то она выводится полностью.

б) если строка не является палиндромом - выводится самый длинный
под-палиндром этой строки, т.е. самая длинная часть строки, являющаяся
палиндромом

в) если подпалиндромы отсутствуют в строке - выводится первый
символ строки.

Примеры палиндромов:
- Аргентина манит негра
- Sum summus mus
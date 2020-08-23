## [PHP Rapid][url]
a php functions library that helps you to write code effieciently, it helps you perform database operations, validation and some other cool stuff by just calling functions.


## How To Install:
- clone the repository.
- copy it somewhere inside your application.
- include rapid.php in your application's root or wherever you want to call methods.


<br />

## Methods:

#### SQL
- insertData(table, fields, values, conn)
- fetchData(table, conn)
- fetchDataById(table, PrimaryKey, id, conn)
- deleteDataById(table, PrimaryKey, id, conn)
- editData(table, data, PrimaryKey, id, conn)
- checkExistance(table, column_name, value, conn)
- getLastRow(table, PrimaryKey, conn)
#### Validation
- validateDate(date, seperator)
- validatePassword(password)
- validateUsername(username)
- validatePlainText(plainText)
- validateAlphanumeric(alphanumeric)
- validateEmail(email)
#### Other Functions
- clean_text(string)
- random_strings(length_of_string)
- getNextDays(number_of_days)
- calcMonths(start_date, end_date)
- getHeader(pageName, headerPath)
- getFooter(footerPath)
- redirectWindow(url)
- showAlert(msg)

<br />

### How To Use:
#### insertData:
```php
insertData(
    "table_name",
    array(
        "column1_name",
        "column2_name"
        ),
    array(
        "value1",
        "value2"
    ),
    $connection
);
```
#### fetchData:
```php
fetchData(
    "table_name",
    $connection
);
```
#### fetchDataById:
```php
fetchDataById(
    "table_name",
    "primary_key_column_name",
    $primary_key_value,
    $connection
);
```
#### deleteDataById:
```php
deleteDataById(
    "table_name",
    "primary_key_column_name",
    $primary_key_value,
    $connection
);
```
#### editData:
```php
editData(
    "table_name",
    array(
        "column_name",
        "value",
        "column_name",
        "value"
    ),
    "primary_key_column_name",
    $primary_key_value,
    $connection
);
```
#### checkExistance:
```php
checkExistance(
    "table_name",
    "column_name",
    "value",
    $connection
);
```
#### getLastRow:
```php
getLastRow(
    "table_name",
    "primary_key_column_name",
    $connection
);
```
#### validateDate:
```php
validateDate(
    "2020-02-20",
    "-"
);
```
#### validatePassword:
```php
validatePassword(
    "input"
);
```
#### validateUsername:
```php
validateUsername(
    "input"
);
```
#### validatePlainText:
```php
validatePlainText(
    "input"
);
```
#### validateAlphanumeric:
```php
validateAlphanumeric(
    "input"
);
```
#### validateEmail:
```php
validateEmail(
    "input"
);
```
#### clean_text:
```php
clean_text(
    "input"
);
```
#### random_strings:
```php
random_strings(20);
```
#### getNextDays:
```php
getNextDays(10);
```
#### calcMonths:
```php
calcMonths("date1", "date2");
```
#### getHeader:
```php
getHeader("any page name", "header file path");
```
#### getFooter:
```php
getFooter("footer file path");
```
#### redirectWindow:
```php
redirectWindow("url");
```
#### showAlert:
```php
showAlert("some text");
```

<br />

### Buy Me a Coffee:

[<img align="left" width="130px" alt="Shexadd | Instagram" src="https://images.squarespace-cdn.com/content/v1/5a82ee54edaed8f0ec09744c/1522231628780-BEUWURTD30OFMINF49YP/ke17ZwdGBToddI8pDm48kKlH-NBjyuLJ1B_ReXkMz_BZw-zPPgdn4jUwVcJE1ZvWQUxwkmyExglNqGp0IvTJZUJFbgE-7XRK3dMEBRBhUpxtQJUiLl07rAb8zcklGpnQMyLAUGvLtyKFay5Ob7sqf0od4CxKOAy9FxLHTjBN_Oo/image-asset.jpeg" />][coffee]

[url]: https://github.com/Shaxadhere/phprapid/
[twitter]: https://twitter.com/Shexadd
[instagram]: https://instagram.com/Shexadd
[coffee]: https://www.buymeacoffee.com/Shexadd

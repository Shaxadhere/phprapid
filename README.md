[<img align="left" alt="Shexadd | Twitter" src="http://shaxad.com/assets/img/rapid_Original.jpg" width="16%" />][url]
<br />
<br />

### [PHP Rapid][url]

a php functions library that helps you to write code effieciently, it helps you perform database operations, validation, tracking user and some other cool stuff by just calling functions.


## How To Install:
- clone the repository.
- copy it somewhere inside your application.
- include rapid.php in your application's root or wherever you want to call methods.


<br />

## Methods:

#### Essentials:
- :new: sendMail(smtpHost, smtpPort, smtpEmail, smtpPassword, smtpProtocol, smtpFrom, recipient,isHTML, subject, message)
- :new: uploadFile(file, saveAs, directory, maxSize)
    

#### Tracking User
- trackIP(ip)
- getOS()
- getBrowser()
#### SQL
- insertData(table, fields, values, conn)
- fetchData(table, conn)
- fetchDataById(table, PrimaryKey, id, conn)
- deleteDataById(table, PrimaryKey, id, conn)
- editData(table, data, PrimaryKey, id, conn)
- :new: verifyValues(table, data, conn)
- checkExistance(table, column_name, value, conn)
- getLastRow(table, PrimaryKey, conn)
- verifyValues(table, data, conn)
#### Validation
- verify_email(email)
- verify_phone(phone_number)
- validateDate(date, seperator)
- validatePassword(password)
- validateUsername(username)
- validatePlainText(plainText)
- validateAlphanumeric(alphanumeric)
- validateEmail(email)
#### Other Functions
- :new: estimate_gender(name)
- clean_text(string)
- random_strings(length_of_string)
- getNextDays(number_of_days)
- calcMonths(start_date, end_date)
- getHeader(pageName, headerPath)
- getFooter(footerPath)
- redirectWindow(url)
- showAlert(msg)
- generateInsult()
- generateAdvice()
- generateQuote()

<br />

### How To Use:

#### :new: uploadFile:
uploads file for now it only support .jpg, .png, .jpeg, .gif files
```php
uploadFile(
    $_File['image'],
    "myfile.jpeg",
    '/assets/imges',
    1000
);
```
#### :new: sendMail:
sends email using PHPMailer
```php
sendMail(
    'your smtp host',
    'your port',
    'your smtp email',
    'your smtp password', 
    'your smtp protocol',
    'your sender name',
    'your recipent email',
    true,
    'Send Mail',
    'your message'
);
```
#### :new: verifyValues:
verifies values from a specific table by writing mysql query
```php
verifyValues(
    "table_name",
    array(
        "field_name",
        "column_name",
        "field_name",
        "column_name"
    )
    $conn
);
```

#### :new: trackIP:
tracks user's ip address and retrieves information out of it
```php
trackIP('168.212. 226.204')
```
#### :new: getOS:
gets user's operating system
```php
getOS()
```
#### :new: getBrowser:
gets user's browser name
```php
getBrowser()
```
#### :new: verify_phone:
verifies phone number and retreives some information out of it
```php
verify_email("13654008480")
```
#### :new: verify_email:
verifies if email is true and valid without sending a mail
```php
verify_email("example@website.com")
```
#### :new: estimate_gender:
estimates a gender from a first name
```php
estimate_gender("Shehzad")
```

#### insertData:
this method wont return any value it will just insert the data.
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
this method will return mysqli_query result, you can handle it that way.
```php
fetchData(
    "table_name",
    $connection
);
```
#### fetchDataById:
this method will return mysqli_query result, you can handle it that way.
```php
fetchDataById(
    "table_name",
    "primary_key_column_name",
    $primary_key_value,
    $connection
);
```
#### deleteDataById:
this method wont return any value it will just insert the data.
```php
deleteDataById(
    "table_name",
    "primary_key_column_name",
    $primary_key_value,
    $connection
);
```
#### editData:
this method wont return any value it will just insert the data.
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
#### :new: verifyValues:
this method verifies values from a specific table by writing mysql query
```php
verifyValues(
    "table_name",
    array(
        "column_name",
        "value",
        "column_name",
        "value"
    ),
    $connection
)
```
#### checkExistance:
this method will return true if the value exists or else it will return false.
```php
checkExistance(
    "table_name",
    "column_name",
    "value",
    $connection
);
```
#### getLastRow:
this method will return mysqli_query result, you can handle it that way.
```php
getLastRow(
    "table_name",
    "primary_key_column_name",
    $connection
);
```
#### validateDate:
this method will return true if the provided date is correct or else it wil return false.
```php
validateDate(
    "2020-02-20",
    "-"
);
```
#### validatePassword:
this method will check if the password's length is between 8 to 32 and furthur it will check if the password matches at least three of four scenarios which are 1) have at least one symbol 2) have at least one small letter 3) have at least one capital letter 4) have at least one number or else it will return false.
```php
validatePassword(
    "input"
);
```
#### validateUsername:
this method will check username according to twitter and instagram standard usernames if the username is correct this will return true or else it will return false.
```php
validateUsername(
    "input"
);
```
#### validatePlainText:
this method will return true if the input is plain text or else it will return false.
```php
validatePlainText(
    "input"
);
```
#### validateAlphanumeric:
this method will return true if the input is alphanumeric or else it will return false.
```php
validateAlphanumeric(
    "input"
);
```
#### validateEmail:
this method will return true if the input is correct email or else it will return false.
```php
validateEmail(
    "input"
);
```
#### clean_text:
this method will remove any useless white spaces in text and make the text clean.
```php
clean_text(
    "input"
);
```
#### random_strings:
this method will generate random string with combination of caps and small letters and digits of provided length.
```php
random_strings(20);
```
#### getNextDays:
this method will return complete dates of number of days provided after todays date in array.
```php
getNextDays(10);
```
#### calcMonths:
this method will count months between two days.
```php
calcMonths("date1", "date2");
```
#### getHeader:
this method will buffer page name and header everytime the page reloads.
```php
getHeader("any page name", "header file path");
```
#### getFooter:
this method will load footer file.
```php
getFooter("footer file path");
```
#### redirectWindow:
this method will redirect pages with javascript.
```php
redirectWindow("url");
```
#### showAlert:
this method will show alerts with javascript.
```php
showAlert("some text");
```
#### generateInsult:
this method generates random evil insult in english
```php
generateInsult();
```
#### generateAdvice:
this method generates random advice in english
```php
generateAdvice();
```
#### generateQuote:
this method generates random quote in english
```php
generateQuote();
```

<br />

### Buy Me a Coffee:

[<img align="left" width="130px" alt="Shexadd | Instagram" src="https://images.squarespace-cdn.com/content/v1/5a82ee54edaed8f0ec09744c/1522231628780-BEUWURTD30OFMINF49YP/ke17ZwdGBToddI8pDm48kKlH-NBjyuLJ1B_ReXkMz_BZw-zPPgdn4jUwVcJE1ZvWQUxwkmyExglNqGp0IvTJZUJFbgE-7XRK3dMEBRBhUpxtQJUiLl07rAb8zcklGpnQMyLAUGvLtyKFay5Ob7sqf0od4CxKOAy9FxLHTjBN_Oo/image-asset.jpeg" />][coffee]

[url]: https://github.com/Shaxadhere/phprapid/
[twitter]: https://twitter.com/Shexadd
[instagram]: https://instagram.com/Shexadd
[coffee]: https://www.buymeacoffee.com/Shexadd

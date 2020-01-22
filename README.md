# Instruction

norsucms-2fa is a two-factor authentication script by email using PHP. This project also include multiple user login system (example: admin, manager, user and etc.)

## Installation

Clone or download this repository and:

Import database file to your MySQL
```bash
DB/norsucms-2fa.sql
```
Edit your connection setting
```bash
includes/connect.php
```
Edit your mail setting
```bash
includes/sendmail.php
```

## Usage

Just add user to users table and enjoy :)

Don't forget: this project include 2 user type. 1 = admin, 0 = user. You can increase user types.
```
id        =    don't import anything
name      =    your user name | example: Musa Abbasov
login     =    your email address | example: contact@norsucms.org
password  =    md5 encrypted password
role      =    1 or 0
```

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License
[MIT](https://github.com/NORSUCMS/norsucms-2fa/blob/master/LICENSE)

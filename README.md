# Empty-Exemple-Rest-API

Simple exemple or template of REST API.

## Requirement

- Apache server
- PhpMyAdmin or any administration tool for MySQL
- Install `ApiRestExemple.sql` into a database named `apirestexemple`

## Setup API

- Edit `functs_db.php` in `includes` directory :
if you work on your local host let `true` or change it by `false` if you push your code on a server.
  ```php
  $prod = true;
  ```

- Edit `config.prod.json` in `includes` directory by your online identifiers :
  ```json
  {
    "host" : "[YOUR HOST]",
    "dbusername" : "[YOUR USERNAME]",
    "dbpassword" : "[YOUR PASSWORD]"
  }
  ```

- Edit `config.local.json` in `includes` directory by your local identifiers :
  ```json
  {
    "host" : "[YOUR HOST]",
    "dbusername" : "[YOUR USERNAME]",
    "dbpassword" : "[YOUR PASSWORD]"
  }
  ```

- Change in `index.php` by your database name:
  ```php
  $database = connectDB("ApiRestExemple", $config);
  ```

- Change in `script.js` the location of your API :
  ```js
  let url = "http://localhost/Empty-Exemple-Rest-API/";
  ```

## How to use API

You can use POST or GET request to API.

- GET
  ```
  http://localhost/Empty-Exemple-Rest-API/?
  api=view_message_json&
  message=[MESSAGE]&
  message-id-db=[ID MESSAGE]
  ```

- POST to `http://localhost/Empty-Exemple-Rest-API/`
  ```json
  {
    "api": "view_message_json",
    "message": "[MESSAGE]",
    "message-id-db": "[ID MESSAGE DB]"
  }
  ```

## What is API response

- If successful :
  ```json
  {
    "type": "success",
    "message": "Valid code",
    "content-db": "[MESSAGE DB]",
    "content": "[MESSAGE]"
  }
  ```

- In case of error :
  ```json
  {
    "type": "error",
    "message": "[Error text]"
  }
  ```

## Fonctions

How to use fonctions in `functs_*.php`.

- connectDB() 
  return a pdo object.

- data_security
  return content with security.
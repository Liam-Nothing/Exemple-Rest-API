# Empty-Exemple-Rest-API

Simple exemple or template of REST API.

## Requirement

- Apache server
- PhpMyAdmin or any administration tool for MySQL
- Install `ApiRestExemple.sql` into a database named `apirestexemple`

## Setup API

- Edit `functs_db.php` in `api/includes` directory :
if you work on your local host let `true` or change it by `false` if you push your code on a server.
  ```php
  $prod = true;
  ```
  ```json
  $config = [
    "host" => "localhost",
    "dbusername" => "root",
    "dbpassword" => ""
  ];
  ```

- Change in `index.php` by your database name:
  ```php
  $database = connectDB("ApiRestExemple", $config);
  ```

- Change in `script.js` the location of your API :
  ```js
  let url = "http://localhost/Empty-Exemple-Rest-API/api/";
  ```

## How to use API

You can use POST or GET request to API.

- GET
  ```
  http://localhost/Empty-Exemple-Rest-API/api/?
  message-id-db=[ID MESSAGE]
  ```

- POST to `http://localhost/Empty-Exemple-Rest-API/api/`
  ```json
  {
    "message-id-db": "[ID MESSAGE DB]"
  }
  ```

## What is API response

- If successful :
  ```json
  {
    "type": "success",
    "message": "Valid code",
    "content": "[MESSAGE]"
  }
  ```

- In case of error :
  ```json
  {
    "type": "error",
    "message": "[Error message]"
  }
  ```

## Fonctions

How to use fonctions in `functs_*.php`.

- connectDB() 
  return a pdo object.

- data_security
  return content with security.
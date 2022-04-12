# Empty-Exemple-Rest-API

Simple exemple or template of REST API.

## Requirement

Apache server.

## Setup API

- Edit `config.json` in `includes` directory by your online identifiers :
```json
{
    "host" : "XXXXXXX",
    "dbusername" : "XXXXXXX",
    "dbpassword" : "XXXXXXX"
}
```
- Change in `functs_db.php` by your identifiers (local) :
```php
$config = [
    "host" => "localhost",
    "dbusername" => "root",
    "dbpassword" => ""
];
```
- Change in `index.php` by your database name and uncomment it (remove "//") :
```php
$database = connectDB("XXXXXXXXXXX", $config);
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
message=[MESSAGE]
```

- POST to `http://localhost/Empty-Exemple-Rest-API/`
```json
{
    "api":"view_message_json",
    "message":"[MESSAGE]"
}
```

## What is API response

- if successful :

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
  "message": "[Error text]"
}
```

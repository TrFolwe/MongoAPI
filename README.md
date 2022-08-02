<h1 align="center">MongoAPI-PHP</h1>
<p align="center">Easy Mongo</p>
<p align="center">Required extension: mongodb</p>

```php
$mongoAPI = new Mongo("connectionString"); //example: mongodb://localhost:27017
$mongoAPI->insert("database","collection", ["key" => "value"]);
$mongoAPI->delete("database","collection", ["key" => "value"]);
$mongoAPI->update("database","collection", [["key" => "value"], ["$set" => ["newKey" => "newValue"]]]);
print_r($mongoAPI->get("database","collection", ["key" => "value"]));
```

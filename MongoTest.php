<?php

$mongoAPI = new Mongo("connectionString"); //example: mongodb://localhost:27017
$mongoAPI->insert("database","collection", ["key" => "value"]);
$mongoAPI->delete("database","collection", ["key" => "value"]);
$mongoAPI->update("database","collection", [["key" => "value"], ["$set" => ["newKey" => "newValue"]]]);
print_r($mongoAPI->get("database","collection", ["key" => "value"]));
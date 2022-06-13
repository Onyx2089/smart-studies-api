# API_FINAL

## Installation

Configure the desired user for the connection to the database in config/config.IAdmin.php

run all the scripts located in the script/model/install folder and then script/model/populate

## Utilisation

Each method needs a model in GET

METHOD GET
GET field in encoded array
GET op in encoded array
GET value in encoded array

METHOD POST
POST all values of the mandatory class

METHOD PUT
GET id with all values changed

METHOD DELETE
GET the id of the entry to delete


If necessary refer to the file web_final/test/model/script.model.scriptModelApiCall.php


# NOT FINISH

Opérations HTTP 
CRUD

C - Create - POST
R - Read - GET
U - Update - PUT
D - Delete - DELETE


## Explication

POST Required


GET Required

?model=str &field=str &value=str &op=str


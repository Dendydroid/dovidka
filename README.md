Installation:

1) Configure PROJECT_PATH constant in Path.php (абсолютный путь)
2) Done

INFO:

Database is stored in database/database.json

To clear database change its contents to `[]`

How to use:

1) Add key:value pairs to payload
2) Submit Data to store it in DB
3) Search for data by keywords (partial keyword match)
4) Click on search result and view Record (Типа довидка) 

API METHODS:

www.website.com/api/?method=add&data={"name":"Andy", "age":"18"}

Adds a record to db

www.website.com/api/?method=delete&query={"name":"Andy"}

Deletes a record from db by query

www.website.com/api/?method=search&query=And (Finds Andy in value in record `{"name":"Andy", "age":"18"}`)

Retrieve partial match search results

www.website.com/api/?method=get

Get all data from DB


used:
PHP7
JS/jQuery HTML CSS

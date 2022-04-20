# Installing

Clone the repository

    git clone https://github.com/vladmrtnk/TestWork983933.git

Switch to the repo folder

    cd TestWork983933

Install all the dependencies using composer
    
    composer update

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate

Generate a new bearer token

    php artisan bearer:generate

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Run the database seeder and you're done

    php artisan db:seed

Start the local development server

    php artisan serve

###Request headers

| **Required** 	  | **Key**              	| **Value**             |
|-----------------|----------------	|-----------------------|
| Yes      	      | Content-Type    | application/json 	    |
| Yes 	           | Authorization    	| Bearer {token}      	 |

## Api docs: 
| url                     | value                  |
|-------------------------|------------------------|
| ../api/authors          | get the all authors    |
| ../api/authors/{id}     | get the author         |
| ../api/books            | get the all books      |
| ../api/books/{id}       | get the book           |
| ../api/publishers       | get the all publishers |
| ../api/publishers/{id}  | get the publisher      |

Params to requests:

`?search={field}:{value}` - will search some value in the specific field 

`?search={value}` - will search this value in all fields in table

`?sort_order` - sorting order. Can be: `asc` or `desc`

`?sort_by` - order by some field. Can be one from all field specific table

####Examples:

`http://http://127.0.0.1:8000/api/books?search=title:food`

`http://http://127.0.0.1:8000/api/books?search=green`

`http://http://127.0.0.1:8000/api/books?sort_by=title`

`http://http://127.0.0.1:8000/api/authors?sort_by=name&sort_order=desc`

`http://http://127.0.0.1:8000/api/publishers?search=book:time` - will find 'time' in a book fields

### Server modules:

- Apache 2.4
- php 8.0
- mysql 5.6


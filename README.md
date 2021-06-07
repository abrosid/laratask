## Task

- Basic Laravel Auth: ability to log in as authorised user
- CRUD functionality (Create / Read / Update / Delete) for two data entities: Company and User.
- Use basic Laravel resource controllers with default methods – index, create, store etc.
- Companies DB table consists of these fields: Name (required), email, logo url, website
- User DB table consists of these fields: First name (required), last name (required), Company (foreign key to Companies), email, phone
- Use database migrations to create those schemas above
- Create corresponding unit and feature tests
- Store companies logos in storage/app/public folder and make them accessible from public
- Use Laravel’s validation function, using Request classes
- Create a simple Single Page application that will use Vue.js in order to create a table

#### Restriction:
1. Use PHP 7 and above
2. Use Laravel 5.8 and above

## Instalation

1. `git clone https://github.com/abrosid/laratask.git`
2. `cd laratask`
3. `composer install`
4. `npm i`
5. create .env file
6. `php artisan sail:install`



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

Clone the repo locally:

```sh

git clone https://github.com/abrosid/laratask.git
cd laratask
```


Install composer packages

```sh
composer install
```


Install NPM dependencies:

```sh
npm ci
```

Build assets:

```sh
npm run dev
```

Setup configuration:

```sh
cp .env.example .env
```

Generate application key:

```sh
php artisan key:generate
```

#### Option 1:  running locally

Create an SQLite database. 

```sh
touch database/database.sqlite
```

Run database migrations:

```sh
php artisan migrate
```

Run database seeder:

```sh
php artisan db:seed
```

Run the dev server (the output will give the address):

```sh
php artisan serve
```

To run the tests, run:

```sh
php artisan test
```

In yor browser link to `localhost:8000`


#### Option2: using Sail/docker and mysql


Configuring database via sail

```sh
php artisan sail:install
```

press 0 to install mysql


Run sail as daemon

```sh
./vendor/bin/sail up -d
```

Run database migrations:

```sh
./vendor/bin/sail artisan migrate:fresh
```

Run database seeder:

```sh
./vendor/bin/sail artisan db:seed
```

In yor browser link to `localhost`






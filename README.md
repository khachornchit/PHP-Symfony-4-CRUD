# PHP Symfony 4.2 Web API Application Development
`Develop PHP Web API Application using PHP Symfony 4.2 framework to develop full functionality of CRUD by using Entity, Repository, Doctrine, ORM, MySQL, Docker, Docker-compose, etc.`

#### Contact Information
* Author : Pluto Solutions <hi@pluto.solutions>
* Web : http://pluto.solutions

#### Setup
* git clone git@github.com:plutosolutions/PHP-Symfony4-Web-API-Application.git
* cd PHP-Symfony4-Web-API-Application
* composer install

#### Database configuration at file .env
* DATABASE_URL=mysql://{username}:{password}@{host}:{port}/{database}

#### Create database schema using follow command
* php bin/console doctrine:database:create
* php bin/console doctrine:migrations:migrate

#### Start server
* php bin/console server:run 0.0.0.0:8000
* browse http://localhost:8000/ to ensure the Symfony web work property

#### Example CRUD API
* POST /api/users
* GET /api/users
* GET /api/users/{id}
* PUT /api/users/{id}
* DELETE /api/users/{id}

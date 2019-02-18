# PHP Symfony 4.2 CRUD API Development
`Develop PHP Web API Application using PHP Symfony 4.2 framework to develop full functionality of CRUD by using Entity, Repository, Doctrine, ORM, MySQL, Docker, Docker-compose, etc.`

#### Contact Information
* Author : Pluto Solutions <hi@pluto.solutions>
* Web : http://plutosolutions.net

#### Setup
* git clone git@github.com:plutosolutions/PHP-Symfony-4-CRUD.git
* cd PHP-Symfony-4-CRUD
* composer install

#### Update database configuration at file .env
* DATABASE_URL=mysql://{username}:{password}@{host}:{port}/{database}

#### Create database using follow command
* php bin/console doctrine:database:create
* php bin/console doctrine:migrations:migrate

#### Start server
* php bin/console server:run localhost:8000
* browse http://localhost:8000

#### Example API
* POST /api/users
* GET /api/users
* GET /api/users/{id}
* PUT /api/users/{id}
* DELETE /api/users/{id}

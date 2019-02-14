# Code Challenge
`
Simple CRUD functionality using PHP Symfony 4.2 version by John <john@pluto.solutions>
`

## How to install
* git clone https://github.com/plutosolutions/code-challenge
* cd code-challenge
* composer install

## Change MySQL database configuration at file .env
* DATABASE_URL=mysql://username:password@host:port/codechallenge
* For example : DATABASE_URL=mysql://root:1234@127.0.0.1:3306/codechallenge

## Create database codechallenge using follow command
* php bin/console d:d:c

## Start server
* php bin/console server:run 0.0.0.0:8000


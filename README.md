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
* browse http://localhost:8000/ to ensure the Symfony web work property

See example of result at file *tests/Symfony 4 screen.png*

## Test CRUD functions
* POST http://localhost:8000/api/users 
Example of POST data
`
{
   "username":"user_x",
   "userpassword": "password1_x"
}
`

* GET http://localhost:8000/api/users then you will get response as follow sample
Then you will receive response JSON data as follow
`
{"users": [
      {
      "id": 4,
      "username": "user1",
      "userpassword": "password1"
   },
      {
      "id": 5,
      "username": "user_x",
      "userpassword": "password1_x"
   }
]}

* PUT http://localhost:8000/api/users/{id} then you will get response as follow sample
`
{"users": [
      {
      "id": 4,
      "username": "user1",
      "userpassword": "password1"
   },
      {
      "id": 5,
      "username": "user_x",
      "userpassword": "password1_x"
   }
]}
`

* DELETE http://localhost:8000/api/users/{id} then you will get response as follow sample
`
"Deleted user id : 3 completely !"

## SOAPUI Testing
You can use SOAPUI to test CRUD function.
* SOAPUI test file at folder tests/Code-Challenge-soapui-project.xml
* Example of SOAPUI Tested result at folder tests/SOAPUI Test results.png
* SOAPUI download link https://www.soapui.org/


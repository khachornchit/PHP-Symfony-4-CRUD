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
##### POST http://localhost:8000/api/users 
* Example of POST requested
`
{
   "username":"user_2",
   "userpassword": "password1_2"
}
`
* Example of POST response data
`
{
   "id": 17,
   "username": "user_2",
   "userpassword": "ba8c2644e819314acf8a2bb656713b20ec65f063",
   "description": "Password was checked in haveibeenpwned.com"
}`

##### GET http://localhost:8000/api/users then you will get response as follow sample
Then you will receive response JSON data as follow
`
{"users": [
      {
      "id": 16,
      "username": "user_1",
      "userpassword": "135c99719ff81122f3ac384d342a361e3a1ad95f",
      "description": "Password was checked in haveibeenpwned.com"
   },
      {
      "id": 17,
      "username": "user_2",
      "userpassword": "ba8c2644e819314acf8a2bb656713b20ec65f063",
      "description": "Password was checked in haveibeenpwned.com"
   }
]}
`

##### PUT http://localhost:8000/api/users/{id} then you will get response as follow sample
* Example of PUT requested data
`
{
   "username":"user_updated_test",
   "userpassword": "password_updated_test"
}
`
* Example of PUT responsed data
`
{
   "id": 16,
   "username": "user_updated_test",
   "userpassword": "74c23a19d5cc49b25f39ce7f7846d7c8ea4a6d64",
   "description": "Password was checked in haveibeenpwned.com"
}
`

##### DELETE http://localhost:8000/api/users/{id} then you will get response as follow sample
`
"Deleted user id : 3 completely !"

## SOAPUI Testing
You can use SOAPUI to test CRUD function.
* SOAPUI test file at folder tests/Code-Challenge-soapui-project.xml
* Example of SOAPUI Tested result at folder tests/SOAPUI Test results.png
* SOAPUI download link https://www.soapui.org/


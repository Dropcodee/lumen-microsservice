# lumen-microsservice
A Simple lumen microservice for deployment

# Installation & Setup
1. enter into each of the microservices
2. ``` composer install ```
3. Serve each of the microservices on different ports as listed below
4. authors microservice - ```php -S localhost:8000 -t public```
5. books microservice - ```php -S localhost:8001 -t public```
6. api gateway microservice - ```php -S localhost:8002 -t public```
7. check out the requests.http for all the API requests, you can test them out on postman
# HTTP REQUEST SETUP
due to the nature of the security layer which uses OAuth please use this commands before testing out the api requests

1. ```php artisan passport:install```
2. that first command will create A client user which will be used to get your authorization token
3. using postman or any other http request app 
```
POST http://localhost:8002/oauth/token
Content-Type: application/json

{
	"grant_type": "client_credentials",
	"client_id": 2,
	"client_secret": "UbO3Z4J5QCg369GlSflKRP5OzDHXZI4TcNnBcTFN",
	"scope": "*"
}

```
REPLACE THE client_secret with your own generated keys & client_id with your preferred one generated after the first command
4. once you obtain the access token you can use that to trigger any other requests within the application right from the api gateway.

## Things left to be dome
- rabbitMQ implementation to cater for db relationships
- deploy using docker & kubernetes
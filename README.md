# Install and Set Up Application with Docker Compose

Setting up environment with Docker using the stack that includes: Nginx, PHP.

## How to Install and Run the Project

1. ``` git clone git@github.com:vikikhan88/xplore.git ```
2. ``` docker-compose exec app composer install ```
3. ```docker-compose build```
4. ```docker compose up -d```
5. You can see the project on ```127.0.0.1:8080```

## How to Run the TestCases

1. ``` cd ./src/```
2. ``` ./vendor/bin/phpunit ./unitTest/ToyRobotTest.php```

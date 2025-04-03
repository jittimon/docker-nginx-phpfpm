# Docker PHP-FPM 7.4,8.* and Nginx

## How to use this repo

Clone this repo
```bash
git clone https://github.com/patipark/docker-nginx-phpfpm.git
```
or clone via ssl 
```bash
git clone git@github.com:patipark/docker-nginx-phpfpm.git
```

change working directory
```bash
cd docker-nginx-phpfpm
```

Your can put you PHP/web content into "src" directory.
```bash
docker-nginx-phpfpm ‹main*›$ tree
.
├── default.conf
├── docker-compose.yml
├── README.md
└── src #<<< put php file or you web content under here
    ├── index.php
    └── sqlsrv.php
```

You can ajust docker-compose.yml file depend on your environment.such as port , [php version](https://hub.docker.com/repository/docker/patipark/php-fpm/general)
```yml
version: "3.9"

services:
    web:
        restart: always
        image: nginx:latest
        ports:
            - "8080:80" #<<< change your port here etc .. 8088:80
        volumes:
            - ./src:/var/www/html
            - ./default.conf:/etc/nginx/conf.d/default.conf
        links:
            - php-fpm

    php-fpm:
        restart: always
        # php image url : https://hub.docker.com/repository/docker/patipark/php-fpm/general
        image: patipark/php-fpm:7.4-sqlsrv
        volumes:
            - ./src:/var/www/html
```

## How to run docker compose
Run docker-compose command to start all services stack.
```bash
docker-compose up -d
```
After start dokcer service ,open your browser with url http://localhost:8080 or http://host-ip-address:port (your defined port)

if you wan't to install package via composer , you can use as follow command.
```bash
docker-compose exec php-fpm composer require <package>
```

## How to down docker compose
Run docker-compose command to shutdown all services stack.
```bash
docker-compose down
```

## Customize your compose project name 
edit .env file and change COMPOSE_PROJECT_NAME=**your project name**
```env
# .env

# https://docs.docker.com/compose/reference/envvars/#compose_project_name
# Explicitly set volume's prefix or use -P with a docker run command.
COMPOSE_PROJECT_NAME=nginx-phpfpm

```

## How to list docker process
Run docker command to list all service runing.
```bash
docker ps 
```
Run docker command to list all network runing.
```bash
docker network ls
```
Run docker command to list all volumes runing.
```bash
docker volume ls
```



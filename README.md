# Docker PHP-FPM 7.4,8.* and Nginx

# How to use this repo

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

```bash
docker-nginx-phpfpm ‹main*›$ tree
.
├── default.conf
├── docker-compose.yml
├── README.md
└── src
    ├── index.php
    └── sqlsrv.php
```

You can ajust docker-compose.yml file depend on your environment.such as port , [php version](https://hub.docker.com/repository/docker/patipark/php-fpm/general)
```bash
version: "3.9"

services:
    web:
        restart: always
        image: nginx:latest
        ports:
            - "8080:80"
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

Run docker-compose command to start all services stack.
```bash
docker-compose up -d
```

Run docker-compose command to shutdown all services stack.
```bash
docker-compose down
```
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

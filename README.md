# BabyLog

This project is composed of 6 docker containers :

*    babylog_mysql : MYSQL
*    babylog_phpmyadmin : PHPMyAdmin
*    babylog_redis : REDIS
*    babylog_nginx : Nginx
*    babylog_fpm : PHP fpm 7.1 Running Lavarel
*    babylog_angular : Node running the Angular JS project

## Getting Started

Pull the project by using the following command :

```
git pull https://github.com/AdriBalla/BabyLog.git
```

### Prerequisites

This project needs Docker to run.

You can install it from this link : https://docs.docker.com/install/


### Installing and first running Babylog

At first launch, you need to launch the script that will run every container and load every dependencies :

```
sh ./start.sh --build
```

### Running Babylog

If you want to BUILD and RUN the project : 

```
sh ./restart.sh --build
```

If you want to ONLY RUN the project (from latest docker images)

```
sh ./restart.sh
```

### Accessing Babylog

You can access the project from this adress : 

* Lavarel (via Nginx): localhost:5050
* Angular JS (via Nginx): localhost:6060
* PhpMyAdmin : localhost:8080

### Kill and remove every container

If you want to kill and remove every containers of the project : 

```
sh ./kill.sh
```

### Clear volume data and restart composer update

If you want to clear every volum data :

```
sh ./clear.sh
```

### Run PHPUnit tests

If you want to run the laravel test PHPUnit :

```
sh ./test.sh
```


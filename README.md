# BabyLog

This project is composed of 5 docker containers :

*    babylog_mysql : MYSQL
*    babylog_phpmyadmin : PHPMyAdmin
*    babylog_redis : REDIS
*    babylog_nginx : Nginx
*    babylog_fpm : PHP fpm 7.1 Running Lavarel

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
* PhpMyAdmin : localhost:8080

### Kill and remove every container

If you want to kill and remove every containers of the project : 

```
sh ./kill.sh
```




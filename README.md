## Lumen running on Docker contatiner with Elastic Beanstalk

I've been involved within a project using Amazon Elastic Beanstalk with a php host. Elastic Beanstalk also allows us to use docker containers. Today I want to experiment a little bit with Docker. 

My idea is simple. I want to build a single container host in Elastic Beanstalk and deploy an appliaction with Ubuntu+apache+PHP
 
 
That's my Dockerfile. 
```
FROM ubuntu:16.04

RUN apt-get clean && apt-get update && apt-get install -y locales
RUN locale-gen es_ES.UTF-8
RUN update-locale LANG=es_ES.UTF-8

# Install dependencies
RUN apt-get update -y
RUN apt-get install -y git curl apache2 php7.0 libapache2-mod-php7.0 php7.0-mcrypt

ADD code /mnt/code

COPY ./etc/apache/sites-available/000-default.conf /etc/apache2/sites-available/000-default.conf
COPY ./etc/apache2.conf /etc/apache2/apache2.conf

# Configure apache
RUN a2enmod rewrite
RUN chown -R www-data:www-data /mnt/code
ENV APACHE_RUN_USER www-data
ENV APACHE_RUN_GROUP www-data
ENV APACHE_LOG_DIR /var/log/apache2
ENV APACHE_LOCK_DIR /var/lock/apache2
ENV APACHE_PID_FILE /var/run/apache2/apache2.pid

EXPOSE 80

CMD ["/usr/sbin/apache2", "-D",  "FOREGROUND"]
```

docker build -t gonzalo123/php .

eb local run

eb deploy
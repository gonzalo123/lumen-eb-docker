## Lumen running on Docker contatiner with Elastic Beanstalk

I've been involved within a project using Amazon Elastic Beanstalk with a php host. Elastic Beanstalk also allows us to use docker containers. Today I want to experiment a little bit with Docker. 

My idea is simple. I want to build a single container host in Elastic Beanstalk and deploy an appliaction with Ubuntu+apache+PHP
 

docker build -t gonzalo123/php .

eb local run

eb deploy
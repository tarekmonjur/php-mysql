FROM php:8.1.8-apache

WORKDIR /var/www/html

RUN apt-get update && apt-get upgrade -y

COPY run.sh .
RUN chmod u+x ./run.sh
RUN ./run.sh
COPY index.html .

EXPOSE 80
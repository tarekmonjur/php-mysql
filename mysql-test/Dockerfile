FROM mysql:8

ADD ./db/my.cnf /etc/mysql/my.cnf

ENV MYSQL_USER monjur
ENV MYSQL_PASSWORD secret
ENV MYSQL_ROOT_PASSWORD secret
ENV MYSQL_DATABASE testdb

EXPOSE 3306
FROM mysql:5.7.17

MAINTAINER ...

ENV  MYSQL_ROOT_PASSWORD: root
ENV  MYSQL_DATABASE: cinfomed
ENV  MYSQL_USER: mysql
ENV  MYSQL_PASSWORD: 123456

COPY initdb.sql /docker-entrypoint-initdb.d/
RUN chown mysql:mysql /docker-entrypoint-initdb.d/initdb.sql && chmod +x /docker-entrypoint-initdb.d/initdb.sql

ENTRYPOINT ["docker-entrypoint.sh"]
CMD ["mysqld"]

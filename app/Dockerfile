FROM php:7.3-apache

#RUN apt-get update && apt-get upgrade -y
#RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

RUN apt-get update
RUN apt-get upgrade -y

RUN apt-get install --fix-missing -y libpq-dev
RUN apt-get install --no-install-recommends -y libpq-dev
RUN apt-get install -y libxml2-dev libbz2-dev zlib1g-dev
RUN apt-get -y install libsqlite3-dev libsqlite3-0 mariadb-client curl exif ftp
RUN docker-php-ext-install intl
RUN docker-php-ext-install mysqli pdo pdo_mysql
RUN docker-php-ext-enable mysqli
RUN docker-php-ext-enable pdo
RUN docker-php-ext-enable pdo_mysql
RUN apt-get -y install --fix-missing zip unzip
RUN apt-get -y install --fix-missing git

#Composer?
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer self-update --2

ADD conf/apache.conf /etc/apache2/sites-available/000-default.conf

# LDAP INSTALLATION
RUN set -x \
    && apt-get update \
    && apt-get install -y libldap2-dev \
    && rm -rf /var/lib/apt/lists/* \
    && docker-php-ext-configure ldap --with-libdir=lib/x86_64-linux-gnu/ \
    && docker-php-ext-install ldap \
    && apt-get purge -y --auto-remove libldap2-dev

RUN a2enmod rewrite

RUN apt-get clean \
    && rm -r /var/lib/apt/lists/*

RUN cd /var/www/html

RUN composer create-project codeigniter4/appstarter codeigniter4 v4.1.8

RUN rm -rf ./vendor
RUN mv ./codeigniter4/vendor/ /var/www/html/

#Eu preciso copiar essa parte para dentro do "app" no appstarter
COPY . /var/www/html/
RUN chown -R www-data:www-data /var/www/html
RUN chmod -R 0777 /var/www/html/writable
    
EXPOSE 80
VOLUME ["/var/www/html", "/var/log/apache2", "/etc/apache2"]

CMD ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]

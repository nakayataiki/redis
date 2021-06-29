FROM php:7.2-apache
RUN apt-get update && \
  docker-php-ext-install pdo_mysql mysqli mbstring \
  && mv /etc/apache2/mods-available/rewrite.load /etc/apache2/mods-enabled  #ここ追加
  # /etc/apache2/mods-available/にあるrewrite.loadを/etc/apache2/mods-enabledディレクトリに移動してやる

#COPY ./api /usr/local/api

# mod_rewriteを 有効に
RUN /bin/sh -c a2enmod rewrite

RUN apt-get update &&\
    apt-get install -y git unzip curl make gcc

WORKDIR /usr/src/php/ext
RUN git clone -b 4.2.0 https://github.com/phpredis/phpredis.git &&\
    mv phpredis redis &&\
    docker-php-ext-install redis

RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini" &&\
    sed -i -e 's/session\.save_handler.*/session\.save_handler = redis/' $PHP_INI_DIR/php.ini &&\
    echo 'session.save_path = tcp://redis:6379' >> $PHP_INI_DIR/php.ini
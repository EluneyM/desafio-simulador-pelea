from php:8.0

RUN apt-get update && apt-get install -y \
    libzip-dev \
    zip \
    unzip

RUN docker-php-ext-install zip 

COPY --from=composer:2.5.8 /usr/bin/composer /usr/bin/composer

ARG uid

RUN useradd -G www-data,root -u $uid -d /home/$uid $uid

RUN mkdir -p /home/$uid/.composer && \
    chown -R $uid:$uid /home/$uid

WORKDIR /var/www

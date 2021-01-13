FROM php:8.0.1-fpm-buster

ARG USER_NAME
ARG USER_UID

RUN apt-get update && apt-get install -y \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    zip \
    unzip \
    curl \
    git \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd

RUN apt-get clean && rm -rf /var/lib/apt/lists/*

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN useradd -G www-data,root -u $USER_UID -d /home/$USER_NAME $USER_NAME
RUN mkdir -p /home/$USER_NAME/.composer && \
    chown -R $USER_NAME:$USER_NAME /home/$USER_NAME

WORKDIR /var/www

USER $USER_NAME
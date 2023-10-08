FROM ubuntu:22.04

LABEL maintainer="Mark Marilag <mark.marilag27@gmail.com>"

ENV AWS_ACCESS_KEY_ID=${AWS_ACCESS_KEY_ID:-laravel}
ENV AWS_SECRET_ACCESS_KEY=${AWS_SECRET_ACCESS_KEY:-password}
ENV AWS_REGION=${AWS_DEFAULT_REGION:-ap-southeast-1}

ARG NODE_VERSION=18
ENV DEBIAN_FRONTEND noninteractive
ENV TZ=UTC

RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

RUN apt-get update && \
    apt-get install -y \
    gnupg \
    gosu \
    curl \
    ca-certificates \
    zip \
    unzip \
    supervisor \
    sqlite3 \
    cron \
    libcap2-bin \
    libpng-dev \
    python2 \
    jpegoptim \
    optipng \
    pngquant \
    gifsicle \
    dnsutils && \
    curl -sS 'https://keyserver.ubuntu.com/pks/lookup?op=get&search=0x14aa40ec0831756756d7f66c4f4ea0aae5267a6c' | gpg --dearmor | tee /usr/share/keyrings/ppa_ondrej_php.gpg > /dev/null && \
    echo "deb [signed-by=/usr/share/keyrings/ppa_ondrej_php.gpg] https://ppa.launchpadcontent.net/ondrej/php/ubuntu jammy main" > /etc/apt/sources.list.d/ppa_ondrej_php.list

RUN apt-get update && apt-get install -y \
    nginx \
    php8.2-cli \
    php8.2-dev \
    php8.2-fpm \
    php8.2-gd \
    php8.2-curl \
    php8.2-imap \
    php8.2-sqlite3 \
    php8.2-mysql \
    php8.2-mbstring \
    php8.2-xml \
    php8.2-zip \
    php8.2-bcmath \
    php8.2-soap \
    php8.2-intl \
    php8.2-readline \
    php8.2-ldap \
    php8.2-msgpack \
    php8.2-igbinary \
    php8.2-redis \
    php8.2-pcov \
    php8.2-xdebug \
    && curl -sLS https://deb.nodesource.com/setup_$NODE_VERSION.x | bash - \
    && apt-get install -y nodejs \
    && npm install -g npm \
    && curl -sS https://dl.yarnpkg.com/debian/pubkey.gpg | gpg --dearmor | tee /usr/share/keyrings/yarn.gpg >/dev/null \
    && echo "deb [signed-by=/usr/share/keyrings/yarn.gpg] https://dl.yarnpkg.com/debian/ stable main" > /etc/apt/sources.list.d/yarn.list \
    && apt-get update \
    && apt-get install -y yarn \
    && apt-get install -y mysql-client

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
COPY --from=amazon/aws-cli /usr/local/aws-cli/ /usr/local/aws-cli/
COPY --from=minio/mc:latest /usr/bin/mc /usr/bin/mc
RUN ln -s /usr/local/aws-cli/v2/current/bin/aws /usr/local/bin/

RUN apt-get -y autoremove && \
    apt-get -y clean && \
    rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

RUN groupadd --force -g 1000 laravel
RUN useradd -ms /bin/bash --no-user-group -g 1000 -u 1000 laravel

COPY supervisord.conf /etc/supervisor/conf.d/supervisord.conf
COPY fpm-pool.conf /etc/php/8.2/fpm/pool.d/www.conf
COPY php.ini /etc/php/8.2/fpm/conf.d/99-php.ini
COPY xdebug.ini /etc/php/8.2/cli/conf.d/20-xdebug.ini

RUN mkdir -p /var/www/html && \
    mkdir -p /var/log/php && \
    mkdir -p /var/log/supervisor && \
    mkdir -p /tmp/laravel/storage/framework/views

RUN chown -R laravel:laravel /var/www/html && \
    chown -R laravel:laravel /run && \
    chown -R laravel:laravel /var/lib/nginx && \
    chown -R laravel:laravel /var/log/nginx && \
    chown -R laravel:laravel /var/log/php && \
    chown -R laravel:laravel /tmp/laravel/storage/framework/views

WORKDIR /var/www/html

EXPOSE 80

CMD [ "/usr/bin/supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf" ]


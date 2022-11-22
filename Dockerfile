FROM ghcr.io/domingoruiz/docker-lamp:php7.0

RUN apt-get update
RUN apt-get install vim openssh-server git unzip curl acl\
    php8.1-common php8.1-fpm php8.1-mysql php8.1-gmp php8.1-xml php8.1-xmlrpc php8.1-curl php8.1-mbstring php8.1-gd \
    php8.1-dev php8.1-imap php8.1-opcache php8.1-readline php8.1-soap php8.1-zip php8.1-intl php8.1-cli \
    libapache2-mod-php8.1 -y

RUN mkdir ~/.ssh/
RUN touch ~/.ssh/authorized_keys

RUN a2dismod php7.0
RUN service apache2 restart
RUN a2enmod php8.1
RUN service apache2 restart
RUN touch /var/www/html/info.php
RUN echo "<?php phpinfo() ?>" >> /var/www/html/info.php

EXPOSE 22
EXPOSE 80

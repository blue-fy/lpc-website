FROM php:8.2-apache

RUN apt-get update \
    && apt-get install -y --no-install-recommends mariadb-client curl wget \
    && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install mysqli pdo pdo_mysql

# mod_php requires prefork. Keep Apache's module registry intact, but make the
# selected MPM explicit so Railway never starts with event/worker also enabled.
RUN rm -f /etc/apache2/mods-enabled/mpm_event.* /etc/apache2/mods-enabled/mpm_worker.* \
    && a2enmod mpm_prefork rewrite headers

# Ensure Apache listens on all interfaces
RUN sed -i 's/^Listen 80$/Listen 0.0.0.0:80/' /etc/apache2/ports.conf

# Download WordPress
WORKDIR /var/www/html
RUN curl -O https://wordpress.org/latest.tar.gz && \
    tar xzf latest.tar.gz && \
    mv wordpress/* . && \
    rmdir wordpress && \
    rm latest.tar.gz

# Copy our customizations
COPY lpc-theme/ wp-content/themes/lpc-theme/
COPY wp-config-railway.php wp-config.php
COPY .htaccess .
COPY entrypoint.sh /entrypoint.sh

# Set permissions
RUN chmod +x /entrypoint.sh \
    && chown -R www-data:www-data /var/www/html

EXPOSE 80

CMD ["/entrypoint.sh"]

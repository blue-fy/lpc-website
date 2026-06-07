FROM wordpress:6.7-php8.2-apache

# Install useful PHP extensions
RUN apt-get update && apt-get install -y \
    less \
    mariadb-client \
    unzip \
    curl \
    && rm -rf /var/lib/apt/lists/*

# Install WP-CLI
RUN curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar \
    && chmod +x wp-cli.phar \
    && mv wp-cli.phar /usr/local/bin/wp

# Enable Apache mod_rewrite for WordPress permalinks
RUN a2enmod rewrite

# Ensure only mpm_prefork is loaded (required for mod_php)
RUN a2dismod mpm_event mpm_worker 2>/dev/null; a2enmod mpm_prefork

# Make Apache listen on Railway's $PORT (defaults to 80 locally)
RUN sed -i 's/Listen 80/Listen ${PORT:-80}/' /etc/apache2/ports.conf \
    && sed -i 's/<VirtualHost \*:80>/<VirtualHost *:${PORT:-80}>/' /etc/apache2/sites-available/000-default.conf

# Copy LPC theme into WordPress themes directory
COPY lpc-theme/ /var/www/html/wp-content/themes/lpc-theme/

# Copy custom wp-config and entrypoint
COPY wp-config-railway.php /var/www/html/wp-config-railway.php
COPY entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh

# Set correct permissions
RUN chown -R www-data:www-data /var/www/html/wp-content

# Apache config — allow .htaccess overrides
RUN echo '<Directory /var/www/html>\n\
    Options FollowSymLinks\n\
    AllowOverride All\n\
    Require all granted\n\
</Directory>' > /etc/apache2/conf-available/wordpress.conf \
    && a2enconf wordpress

EXPOSE 80

ENTRYPOINT ["/entrypoint.sh"]
CMD ["apache2-foreground"]

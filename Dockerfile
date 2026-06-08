FROM wordpress:6.7-php8.2-apache

RUN apt-get update && apt-get install -y curl && rm -rf /var/lib/apt/lists/*

# Enable Apache modules
RUN a2enmod rewrite headers && \
    a2dismod mpm_event mpm_worker && \
    a2enmod mpm_prefork

# Copy WordPress config and theme
COPY wp-config-railway.php /var/www/html/
COPY lpc-theme/ /var/www/html/wp-content/themes/lpc-theme/
COPY .htaccess /var/www/html/

# Set permissions
RUN chown -R www-data:www-data /var/www/html

# Custom entrypoint
COPY entrypoint.sh /usr/local/bin/docker-entrypoint.sh
RUN chmod +x /usr/local/bin/docker-entrypoint.sh

EXPOSE 80

ENTRYPOINT ["/usr/local/bin/docker-entrypoint.sh"]
CMD ["apache2-foreground"]

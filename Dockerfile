FROM httpd:2.4

RUN echo 'OK - Server is running' > /usr/local/apache2/htdocs/index.html

EXPOSE 80

CMD ["httpd-foreground"]

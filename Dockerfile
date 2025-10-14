
# Dùng PHP + Apache
FROM php:8.2-apache

# Copy code vào /var/www/html
COPY . /var/www/html/

# Mở cổng 80
EXPOSE 80

# Chạy Apache
CMD ["apache2-foreground"]

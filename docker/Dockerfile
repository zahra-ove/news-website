# Use the official PHP image with Apache
FROM php:8.3-apache

# Set working directory
WORKDIR /var/www/html

# Update the package manager and install necessary packages
RUN apt-get update && apt-get install -y \
    unzip zip \
    git \
    curl \
    libmariadb-dev \
    libicu-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gettext gd \
    && docker-php-ext-install mysqli pdo pdo_mysql \
    && docker-php-ext-enable gd mysqli pdo pdo_mysql

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Install Composer globally
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy custom Apache configuration file
COPY ./../docker/apache-config.conf /etc/apache2/sites-available/000-default.conf

# Copy the application code
COPY ../news-website /var/www/html
COPY ./../docker/laravel.conf /etc/apache2/sites-available


RUN a2ensite laravel.conf && a2dissite 000-default.conf

# Set permissions for the working directory
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html \
    && chmod -R 775 /var/www/html/storage \
    && chmod -R 775 /var/www/html/bootstrap/cache

USER www-data

# Expose port 80
EXPOSE 80

# Start Apache
CMD ["apache2-foreground"]

# Set the base image to PHP with necessary extensions for Laravel
FROM php:8.2-fpm

# Install dependencies
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    zip \
    git \
    curl \
    libzip-dev \
    && docker-php-ext-configure zip \
    && docker-php-ext-install gd pdo pdo_mysql zip

# Install Composer (PHP dependency manager)
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory inside the container
WORKDIR /var/www

# Copy the Laravel project files into the container
COPY . .

# Install PHP dependencies using Composer
RUN composer install --no-dev --optimize-autoloader

# Set permissions for Laravel directories
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# Expose port 9000 to the outside world
EXPOSE 9000

# Start the PHP-FPM server
CMD ["php-fpm"]


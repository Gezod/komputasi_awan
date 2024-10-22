# Gunakan image PHP dengan versi yang sesuai
FROM php:8.2.12-fpm

# Instal dependensi yang diperlukan
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip

# Install PHP extensions yang diperlukan Laravel
RUN docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd

# Instal Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy semua file ke dalam container
COPY . .

# Beri permission
RUN chown -R www-data:www-data /var/www \
    && chmod -R 755 /var/www

# Install dependensi proyek Laravel
RUN composer install

# Salin file konfigurasi nginx
COPY docker/nginx/default.conf /etc/nginx/conf.d/default.conf

# Expose port 9000 dan 80
EXPOSE 9000
EXPOSE 80

CMD ["php-fpm"]

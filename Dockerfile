FROM php:8.1-fpm

# Install dependencies dan ekstensi GD
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    unzip \
    git \
    curl \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    libgd-dev \
    vim \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) \
    gd \
    pdo_mysql \
    mysqli \
    mbstring \
    zip \
    exif \
    pcntl \
    bcmath \
    opcache \
    && rm -rf /var/lib/apt/lists/*

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy all Laravel app files
COPY ./app /var/www/html

# Install Laravel dependencies
RUN composer install --no-dev --optimize-autoloader --no-scripts

# Copy environment file
COPY ./app/.env.example .env

# Generate application key
RUN php artisan key:generate

# Set permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html \
    && chmod -R 775 /var/www/html/storage \
    && chmod -R 775 /var/www/html/bootstrap/cache

# Clear cache
RUN php artisan cache:clear \
    && php artisan route:clear \
    && php artisan config:clear \
    && php artisan view:clear

# Expose port 80 (bukan 9000)
EXPOSE 80

CMD ["php-fpm"]
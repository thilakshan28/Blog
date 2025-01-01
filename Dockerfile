FROM php:8.3.10

# Install dependencies
RUN apt-get update && apt-get install -y openssl zip unzip git libonig-dev && rm -rf /var/lib/apt/lists/*

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_mysql mbstring

WORKDIR /app

# Copy composer files first for better cache layer
COPY . /app
RUN composer install

# Copy the rest of the application
COPY . /app

# Expose port
EXPOSE 8000

# Start the application
CMD php artisan serve --host=0.0.0.0 --port=8000

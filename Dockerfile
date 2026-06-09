# ==========================================
# DOCKERFILE PER AL BACKEND (LARAVEL)
# ==========================================

# 1. Utilitzem la imatge oficial de PHP 8.2 amb Apache
FROM php:8.2-apache

# 2. Instal·lem llibreries del sistema necessàries per a PHP i Laravel
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    unzip \
    git \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql

# 3. Habilitem el mòdul de reescriptura d'URLs (obligatori per a Laravel)
RUN a2enmod rewrite

# 4. Establim el directori de treball dins del contenidor
WORKDIR /var/www/html

# 5. Copiem tots els fitxers del teu projecte actual al contenidor
COPY . .

# 6. Ajustem els permisos de les carpetes que Laravel necessita escriure
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# 7. Exposem el port 80 per a que el servidor web pugui rebre peticions
EXPOSE 80

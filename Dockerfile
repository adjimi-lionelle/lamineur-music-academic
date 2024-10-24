# Utiliser PHP-FPM 8.2
FROM php:8.2-fpm

# Installer les dépendances nécessaires et Nginx
RUN apt-get update && apt-get install -y \
    zlib1g-dev \
    g++ \
    git \
    libicu-dev \
    zip \
    unzip \
    nginx \
    && rm -rf /var/lib/apt/lists/*

# Installer les extensions PHP requises
RUN docker-php-ext-install intl pdo pdo_mysql

# Installer Composer
RUN curl -sS https://getcomposer.org/installer | php -- && mv composer.phar /usr/local/bin/composer

# Définir le répertoire de travail
WORKDIR /var/www

# Copier le code de l'application dans le conteneur
COPY . /var/www

# Copier la configuration Nginx (assure-toi que le fichier existe)
COPY docker/nginx/default.conf /etc/nginx/conf.d/default.conf

# Donner les permissions appropriées aux fichiers
RUN chown -R www-data:www-data /var/www

# Installer les dépendances PHP avec Composer
#RUN composer install --no-dev --optimize-autoloader

# Exposer le port 80 pour Nginx
EXPOSE 80

# Lancer à la fois Nginx et PHP-FPM
CMD service nginx start && php-fpm
#["bash"]

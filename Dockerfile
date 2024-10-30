# Utiliser PHP-FPM 8.2
FROM php:8.2-fpm

# Installer les dépendances nécessaires
RUN apt-get update && apt-get install -y \
    zlib1g-dev \
    g++ \
    git \
    libicu-dev \
    zip \
    unzip

# Installer les extensions PHP requises
RUN docker-php-ext-install intl pdo pdo_mysql

# Installer Composer
RUN curl -sS https://getcomposer.org/installer | php -- && mv composer.phar /usr/local/bin/composer

# Définir le répertoire de travail
WORKDIR /var/www

# Copier le code de l'application dans le conteneur
COPY . /var/www

# Copier le script d'entrée
COPY docker/script.sh /var/www/docker/script.sh

# Donner les permissions appropriées aux fichiers, y compris le script
RUN chmod +x /var/www/docker/script.sh

# Exposer le port 9000 pour PHP-FPM
EXPOSE 9000

# Utiliser le script de démarrage
# Utiliser le script d'entrée comme commande principale
ENTRYPOINT ["/var/www/docker/script.sh"]

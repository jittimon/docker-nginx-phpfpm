FROM patipark/php-fpm:8.2

# Update packages and install Composer and required packages.
RUN apt-get update && apt-get install -y \
  curl \
  zip \
  unzip \
  git && \
  curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set working directory
WORKDIR /var/www/html

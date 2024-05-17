# Use a imagem PHP oficial como imagem base
FROM php:8.1-fpm

# Diretório de trabalho no contêiner
WORKDIR /var/www/html

# Instale as extensões do PHP necessárias para o Lumen e outras dependências
RUN apt-get update && apt-get install -y \
    libzip-dev \
    zip \
    unzip \
    git \
    && docker-php-ext-install pdo pdo_mysql zip

# Instale o Composer globalmente
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copie o código-fonte da aplicação para o contêiner
COPY . .

# Expõe a porta 80 para o servidor web interno do PHP-FPM
EXPOSE 80

# Comando para iniciar o servidor web
CMD ["php", "-S", "0.0.0.0:80", "-t", "public"]

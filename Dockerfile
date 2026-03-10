# Usar imagen oficial de PHP con Apache
FROM php:8.2-apache

# Habilitar módulo rewrite de Apache
RUN a2enmod rewrite

# Instalar extensiones necesarias
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Copiar configuración de Apache (opcional, para .htaccess)
RUN echo "AllowOverride All" >> /etc/apache2/apache2.conf

# Copiar archivos de la aplicación al contenedor
COPY . /var/www/html/

# Establecer permisos
RUN chown -R www-data:www-data /var/www/html

# Exponer puerto 80
EXPOSE 80

# Comando por defecto
CMD ["apache2-foreground"]

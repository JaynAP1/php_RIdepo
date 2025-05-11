# Usa la imagen php con Apache
FROM php:8.2-apache

# Instalar herramientas necesarias
RUN apt-get update && apt-get install -y inotify-tools

# Habilitar mod_rewrite para permitir el uso de .htaccess
RUN a2enmod rewrite

# Copiar archivos del proyecto al contenedor
COPY src/ /var/www/html/
COPY autoreload.sh /usr/local/bin/autoreload.sh

# Cambiar permisos para autoreload.sh
RUN chmod +x /usr/local/bin/autoreload.sh

# Configurar Apache para permitir .htaccess
RUN sed -i 's/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf

# Establecer directorio de trabajo
WORKDIR /var/www/html

# Exponer el puerto 80 para el contenedor
EXPOSE 80

# Iniciar Apache con el script de autorecarga
CMD /bin/bash -c "/usr/local/bin/autoreload.sh & apache2-foreground"

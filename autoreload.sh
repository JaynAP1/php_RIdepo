#!/bin/bash
echo "Iniciando monitoreo de archivos..."
while inotifywait -r -e modify,create,delete /var/www/html; do
    echo "Cambio detectado. Recargando..."
    pkill -HUP php
done

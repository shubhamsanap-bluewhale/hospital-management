#!/bin/sh
# Container start script: listen on Railway's $PORT, prepare writable folders, start Apache.
set -e

PORT="${PORT:-8080}"
sed -ri "s/^Listen .*/Listen ${PORT}/" /etc/apache2/ports.conf
sed -ri "s/<VirtualHost \*:[0-9]+>/<VirtualHost *:${PORT}>/" /etc/apache2/sites-available/000-default.conf

# A Railway volume mounted on /var/www/html/uploads starts empty: copy in the shipped files
# without overwriting anything users have uploaded since.
cp -rn /opt/uploads-seed/. /var/www/html/uploads/ 2>/dev/null || true

# Folders the app writes to (uploads, DB backups, temp files, cache).
mkdir -p /var/www/html/temp /var/www/html/backup /var/www/html/application/cache
chown -R www-data:www-data /var/www/html/uploads /var/www/html/temp /var/www/html/backup /var/www/html/application/cache

echo "Smart Hospital: Apache listening on port ${PORT}"
exec apache2-foreground

#!/bin/bash

echo "ServerName localhost" >> /etc/apache2/apache2.conf

cat > /etc/apache2/sites-available/000-default.conf <<EOF
ServerName localhost
<VirtualHost *:80>
    DocumentRoot /var/www/html/
    <Directory "/var/www/html/">
        DirectoryIndex index.php index.html
        Options Indexes FollowSymLinks
        AllowOverride all
        Require all granted
    </Directory>

    ErrorLog ${APACHE_LOG_DIR}/error.log
    CustomLog ${APACHE_LOG_DIR}/access.log combined
</VirtualHost>
EOF

a2enmod rewrite

service apache2 restart

service apache2 reload
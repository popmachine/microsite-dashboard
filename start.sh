#!/bin/bash

# Clear Laravel caches
php artisan config:clear
php artisan view:clear
php artisan cache:clear

# Serve Laravel from the proper web root
php artisan serve --host=0.0.0.0 --port=8080
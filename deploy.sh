#!/bin/bash
# deploy.sh — Run this on the server after each git push
# Usage: bash deploy.sh

echo "?? Deploying..."

git pull origin main

echo "?? Clearing caches..."
php artisan view:clear
php artisan config:clear
php artisan route:clear
php artisan cache:clear
php artisan optimize:clear

echo "? Deployment complete!"

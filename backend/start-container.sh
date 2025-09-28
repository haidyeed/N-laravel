#!/bin/bash

# Exit on error
set -e

# Install dependencies if vendor folder is missing
if [ ! -d "vendor" ]; then
  echo "Installing Composer dependencies..."
  composer install --no-interaction --prefer-dist --optimize-autoloader
fi

# Generate app key if not set
if [ ! -f ".env" ]; then
  echo "Creating .env file..."
  cp .env.example .env
fi

if ! grep -q "APP_KEY=" .env || [ -z "$(grep 'APP_KEY=' .env | cut -d '=' -f2)" ]; then
  echo "Generating app key..."
  php artisan key:generate
fi

# Run migrations
echo "Running migrations..."
php artisan migrate --force
php artisan db:seed

# Start Apache
echo "Serving Application..."

php artisan serve --host=0.0.0.0 --port=8000
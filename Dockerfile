FROM php:8.0-apache AS base

# Install required packages and PHP extensions
RUN apt-get update && \
    apt-get install -y libzip-dev zlib1g-dev && \
    docker-php-ext-install mysqli zip bcmath && \
    apt-get autoremove -y && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/*

# Copy your project files to the Apache document root
COPY . /var/www/html

# Build stage for Python
FROM python:3.10-slim-buster AS build-python

# Copy requirements.txt to the working directory
COPY requirements.txt .

# Install Python and dependencies
RUN pip install -r requirements.txt

# Final stage for production image
FROM base

# Copy Python installation from build-python stage
COPY --from=build-python /usr/local /usr/local
COPY --from=build-python /usr/lib/x86_64-linux-gnu/libffi.so.6 /usr/lib/x86_64-linux-gnu/


# Update the Apache configuration to allow .htaccess files
RUN sed -i 's/AllowOverride None/AllowOverride All/g' /etc/apache2/apache2.conf

# Enable Apache rewrite module
RUN a2enmod rewrite

# Set ownership and permissions for the Apache document root
RUN chown -R www-data:www-data /var/www/html && \
    chmod -R 755 /var/www/html

# Expose port 80 for the web server
EXPOSE 80

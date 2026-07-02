FROM php:8.3-cli

# Instalar dependencias del sistema y Node.js (necesario para Vite)
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    nodejs \
    npm

# Limpiar caché
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Instalar extensiones de PHP necesarias para Laravel y TiDB
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Configurar directorio de trabajo
WORKDIR /app

# Copiar todos los archivos del proyecto
COPY . .

# Instalar dependencias de PHP y Node, y construir assets
RUN composer install --no-dev --optimize-autoloader
RUN npm install && npm run build

# Crear enlace simbolico
RUN php artisan storage:link

# Comando de inicio: Render asignará un puerto en la variable $PORT
CMD php artisan serve --host=0.0.0.0 --port=${PORT:-8000}

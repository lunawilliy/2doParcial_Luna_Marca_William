# Portal de Páginas Web Favoritas

Aplicación web desarrollada con Laravel 13, Breeze y PostgreSQL.

## Autor

Carlos Matos Paco

## Instalación

1. Clonar el repositorio:
```bash
git clone https://github.com/tu-usuario/portal-web.git
cd portal-web
```

2. Instalar dependencias:
```bash
composer install
npm install
```

3. Copiar el archivo de entorno:
```bash
copy .env.example .env
php artisan key:generate
```

4. Configurar la base de datos en `.env`:
```env
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=portal_favoritos
DB_USERNAME=favoritos
DB_PASSWORD=123456
```

5. Ejecutar migraciones y seeder:
```bash
php artisan migrate
php artisan db:seed
```

6. Compilar assets:
```bash
npm run build
```

7. Levantar el servidor:
```bash
php artisan serve
```

## Usuarios de prueba

- Email: `prueba@favoritos.com`
- Contraseña: `password`
- Email: `abi@example.com`
- Contraseña: `123456789`
## Funcionalidades

- Registro e inicio de sesión con Laravel Breeze
- CRUD completo de sitios web favoritos
- Búsqueda por título y filtro por categoría
- Indicador visual para sitios destacados
- Aislamiento por usuario (cada usuario solo ve sus propios sitios)
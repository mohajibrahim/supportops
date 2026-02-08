\# SupportOps Desk Backend (Laravel)



This folder contains the \*\*Laravel-specific files\*\* (controllers, models, migrations, routes, and seeders) for the SupportOps Desk MVP. To run locally, you will scaffold a fresh Laravel app and copy these files in.



\## 1) Prerequisites



\- PHP 8.2+

\- Composer

\- MySQL 8+



\## 2) Scaffold a fresh Laravel app



From the repo root:



```bash

composer create-project laravel/laravel supportops-backend

```



\## 3) Copy in the MVP files



```bash

cp -R supportops/backend/app supportops-backend/

cp -R supportops/backend/database supportops-backend/

cp -R supportops/backend/routes supportops-backend/

```



\## 4) Configure your `.env`



Update these values in `supportops-backend/.env`:



```

DB\_CONNECTION=mysql

DB\_HOST=127.0.0.1

DB\_PORT=3306

DB\_DATABASE=supportops

DB\_USERNAME=root

DB\_PASSWORD=your\_password

```



\## 5) Run migrations + seed demo data



```bash

cd supportops-backend

php artisan migrate

php artisan db:seed --class=DemoSeeder

```



\## 6) Start the API server



```bash

php artisan serve

```



The API will be available at `http://127.0.0.1:8000/api`.



\## Notes



\- The API is intentionally simple so it can be expanded with authentication (Laravel Sanctum), role-based permissions, and audit logging later.

\- If you prefer to keep everything inside this repo, you can move the generated Laravel app into `supportops/backend/runtime` and keep the MVP code in `supportops/backend` as a reference.




# Tasks
Task management system

### Features:
1. Search tasks,
2. Trash, restore & permanently delete tasks,
3. Sort Priority / Order by drag-and-drop,
4. Pagination,
5. Project module,
6. Filter tasks by projects,
7. View trashed tasks,
8. UUID primary key,
9. Create/Edit task using a single modal, etc.

## System requirements
- PHP: ^8.2
- Composer
- Node.js

## Update composer
```bash
composer update
```
## Update NPM
```bash
npm update
```

## Run migration and seed system
```bash
php artisan migrate --seed
php artisan module:seed
```

## Generate .env file & App Key
```bash
copy .env.* .env; php artisan key:generate
```

## Test User
- Email: test@example.com
- Password: password

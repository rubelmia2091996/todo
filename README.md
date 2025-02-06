## Installation 
1. Open the terminal in your project root directory.
2. Use the following command to install the composer

```bash
composer install
```

3. Run the following command to generate the key

```bash
php artisan key:generate
```

4. To do migration for the database.

```bash
php artisan migrate
```

5. Now do run 'npm install' and run 'npm run dev' in backgroud if you are in development. Otherwise for production use 'npm run build'.

```bash
npm install

npm run dev

npm run build
```

6. To run queue in background run 

```bash
php artisan queue:work
```

7. To run sheduler 
```bash
php artisan schedule:run
```
8. Run the project 
```bash
php artisan serve
```

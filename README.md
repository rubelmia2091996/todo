## Installation 
Open the terminal in your project root directory.
Use the following command to install the composer.
Set up env file insert email and db credentials.

```bash
composer install
```

Run the following command to generate the key

```bash
php artisan key:generate
```

To do migration for the database.

```bash
php artisan migrate
```

Now do run 'npm install' and run 'npm run dev' in backgroud if you are in development. Otherwise for production use 'npm run build'.

```bash
npm install

npm run dev

npm run build
```

To run queue in background run 

```bash
php artisan queue:work
```

To run schedule 
```bash
php artisan schedule:run
```
Run the project 
```bash
php artisan serve
```

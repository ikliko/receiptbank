# Fibonacci Multiplication Table

## Consoleapp
1. To start the console app open `ReceiptBank - backapp n consoleapp` in terminal
2. Enter the following command `php artisan consoleapp -n {number you want}` to run the script


## Backapp
###Requirements
- Server WAMP/LAMP/MAMP/ZAMP
- PHP >= 7.3
- BCMath PHP Extension
- Ctype PHP Extension
- Fileinfo PHP Extension
- JSON PHP Extension
- Mbstring PHP Extension
- OpenSSL PHP Extension
- PDO PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension

### Config
1. Run in terminal `composer install`
2. Run in terminal `php artisan env`
3. Run in terminal `php artisan key:generate`
4. Open `.env` file
5. Add the configuration for DB. Example: 
    - DB_CONNECTION=mysql
    - DB_HOST=localhost
    - DB_PORT=3306
    - DB_DATABASE=example_db
    - DB_USERNAME=example_user
    - DB_PASSWORD=secret
6. Create the database using your `phpmysql` or any tool of your choice
7. Load the migrations `php artisan migrate`
8. Start the server with the following terminal command `php artisan serve`
9. Open your browser and go to `localhost:8000`

### Start
1. To start the back app open `ReceiptBank - backapp n consoleapp` in terminal
2. Enter the following command `php artisan serve`
3. Open in browser `localhost:8000`

##Frontapp

###Start
1. Open folder `ReceiptBank - frontapp` in terminal
2. Run the following command `ruby app.rb`
3. Open browser and go to localhost:{port from your console} by default port is 4567
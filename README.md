## Project Setup

- Rename .env.example to .env file
- Replace database variable with your database credentials in env file.
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=uber
DB_USERNAME=root
DB_PASSWORD=
```
- Open the root directory in terminal and run this command `composer update`

- After this, open the root directory in terminal and run the commands `php artisan migrate`.

- After running the above command, run this command `php artisan serve`

- Open another root directory terminal and run `php artisan queue:listen` for the running queue on the background which is used for import contact data.

- Open this url in your browser `http://127.0.0.1:8000/contact`

### Note
- Download the sample file for import contact data in import Contact menu

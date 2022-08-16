
#azmoon

azmoon project with laravel 

This project runs with Laravel version 8.

##Getting started
install on your machine:PHP (>= 7.0.0), Laravel, Composer and Node.js.

# install dependencies
composer install

npm install

# create .env file and generate the application key
copy .env.example .env

Open your .env file **and change:**

 the database name **(azmoon)**
 
**and change:**

MAIL_HOST=smtp.mailtrap.io

MAIL_PORT=2525

MAIL_USERNAME=fe6d9bc2c40f3b

MAIL_PASSWORD=5ed9b17b9bfc4f

MAIL_FROM_ADDRESS=mahtiteymoori@yahoo.com

**And add these codes to the end of the .env file**

GOOGLE_RECAPTCHA_SITE_KEY=6LcT1N4gAAAAAJOBbg_apZ4iGEevjb7aSqTXByqS

GOOGLE_RECAPTCHA_SECRET_KEY=6LcT1N4gAAAAAJZ2U6UCWY0X7bm3ttpzGlIR9W7D


php artisan key:generate

# build CSS and JS assets
npm run dev

npm run prod

php artisan migrate  

php artisan serve

 Access it at (http://localhost:8000)

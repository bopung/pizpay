# pizpay
Installation

    type git clone git@github.com:bopung/pizpay.git projectname to clone the repository
    type cd projectname
    type composer install
    type composer update
    copy .env.example to .env
    type php artisan key:generateto generate secure key in .env file
    if you use MySQL in .env file :
        set DB_CONNECTION
        set DB_DATABASE
        set DB_USERNAME
        set DB_PASSWORD
    if you use sqlite :
        type touch database/database.sqlite to create the file
    

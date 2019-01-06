# pizpay
Installation

    type git clone git@github.com:bopung/pizpay.git projectname to clone the repository
    type cd projectname
    type composer install
    type composer update
    copy .env.example to .env
    type php artisan key:generateto generate secure key in .env file
    configure database in .env file
    if you use MySQL in .env file :
        set DB_CONNECTION
        set DB_DATABASE
        set DB_USERNAME
        set DB_PASSWORD
    if you use sqlite :
        type touch database/database.sqlite to create the file
    type php artisan migrate
 How to Use
    type php artisan serve
    then it will go throught the server link
    then for the api:
    {your_server_link}/api/pay/{amount_token}?token={your_token}
    then it will give you 2 respon:
    if balance is not enough will return:
    return response()->json([
                'success' => false,
                'message' => 'Balance is not enough'
            ], 500);  
    else
    return response()->json([
            'success' => true,
            'balance' => $account['balance'],
            'message' => 'Transaction is success',
        ], 200); 
        
    

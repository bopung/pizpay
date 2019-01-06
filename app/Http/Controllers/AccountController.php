<?php

namespace App\Http\Controllers;
use App\Account;
use JWTAuth;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    protected $user;
 
    public function __construct()
    {
        $this->user = JWTAuth::parseToken()->authenticate();
    }

    public function pay($str){
        JWTAuth::setToken($str);
        
        $token = JWTAuth::getToken();
        // $apy = json_decode(base64_decode($str), true);
        $decode = JWTAuth::decode($token);
        $amount = $decode['amount'];
        $account = Account::where('user_id',$this->user->id)->first();
        $res = $account['balance'] - $amount;
        if($res<0){
            return response()->json([
                'success' => false,
                'message' => 'Balance is not enough'
            ], 500);    
        }
        $account->balance = $res;
        $account->save();
        return response()->json([
            'success' => true,
            'balance' => $account['balance'],
            'message' => 'Transaction is success',
        ], 200); 
    }
}

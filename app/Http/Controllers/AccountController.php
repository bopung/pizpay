<?php

namespace App\Http\Controllers;
use App\Product;
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
        $apy = JWTAuth::decode($token);
        return response()->json([
            'success' => true,
            'payload' => $apy['amount'],
        ], 200); 
    }
}

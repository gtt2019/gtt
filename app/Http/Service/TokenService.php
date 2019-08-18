<?php

namespace App\Http\Service;

class TokenService
{ 
    public function validateAccessToken(string $token) 
    {

        $payload = [
            'message ' => 'Token is Ok',
            'status' => true
        ];
        return $payload;
    }
}

<?php

namespace App\Http\Service;

class TokenService
{ 
    public function validateAccessToken(string $token) 
    {
        $accesToken = "aaaaa123456@#";

        if ($accesToken === $token)
        {
            $payload = [
                'message' => 'Token is Ok.',
                'status' => true
            ];  
        } else {
            $payload = [
                'message' => 'Wrong Token.',
                'status' => false
            ];
        }

        return $payload;
    }
}

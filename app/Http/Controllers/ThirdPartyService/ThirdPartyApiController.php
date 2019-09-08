<?php

namespace App\Http\Controllers\ThirdPartyService;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Service\TokenService;

class ThirdPartyApiController extends Controller
{
    const DEMO_OTP = '123456';
    public function sendOtpToUSer(Request $request)
    {
        $v = Validator::make($request->all(), [
            'userId' => 'required|int',
            'token' => 'required',
            'mobileNumber' => 'required|max:10|min:10'
        ]);

        if ($v->fails())
        {            
            $err = $v->errors();       
            $message = $err->all();
            return json_encode(['error' => $message] );
        }

        $userId = $request->input('userId');    
        $token = $request->input('token');
        $tokenService = new TokenService();
        $tokenStatus = $tokenService->validateAccessToken($token);    

        return response()->json([            
            'statusCode' => 200, 
            'oneTimePassword' =>  ThirdPartyApiController::DEMO_OTP
        ]) ;
    }

    public function verifyOtp(Request $request)
    {     
        $v = Validator::make($request->all(), [
            'userId' => 'required|int',
            'token' => 'required',
            'mobileNumber' => 'required|max:10|min:10',
            'userOtp' => 'required|int'
        ]);

        if ($v->fails())
        {            
            $err = $v->errors();       
            $message = $err->all();
            return json_encode(['error' => $message] );
        }

        $userId = $request->input('userId');    
        $token = $request->input('token');
        $userOtp = $request->input('userOtp');        
        $tokenService = new TokenService();
        $tokenStatus = $tokenService->validateAccessToken($token);    

        if ($userOtp === ThirdPartyApiController::DEMO_OTP) {            
            $message = "OTP verified successfully";
            $code = 200;     
        } else {            
            $message = "Login successfully";
            $code = 403;                 
        }

        return response()->json([            
            'statusCode' => 200,          
            'status' => $message
        ]) ;
    }
}

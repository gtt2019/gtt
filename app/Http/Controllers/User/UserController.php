<?php
namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\UrlGenerator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{    
    public function updateUserLocation(Request $request) 
    {
        $token = $request->input('token');
        $userId = $request->input('userId');     
        $latitude = $request->input('latitude');     
        $longitude = $request->input('longitude');     
        
        $v = Validator::make($request->all(), [
            'userId' => 'required|int',
            'token' => 'required',
            'latitude' => 'required',
            'longitude' => 'required'
        ]);

        if ($v->fails())
        {            
            $err = $v->errors();       
            $message = $err->all();
            return json_encode(['error' => $message] );
        }
        
        $user = DB::table('USRUSER')
                    ->select('usrid')
                    ->where('usrid', $userId)
                    ->first();
                    
        if (empty($user)) {
            return response()->json([
                'message' => "User not found.",
                'statusCode' => "402"                
            ]) ;
        }

        $updateStatus = DB::table('USRUSER')        
                    ->where('usrid', $userId)
                    ->update(['latitude' => $latitude, 'longitude' => $longitude]);            

        if (!$updateStatus) {
            $message = "";
            $code = 204;
            $accesToken = "aaaaa123456@#";
            $data = [];
        }else {
            $data = "";
            $message = "Latitude and longitude updated for user.";
            $code = 200;     
            $accesToken = "aaaaa123456@#";
        }
                  
        return response()->json([
            'message' => $message,
            'statusCode' => $code,
            'accessToken' => $accesToken,
            'data' => $data
        ]) ;
    }
}

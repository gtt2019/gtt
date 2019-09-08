<?php
namespace App\Http\Controllers\Login;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Model\USRUSER;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Form;
use Illuminate\Support\Facades\DB;

/**
 * Login Controller to verify login action and token
 */
class LoginController extends Controller
{
    /**
     * Validate USer mobile mnumber.
     */
    public function authUser(Request $request)
    {   
        $id = $request->input('mobileNumber'); 

        $v = Validator::make($request->all(), [
            'mobileNumber' => 'required|max:10|min:10']
            // ['mobileNumberid' => 'invalid id provided']
        );
    
        if ($v->fails())
        {            
            $err = $v->messages();
            $message = $err->first('mobileNumber');
            return json_encode(['error' => $message]);
        }
                               
        $results =
         DB::table('USRUSER')
            ->select('firstName', 'lastName', 'usrid', 'mobile')
            ->where(['mobile'=> $id])
            ->first();    
            
        if (empty($results)) {            
            $message = "Unauthorised access, User not found";
            $code = 403;     
            $accesToken = "";
            $data = null;
        } else {
            $data = $results;
            $message = "Login successfully";
            $code = 200;     
            $accesToken = "aaaaa123456@#";
        }
        
        return response()->json([
            'message' => $message,
            'statusCode' => $code,
            'accessToken' => $accesToken,
            'data' => $data
        ]);            
    }
}

<?php
namespace App\Http\Controllers\Role;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Model\USRUSER;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Form;
use Illuminate\Support\Facades\DB;


/**
 * Get Role list
 */
class RoleController extends Controller
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

        $results = DB::select("select firstName, lastName, usrid, mobile
                             from USRUSER where mobile = $id and typeid = 4 and active = 'Y'"
                             , array(1));   
                             

                             
        if (empty($results)) {
            $message = "Unauthorised access";
            $code = 403;     
            $accesToken = "";
            $data = null;
        }else {
            $data = $results[0];
            $message = "Login successfully";
            $code = 200;     
            $accesToken = "abcdefghijkl";
        }

        return response()->json([
            'message' => $message,
            'statusCode' => $code,
            'accessToken' => $accesToken,
            'data' => $data
        ]);            
    }
}

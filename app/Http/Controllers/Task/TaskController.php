<?php

namespace App\Http\Controllers\Task;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Service\TokenService;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    /**
     * API to get new status task for all delevery boy.
     */
    public function getAllNewTask(Request $request) 
    {
        $token = $request->input('token');
        $userId = $request->input('userId');     
        $accesToken = "aaaaa123456@#";
        $statusId = 1;

        $v = Validator::make($request->all(), [
            'userId' => 'required|int',
            'token' => 'required'
            ]);
    
        if ($v->fails())
        {            
            $err = $v->errors();       
            $message = $err->all();
            return json_encode(['error' => $message] );
        }

        $tokenService = new TokenService();
        $tokenStatus = $tokenService->validateAccessToken($token);

        if ($tokenStatus['status'] !== true) {

            return response()->json([
                'message' => $tokenStatus['messsage'],
                'statusCode' => 400,
                'accessToken' => $accesToken,
                'data' => $data
            ]);                
        }

        $tasks = DB::table('ORDERMASTER')                                    
            ->select('orderid', 'orderno', 'statusid',
             'CUSTMASTER.customerid', 'orderarea', 'orderdesc', 
            'totalamtwithtax', 'totaldiscount', 'CUSTMASTER.firstName',
            'STRSTORE.name as storeName', 'STRSTORE.owner as ownerName',
            'STRSTORE.latitude', 'STRSTORE.longitude', 'STRAREA.areauserdesc'
            )
            ->join('CUSTMASTER', 'ORDERMASTER.customerid', '=', 'CUSTMASTER.customerid' )
            ->join('STRSTORE', 'ORDERMASTER.storeid', '=', 'STRSTORE.storeid')
            ->join('STRSTOREAREA', 'STRSTORE.storeid', '=', 'STRSTOREAREA.storeid')
            ->join('STRAREA', 'STRAREA.areaid', '=', 'STRSTOREAREA.areaid')
            ->where(['statusid'=> $statusId])
            ->get();

            if (empty($tasks)) {
                $message = "No new tasks";
                $code = 204;     
                $accesToken = "aaaaa123456@#";
                $data = nul;
            }else {
                $data = $tasks;
                $message = "";
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

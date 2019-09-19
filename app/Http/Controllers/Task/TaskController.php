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
    const STATUS_ID_IN_PROGRESS = 3;
    const ORDER_STATUS_ONGOING = [10,3,5,7,8];
    const ORDER_STATUS = [1];
    const HAPPY_CODE = '12345';

    /**
     * API to get new status task for all delevery boy.
     * 
     */
    public function getAllNewTask(Request $request) 
    {
        $token = $request->input('token');
        $userId = $request->input('userId');             
        $addressType = ['Store', 'User'];

        $v = Validator::make($request->all(), [
            'userId' => 'required|int',
            'token' => 'required'
            ]);
    
        if ($v->fails())
        {            
            $err = $v->errors();       
            $message = $err->all();
            return json_encode(['error' => $message]);
        }

        $tokenService = new TokenService();
        $tokenStatus = $tokenService->validateAccessToken($token);

        if ($tokenStatus['status'] !== true) {
            return response()->json([
                'message' => $tokenStatus['message'],
                'statusCode' => 400,
                'accessToken' => $accesToken,
                'data' => $data
            ]);                
        }

        $tasks = DB::table('ORDERMASTER')                                    
            ->select('orderid', 'orderno', 'statusid','ORDERMASTER.storeid',
             'CUSTMASTER.customerid', 'orderarea', 'orderdesc', 
            'totalamtwithtax', 'totaldiscount', 'CUSTMASTER.firstName','CUSTMASTER.lastName',
            'STRSTORE.name as storeName', 'STRSTORE.owner as ownerName',            
            'STRSTORE.latitude', 'STRSTORE.longitude'
            )
            ->join('CUSTMASTER', 'ORDERMASTER.customerid', '=', 'CUSTMASTER.customerid' )
            ->join('STRSTORE', 'ORDERMASTER.storeid', '=', 'STRSTORE.storeid')            
            ->whereIn('ORDERMASTER.statusid', self::ORDER_STATUS)            
            ->where('assignedto', $userId)
            ->get();          
            
            $data = [];
            foreach ($tasks as $key => $task) {                
                $storeAddress = $this->getAddress('Store', $task->storeid);
                $customerAddress = $this->getAddress('User', $task->customerid);

                $data[$key] = [
                    'orderDetails' => $task,
                    'storeAddress' => $storeAddress,
                    'customerAddress' => $customerAddress
                ];
            }
            if (empty($data)) {
                $message = "No new tasks";
                $code = 204;     
                $accesToken = "aaaaa123456@#";
                $data = [];
            }else {
                $data = $data;
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
  
    public function getPendingTask(Request $request){
        $token = $request->input('token');
        $userId = $request->input('userId');                     
        $addressType = ['Store', 'User'];

        $v = Validator::make($request->all(), [
            'userId' => 'required|int',
            'token' => 'required'
            ]);
    
        if ($v->fails())
        {            
            $err = $v->errors();       
            $message = $err->all();
            return json_encode(['error' => $message]);
        }

        $tokenService = new TokenService();
        $tokenStatus = $tokenService->validateAccessToken($token);

        if ($tokenStatus['status'] !== true) {
            return response()->json([
                'message' => $tokenStatus['message'],
                'statusCode' => 400,                
                'data' => $data
            ]);                
        }

        $tasks = DB::table('ORDERMASTER')                                    
            ->select('orderid', 'orderno', 'statusid','ORDERMASTER.storeid',
             'CUSTMASTER.customerid', 'orderarea', 'orderdesc', 
            'totalamtwithtax', 'totaldiscount', 'CUSTMASTER.firstName','CUSTMASTER.lastName',
            'STRSTORE.name as storeName', 'STRSTORE.owner as ownerName',            
            'STRSTORE.latitude', 'STRSTORE.longitude'
            )
            ->join('CUSTMASTER', 'ORDERMASTER.customerid', '=', 'CUSTMASTER.customerid' )
            ->join('STRSTORE', 'ORDERMASTER.storeid', '=', 'STRSTORE.storeid')            
            ->whereIn('ORDERMASTER.statusid', self::ORDER_STATUS_ONGOING)            
            ->where('assignedto', $userId)
            ->get();
            
            
            $data = [];
            foreach ($tasks as $key => $task) {                
                $storeAddress = $this->getAddress('Store', $task->storeid);
                $customerAddress = $this->getAddress('User', $task->customerid);

                $data[$key] = [
                    'orderDetails' => $task,
                    'storeAddress' => $storeAddress,
                    'customerAddress' => $customerAddress
                ];
            }
            if (empty($data)) {
                $message = "No Pending Task";
                $code = 204;                     
                $data = [];
            }else {
                $data = $data;
                $message = "";
                $code = 200;                     
            }
    
            return response()->json([
                'message' => $message,
                'statusCode' => $code,
                'accessToken' => $accesToken,
                'data' => $data
            ]);       

    }

    public function getAddress($addressType, $addressTypeId) 
    {        
        $address = DB::table('CMNADDRESS')                                    
            ->select(
                'address1', 'address2', 'locality','landmark','cityname', 'statename',
                'countryname', 'CMNZIPCODE.zipcode', 'zipcodearea', 'mobile','longitude', 'latitude'
            )
            ->join('CMNCITY', 'CMNCITY.cityid', '=', 'CMNADDRESS.city')
            ->join('CMNSTATE', 'CMNCITY.stateid', '=', 'CMNADDRESS.state')
            ->join('CMNCOUNTRY', 'CMNCOUNTRY.countryid', '=', 'CMNADDRESS.country')
            ->leftJoin('CMNZIPCODE', 'CMNZIPCODE.zipcodeid', '=', 'CMNADDRESS.postalcode')
            ->where('addresstype', $addressType)            
            ->where('addresstypeid', $addressTypeId)
            ->where('primaryaddress', 1)
            ->first();

            return $address;
    }
    
    public function updateOrderStatus(Request $request)
    {
        $token = $request->input('token');
        $userId = $request->input('userId');     
        $orderId = $request->input('orderId');
        $orderStatusId = $request->input('statusId');
        $accesToken = "aaaaa123456@#";        
        
        $v = Validator::make($request->all(), [
            'userId' => 'required|int',
            'token' => 'required',
            'orderId' => 'required',
            'statusId' => 'required'
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
                'message' => $tokenStatus['message'],
                'statusCode' => 400,
                'accessToken' => $accesToken,
                'data' => $data
            ]);                
        }
        
        $result = DB::table('ORDERMASTER')
                    ->where(['orderid' => $orderId, 'active' => 'Y', 'assignedto' => $userId])
                    ->update(['statusid' => $orderStatusId]);
     
        if (!$result) {
                  $message = "No order found";
                  $code = 204;     
                $accesToken = "aaaaa123456@#";
                     $data = [];
            }else {
                $data = [];
                        $message = "Order status updated successfully";
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

    public function getCompletedOrderCount(Request $request) 
    {
        $token = $request->input('token');
        $userId = $request->input('userId');     
        $accesToken = "aaaaa123456@#";        
        
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
                'message' => $tokenStatus['message'],
                'statusCode' => 400,
                'accessToken' => $accesToken,
                'data' => $data
            ]);                
        }
        
        $count = DB::table('ORDERMASTER')
                    ->where(['assignedto' => $userId , 'statusid' => 4])
                    ->count('orderid');                                      

        if (!$count) {
            $message = "Nuber of order completed $count";
            $code = 204;
            $accesToken = "aaaaa123456@#";
            $data = [ 
                'totalOrderCompleted' => $count
               ];
        }else {
            $data = [ 
             'totalOrderCompleted' => $count
            ];
            $message = "Nuber of order completed $count";
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

    public function getTotalEarnings(Request $request) 
    {
        $token = $request->input('token');
        $userId = $request->input('userId');     
        $accesToken = "aaaaa123456@#";        
        
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
                'message' => $tokenStatus['message'],
                'statusCode' => 400,
                'accessToken' => $accesToken,
                'data' => $data
            ]);                
        }

        $totalEarings = DB::table('ORDERMASTER')
                    ->where(['assignedto' => $userId, 'statusid' => 4])
                    ->sum('totalamtwithtax');                            

        if (!$totalEarings) {
            $message = "";
            $code = 204;
            $accesToken = "aaaaa123456@#";
            $data = ['totalEarings' => $totalEarings];
        }else {
            $data = ['totalEarings' => $totalEarings];
            $message = "";
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

    public function confirmOrder(Request $request) 
    {
        $token = $request->input('token');
        $userId = $request->input('userId');     
        $orderId = $request->input('orderId');     
        $accesToken = "aaaaa123456@#";        
        
        $v = Validator::make($request->all(), [
            'userId' => 'required|int',
            'token' => 'required',   
            'orderId' => 'required|int'
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
                'message' => $tokenStatus['message'],
                'statusCode' => 400,
                'accessToken' => $accesToken,
                'data' => $data
            ]);                
        }

        $confirmOrder = DB::table('ORDERMASTER')
                    ->where(['orderid' => $orderId, 'active' => 'Y'])
                    ->update([
                        'statusid' => 5,
                        'assignedto' => $userId
                    ]);               
                    
        if (!$confirmOrder) {
            $message = "";
            $code = 204;
            $accesToken = "aaaaa123456@#";
            $data = [];
        }else {
            $data = "";
            $message = "Order Confirm and assing to me.";
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

    public function rejectOrder(Request $request) 
    {
        $token = $request->input('token');
        $userId = $request->input('userId');     
        $orderId = $request->input('orderId');     
        $accesToken = "aaaaa123456@#";        
        
        $v = Validator::make($request->all(), [
            'userId' => 'required|int',
            'token' => 'required',   
            'orderId' => 'required|int'
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
                'message' => $tokenStatus['message'],
                'statusCode' => 400,
                'accessToken' => $accesToken,
                'data' => $data
            ]);                
        }

        // $dateTime = new DateTime();
        $orderStatus = DB::table('ORDERMASTER')
                    ->where(['orderid' => $orderId, 'active' => 'Y'])
                    ->update([
                        'statusid' => 6,     
                        'assignedto' => null,
                        'lastupdated' => now()
                    ]);               
                    
        if (!$orderStatus) {
            $message = "";
            $code = 204;            
            $data = [];
        }else {
            $data = "";
            $message = "Order rejected.";
            $code = 200;                 
        }
                  
        return response()->json([
            'message' => $message,
            'statusCode' => $code,
            'accessToken' => $accesToken,
            'data' => $data
        ]) ;
    }
    
public function getOrderDetails(Request $request) 
{
    $token = $request->input('token');
    $userId = $request->input('userId');     
    $orderId = $request->input('orderId');     
    $accesToken = "aaaaa123456@#";        
    
    $v = Validator::make($request->all(), [
        'userId' => 'required|int',
        'token' => 'required',   
        'orderId' => 'required|int'
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
            'message' => $tokenStatus['message'],
            'statusCode' => 400,
            'accessToken' => $accesToken,
            'data' => $data
        ]);                
    }

    // $dateTime = new DateTime();
    $orderDetails = DB::table('ORDERMASTER')                                    
    ->select('ORDERMASTER.orderid', 'orderno', 'statusid','ORDERMASTER.storeid','ordersdate','expecteddelivery',
    'ORDERMASTER.orderimagename', 'ORDERMASTER.orderimageurl', 'ORDERMASTER.billimageurl','ORDERMASTER.billimagename', 'ORDERMASTER.happycode',
    'CUSTMASTER.customerid', 'orderarea', 'orderdesc', 
    'totalamtwithtax', 'CUSTMASTER.firstName', 
    'STRSTORE.name as storeName', 'STRSTORE.owner as ownerName',
    'detailid', 'qty', 'unitprice', 'longitude', 'latitude'
     )
    ->join('CUSTMASTER', 'ORDERMASTER.customerid', '=', 'CUSTMASTER.customerid' )
    ->join('STRSTORE', 'ORDERMASTER.storeid', '=', 'STRSTORE.storeid')                
    ->join('ORDERDETAIL', 'ORDERMASTER.orderid', '=', 'ORDERDETAIL.orderid')
    ->where('assignedto', $userId)
    ->where('ORDERMASTER.orderid', $orderId)
    ->first();     
   
    $itemDetails = DB::table('ORDERDETAIL')->select(
        'PRDMASTER.prddesc', 'qty', 'unitprice', 'netamount'
        )  
    ->join('PRDMASTER', 'PRDMASTER.prdid', '=', 'ORDERDETAIL.ordlineno' )
    ->where(['ORDERDETAIL.orderid' => $orderId])->get();

    $storeAddress = $this->getAddress('Store', $orderDetails->storeid);
    $customerAddress = $this->getAddress('Customer', $orderDetails->customerid);
   
    if (!$orderDetails) {
        $message = "Order not found";
        $code = 204;
        $accesToken = "aaaaa123456@#";
        $orderDetail = [];
        $storeAddres = [];
        $customerAddres = [];
        $itemDetail = [];
    }else {
        $orderDetail = $orderDetails;
        $storeAddres = $storeAddress;
        $customerAddres = $customerAddress;
        $itemDetail = $itemDetails;
        $message = "";
        $code = 200;             
    }
              
    return response()->json([
        'message' => $message,
        'statusCode' => $code,
        'accessToken' => $accesToken,
        'data' => $orderDetail,
        'pickupAddress'=> $storeAddres,
        'deliveryAddress' => $customerAddres,
        'itemDetails' =>$itemDetail
    ]) ;
}

public function verifyHappyCode(Request $request) 
{    
    $v = Validator::make($request->all(), [
        'userId' => 'required|int',
        'token' => 'required',   
        'orderId' => 'required|int',
        'happyCode' => 'required'
        ]);

    if ($v->fails())
    {            
        $err = $v->errors();       
        $message = $err->all();
        return json_encode(['error' => $message] );
    }
    $token = $request->input('token');
    $tokenService = new TokenService();
    $tokenStatus = $tokenService->validateAccessToken($token);    
    $userId = $request->input('userId');     
    $orderId = $request->input('orderId');     
    $happyCode = $request->input('happyCode');    
 
    $orderData = DB::table('ORDERMASTER')->select('happyCode')
                ->where('orderid', $orderId)
                ->first();       
    $orderHappyCode = $orderData->happyCode;
    
    if ($happyCode === $orderHappyCode ) {
        $message = "Happy code match, order delivered";
        $code = 200;     
        $status = true;
        $accesToken = "aaaaa123456@#";        
    }else {                
        $message = "Happy code does not match.";
        $code = 204;
        $status = false;
        $accesToken = "aaaaa123456@#";        
    }
              
    return response()->json([
        'message' => $message,
        'statusCode' => $code,
        'status' => $status,
        'accessToken' => $accesToken
    ]) ;
}

public function submitFeedBackForOrder(Request $request) 
{
    $v = Validator::make($request->all(), [
        'userId' => 'required|int',
        'token' => 'required',   
        'orderId' => 'required|int',        
        'fbRank' => 'required',
        'fbkDesc' => 'required'
        ]);

    if ($v->fails())
    {            
        $err = $v->errors();       
        $message = $err->all();
        return json_encode(['error' => $message] );
    }

    $token = $request->input('token');
    $tokenService = new TokenService();
    $tokenStatus = $tokenService->validateAccessToken($token);    
    $userId = $request->input('userId');     
    $orderId = $request->input('orderId');     
    $fbRank = $request->input('fbRank');
    $fbkDesc = $request->input('fbkDesc');    

    $orderDetails = DB::table('ORDERMASTER')                                    
    ->select('ORDERMASTER.orderid'
     )
    ->where('assignedto', $userId)
    ->where('ORDERMASTER.orderid', $orderId)
    ->first();   

    // $id = $orderDetails->orderid;
    if (empty($orderDetails))
    { 
        $message = "Access denied, Order not belongs to you.";
        $code = 502 ;        
    } else {    
     $data = DB::select("call usp_seqNumber('CMNADDRESS', @seqNumber)");   
     $data1 = DB::select("SELECT @seqNumber as seqNumber" );
     $id = $data1[0]->seqNumber;
     $dateTime = date("Y-m-d h:i:s");   
    DB::table('FBKDETAIL')->insert([
        'companyid' => '1',  
        'detailid' => $id,        
        'rankid' => $fbRank,
        'fbkdesc' => $fbkDesc,
        'fbkdate' => $dateTime,
        'lastupdated' => $dateTime,
        'fbkbyuser' => $userId,
        'startrating' => $fbRank,
        'orderId' => $orderId
    ]);

    $message = "Feedback saved";
    $code = 200;         
    }            
    return response()->json([
        'message' => $message,
        'statusCode' => $code        
    ]) ;
}

public function getCompletedOrderHistory(Request $request)
{
    $token = $request->input('token');
    $userId = $request->input('userId');         
    $addressType = ['Store', 'User'];

    $v = Validator::make($request->all(), [
        'userId' => 'required|int',
        'token' => 'required'
        ]);

    if ($v->fails())
    {            
        $err = $v->errors();       
        $message = $err->all();
        return json_encode(['error' => $message]);
    }

    $tokenService = new TokenService();
    $tokenStatus = $tokenService->validateAccessToken($token);
    
    if ($tokenStatus['status'] !== true) {
        return response()->json([
            'message' => $tokenStatus['message'],
            'statusCode' => 400,
            'accessToken' => $accesToken,
            'data' => $data
        ]);                
    }

    $tasks = DB::table('ORDERMASTER')                                    
        ->select('orderid', 'orderno', 'statusid','ORDERMASTER.storeid',
         'CUSTMASTER.customerid', 'orderarea', 'orderdesc', 
        'totalamtwithtax', 'totaldiscount', 'CUSTMASTER.firstName','CUSTMASTER.lastName',
        'STRSTORE.name as storeName', 'STRSTORE.owner as ownerName',            
        'STRSTORE.latitude', 'STRSTORE.longitude'
        )
        ->join('CUSTMASTER', 'ORDERMASTER.customerid', '=', 'CUSTMASTER.customerid' )
        ->join('STRSTORE', 'ORDERMASTER.storeid', '=', 'STRSTORE.storeid')            
        ->where('ORDERMASTER.statusid', '=', 4)            
        ->where('assignedto', $userId)
        ->get();          
        
        $data = [];
        foreach ($tasks as $key => $task) {                
            $storeAddress = $this->getAddress('Store', $task->storeid);
            $customerAddress = $this->getAddress('User', $task->customerid);

            $data[$key] = [
                'orderDetails' => $task,
                'storeAddress' => $storeAddress,
                'customerAddress' => $customerAddress
            ];
        }
        if (empty($data)) {
            $message = "No completed tasks";
            $code = 204;                 
            $data = [];
        }else {
            $message = "";
            $data = $data;
            $message = "";
            $code = 200;                 
        }

        return response()->json([
            'message' => $message,
            'statusCode' => $code,            
            'data' => $data
        ]);      
}
}



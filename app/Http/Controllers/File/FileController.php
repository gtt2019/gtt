<?php
namespace App\Http\Controllers\File;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\UrlGenerator;
use App\Http\Controllers\Controller;
use Validator,Redirect,Response,File;

class FileController extends Controller
{    
    public function uploadOrderImages(Request $request) 
    {
        $token = $request->input('token');
        $userId = $request->input('userId');     
        $orderId = $request->input('orderId');     
              
        $v = Validator::make($request->all(), [
                'userId' => 'required|int',
                'token' => 'required',
                'orderId' => 'required',
                'images' => 'required|image|mimes:jpeg,png,jpg,svg|max:10000'
            ]);

    if ($v->fails())
    {            
        $err = $v->errors();       
        $message = $err->all();
        return json_encode(['error' => $message] );
    }
         
       if ($files = $request->file('images')) {           
           $destinationPath = 'public/image/OrderImages/'; // upload path
           $itemsImageName = date('YmdHis') . "." . $files->getClientOriginalName();                      
           $files->move($destinationPath, $itemsImageName);
           $insert['image'] = "$itemsImageName";
           $domainUrl = $request->root();
           $imageUrlPath = $domainUrl . '/'. $destinationPath . '' .$itemsImageName;

           $orderUpdate = DB::table('ORDERMASTER')
                                ->where('orderid', $orderId)
                                ->update(['orderimagename' => $itemsImageName, 
                                          'orderimageurl' => $imageUrlPath ]);
        
           $message = "Images uploaded successfully";
           $code = 200;     
           $accesToken = "aaaaa123456@#";
           $data = [];
       }else {           
           $message = "Nothing to upload";
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
     
    public function uploadBillImages(Request $request) 
    {
        $token = $request->input('token');
        $userId = $request->input('userId');     
        $orderId = $request->input('orderId');     
        $billAmount = $request->input('billAmount');             

        $v = Validator::make($request->all(), [
                'userId' => 'required|int',
                'token' => 'required',
                'orderId' => 'required',                
                'images' => 'required|image|mimes:jpeg,png,jpg,svg|max:10000',
                'billAmount' => 'int'
            ]);

    if ($v->fails())
    {            
        $err = $v->errors();       
        $message = $err->all();
        return json_encode(['error' => $message] );
    }
         
          $files = $request->file('images');
           $destinationPath = 'public/image/BillImages/'; // upload path
           $itemsImageName = date('YmdHis') . "." . $files->getClientOriginalName();                      
           $files->move($destinationPath, $itemsImageName);
           $insert['image'] = "$itemsImageName";
           $domainUrl = $request->root();
           $imageUrlPath = $domainUrl . '/'. $destinationPath . "" .$itemsImageName;

           $orderUpdate = DB::table('ORDERMASTER')
                                ->where('orderid', $orderId)
                                ->where('assignedto', $userId)
                                ->update(['billimagename' => $itemsImageName, 
                                          'billimageurl' => $imageUrlPath,
                                          'totalamtwithtax' => $billAmount ]);
        
        // dd($orderUpdate);

      if ($orderUpdate){ 
           $message = "Images uploaded successfully";
           $code = 200;     
           $accesToken = "aaaaa123456@#";
           
       }else {           
           $message = "please check order details or order not belongs to you";
           $code = 204;     
           $accesToken = "aaaaa123456@#";
       }                    

       return response()->json([
                'message' => $message,
                'statusCode' => $code,
                'accessToken' => $accesToken                
            ]);                 
    }
}

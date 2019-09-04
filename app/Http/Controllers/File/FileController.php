<?php
namespace App\Http\Controllers\File;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator,Redirect,Response,File;

class FileController extends Controller
{
    
    public function uploadImages(Request $request) 
    {
        $token = $request->input('token');
        $userId = $request->input('userId');     
        // $images = $request->input('images');
        
    //     request()->validate([
    //         'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    //    ]);
    
    $v = Validator::make($request->all(), [
        'userId' => 'required|int',
        'token' => 'required',
        'images' => 'required|image|mimes:jpeg,png,jpg,svg|max:10000'
        ]);

    if ($v->fails())
    {            
        $err = $v->errors();       
        $message = $err->all();
        return json_encode(['error' => $message] );
    }
         
       if ($files = $request->file('images')) {
        //    dd($files);
           $destinationPath = 'public/image/'; // upload path
           $itemsImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
           $files->move($destinationPath, $itemsImage);
           $insert['image'] = "$itemsImage";

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
}

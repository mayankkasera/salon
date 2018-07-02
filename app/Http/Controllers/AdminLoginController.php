<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\AdminLoginRequest;

class AdminLoginController extends Controller
{
   
    public static  function adminLogin(AdminLoginRequest $request)
    {
          


    	$User_Email_Row = DB::table('admins')->where([
                                            [
                                              'email', '=', $request->email],
                                        ])->get();


        if($User_Email_Row->count()>0&&$User_Email_Row->count()<2){

                 $User_Row = DB::table('admins')->where([
                                            ['email', '=', $request->email],
                                            ['password', '=', $request->password],
                                        ])->get();

                 if($User_Row->count()>0&&$User_Row->count()<2)
              	   return response(
                         [
                          'error'=> false,
                          'message'=>'Authantication Successful'
                         ]
                         ,201);
                 else
                    return response(
                         [
                          'error'=> true,
                          'message'=>'Enter Correct Password'
                         ]
                         ,201);
        }
        else
        	return response(
                   [
                    'error'=> true,
                    'message'=>'Email Not Found'
                   ]
                   ,201);

    	

    }
}

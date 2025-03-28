<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    public function showForm()	
    {	
        return	view('register');								
    }	

    public function	register(Request $request)	
    {	
        try	{	
            $request->validate([	
                    'username'	=>	'required',	
                    'first_name' =>	'required',	
                    'last_name' =>	'required',	
                    'password'	=>	'required',	
                    'retype_password' => 'required',	
            ]);

            if	($request->password	!= $request->retype_password){			
                throw new	\Exception('Password did not match');	
                }	

                if	(strlen($request->retype_password) <	8){	
                    throw new \Exception('Password	must be	greater	or equal to	8');			
                }	

                $user =	[	
                'username'	=>	$request->username,								
                'first_name' => $request->first_name,					
                'last_name'	=>	$request->last_name,						
                'password'	=>	Hash::make($request->password)		
                ];		
                User::create($user);

                return	response()->json(['success'	=>	'Registration	successful!']);	


                }
                catch (\Exception $e){	
                    return response()->json(['error'=>$e->getMessage()],400);	
                }	
            
            }

}

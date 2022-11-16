<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangepasswordController extends Controller
{
    
    
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.passwords.edit');
    }

    


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $user = Auth::user();
       return view('user.passwords.edit',compact('user'));
    }




    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        $data = $this->validate($request, [
            'current_password' => ['required','string','min:8'],
            'password' => ['required', 'string', 'min:8', 'confirmed']

        ]);
      
        $currentPasswordStatus = Hash::check($data['current_password'], $user->password);
        if($currentPasswordStatus){

           $user->password=$data['password'];
            
           $request->session()->flash('success', 'Password Updated!'); 

           $user->save();
           return back();

        }else{

            $request->session()->flash('invalid', 'Current Password does not match with Old Password'); 
            return back();
        }

       
    }

   
}

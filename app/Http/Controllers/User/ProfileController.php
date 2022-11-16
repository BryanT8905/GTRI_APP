<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
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
        return view('user.profiles.edit');
    }
    

 
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {

       $user = Auth::user();
       return view('user.profiles.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
     
        $user = Auth::user();

        $data = $this->validate($request, [
            'name' => 'required',
            'username'=>'required',
            'email' => 'required',
            'image' => 'file|image|max:1500',

        ]);
         if($request->hasFile('image')){
            $data['image'] = $request->file('image');
            $extension = $data['image']->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $data['image']->move('storage/images', $filename);
            $user->image = $filename;

        }
        $user->name = $data['name'];
        $user->username=$data['username'];
        $user->email = $data['email'];
       
        $request->session()->flash('success', 'Profile Updated!'); 

        $user->save();
        return back();
    }

}

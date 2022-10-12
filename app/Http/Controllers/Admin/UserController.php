<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Yajra\DataTables\DataTables;


class UserController extends Controller
{
    /**
     * Display a listing of the resource and 
     *   determines authorization depending on whether the user is an admin or user
     *
     * @return \Illuminate\Http\Response
     */

    
    public function index(Request $request)
    {
        
        if(Gate::allows('isAdmin')){
            if ($request->ajax()) {
                $data = User::select('id','name','username','email')->get();
                return Datatables::of($data)->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn = '<a href="'.route("users.edit", $row->id).' "data-toggle="tooltip" data-id="'.
                        $row->id.'" data-original-title="Edit" class=" edit btn  btn-primary btn-sm editUser">Edit</a>';
                        $btn.='<a href="javascript:void(0)" data-toggle="tooltip" data-id="'.
                        $row->id.'" data-original-title="Delete" class=" delete btn  btn-sm btn-danger deleteUser">Delete</a>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }
            return view('admin.users.index');    

        }
    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('auth.isAdmin');
    }


    /**
     * Show the form for creating a new resource. 
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('admin.users.create', ['roles' => Role::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     //create new user
    public function store(Request $request)
    {
        
        //validate user information using validate method on request
         $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:20', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        
        //create new user & exclude csrf token and roles. Since they are not in the users table
        $user = User::create($request->except(['_token', 'roles']));
        $user->roles()->sync($request->roles);
        $request->session()->flash('success', 'User created!'); 
        return redirect(route('users.index'));
       
    }

   
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.users.edit', [
            'roles' => Role::all(),
            'user' => User::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage and redirects to the users table.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->session()->flash('success', 'User updated!');
        $user = User::findOrFail($id);
        $user->update($request->except(['_token', 'roles']));
        $user->roles()->sync($request->roles);

        return redirect(route('users.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {   $request->session()->flash('success', 'User deleted!');
        User::find($id)->delete();
        
    
        
    }
}

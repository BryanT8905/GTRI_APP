<?php

namespace App\Http\Controllers\Tools;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Models\Asset;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class AssetController extends Controller
{
    
    
  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = Asset::select('id','name','manufacturer','serial_no','category','eol', 'location')->get();
            return Datatables::of($data)->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn ='<a href="javascript:void(0)" data-toggle="tooltip" data-id="'.
                    $row->id.'" data-original-title="Delete" class=" delete btn px-1 btn-sm btn-danger deleteAsset">Delete</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('tools.assets.index');  
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tools.assets.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         //validate user information using validate method on request
         $validator=Validator::make($request->all(), [
            'name' => ['required', 'string'],
            'manufacturer' => ['required', 'string'],
            'serial_no' => ['required', 'string'],
            'category' => ['required', 'string'],
            'eol' => ['required', 'string'],
            'location' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            
            return response(['success' => false, 'message' => $validator->errors()],422);
            

        }
        
        //create new user & exclude csrf token and roles. Since they are not in the users table
        Asset::create($request->except(['_token']));
        $request->session()->flash('success', 'User created!'); 
        
        return redirect()->route('assets.index');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Asset::find($id)->delete();
        $request->session()->flash('success', 'Asset deleted!');
       
        
       
    }
}

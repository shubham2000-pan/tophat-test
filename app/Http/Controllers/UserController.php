<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;
use File;
use App\Model\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('admin_view.user_list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin_view/add_user');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasfile('image')){
            $destinationPath = public_path( 'images/user' );
            if ( ! File::exists( $destinationPath ) ) {
                File::makeDirectory( $destinationPath, 0777, true, true );
              }
             
                $image = $request['image'];
               // $title = $image->getClientOriginalName();
                $extension = $image->getClientOriginalExtension(); 
                $fileName = time().'.'.$extension; 
                $image->move($destinationPath, $fileName);
            }else{
                $fileName = Null;
            }



        $responce['status'] = false;
        $responce['message'] = 'Something went wrong';
        $array = [
            'name' =>  $request->name,
            'email' => $request->email,
            'contact' =>  $request->contact,
            'address' =>  $request->address,
            'image' => $fileName,
            'password' => Hash::make($request->password),
        ]; 
            
            
        
        $save= User::insert($array);
        if($save){
            $responce['status'] = true;
             $responce['message'] = 'added successfully';
         }
       return  $responce;
    
        
    }

    /*
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
        $result = User::where('id','=',$id)
                ->first();
        return view('admin_view/user_edit',compact('result'));    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->id;
        $array = [
             'name' =>  $request->name,
            'email' => $request->email,
            'contact' =>  $request->contact,
            'address' =>  $request->address,
            
             ];
       User::where('id',$id)
            ->update($array);
        return redirect('user_list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $responce['status'] = false;
        $responce['message'] = 'Something went wrong';

        $deleted = User::where('id',$id)
        ->delete();
        if($deleted){
            $responce['status'] = true;
        }
        return  $responce;
    }
    #### get data from ajax request
    public function ajax(Request $request)
    {
        $responce = User::get();
        $totalResult = count($responce);

        $result = [];

        foreach ($responce as $key => $value) {
            $currentAry = [
                $value->id,
                $value->name,
                $value->email,
                $value->contact,
                $value->address,
               '<img src="'. asset('/images/user/'.$value->image).'"  style="height:30px">',
               '<button class="btn btn-success btn-sm" style="background:white; border-radius:22px;"><a href="user_edit/'.$value->id.'"><i class="fas fa-edit"></i></a></button> <button class="btn btn-danger btn-sm" style="background:white; border-radius:22px;"><a href="#" class="delete-data" data-id="'.$value->id.'"><i class="fas fa-trash"></i></a></button>',
               
            ];
            array_push($result, $currentAry);
        }

        $data['data']            = $result;
        $data['recordsTotal']    = $totalResult;
        $data['recordsFiltered'] = $totalResult;
        $data['draw']            = ! empty( $request['draw'] ) ? $request['draw'] : 1;

        echo json_encode( $data );
        exit;
    }

}

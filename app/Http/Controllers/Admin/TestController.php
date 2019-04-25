<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use  Brian2694\Toastr\Facades\Toastr;
use App\Test;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas=Test::latest()->get();
        return view('admin.test.index',compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.test.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     
        $request->validate([
            'name'=>'required',
            'price'=>'required',
            'details'=>'required',
            'spiceman'=>'required',
            'tester_name'=>'required',
            'test'=>'required'


        ]);

        $data=[];

        $data['name']=$request->name;
        $data['price']=$request->price;
        $data['details']=$request->details;
        $data['spiceman']=$request->spiceman;
        $data['tested_by']=$request->tester_name;
        $data['type']=$request->test;
        Test::Create($data);
        Toastr::success('Test Succesfully Added','Success');
        return redirect()->back();
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
        $data=Test::find($id);
        return view('admin.test.edit',compact('data'));
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
            $data=Test::find($id);

             $request->validate([
            'name'=>'required',
            'price'=>'required',
            'details'=>'required',
            'spiceman'=>'required',
            'tester_name'=>'required',
            'test'=>'required'


        ]);


        $data->name=$request->name;
        $data->price=$request->price;
        $data->details=$request->details;
        $data->spiceman=$request->spiceman;
        $data->tested_by=$request->tester_name;
        $data->type=$request->test;
        $data->save();
        Toastr::success('Test successfully Updated',' Updated');
        return redirect()->route('admin.test.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=Test::find($id)->delete();

         Toastr::warning('Test successfully Delete',' Delete');
        return redirect()->route('admin.test.index');

    }
}

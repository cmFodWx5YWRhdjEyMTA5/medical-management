<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Date;
use App\Doctor;
use App\User;
use App\Role;

class UserController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $datas = User::all(); 
        


        return view('admin.users.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $dates = Date::all();
        $role = Role::all();
        return view('admin.users.create', compact('dates', 'role'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'role_id' => 'required',
            'gender' => 'required',
            'username' => 'required',
            'Newpassword' => 'required|confirmed',
        ]);






        if ($request->file('photo')) {



            $request->validate([
                'photo' => 'required|mimes:jpeg,png,jpg'
            ]);


            $proImage = $request->file('photo');
            $certImage = $request->file('certificate');

            if (!Storage::disk('public')->exists('profileImage')) {
                Storage::disk('public')->makeDirectory('profileImage');
            }

            $imageExtension = $proImage->getClientOriginalExtension();

            $imagename = uniqid() . "_" . mt_rand() . "_" . date('Y') . "." . $imageExtension;

            $newproImage = Image::make($request->photo)->resize(595, 395)->save(90);

            // $newproImage=Image::make($proImage)->resize(220,220)->save(90);

            Storage::disk('public')->put('profileImage/' . $imagename, $newproImage);
        } else {
            $imagename = 'default.png';
            $certimagename = 'default.png';
        }

        $user = new User;

        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->role_id = $request->role_id;
        $user->password = Hash::make($request->Newpassword);
        $user->image = $imagename;
        $user->save();

        Toastr::success('User Successfully Added');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $data = Doctor::find($id);



        if (Storage::disk('public')->exists('profileImage/' . $data->user->image)) {
            Storage::disk('public')->delete('profileImage/' . $data->user->image);
        }

         

        $data->dates()->detach($id);
        $users = User::where('id', $data->user_id)->delete();
        $data->delete();

        Toastr::success('User Successfully Delete', "Delete");

        return redirect()->back();
    }

}

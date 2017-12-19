<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserEdit;
use App\Http\Requests\UsersRequest;
use App\Role;
use Illuminate\Http\Request;
use App\User;
use App\Photo;
use Illuminate\Support\Facades\Session;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all(['name', 'id']);
        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request)
    {

        $input = $request->all();



        //return $request->all();
        if($file = $request->file('photo_id')){

            /** @var TYPE_NAME $name */
            $name = time() . $file->getClientOriginalName();
            $file->move('images',$name);
            $photo = Photo::create(['file'=>$name]);
            $input['photo_id'] = $photo->id;


        }
        $input['password'] = bcrypt($request->password);
        User::create($input);
        return redirect('admin/users');

        //User::create()

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
        $user= User::findorFail($id);
        $roles = Role::all(['name', 'id']);
        $user_roles = $user->role->name;



        return view('admin.users.edit', compact('user','roles', 'user_roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserEdit $request, $id)
    {

        $user = User::findOrFail($id);
        if(trim($request->password)=='')
        {
            $input = $request->except('password');


        }
        else
        {
            $input = $request->all();
            $input['password'] = bcrypt($request->password);
        }
        if($file = $request->file('photo_id')){

            /** @var TYPE_NAME $name */
            $name = time() . $file->getClientOriginalName();
            $file->move('images',$name);
            $photo = Photo::create(['file'=>$name]);
            $input['photo_id'] = $photo->id;


        }
        $user->update($input);
        return redirect('admin/users');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Session::flash('deleted_user','کاربر با موفقیت حذف شد');
        $user = User::findOrFail($id);
        unlink(public_path() . $user->photo->file);
        $user->delete();
        
        return redirect('admin/users');

    }
}

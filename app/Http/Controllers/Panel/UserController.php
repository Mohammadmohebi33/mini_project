<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\Role;
use App\Models\User;
use App\Traits\Upload;

class UserController extends Controller
{
    use Upload;


    public function index()
    {
        $users = collect([]);
        if (request()->has('roles')){
            foreach (request()->roles as $role){
                $roleUsers = Role::query()->where('role_name', $role)->first()->users;
                $users = $users->merge($roleUsers)->unique('id');;
            }
            return view('panel.users.index' , compact('users'));
        }

        $users = User::all();
        return view('panel.users.index' , compact('users'));
    }



    public function show(User $user)
    {
        $roles = Role::all();
        return view('panel.users.update' , compact('user' , 'roles'));
    }


    public function update(UserRequest $request, User $user)
    {
        $userData = $request->validated();

        if(!isset($userData['image'])){
            $user->update([
                'name' => $userData['name'],
                'about_me' => $userData['about_me'],
                'status' => $userData['status'],
            ]);
        }else{
           $userData['image'] = $this->uploadOneImage($userData['image'] , 'profile');
           $user->update([
                'name' => $userData['name'],
                'about_me' => $userData['about_me'],
                'status' => $userData['status'],
                'image' => $userData['image'],
            ]);
        }

        //set roles
        if (request()->has('roles')){
            $user->roles()->detach();
            $user->roles()->syncWithoutDetaching(request()->input('roles'));
        }

        return to_route('users');
    }


    public function trashed()
    {
        $users = User::onlyTrashed()->get();
        return view('panel.users.deleted' , compact('users'));
    }


    public function restore($id)
    {
       User::query()->where('id', $id)->withTrashed()->restore();
       return to_route('users');
    }


    public function destroy(User $user)
    {

        $user->delete();
        return to_route('users');
    }
}


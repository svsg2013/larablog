<?php
/**
 * Created by PhpStorm.
 * User: LeThanh
 * Date: 10/19/2017
 * Time: 9:55 PM
 */

namespace App\Repositories\Users;
use App\Repositories\EloquentRepository;
use App\User;
use App\User_role;
use App\Role;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;


class UsersEloquentRepository extends EloquentRepository implements UsersRepositoryInterface
{

    public function getModel()
    {
        // TODO: Implement getModel() method.
        return \App\User::class;
    }
    public function getUserInfor(){
        $getData=array();
        $getData= User::select('name','email','phone','remember_token')->get();
        $getData= Role::all();
        return $getData;
    }
    public function getCreateAndEdit($inputFile, $id=0){
        if ($id==0) {
            $user= new User();
            $user->name= $inputFile['txtUser'];
            $user->remember_token= $inputFile['_token'];
            $user->email= $inputFile['txtEmail'];
            $user->phone= $inputFile['txtPhone'];
            $user->password= $inputFile['txtPass'];
            $user->save();
            if(Input::has('slRoles')){
                $getRole= new User_role();
                $getRole->role_id= $inputFile['slRoles'];
                $getRole->user_id= $user->id;
                $getRole->save();
            }
            return redirect()->route('user.index')->with('thongbao','User khởi tạo thành công');
        }
    }

    public function getDelete($id)
    {

    }
}
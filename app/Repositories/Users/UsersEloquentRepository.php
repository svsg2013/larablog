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
    public function getUserInfor($id=0){
        $getData=array();
        if ($id==0){
            $getUser= User::select('id','name','email','phone','remember_token')->get();
            $getRole= Role::all();
            $getData=['abc'=>$getUser,'123'=>$getRole];
            return $getData;
        }else{
            $getUser= User::find($id);
            $getRole= Role::all();
//            echo "<pre>";
//            var_dump($getUser);die();
//            echo "</pre>";
            $getData=['abc'=>$getUser,'123'=>$getRole];
            return $getData;
        }
    }
    public function getCreateAndEdit($inputFile, $id=0){
        if ($id==0) {
            $user= new User();
            $user->name= $inputFile['txtUser'];
            $user->remember_token= $inputFile['_token'];
            $user->email= $inputFile['txtEmail'];
            $user->phone= $inputFile['txtPhone'];
            if(Input::has('slRoles')){
                $user->lvl= $inputFile['slRoles'];
            }
            $user->password= $inputFile['txtPass'];
            $user->save();
            $idUser= $user->id;
            if(Input::has('roles')){
                $getRoles= $inputFile['roles'];
                foreach ($getRoles as $role){
                    $getRole= new User_role();
                    $getRole->role_id= $role;
                    $getRole->user_id= $idUser;
                    $getRole->save();
                }
            }
            return redirect()->route('user.index')->with('thongbao','User khởi tạo thành công');
        }
    }

    public function getDelete($id)
    {

    }
}
<?php
/**
 * Created by PhpStorm.
 * User: LeThanh
 * Date: 10/19/2017
 * Time: 9:55 PM
 */

namespace App\Repositories\Cates;
use App\Repositories\EloquentRepository;
use App\Category;
use App\ChildCate;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;


class CateEloquentRepository extends EloquentRepository implements CateRepositoryInterface
{

    public function getModel()
    {
        // TODO: Implement getModel() method.
        return \App\Category::class;
    }

    public function getDataMenu(){
        $cate= DB::table('categories')
            ->leftjoin('child_cates','categories.id','=','child_cates.cateParen_id')
            ->select('name','lvl','alias','metaName','description','weight','child_cates.cateParen_id')
            ->get();
        return $cate;
    }

    public function getCreateAndEdit($inputFile, $id=0){
				if($id==0){
				$cateData= new Category();
				$cateData->name= $inputFile['txtName'];
				$cateData->alias= changeTitle($inputFile['txtName']);
				// khuc !empty -> không để trống thì thực hiện tức là có nhập vào text form
				if(!empty($inputFile['txtMeta'])){
                    $cateData->metaName= $inputFile['txtMeta'];

				}else{
                    $cateData->metaName= $inputFile['txtName'];
				}
				$cateData->description= $inputFile['txtDescription'];
				$cateData->save();
					$cateChildData= new ChildCate();
					$cateChildData->cateParen_id= $cateData->id;
					$cateChildData->lvl= $inputFile['slMenu'];
					$cateChildData->save();
                    return redirect()->route('category.index')->with('thongbao','Danh mục tạo thành công');
			}else{
				$cateData= Category::find($id);
				$cateData->name= $inputFile['txtName'];
				$cateData->alias= changeTitle($inputFile['txtName']);
                if(!empty($inputFile['txtMeta'])){
                    $cateData->metaName= $inputFile['txtMeta'];

                }else{
                    $cateData->metaName= $inputFile['txtName'];
                }
				$cateData->description= $inputFile['txtDescription'];
				$cateData->save();
                    $getIDParent= DB::table('categories')
                        ->leftjoin('child_cates','categories.id','=','child_cates.cateParen_id')
                        ->select('child_cates.id')
                        ->where('child_cates.cateParen_id','=',$id)
                        ->get()->first();
					$cateChildData= ChildCate::find($getIDParent->id);
					$cateChildData->lvl= $inputFile['slMenu'];
					$cateChildData->save();
                    return redirect()->route('category.index')->with('thongbao','Danh mục thay đổi thành công');
			}

    }

    public function getDelete($id)
    {
        $categet= ChildCate::where('lvl',$id)->count();
        if($categet==0){
            $getid= Category::find($id);
            $getid->delete();
            return redirect()->route('category.index')->with('thongbao','Xóa thành công');
        }else{
            return redirect()->route('category.index')->with('thongbaoloi','Đây là thư mục cha không thể xóa được');
        }
    }

}
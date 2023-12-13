<?php

namespace App\Http\Controllers;

use App\Models\Categories as ModelsCategories;
use Exception;
use Illuminate\Http\Request;

class Categories extends Controller
{
    // List Category
    public function list()
    {
        $list = ModelsCategories::all();
        return view('categories',compact('list'));
    }
    
    // Add
    public function add(Request $request)
    {
        try {
            $data = $request->all();
            unset($data['_token']);
            ModelsCategories::create($data);
        } catch (Exception $exception){
            return redirect()->back()->with('error','Thêm thất bại');
        }
        return redirect()->back()->with('success','Thêm thành công');
    }

    // Edit
    public function edit( Request $request)
    {
        try {
            $data = $request->all();
            $category = ModelsCategories::find($data['id']);
            $category->name = $data['name'];
            $category->save();
        }catch (Exception $exception){
            return redirect()->back()->with('error','Sửa thất bại');
        }
        return redirect()->back()->with('success','Sửa thành công');
    }

    //Delete
    public function delete($id)
    {

        try {
            ModelsCategories::where('id', $id)->delete();
        }catch(Exception $exception) {
            return redirect()->back()->with('error','Xóa thất bại');
        }
        return redirect()->back()->with('success','Xóa thành công');
    }
}

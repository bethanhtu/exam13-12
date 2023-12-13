<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Figures as ModelsFigures;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Figures extends Controller
{
    // List
    public function list()
    {
        $list = ModelsFigures::all();
        $categories = Categories::all();
        return view('figures',compact('list', 'categories'));
    }
    
    // Add
    public function add(Request $request)
    {
        try {
            $data = $request->all();
            unset($data['_token']);
            $mainImage = $data['image'];
            $mainImageName = time().'1'.$mainImage->getClientOriginalName();
            $mainImage->storeAs('/products', $mainImageName, 'public');
            $data['image'] = 'storage/products/' . $mainImageName;
            ModelsFigures::create($data);
        }catch (Exception $exception){
            return redirect()->back()->with('error','Lỗi: ' . $exception->getMessage());
        }
        return redirect(route('admin.figures.list'))->with('success', "Thêm sản phẩm thành công");

    }
    // Edit
    public function edit(Request $request)
    {
        try {
            $data = $request->all();
            $product = ModelsFigures::find($data['id']);
            unset($data['_token']);
            if (empty($data['image'])){
                $data['image'] = $product['image'];
            } else{
                Storage::disk('public')->delete($product['image']);
                $mainImage = $data['image'];
                $mainImageName = time().'1'.$mainImage->getClientOriginalName();
                $mainImage->storeAs('/products', $mainImageName, 'public');
                $data['image'] = 'storage/products/' . $mainImageName;
            }
            unset($data['insert']);
            unset($data['image']);
            ModelsFigures::where('id', $data['id'])->update($data);
        }catch (Exception $exception){
            return redirect()->back()->with('error','Lỗi: ' . $exception->getMessage());
        }
        return redirect(route('admin.figures.list'))->with('success', "Thêm sản phẩm thành công");
    }

    // Delete
    public function delete($id)
    {
        try {
            ModelsFigures::where('id', $id)->delete();
        }catch(Exception $exception) {
            return redirect()->back()->with('error','Xóa thất bại');
        }
        return redirect()->back()->with('success','Xóa thành công');
    }
}

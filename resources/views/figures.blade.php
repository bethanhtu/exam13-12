@extends('layout')
@section('content')
<div class="col-lg-12">
    <h2>Figures</h2>
    <a href="{{route('admin.category.list')}}">Category</a>
    <div class="text-right">
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalinsert">Thêm</button>
    </div>
    <div>
        <hr>
    </div>
    <div class="table-responsive">
        <table class="table align-middle mb-0 bg-white" id="">
            <thead class="bg-light ">
                <tr>
                    <th>id</th>
                    <th>Sản phẩm</th>
                    <th>Ảnh</th>
                    <th>Giá</th>
                    <th>Loại</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach($list as $item)
                <tr>
                    <td>
                        <p class="">{{$item->id}}</p>
                    </td>
                    <td class="w-25">
                        <p class="fw-bold">{{$item->name}}</p>
                    </td>
                    <td><img src="{{asset($item->image)}}" width="45px" /></td>
                    <td>
                        <span>{{ number_format($item->price, 0, ',', '.') }}đ</span>
                    </td>

                    <td>
                        <p>{{$item->categories_id}}</p>
                    </td>
                    <td>
                        <a array="{{$item}}" id="{{$item->id}}" class="editproduct btn btn-outline-secondary">Sửa</a>
                        <a class="btn btn-outline-danger" href="{{route('admin.figures.delete',['id'=>$item->id])}}" data-mdb-ripple-color="dark" onclick="return confirm('Bạn có muốn xoá ?')">Xóa</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="modal fade" id="modalinsert">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <legend>Thêm sản phẩm</legend>
                </div>
                <div class="modal-body">
                    <form action="{{route('admin.figures.add')}}" method="post" role="form" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-8">
                                <label for="inputCity">Tên</label>
                                <input type="text" class="form-control col-sm-10" id="name" name="name" value="" onblur="checkname()" ; Required />

                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputState">Loại sản phẩm</label>
                                <select id="categories_id" name="categories_id" class="form-control col-sm-10">
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-5">
                                <label for="inputState">Giá</label>
                                <input type="number" class="form-control col-sm-10" id="price" name="price" value="{{old('price')}}" onblur="checkPrice();" Required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputCity">Ảnh</label>
                                <input type="file" class="form-control" id="image" name="image" accept="image/png, image/gif, image/jpeg" onchange="checkImageMain();" value="" Required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                            <button type="submit" name="insert" class="btn btn-primary">Thêm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Update -->
    <div class="modal fade" id="modalupdate">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <legend>Thêm sản phẩm</legend>
                </div>
                <div class="modal-body">
                    <form action="{{route('admin.figures.edit')}}" method="post" role="form" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-7">
                                <label for="inputCity">Tên</label>
                                <input type="text" class="form-control" id="ename" name="name" value="" onblur="checkname()" ; Required />
                            </div>
                            <div class="form-group col-md-1">
                                <label for="inputCity">id</label>
                                <input type="number" class="form-control" id="eid" name="id" readonly="">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputState">Loại sản phẩm</label>
                                <select id="categories_id" name="categories_id" class="form-control col-sm-10">
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                                <label for="inputState">Giá</label>
                                <input type="number" class="form-control" id="eprice" name="price" value="" onblur="checkPrice();" Required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputCity">Ảnh</label>
                                <input type="file" class="form-control" id="image" name="image" accept="image/png, image/gif, image/jpeg" onchange="checkImageMain();" value="">

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                            <button type="submit" name="insert" class="btn btn-primary">Lưu</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @endsection
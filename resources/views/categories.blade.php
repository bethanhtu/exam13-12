@extends('layout')
@section('content')

<div class="col-lg-12">
    <h2>Category</h2>
    <a href="{{route('admin.figures.list')}}">figures</a>

    <div class="text-right">
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalinsert">Thêm</button>
    </div>
    <div>
        <hr>
    </div>
    <!-- Table -->
    <div class="table-responsive">
        <table class="table table-hover table-striped" id="">
            <thead class="table">
                <tr class="bg-primary text-white">
                    <th>Id</th>
                    <th>Name categories</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach($list as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td>
                        <a array="{{$item}}" id="{{$item->id}}" class="edituser btn btn btn-outline-secondary">Sửa</a>
                        <a class="btn btn-outline-danger" href="{{route('admin.category.delete', ['id'=>$item->id])}}" onclick="return confirm('Bạn có muốn xóa không')">Xóa</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal add -->
    <div class="modal fade" id="modalinsert">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{route('admin.category.add')}}" method="post" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <legend>Thêm thông tin danh mục</legend>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="">Tên</label> <span id="errorname"></span>
                            <input type="text" class="form-control" id="name" name="name" value="" onblur="checkname()" ; Required />
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

    <!-- Modal update -->
    <div class="modal fade" id="modalupdate">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{route('admin.category.edit')}}" method="post" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <legend>Sửa thông tin danh mục</legend>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">ID</label>
                            <input type="text" class="form-control" id="eid" name="id" readonly="">
                        </div>

                        <div class="form-group">
                            <label for="">Tên danh mục</label> <span id="errorname"></span>
                            <input type="text" class="form-control" id="ename" name="name" value="" onblur="checkname()" ; Required />
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <button type="submit" name="insert" class="btn btn-primary">Sửa</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection
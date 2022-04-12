@extends('admin.layouts.master')

@section('content')


<header class="page-title-bar">
    <button type="button" class="btn btn-success btn-floated"><span class="fa fa-plus"></span></button>
    <div class="d-md-flex align-items-md-start">
        <h1 class="page-title mr-sm-auto"> Chi nhánh</h1>
        <div class="btn-toolbar">
            <a href="{{route('branches.create')}}" class="fa-solid fa-file-export">Thêm</a>
            <div class="dropdown">
            </div>
        </div>
    </div>
</header>
<div class="page-section">
    <div class="card card-fluid">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs">

            </ul>
        </div>
        <div class="card-body">
            <div class="form-group">
                <div class="input-group input-group-alt">
                    <div class="input-group-prepend">
                        <select class="custom-select">
                            <option selected> Filter By </option>
                            <option value="1"> Tags </option>

                        </select>
                    </div>
                    <form method="get">
                        @csrf
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><span class="oi oi-magnifying-glass"></span></span>
                            </div><input type="text" class="form-control" placeholder="Tìm kiếm " name="search">
                            <button type="submit">Tìm kiếm</button>
                        </div>
                    </form>
                    <!-- .input-group -->
                </div>
            </div>

            <div class="table-responsive">
                <table class="table">
                    <thead>

                        @if (Session::has('success'))
                        <div class="alert alert-success">{{session::get('success')}}</div>
                        @endif
                        <br>
                        <tr>
                            <th> # </th>
                            <th> Tên chi nhánh </th>
                            <th> Địa chỉ </th>
                            <th> Số điện thoại </th>
                            <th> chức năng </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($branches as $branch)
                        <tr>

                            <td class="align-middle"> {{ $branch->id }} </td>
                            <td class="align-middle"> {{ $branch->name }} </td>
                            <td class="align-middle"> {{ $branch->address }} </td>
                            <td class="align-middle"> {{ $branch->phone }} </td>
                            <td>
                                <form action="{{ route('branches.destroy',$branch->id )}}" style="display:inline" method="post">

                                    <button onclick="return confirm('Xóa {{$branch->name}} ?')" class="btn btn-sm btn-icon btn-secondary"><i class="far fa-trash-alt"></i></button>
                                    @csrf
                                    @method('delete')


                                </form>
                                <span class="sr-only">Edit</span></a> <a href="{{route('branches.edit',$branch->id)}}" class="btn btn-sm btn-icon btn-secondary"><i class="fa fa-pencil-alt"></i> <span class="sr-only">Remove</span></a>
                            </td>
                            <!-- <a href="{{ route('branches.destroy',$branch->id )}}" > -->

                        </tr><!-- /tr -->
                        @endforeach
                    </tbody><!-- /tbody -->
                </table><!-- /.table -->
                <br>
                <div class="container">

                    {{ $branches->links() }}


                </div>
                <br>
                <br>

            </div>
            <!-- /.table-responsive -->
            <!-- .pagination -->

        </div><!-- /.card-body -->




        @endsection
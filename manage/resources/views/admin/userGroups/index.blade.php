@extends('admin.layouts.master')

@section('content')


<header class="page-title-bar">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">
                <a href="#"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Tables</a>
            </li>
        </ol>
    </nav>
    <button type="button" class="btn btn-success btn-floated"><span class="fa fa-plus"></span></button>
    <div class="d-md-flex align-items-md-start">
        <h1 class="page-title mr-sm-auto"> Nhóm nhân viên</h1><!-- .btn-toolbar -->
        <div class="btn-toolbar">
            <button type="button" class="btn btn-light"><i class="fa-solid fa-file-export"></i> <span class="ml-1">Export</span></button> <button type="button" class="btn btn-light"><i class="oi oi-data-transfer-upload"></i> <span class="ml-1">Import</span></button>
            <div class="dropdown">
                <button type="button" class="btn btn-light" data-toggle="dropdown"><span>More</span> <span class="fa fa-caret-down"></span></button>
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="dropdown-arrow"></div><a href="#" class="dropdown-item">Add tasks</a> <a href="#" class="dropdown-item">Invite members</a>
                    <div class="dropdown-divider"></div><a href="#" class="dropdown-item">Share</a> <a href="#" class="dropdown-item">Archive</a> <a href="#" class="dropdown-item">Remove</a>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="page-section">
    <div class="card card-fluid">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item">
                    <a class="nav-link active show" data-toggle="tab" href="#tab1">All</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#tab2">Ongoing</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#tab3">Completed</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <div class="form-group">
                <div class="input-group input-group-alt">
                    <div class="input-group-prepend">
                        <select class="custom-select">
                            <option selected> Filter By </option>
                            <option value="1"> Tags </option>
                            <option value="2"> Vendor </option>
                            <option value="3"> Variants </option>
                            <option value="4"> Prices </option>
                            <option value="5"> Sales </option>
                        </select>
                    </div>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><span class="oi oi-magnifying-glass"></span></span>
                        </div><input type="text" class="form-control" placeholder="Search record">
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <div class="col-lg-12 mt-3">
                            <a href="{{route('userGroups.create')}}" class="btn btn-primary">Thêm nhóm</a>
                        </div>
                        <br>
                        @if (Session::has('success'))
                        <div class="alert alert-success">{{session::get('success')}}</div>
                        @endif
                        <br>
                        <tr>

                            <th> # </th>
                            <th> Tên nhóm</th>
                            <th> Chi tiết nhóm</th>
                            <th> chức năng </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($userGroups as $userGroup)
                        <tr>

                            <td class="align-middle"> {{ $userGroup->id }} </td>
                            <td class="align-middle"> {{ $userGroup->name }} </td>
                            <td class="align-middle"> {{ $userGroup->description }} </td>
                            <td>
                                <form action="{{ route('userGroups.destroy',$userGroup->id )}}" style="display:inline" method="post">

                                    <button  onclick="return confirm('Xóa {{$userGroup->name}} ?')" class="btn btn-sm btn-icon btn-secondary"><i class="far fa-trash-alt"></i></button>
                                    @csrf
                                    @method('delete')


                                </form>
                                <span class="sr-only">Edit</span></a> <a href="{{route('userGroups.edit',$userGroup->id)}}" class="btn btn-sm btn-icon btn-secondary"><i class="fa fa-pencil-alt"></i> <span class="sr-only">Remove</span></a>
                            </td>
            

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <ul class="pagination justify-content-center mt-4">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1"><i class="fa fa-lg fa-angle-left"></i></a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">1</a>
                </li>
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">...</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">13</a>
                </li>
                <li class="page-item active">
                    <a class="page-link" href="#">14</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">15</a>
                </li>
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">...</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">24</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#"><i class="fa fa-lg fa-angle-right"></i></a>
                </li>
            </ul>
        </div>



        @endsection
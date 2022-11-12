@extends('layouts.app')
@section('content')

@section('title', 'Permission create Form')

@section('css')
@endsection


<div class="pagetitle">
    <h1>Permission detail</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item">Permission show</li>
            <li class="breadcrumb-item active">Permission details</li>
        </ol>
    </nav>
</div><!-- End Page Title -->


<div class="card">
    <div class="card-header">
        <span class="font-weight-bold">Permission table list</span>
    </div>
    <div class="card-body">
        <div class="container">
            <form action="@route('permission.update', $permission->permission_id)" method="POST">
                @method('put')
                @csrf

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <select name="role_id" class="form-control">
                                <option value="">Please select a role</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->role_id }}"
                                        @if ($role->role_id === $permission->role_id) selected @endif>{{ $role->name }}</option>
                                @endforeach
                            </select>
                            @error('role_id')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    <div class="col-md-8">
                        <table class="responsive-table-input-matrix">
                            <thead>
                                <tr>
                                    <th>Permission</th>
                                    <th>Add</th>
                                    <th>Edit</th>
                                    <th>View</th>
                                    <th>Delete</th>
                                    <th>List</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td>Roles</td>
                                    <td>
                                        <input type="checkbox" name="permission[role][add]"
                                            @isset($permission['permission']['role']['add']) checked @endisset value="1">
                                    </td>
                                    <td>
                                        <input type="checkbox" name="permission[role][edit]"
                                            @isset($permission['permission']['role']['edit']) checked @endisset value="1">
                                    </td>
                                    <td>
                                        <input type="checkbox" name="permission[role][view]"
                                            @isset($permission['permission']['role']['view']) checked @endisset value="1">

                                    </td>
                                    <td>
                                        <input type="checkbox" name="permission[role][delete]"
                                            @isset($permission['permission']['role']['delete']) checked @endisset value="1">
                                    </td>
                                    <td>
                                        <input type="checkbox" name="permission[role][list]"
                                            @isset($permission['permission']['role']['list']) checked @endisset value="1">
                                    </td>

                                </tr>
                                <tr>
                                    <td>Permissions</td>
                                    <td>
                                        <input type="checkbox" name="permission[permission][add]"
                                            @isset($permission['permission']['permission']['add']) checked @endisset value="1">
                                    </td>
                                    <td>
                                        <input type="checkbox" name="permission[permission][edit]" value="1"
                                            @isset($permission['permission']['permission']['edit']) checked @endisset>
                                    </td>
                                    <td>
                                        <input type="checkbox" name="permission[permission][view]" value="1"
                                            @isset($permission['permission']['permission']['view']) checked @endisset>
                                    </td>
                                    <td>
                                        <input type="checkbox" name="permission[permission][delete]"
                                            @isset($permission['permission']['permission']['delete']) checked @endisset value="1">
                                    </td>
                                    <td>
                                        <input type="checkbox" name="permission[permission][list]"
                                            @isset($permission['permission']['permission']['list']) checked @endisset value="1">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Users</td>
                                    <td>
                                        <input type="checkbox" name="permission[user][add]"
                                            @isset($permission['permission']['user']['add']) checked @endisset value="1">
                                    </td>
                                    <td>
                                        <input type="checkbox" name="permission[user][edit]"
                                            @isset($permission['permission']['user']['edit']) checked @endisset value="1">
                                    </td>
                                    <td>
                                        <input type="checkbox" name="permission[user][view]"
                                            @isset($permission['permission']['user']['view']) checked @endisset value="1">
                                    </td>
                                    <td>
                                        <input type="checkbox" name="permission[user][delete]"
                                            @isset($permission['permission']['user']['delete']) checked @endisset value="1">
                                    </td>
                                    <td>
                                        <input type="checkbox" name="permission[user][list]"
                                            @isset($permission['permission']['user']['list']) checked @endisset value="1">
                                    </td>
                                </tr>


                                <tr>
                                    <td>Category</td>
                                    <td>
                                        <input type="checkbox" name="permission[category][add]"
                                            @isset($permission['permission']['category']['add']) checked @endisset value="1">
                                    </td>
                                    <td>
                                        <input type="checkbox" name="permission[category][edit]"
                                            @isset($permission['permission']['category']['edit']) checked @endisset value="1">
                                    </td>
                                    <td>
                                        <input type="checkbox" name="permission[category][view]"
                                            @isset($permission['permission']['category']['view']) checked @endisset value="1">
                                    </td>
                                    <td>
                                        <input type="checkbox" name="permission[category][delete]"
                                            @isset($permission['permission']['category']['delete']) checked @endisset value="1">
                                    </td>
                                    <td>
                                        <input type="checkbox" name="permission[category][list]"
                                            @isset($permission['permission']['category']['list']) checked @endisset value="1">
                                    </td>
                                </tr>

                                <!-- category end -->

                                <tr>
                                    <td>Sub-Category</td>
                                    <td>
                                        <input type="checkbox" name="permission[subcategory][add]"
                                            @isset($permission['permission']['subcategory']['add']) checked @endisset value="1">
                                    </td>
                                    <td>
                                        <input type="checkbox" name="permission[subcategory][edit]"
                                            @isset($permission['permission']['subcategory']['edit']) checked @endisset value="1">
                                    </td>
                                    <td>
                                        <input type="checkbox" name="permission[subcategory][view]"
                                            @isset($permission['permission']['subcategory']['view']) checked @endisset value="1">
                                    </td>
                                    <td>
                                        <input type="checkbox" name="permission[subcategory][delete]"
                                            @isset($permission['permission']['subcategory']['delete']) checked @endisset value="1">
                                    </td>
                                    <td>
                                        <input type="checkbox" name="permission[subcategory][list]"
                                            @isset($permission['permission']['subcategory']['list']) checked @endisset value="1">
                                    </td>
                                </tr>
                                <!--sub category end -->

                                <tr>
                                    <td>Product</td>
                                    <td>
                                        <input type="checkbox" name="permission[product][add]"
                                            @isset($permission['permission']['product']['add']) checked @endisset value="1">
                                    </td>
                                    <td>
                                        <input type="checkbox" name="permission[product][edit]"
                                            @isset($permission['permission']['product']['edit']) checked @endisset value="1">
                                    </td>
                                    <td>
                                        <input type="checkbox" name="permission[product][view]"
                                            @isset($permission['permission']['product']['view']) checked @endisset value="1">
                                    </td>
                                    <td>
                                        <input type="checkbox" name="permission[product][delete]"
                                            @isset($permission['permission']['product']['delete']) checked @endisset value="1">
                                    </td>
                                    <td>
                                        <input type="checkbox" name="permission[product][list]"
                                            @isset($permission['permission']['product']['list']) checked @endisset value="1">
                                    </td>
                                </tr>
                                <!--product end -->



                            </tbody>
                        </table>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

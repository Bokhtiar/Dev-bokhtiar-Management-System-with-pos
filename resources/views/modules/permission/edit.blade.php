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
            <form action="@route('permission.update', $permission->id)" method="POST">
                @method('put')
                @csrf

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <select name="role_id" class="form-control">
                                <option value="">Please select a role</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}"
                                        @if ($role->id === $permission->role_id) selected @endif>{{ $role->name }}</option>
                                @endforeach
                            </select>
                            @error('role_id')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                       
                    </div>
                    <div class="col-md-8">
                        <table class="table responsive-table-input-matrix">
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

                                {{-- role start --}}
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
                                {{-- role end --}}

                                {{-- permission start --}}
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
                                {{-- permission end --}}

                                {{-- user start --}}
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
                                {{-- user end  --}}

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


                                {{-- room  start --}}
                                <tr>
                                    <td>Room</td>
                                    <td>
                                        <input type="checkbox" name="permission[room][add]"
                                            @isset($permission['permission']['room']['add']) checked @endisset value="1">
                                    </td>
                                    <td>
                                        <input type="checkbox" name="permission[room][edit]"
                                            @isset($permission['permission']['room']['edit']) checked @endisset value="1">
                                    </td>
                                    <td>
                                        <input type="checkbox" name="permission[room][view]"
                                            @isset($permission['permission']['room']['view']) checked @endisset value="1">
                                    </td>
                                    <td>
                                        <input type="checkbox" name="permission[room][delete]"
                                            @isset($permission['permission']['room']['delete']) checked @endisset value="1">
                                    </td>
                                    <td>
                                        <input type="checkbox" name="permission[room][list]"
                                            @isset($permission['permission']['room']['list']) checked @endisset value="1">
                                    </td>
                                </tr>
                                {{-- room end --}}

                                {{-- bed  start --}}
                                <tr>
                                    <td>Bed</td>
                                    <td>
                                        <input type="checkbox" name="permission[bed][add]"
                                            @isset($permission['permission']['bed']['add']) checked @endisset value="1">
                                    </td>
                                    <td>
                                        <input type="checkbox" name="permission[bed][edit]"
                                            @isset($permission['permission']['bed']['edit']) checked @endisset value="1">
                                    </td>
                                    <td>
                                        <input type="checkbox" name="permission[bed][view]"
                                            @isset($permission['permission']['bed']['view']) checked @endisset value="1">
                                    </td>
                                    <td>
                                        <input type="checkbox" name="permission[bed][delete]"
                                            @isset($permission['permission']['bed']['delete']) checked @endisset value="1">
                                    </td>
                                    <td>
                                        <input type="checkbox" name="permission[bed][list]"
                                            @isset($permission['permission']['bed']['list']) checked @endisset value="1">
                                    </td>
                                </tr>
                                {{-- bed end --}}

                                 {{-- bedAssign  start --}}
                                 <tr>
                                    <td>Bed Assing</td>
                                    <td>
                                        <input type="checkbox" name="permission[bedAssign][add]"
                                            @isset($permission['permission']['bedAssign']['add']) checked @endisset value="1">
                                    </td>
                                    <td>
                                        <input type="checkbox" name="permission[bedAssign][edit]"
                                            @isset($permission['permission']['bedAssign']['edit']) checked @endisset value="1">
                                    </td>
                                    <td>
                                        <input type="checkbox" name="permission[bedAssign][view]"
                                            @isset($permission['permission']['bedAssign']['view']) checked @endisset value="1">
                                    </td>
                                    <td>
                                        <input type="checkbox" name="permission[bedAssign][delete]"
                                            @isset($permission['permission']['bedAssign']['delete']) checked @endisset value="1">
                                    </td>
                                    <td>
                                        <input type="checkbox" name="permission[bedAssign][list]"
                                            @isset($permission['permission']['bedAssign']['list']) checked @endisset value="1">
                                    </td>
                                </tr>
                                {{-- bedAssign end --}}


                                {{-- Food Category  start --}}
                                <tr>
                                    <td>Food Category</td>
                                    <td>
                                        <input type="checkbox" name="permission[foodCategory][add]"
                                            @isset($permission['permission']['foodCategory']['add']) checked @endisset value="1">
                                    </td>
                                    <td>
                                        <input type="checkbox" name="permission[foodCategory][edit]"
                                            @isset($permission['permission']['foodCategory']['edit']) checked @endisset value="1">
                                    </td>
                                    <td>
                                        <input type="checkbox" name="permission[foodCategory][view]"
                                            @isset($permission['permission']['foodCategory']['view']) checked @endisset value="1">
                                    </td>
                                    <td>
                                        <input type="checkbox" name="permission[foodCategory][delete]"
                                            @isset($permission['permission']['foodCategory']['delete']) checked @endisset value="1">
                                    </td>
                                    <td>
                                        <input type="checkbox" name="permission[foodCategory][list]"
                                            @isset($permission['permission']['foodCategory']['list']) checked @endisset value="1">
                                    </td>
                                </tr>
                                {{-- foodCategory end --}}

                                {{-- Food sub Category  start --}}
                                <tr>
                                    <td>Food Sub Category</td>
                                    <td>
                                        <input type="checkbox" name="permission[foodSubCategory][add]"
                                            @isset($permission['permission']['foodSubCategory']['add']) checked @endisset value="1">
                                    </td>
                                    <td>
                                        <input type="checkbox" name="permission[foodSubCategory][edit]"
                                            @isset($permission['permission']['foodSubCategory']['edit']) checked @endisset value="1">
                                    </td>
                                    <td>
                                        <input type="checkbox" name="permission[foodSubCategory][view]"
                                            @isset($permission['permission']['foodSubCategory']['view']) checked @endisset value="1">
                                    </td>
                                    <td>
                                        <input type="checkbox" name="permission[foodSubCategory][delete]"
                                            @isset($permission['permission']['foodSubCategory']['delete']) checked @endisset value="1">
                                    </td>
                                    <td>
                                        <input type="checkbox" name="permission[foodSubCategory][list]"
                                            @isset($permission['permission']['foodSubCategory']['list']) checked @endisset value="1">
                                    </td>
                                </tr>
                                {{-- foodSubCategory end --}}

                                {{-- product start --}}
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


                                {{-- pos start --}}
                                <tr>
                                    <td>POS</td>
                                    <td>
                                        <input type="checkbox" name="permission[pos][add]"
                                            @isset($permission['permission']['pos']['add']) checked @endisset value="1">
                                    </td>
                                    <td>
                                        <input type="checkbox" name="permission[pos][edit]"
                                            @isset($permission['permission']['pos']['edit']) checked @endisset value="1">
                                    </td>
                                    <td>
                                        <input type="checkbox" name="permission[pos][view]"
                                            @isset($permission['permission']['pos']['view']) checked @endisset value="1">
                                    </td>
                                    <td>
                                        <input type="checkbox" name="permission[pos][delete]"
                                            @isset($permission['permission']['pos']['delete']) checked @endisset value="1">
                                    </td>
                                    <td>
                                        <input type="checkbox" name="permission[pos][list]"
                                            @isset($permission['permission']['pos']['list']) checked @endisset value="1">
                                    </td>
                                </tr>
                                <!--pos end -->

                                {{-- order start --}}
                                <tr>
                                    <td>Order</td>
                                    <td>
                                        <input type="checkbox" name="permission[order][add]"
                                            @isset($permission['permission']['order']['add']) checked @endisset value="1">
                                    </td>
                                    <td>
                                        <input type="checkbox" name="permission[order][edit]"
                                            @isset($permission['permission']['order']['edit']) checked @endisset value="1">
                                    </td>
                                    <td>
                                        <input type="checkbox" name="permission[order][view]"
                                            @isset($permission['permission']['order']['view']) checked @endisset value="1">
                                    </td>
                                    <td>
                                        <input type="checkbox" name="permission[order][delete]"
                                            @isset($permission['permission']['order']['delete']) checked @endisset value="1">
                                    </td>
                                    <td>
                                        <input type="checkbox" name="permission[order][list]"
                                            @isset($permission['permission']['order']['list']) checked @endisset value="1">
                                    </td>
                                </tr>
                                <!--order end -->


                                {{-- bill start --}}
                                <tr>
                                    <td>Bill</td>
                                    <td>
                                        <input type="checkbox" name="permission[bill][add]"
                                            @isset($permission['permission']['bill']['add']) checked @endisset value="1">
                                    </td>
                                    <td>
                                        <input type="checkbox" name="permission[bill][edit]"
                                            @isset($permission['permission']['bill']['edit']) checked @endisset value="1">
                                    </td>
                                    <td>
                                        <input type="checkbox" name="permission[bill][view]"
                                            @isset($permission['permission']['bill']['view']) checked @endisset value="1">
                                    </td>
                                    <td>
                                        <input type="checkbox" name="permission[bill][delete]"
                                            @isset($permission['permission']['bill']['delete']) checked @endisset value="1">
                                    </td>
                                    <td>
                                        <input type="checkbox" name="permission[bill][list]"
                                            @isset($permission['permission']['bill']['list']) checked @endisset value="1">
                                    </td>
                                </tr>
                                <!--bill end -->

                                {{-- alert start --}}
                                <tr>
                                    <td>Alert</td>
                                    <td>
                                        <input type="checkbox" name="permission[alert][add]"
                                            @isset($permission['permission']['alert']['add']) checked @endisset value="1">
                                    </td>
                                    <td>
                                        <input type="checkbox" name="permission[alert][edit]"
                                            @isset($permission['permission']['alert']['edit']) checked @endisset value="1">
                                    </td>
                                    <td>
                                        <input type="checkbox" name="permission[alert][view]"
                                            @isset($permission['permission']['alert']['view']) checked @endisset value="1">
                                    </td>
                                    <td>
                                        <input type="checkbox" name="permission[alert][delete]"
                                            @isset($permission['permission']['alert']['delete']) checked @endisset value="1">
                                    </td>
                                    <td>
                                        <input type="checkbox" name="permission[alert][list]"
                                            @isset($permission['permission']['alert']['list']) checked @endisset value="1">
                                    </td>
                                </tr>
                                <!--alert end -->

                                 {{-- visitor start --}}
                                 <tr>
                                    <td>Visitor</td>
                                    <td>
                                        <input type="checkbox" name="permission[visitor][add]"
                                            @isset($permission['permission']['visitor']['add']) checked @endisset value="1">
                                    </td>
                                    <td>
                                        <input type="checkbox" name="permission[visitor][edit]"
                                            @isset($permission['permission']['visitor']['edit']) checked @endisset value="1">
                                    </td>
                                    <td>
                                        <input type="checkbox" name="permission[visitor][view]"
                                            @isset($permission['permission']['visitor']['view']) checked @endisset value="1">
                                    </td>
                                    <td>
                                        <input type="checkbox" name="permission[visitor][delete]"
                                            @isset($permission['permission']['visitor']['delete']) checked @endisset value="1">
                                    </td>
                                    <td>
                                        <input type="checkbox" name="permission[visitor][list]"
                                            @isset($permission['permission']['visitor']['list']) checked @endisset value="1">
                                    </td>
                                </tr>
                                <!--visitor end -->



                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="text-center my-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
    
</div>

@endsection

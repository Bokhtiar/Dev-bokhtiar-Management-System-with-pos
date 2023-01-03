@extends('layouts.app')
@section('content')

@section('title', 'Dashboard')

@section('css')
@endsection

<div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </nav>
</div><!-- End Page Title -->




@if (Auth::user()->role_id == 1)


    <section class="section dashboard">
        <!-- profile show start -->
        <div class="row">
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp"
                            alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                        <h5 class="my-3">{{ $user->name }}</h5>
                        <p class="text-muted mb-1">{{ $user->phone }}</p>
                        <p class="text-muted mb-1">{{ $user->email }}</p>
                        <p class="text-muted mb-4">{{ $user->address }}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row mt-3">
                            <div class="col-sm-3">
                                <p class="mb-0">Full Name</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">Johnatan Smith</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Email</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">example@example.com</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Phone</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">(097) 234-5678</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Mobile</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">(098) 765-4321</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Address</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">Bay Area, San Francisco, CA</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- profile show end -->

        <!-- seat rent show start -->
        <section class="my-5">
            <div class="row">
                <div class="col-md-8 col-lg-8 col-sm-12">
                    <div class="card recent-sales overflow-auto">
                        <div class="filter">
                            <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                    class="bi bi-three-dots"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                <li class="dropdown-header text-start">
                                    <h6>Filter</h6>
                                </li>

                                <li><a class="dropdown-item" href="#">Today</a></li>
                                <li><a class="dropdown-item" href="#">This Month</a></li>
                                <li><a class="dropdown-item" href="#">This Year</a></li>
                            </ul>
                        </div>

                        <div class="card-body">
                            <h5 class="card-title">Grap Town Rent Bill <span></span></h5>

                            <table class="table table-borderless datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Month</th>
                                        <th scope="col">User</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Room</th>
                                        <th scope="col">Bed</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($bills as $item)
                                        <tr>
                                            <th scope="row">{{ $loop->index + 1 }}</th>
                                            <th scope="row">{{ $item->month }}</th>
                                            <td> {{ $item->bedAssign ? $item->bedAssign->user->name : '' }}</td>
                                            <td>{{ $item->bedAssign ? $item->bedAssign->category->category_name : '' }}
                                            </td>
                                            <td>{{ $item->bedAssign ? $item->bedAssign->room->room_name : '' }}</td>
                                            <td>{{ $item->bedAssign ? $item->bedAssign->bed->bed_name : '' }}</td>
                                            <td class="form-inline">
                                                <a class="btn btn-sm btn-info text-light" href="@route('bill.show', $item->bill_id)"> <i
                                                        class="ri-eye-fill"></i></a>
                                            </td>
                                        </tr>
                                    @empty
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-12">
                    <!-- News & Updates Traffic -->
                    <div class="card">


                        <div class="card-body pb-0">
                            <h5 class="card-title">News &amp; Updates <span>| Today</span></h5>

                            <div class="news">
                                <div class="post-item clearfix">
                                    <img src="assets/img/news-2.jpg" alt="">
                                    <h4><a href="#">Quidem autem et impedit</a></h4>
                                    <p>Illo nemo neque maiores vitae officiis cum eum turos elan dries werona nande...
                                    </p>
                                </div>

                                <div class="post-item clearfix">
                                    <img src="assets/img/news-3.jpg" alt="">
                                    <h4><a href="#">Id quia et et ut maxime similique occaecati ut</a></h4>
                                    <p>Fugiat voluptas vero eaque accusantium eos. Consequuntur sed ipsam et totam...
                                    </p>
                                </div>

                                <div class="post-item clearfix">
                                    <img src="assets/img/news-4.jpg" alt="">
                                    <h4><a href="#">Laborum corporis quo dara net para</a></h4>
                                    <p>Qui enim quia optio. Eligendi aut asperiores enim repellendusvel rerum cuder...
                                    </p>
                                </div>

                                <div class="post-item clearfix">
                                    <img src="assets/img/news-5.jpg" alt="">
                                    <h4><a href="#">Et dolores corrupti quae illo quod dolor</a></h4>
                                    <p>Odit ut eveniet modi reiciendis. Atque cupiditate libero beatae dignissimos
                                        eius...</p>
                                </div>
                            </div><!-- End sidebar recent posts-->
                        </div>
                    </div><!-- End News & Updates -->
                </div>
            </div>
        </section>
        <!-- seat rent show end -->



    </section>
@else
    <section class="section dashboard">
        <!-- Table with stripped rows -->
        <table class="table datatable">
            <thead>
                <tr>
                    <th scope="col">Index</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $item)
                    <tr>
                        <th scope="row">{{ $loop->index + 1 }}</th>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>
                            @if ($item->status == 1)
                                <a class="btn btn-sm btn-success" href="@route('user.status', $item->id)"><i
                                        class="bi bi-check-circle"></i></a>
                            @else
                                <a class="btn btn-warning btn-sm" href="@route('user.status', $item->id)"><i
                                        class="bi bi-exclamation-triangle"></i></a>
                            @endif
                        </td>
                        <td class="form-inline">
                            <a class="btn btn-sm btn-info text-light" href="@route('user.show', $item->id)"> <i
                                    class="ri-eye-fill"></i></a>
                            {{-- <a class="btn btn-sm btn-primary" href="@route('user.edit', $item->id)"> <i
                                                class="ri-edit-box-fill"></i></a> --}}
                            <form method="POST" action="@route('user.destroy', $item->id)" class="mt-1">
                                @csrf
                                @method('Delete')
                                <button class="btn btn-sm btn-danger" type="submit"> <i
                                        class="ri-delete-bin-6-fill"></i></button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <h2 class="bg-danger text-light text-center">User Is empty</h2>
                @endforelse
            </tbody>
        </table>
        <!-- End Table with stripped rows -->
    </section>
@endif


@section('js')
@endsection

@endsection

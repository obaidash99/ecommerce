@extends('layouts.admin')

@section('content')

    <div class="container vh-100">
        <div class="card">
           <div class="card-header">
              <h1>{{ Auth::user()->name }}'s Dashboard</h1>
           </div>
            <div class="card-body dashboard">
                <div class="row">
                    <div>
                        <h3>
                            <a class="nav-link {{ Request::is('categories') ? 'active bg-info' : '' }}" href="{{ url('categories') }}">
                                <i class="material-icons opacity-10">table_view</i>
                                <span>Categories</span>
                            </a>
                        </h3>
                    </div>
                    <div>
                        <h3>
                            <a class="nav-link {{ Request::is('products') ? 'active bg-info' : '' }}" href="{{ url('products') }}">
                                <i class="material-icons opacity-10">inventory</i>
                                <span>Products</span>
                            </a>
                        </h3>
                    </div>
                    <div>
                        <h3>
                            <a class="nav-link {{ Request::is('orders') ? 'active bg-info' : '' }}" href="{{ url('orders') }}">
                                <i class="material-icons opacity-10">inventory_2</i>
                                <span>Orders</span>
                            </a>
                        </h3>
                    </div>
                    <div>
                        <h3>
                            <a class="nav-link {{ Request::is('messages') ? 'active bg-info' : '' }}" href="{{ url('messages') }}">
                                <i class="material-icons opacity-10">messages</i>
                                <span>Messages</span>
                            </a>
                        </h3>
                    </div>
                    <div>
                        <h3>
                            <a class="nav-link {{ Request::is('static-content') ? 'active bg-info' : '' }}" href="{{ url('static-content') }}">
                                <i class="material-icons opacity-10">content_copy</i>
                                <span>About Page Content</span>
                            </a>
                        </h3>
                    </div>
                    <div>
                        <h3>
                            <a class="nav-link {{ Request::is('features') ? 'active bg-info' : '' }}" href="{{ url('features') }}">
                                <i class="material-icons opacity-10">star_half</i>
                                <span>Why Us Features</span>
                            </a>
                        </h3>
                    </div>
                    <div>
                        <h3>
                            <a class="nav-link {{ Request::is('team') ? 'active bg-info' : '' }}" href="{{ url('team') }}">
                                <i class="material-icons opacity-10">groups</i>
                                <span>Team Member</span>
                            </a>
                        </h3>
                    </div>
                    <div>
                        <h3>
                            <a class="nav-link {{ Request::is('testimonials') ? 'active bg-info' : '' }}" href="{{ url('testimonials') }}">
                                <i class="material-icons opacity-10">quiz</i>
                                <span>Testimonials</span>
                            </a>
                        </h3>
                    </div>
                    <div>
                        <h3>
                            <a class="nav-link {{ Request::is('users') ? 'active bg-info' : '' }}" href="{{ url('users') }}">
                                <i class="material-icons opacity-10">group</i>
                                <span>Users</span>
                            </a>
                        </h3>
                    </div>
                </div>
            </div>
        </div>
</div>

@endsection

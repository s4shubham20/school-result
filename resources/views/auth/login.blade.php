@extends('layouts.app')

@section('content')
    <div class="container-fluid vh-100" id="bg-grad">
        <div class="row justify-content-center align-self-center">
            <div class="col-6 col-md-5 mt-5">
                <div class="mt-5">
                    <div class="card p-0 bg-light mt-5">
                        <div class="card-body">
                            <h2 class="text-center h3 fw-bold mt-4">Welcome back please login!</h2>
                            <form method="post" action="{{ route('login') }}" class="py-3 px-4">
                                <div class="col-12">
                                    <div class="form-group mb-3">
                                        <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                        <input type="text" name="email" id="email" class="form-control" placeholder="Enter your email here!"/>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                                        <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password here!"/>
                                    </div>
                                    <div class="d-grid my-4">
                                        <button class="btn btn-success fw-bold">Login</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

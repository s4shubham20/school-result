@extends('layouts.admin')
@section('content')
    <div class="page-wrapper">
        <div class="page-content">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body py-4">
                            <div class="d-flex align-items-center">
                                <h2 class="h3">Welcome back {{ Auth::user()->name }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Mirrored from codervent.com/synadmin/demo/vertical/index2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 22 Oct 2023 17:38:06 GMT -->
@endsection

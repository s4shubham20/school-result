@extends('layouts.admin')
@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <div class="row">
            <div class="col-12">
                <div class="card border-top border-0 border-4 border-primary">
                    <div class="card-header d-flex justify-content-between my-3 border-4">
                        <h5 class="m-0 text-primary">Subjects List</h5>
                        <a href="{{ route('subject.create') }}" class="btn btn-primary text-light fw-bold"><i class="bx bx-user-plus"></i>Add New Record</a>
                    </div>
                    <div class="card-body">
                        <div class="card border-top border-0 border-4 border-danger">
                            <div class="table-responsive">
                                <table class="table table-hover table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Subject Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($subjects as $key => $item)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $item->subject_name }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="{{ route('subject.edit',Crypt::encrypt($item->id)) }}" class="btn btn-info text-light"><i class="bx bx-edit"></i></a>
                                                    <form action="{{ route('subject.destroy', Crypt::encrypt($item->id)) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger ms-1" id="deleteAlert"><i class="bx bx-trash"></i></button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

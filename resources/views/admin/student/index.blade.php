@extends('layouts.admin')
@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <div class="row">
            <div class="col-12">
                <div class="card border-top border-0 border-4 border-primary">
                    <div class="card-header d-flex justify-content-between my-3 border-4">
                        <h5 class="m-0 text-primary">Students List</h5>
                        <a href="{{ route('student.create') }}" class="btn btn-primary text-light fw-bold"><i class="bx bx-user-plus"></i>Add New Record</a>
                    </div>
                    <div class="card-body">
                        <div class="card border-top border-0 border-4 border-danger">
                            <div class="table-responsive my-3 mx-1">
                                <table class="table table-hover table-striped table-bordered" id="myTable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Student Name</th>
                                            <th>Admission No</th>
                                            <th>Class</th>
                                            <th>Roll No</th>
                                            <th>DOB</th>
                                            <th>Father Name</th>
                                            <th>Mother Name</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($students as $key => $item)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <div class="recent-product-img">
                                                        <img src="{{ asset('storage/student-image/'.$item->profile_pic) }}" alt="">
                                                    </div>
                                                    <div class="ms-2">
                                                        {{ $item->name }}
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{ $item->admission_no }}</td>
                                            <td>{{ $item->class }}</td>
                                            <td>{{ $item->roll_no }}</td>
                                            <td>{{ $item->dob }}</td>
                                            <td>{{ $item->father_name }}</td>
                                            <td>{{ $item->mother_name }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="{{ route('student.edit',Crypt::encrypt($item->id)) }}" class="btn btn-info text-light"><i class="bx bx-edit"></i></a>
                                                    <a href="{{ route('result.show',Crypt::encrypt($item->id)) }}" class="btn btn-primary mx-2"><i class="lni lni-printer"></i></a>
                                                    <form action="{{ route('student.destroy',Crypt::encrypt($item->id)) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger" id="deleteAlert"><i class="bx bx-trash"></i></button>
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

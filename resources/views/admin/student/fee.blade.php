@extends('layouts.admin')
@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <div class="row">
            <div class="col-12">
                <div class="card border-top border-0 border-4 border-primary">
                    <div class="card-header my-2 border-4">
                        <div class="d-flex align-items-center">
                            <i class="bx bxs-user me-1 font-22 text-primary"></i>
                            <h5 class="m-0 text-primary">Students Fee List</h5>
                        </div>
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
                                            <th>Last Fee Paid</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($students as $key => $item)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->admission_no }}</td>
                                            <td>{{ $item->class }}</td>
                                            <td>{{ $item->roll_no }}</td>
                                            <td>{{ $item->dob }}</td>
                                            <td>
                                                @foreach ($item->fee as $key => $list)
                                                    @if($key == 0)
                                                        <b>Date::</b>{{ $list->created_at->format('d-M-Y') }}
                                                        <br/>
                                                        <b>Amount::</b>{{ $list->amount }}
                                                        <br/>
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    <a href="{{ route('student.fee.view.each',Crypt::encrypt($item->id)) }}" class="btn btn-success text-light fw-bold"><i class="bx bx-rupee mx-0"></i>Pay Fee</a>
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

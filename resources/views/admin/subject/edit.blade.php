@extends('layouts.admin')
@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <div class="row">
            <div class="col-12">
                <div class="card border-top border-0 border-4 border-primary">
                    <div class="card-header border-4 d-flex justify-content-between my-2">
                        <div class="d-flex align-items-center">
                            <i class="bx bxs-user me-1 font-22 text-primary"></i>
                            <h5 class="mb-0 text-primary">Edit Subject Details</h5>
                        </div>
                        <a href="{{ route('subject.index') }}" class="btn btn-primary"><i class="lni lni-eye"></i> View Records</a>
                    </div>
                    <div class="card-body">
                        <form class="row g-3" method="post" action="{{ route('subject.update', Crypt::encrypt($subject->id)) }}">
                            @csrf
                            @method('PATCH')
                            <div class="col-md-12">
                                <label for="subject_name" class="form-label">Subject Name<span class="text-danger fs-4">*</span></label>
                                <input type="text" class="form-control @error('subject_name') is-invalid @enderror" name="subject_name" id="subject_name" placeholder="Enter subject name here!" value="{{ old('subject_name', $subject->subject_name) }}"/>
                                @error('subject_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="d-grid col-md-4 m-auto mt-3">
                                <button class="btn btn-primary"><i class="bx bx-check-circle"></i>Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

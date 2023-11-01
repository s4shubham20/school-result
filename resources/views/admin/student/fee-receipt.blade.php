@extends('layouts.admin')
@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <div class="row">
            <div class="col-12">
                <div class="card border-top border-0 border-4 border-primary">
                    <div class="card-header d-flex justify-content-between my-2 border-4">
                        <div class="d-flex align-items-center">
                            <i class="bx bxs-user me-1 font-22 text-primary"></i>
                            <h5 class="m-0 text-primary">{{ $student->name }} Details</h5>
                        </div>
                        <button type="button" class="btn btn-success fw-bold py-1 px-3" data-bs-toggle="modal" data-bs-target="#feeModal">
                            <span class="parent-icon">
                                <i class="bx bx-rupee m-0"></i>
                            </span>
                            Pay Fee
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="row mb-4 fw-bold text-primary">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div>Student Name</div>
                                    </div>
                                    <div class="col-md-2">
                                        <div>:</div>
                                    </div>
                                    <div class="col-md-5">
                                        <div>{{ $student->name }}</div>
                                    </div>
                                    <div class="col-md-5">
                                        <div>Admission No.</div>
                                    </div>
                                    <div class="col-md-2">
                                        <div>:</div>
                                    </div>
                                    <div class="col-md-5">
                                        <div>{{ $student->admission_no }}</div>
                                    </div>
                                    <div class="col-md-5">
                                        <div>Course Fee</div>
                                    </div>
                                    <div class="col-md-2">
                                        <div>:</div>
                                    </div>
                                    <div class="col-md-5">
                                        <div>{{ $student->course_fee }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div>Roll No.</div>
                                    </div>
                                    <div class="col-md-2">
                                        <div>:</div>
                                    </div>
                                    <div class="col-md-5">
                                        <div>{{ $student->roll_no }}</div>
                                    </div>
                                    <div class="col-md-5">
                                        <div>DOB.</div>
                                    </div>
                                    <div class="col-md-2">
                                        <div>:</div>
                                    </div>
                                    <div class="col-md-5">
                                        <div>{{ date('d-M-Y', strtotime($student->dob)) }}</div>
                                    </div>
                                    <div class="col-md-5">
                                        <div>Remaing Amount</div>
                                    </div>
                                    <div class="col-md-2">
                                        <div>:</div>
                                    </div>
                                    @php
                                        $collection = collect($student->fee)->sum('amount');
                                    @endphp
                                    <div class="col-md-5">
                                        <div>{{ $student->course_fee - $collection }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card border-top border-0 border-4 border-danger">
                            <div class="table-responsive my-3">
                                <table class="table table-hover table-striped table-bordered" id="myTable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Receipt No.</th>
                                            <th>Date</th>
                                            <th>Pay Mode</th>
                                            <th>Amount Paid</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($student->fee as $key => $item)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $item->receipt_no }}</td>
                                            <td>{{ $item->created_at->format('d-M-Y') }}</td>
                                            <td>{{ $item->payment_mode }}</td>
                                            <td>{{ $item->amount }}</td>
                                            <td class="buttonPair">
                                                <a href="{{ route('print.fee.receipt',Crypt::encrypt($item->id)) }}" class="btn btn-primary printBtn">
                                                    <i class="lni lni-printer"></i>
                                                    Print Receipt
                                                </a>
                                                <button class="btn btn-primary loadingBtn d-none" type="button"><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                                    <span class="">Loading...</span>
                                                </button>
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
{{-- fee modal section --}}
<div class="modal fade" id="feeModal" tabindex="-1" aria-labelledby="feeModal" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header border-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="border: 3px solid #8833ff;"></button>
            </div>
            <div class="modal-body mb-4">
                <div class="card border-top border-0 border-4 border-success mx-4">
                    <div class="card-header border-4">
                        <div class="d-flex align-items-center">
                            <i class="bx bxs-user me-1 font-22 text-primary"></i>
                            <h5 class="mb-0 text-primary">{{ $student->name }} Fee Details</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('student.fee') }}" method="post">
                            @csrf
                            <input type="hidden" name="student_id" value="{{ Crypt::encrypt($student->id) }}"/>
                            <input type="hidden" name="admission_no" value="{{ $student->admission_no }}"/>
                            <div class="row my-4">
                                <div class="col-md-6">
                                    <label for="amount" class="form-lable">Fee Amount<span class="text-danger fs-4">*</span></label>
                                    <input type="text" name="amount" class="form-control @error('amount') is-invalid @enderror" id="amount" placeholder="Enter amount here!"/>
                                    @error('amount')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="payment_mode" class="form-lable">Payment Mode<span class="text-danger fs-4">*</span></label>
                                    <select name="payment_mode" class="form-control @error('payment_mode') is-invalid @enderror" id="payment_mode">
                                        <option value="Cash" {{ old('payment_mode') == 'Cash' ? "selected":"" }}>Cash</option>
                                        <option value="Paytm" {{ old('payment_mode') == 'Paytm' ? "selected":"" }}>Paytm</option>
                                        <option value="Google Pay" {{ old('payment_mode') == 'Google Pay' ? "selected":"" }}>Google Pay</option>
                                        <option value="Phone Pe" {{ old('payment_mode') == 'Phone Pe' ? "selected":"" }}>Phone Pe</option>
                                        <option value="IMPS" {{ old('payment_mode') == 'IMPS' ? "selected":"" }}>IMPS</option>
                                        <option value="NEFT" {{ old('payment_mode') == 'NEFT' ? "selected":"" }}>NEFT</option>
                                    </select>
                                    @error('payment_mode')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6 d-grid mt-4 m-auto">
                                    <button class="btn btn-success"><i class="bx bx-check-circle"></i>Submit</button>
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
@section('js')
    <script>
        const buttonPairs = document.querySelectorAll('.buttonPair');
        buttonPairs.forEach(function (pair) {
            const printBtn = pair.querySelector('.printBtn');
            const loadingBtn = pair.querySelector('.loadingBtn');

            printBtn.addEventListener('click', function () {
                printBtn.classList.add("d-none");
                loadingBtn.classList.remove("d-none");
            });
        });
    </script>
@endsection

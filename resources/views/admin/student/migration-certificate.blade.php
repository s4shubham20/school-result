@extends('layouts.admin')
@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <div class="row">
            <div class="col-12">
                <div class="card border-top border-0 border-4 border-success">
                    <div class="card-header d-flex justify-content-between my-2 border-4">
                        <div class="d-flex align-items-center">
                            <i class="bx bxs-user me-1 font-22 text-primary"></i>
                            <h5 class="mb-0 text-primary">Student Transfer Certificate</h5>
                        </div>
                        <a href="{{ route('student.index') }}" class="btn btn-primary"><i class="lni lni-eye"></i> View Records</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('student.certificate.store') }}" class="row" method="post">
                            @csrf
                            <input type="hidden" name="student_id" value="{{ $student->id }}"/>
                            <input type="hidden" name="transferId" value="{{ $student->transfer_certificate->id ?? "" }}"/>
                            <div class="col-md-6 mb-2">
                                <label for="admission_no" class="form-label mb-0">Admission File No.<span class="text-danger fs-4">*</span></label>
                                <input type="text" class="form-control @error('admission_no') is-invalid @enderror" name="admission_no" id="admission_no" placeholder="Enter admission no. here!" value="{{ $student->admission_no  }}" disabled/>
                                @error('admission_no')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="withdraw_file_no" class="form-label mb-0">Withdrawal File No.<span class="text-danger fs-4">*</span></label>
                                <input type="text" class="form-control @error('withdraw_file_no') is-invalid @enderror" name="withdraw_file_no" id="withdraw_file_no" placeholder="Enter withdrawal file no. here!" value="{{ $student->transfer_certificate->withdraw_file_no ?? ""  }}"/>
                                @error('withdraw_file_no')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="certificate_no" class="form-label mb-0">Transfer Certificate File No.<span class="text-danger fs-4">*</span></label>
                                <input type="text" class="form-control @error('certificate_no') is-invalid @enderror" name="certificate_no" id="certificate_no" placeholder="Enter student certificate no. here!" value="{{ old('certificate_no',$student->transfer_certificate->certificate_no ?? "") }}"/>
                                @error('certificate_no')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="title" class="form-label mb-0">Scholar's Name<span class="text-danger fs-4">*</span></label>
                                <div class="input-group">
                                    <select name="title" id="title" class="custom-input @error('title') is-invalid @enderror">
                                        <option value="Mr." {{ old('title', $student->transfer_certificate->name_title ?? "") == "Mr."?"selected":"" }}>Mr.</option>
                                        <option value="Miss" {{ old('title', $student->transfer_certificate->name_title ?? "") == "Miss"?"selected":"" }}>Miss</option>
                                    </select>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Enter name here!" value="{{ $student->name }}" disabled/>
                                </div>
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-2">
                                <label class="form-lable mb-0" for="occupation">Name ,Occupation and Address<span class="text-danger fs-4">*</span></label>
                                <input type="text" class="form-control @error('occupation') is-invalid @enderror" id="occupation" name="occupation" value="{{ old('occupation',$student->transfer_certificate->occupation ?? "") }}" placeholder="Enter Name ,Occupation and Address here!"/>
                                @error('occupation')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="form-lable mb-0" for="father_occupation">Date of Birth of Scholar's<span class="text-danger fs-4">*</span></label>
                                <input type="date" class="form-control" value="{{ $student->dob }}" disabled/>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="last_institution_name" class="form-label mb-0">Last Institution Name (if any)<span class="text-danger fs-4"></span></label>
                                <input type="text" class="form-control @error('last_institution_name') is-invalid @enderror" name="last_institution_name" id="last_institution_name" placeholder="Enter last institution name here!" value="{{ old('last_institution_name' ,$student->transfer_certificate->last_institution_name ?? "") }}"/>
                                @error('last_institution_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-2">
                                <label for="cast_or_religion" class="form-label mb-0">Cast Or Religion<span class="text-danger fs-4">*</span></label>
                                <input type="text" class="form-control @error('cast_or_religion') is-invalid @enderror" name="cast_or_religion" id="cast_or_religion" placeholder="Enter cast or religion here!" value="{{ old('cast_or_religion' ,$student->transfer_certificate->cast_or_religion ?? "") }}"/>
                                @error('cast_or_religion')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="mothername_title" class="form-label mb-0">Mother Name<span class="text-danger fs-4">*</span></label>
                                <div class="input-group">
                                    <select name="mothername_title" id="mothername_title" class="custom-input @error('mothername_title') is-invalid @enderror">
                                        <option value="Mrs." {{ old('mothername_title',$student->transfer_certificate->mothername_title ?? "") == "Mrs."?"selected":"" }}>Mrs.</option>
                                        <option value="Late" {{ old('mothername_title',$student->transfer_certificate->mothername_title ?? "") == "Late"?"selected":"" }}>Late</option>
                                    </select>
                                    <input type="text" class="form-control" value="{{ $student->mother_name  }}" disabled/>
                                </div>
                                @error('mothername_title')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="fathername_title" class="form-label mb-0">Father Name<span class="text-danger fs-4">*</span></label>
                                <div class="input-group">
                                    <select name="fathername_title" id="fathername_title" class="custom-input @error('fathername_title') is-invalid @enderror">
                                        <option value="Mr." {{ old('fathername_title',$student->transfer_certificate->fathername_title ?? "") == "Mr."?"selected":"" }}>Mr.</option>
                                        <option value="Late" {{ old('fathername_title',$student->transfer_certificate->fathername_title ?? "") == "Late"?"selected":"" }}>Late</option>
                                    </select>
                                    <input type="text" class="form-control"  value="{{ $student->father_name  }}" disabled/>
                                </div>
                                @error('fathername_title')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-2">
                                <label for="province_of_residence" class="form-label mb-0">Lenght of residence in this Province<span class="text-danger fs-4">*</span></label>
                                <input type="text" class="form-control @error('province_of_residence') is-invalid @enderror" name="province_of_residence" id="province_of_residence" placeholder="Enter Lenght of residence in this Province here!" value="{{ old('province_of_residence', $student->transfer_certificate->province_of_residence ?? "") }}"/>
                                @error('province_of_residence')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            @php
                            if(isset($student->transfer_certificate)){

                                $jsonData               = json_decode($student->transfer_certificate->class, true);
                                $year_or_session        = json_decode($student->transfer_certificate->year_or_session, true);
                                $date_of_admission      = json_decode($student->transfer_certificate->date_of_admission, true);
                                $date_of_promotion      = json_decode($student->transfer_certificate->date_of_promotion, true);
                                $date_of_removal        = json_decode($student->transfer_certificate->date_of_removal, true);
                                $conduct_or_concession  = json_decode($student->transfer_certificate->conduct_or_concession, true);
                                $work                   = json_decode($student->transfer_certificate->work, true);
                            }
                            @endphp
                            @isset($jsonData)
                                @foreach ($jsonData as $key => $item)
                                    <div class="rasmussen row pe-0">
                                        <hr class="border-2 m-0 my-2 border-danger opacity-100"/>
                                        <div class="col-md-6 mb-2 pe-0">
                                            <label for="class{{ $key }}" class="form-label mb-0">Class<span class="text-danger fs-4">*</span></label>
                                            <select class="form-select" name="class[]" id="class{{ $key }}">
                                                <option value="1st" {{ $item == "1st" ? "selected":"" }}>1st</option>
                                                <option value="2nd" {{ $item == "2nd" ? "selected":"" }}>2nd</option>
                                                <option value="3rd" {{ $item == "3rd" ? "selected":"" }}>3rd</option>
                                                <option value="4th" {{ $item == "4th" ? "selected":"" }}>4th</option>
                                                <option value="5th" {{ $item == "5th" ? "selected":"" }}>5th</option>
                                                <option value="6th" {{ $item == "6th" ? "selected":"" }}>6th</option>
                                                <option value="7th" {{ $item == "7th" ? "selected":"" }}>7th</option>
                                                <option value="8th" {{ $item == "8th" ? "selected":"" }}>8th</option>
                                                <option value="9th" {{ $item == "9th" ? "selected":"" }}>9th</option>
                                                <option value="10th" {{ $item == "10th" ? "selected":"" }}>10th</option>
                                                <option value="11th" {{ $item == "11th" ? "selected":"" }}>11th</option>
                                                <option value="12th" {{ $item == "12th" ? "selected":"" }}>12th</option>
                                            </select>
                                        </div>
                                        <div class="col-md-5 mb-2 pe-0">
                                            <label for="year_or_session{{ $key }}" class="form-label mb-0">Year Or Session<span class="text-danger fs-4">*</span></label>
                                            <input type="text" class="form-control" name="year_or_session[]" id="year_or_session{{ $key }}" placeholder="Enter year or session here!" value="{{ $year_or_session[$key] ?? "" }}"/>
                                        </div>
                                        <div class="col-md-1 mt-4 pe-0">
                                            <button type="button" id="removeButton{{ $key }}" onclick="removeFunction();" class="btn mt-2 btn-danger text-light"><i class="lni lni-circle-minus"></i></button>
                                        </div>
                                        <div class="col-md-4 mb-2 pe-0">
                                            <label for="date_of_admission{{ $key }}" class="form-label mb-0">Date Of Admission <span class="text-danger fs-4">*</span></label>
                                            <input type="date" class="form-control" name="date_of_admission[]" id="date_of_admission{{ $key }}" value="{{ $date_of_admission[$key] ?? "" }}"/>
                                        </div>
                                        <div class="col-md-4 mb-2 pe-0">
                                            <label for="date_of_promotion{{ $key }}" class="form-label mb-0">Date Of Promotion <span class="text-danger fs-4">*</span></label>
                                            <input type="date" class="form-control" name="date_of_promotion[]" id="date_of_promotion{{ $key }}" value="{{ $date_of_promotion[$key] ?? "" }}"/>
                                        </div>
                                        <div class="col-md-4 mb-2 pe-0">
                                            <label for="date_of_removal{{ $key }}" class="form-label mb-0">Date Of Removal <span class="text-danger fs-4">*</span></label>
                                            <input type="date" class="form-control" name="date_of_removal[]" id="date_of_removal{{ $key }}" value="{{ $date_of_removal[$key] ?? "" }}"/>
                                        </div>
                                        <div class="col-md-6 mb-2 pe-0">
                                            <label for="conduct_or_concession{{ $key }}" class="form-label mb-0">Conduct & concession if any fees<span class="text-danger fs-4"></span></label>
                                            <input type="text" class="form-control" name="conduct_or_concession[]" id="conduct_or_concession{{ $key }}" placeholder="Enter Conduct & concession if any fees here!" value="{{ $conduct_or_concession[$key] ?? "" }}"/>
                                        </div>
                                        <div class="col-md-6 mb-2 pe-0">
                                            <label for="work{{ $key }}" class="form-label mb-0">Work<span class="text-danger fs-4">*</span></label>
                                            <input type="text" class="form-control @error('work') is-invalid @enderror" name="work[]" id="work{{ $key }}" placeholder="Enter work here!" value="{{ $work[$key] ?? "" }}"/>
                                        </div>
                                    </div>
                                @endforeach
                            @endisset
                            <div id="newRow"></div>
                            <hr class="border-2 m-0 my-2 border-danger opacity-100"/>
                            <div class="col-md-6 mb-2">
                                <label for="class" class="form-label mb-0">Class<span class="text-danger fs-4">*</span></label>
                                <select class="form-select" name="class[]" id="class">
                                    <option value="1st">1st</option>
                                    <option value="2nd">2nd</option>
                                    <option value="3rd">3rd</option>
                                    <option value="4th">4th</option>
                                    <option value="5th">5th</option>
                                    <option value="6th">6th</option>
                                    <option value="7th">7th</option>
                                    <option value="8th">8th</option>
                                    <option value="9th">9th</option>
                                    <option value="10th">10th</option>
                                    <option value="11th">11th</option>
                                    <option value="12th">12th</option>
                                </select>
                            </div>
                            <div class="col-md-5 mb-2">
                                <label for="year_or_session" class="form-label mb-0">Year Or Session<span class="text-danger fs-4">*</span></label>
                                <input type="text" class="form-control" name="year_or_session[]" id="year_or_session" placeholder="Enter year or session here!"/>
                            </div>
                            <div class="col-md-1 mt-4">
                                <button type="button" onclick="appendButton('');" class="btn mt-2 btn-info text-light"><i class="lni lni-circle-plus"></i></button>
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="date_of_admission" class="form-label mb-0">Date Of Admission <span class="text-danger fs-4">*</span></label>
                                <input type="date" class="form-control" name="date_of_admission[]" id="date_of_admission"/>
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="date_of_promotion" class="form-label mb-0">Date Of Promotion <span class="text-danger fs-4">*</span></label>
                                <input type="date" class="form-control" name="date_of_promotion[]" id="date_of_promotion"/>
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="date_of_removal" class="form-label mb-0">Date Of Removal <span class="text-danger fs-4">*</span></label>
                                <input type="date" class="form-control" name="date_of_removal[]" id="date_of_removal"/>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="conduct_or_concession" class="form-label mb-0">Conduct & concession if any fees<span class="text-danger fs-4"></span></label>
                                <input type="text" class="form-control" name="conduct_or_concession[]" id="conduct_or_concession" placeholder="Enter Conduct & concession if any fees here!"/>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="work" class="form-label mb-0">Work<span class="text-danger fs-4">*</span></label>
                                <input type="text" class="form-control @error('work') is-invalid @enderror" name="work[]" id="work" placeholder="Enter work here!"/>
                            </div>

                            <div class="col-md-6 my-3">
                                <button class="btn btn-primary"><i class="bx bx-check-circle"></i>Submit</button>
                                @isset($student->transfer_certificate->id)
                                    <a href="{{ route('student.certificate.view', Crypt::encrypt($student->id)) }}" class="btn btn-success ms-2"><i class="bx bx-download"></i>Download Transfer Certificate</a>
                                @endisset
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
        const appendButton = () => {
            let newRow = document.querySelector("#newRow");
            if (newRow) {
                // Create a new element (e.g., a div)
                let newElement = document.createElement("div");
                newElement.className = "row";
                newElement.innerHTML = `<hr class="border-2 m-0 my-2 border-danger opacity-100"><div class="mb-2 col-md-6"><label class="form-label mb-0" for=class>Class<span class="fs-4 text-danger">*</span></label> <select class="form-select"id=class name=class[]><option value=1st>1st<option value=2nd>2nd<option value=3rd>3rd<option value=4th>4th<option value=5th>5th<option value=6th>6th<option value=7th>7th<option value=8th>8th<option value=9th>9th<option value=10th>10th<option value=11th>11th<option value=12th>12th</select></div><div class="mb-2 col-md-5"><label class="form-label mb-0"for=year_or_session>Year Or Session<span class="fs-4 text-danger">*</span></label> <input class=form-control id=year_or_session name=year_or_session[] placeholder="Enter year or session here!"></div><div class="col-md-1 mt-4"><button class="btn btn-danger text-light mt-2" type="button" id="removeButton"><i class="lni lni-circle-minus"></i></button></div><div class="mb-2 col-md-4"><label class="form-label mb-0"for=date_of_admission>Date Of Admission <span class="fs-4 text-danger">*</span></label> <input class=form-control id=date_of_admission name=date_of_admission[] type=date></div><div class="mb-2 col-md-4"><label class="form-label mb-0"for=date_of_promotion>Date Of Promotion <span class="fs-4 text-danger">*</span></label> <input class=form-control id=date_of_promotion name=date_of_promotion[] type=date></div><div class="mb-2 col-md-4"><label class="form-label mb-0"for=date_of_removal>Date Of Removal <span class="fs-4 text-danger">*</span></label> <input class=form-control id=date_of_removal name=date_of_removal[] type=date></div><div class="mb-2 col-md-6"><label class="form-label mb-0"for=conduct_or_concession>Conduct & concession if any fees<span class="fs-4 text-danger"></span></label> <input class=form-control id=conduct_or_concession name=conduct_or_concession[] placeholder="Enter Conduct & concession if any fees here!"></div><div class="mb-2 col-md-6"><label class="form-label mb-0"for=work>Work<span class="fs-4 text-danger">*</span></label> <input class=form-control id=work name=work[] placeholder="Enter work here!"></div>`;
                newRow.appendChild(newElement);
                let removeButton = newElement.querySelector("#removeButton");
                removeButton.addEventListener("click", () => {
                    newRow.removeChild(newElement);
                });
            }
        }


        const removeFunction = (key) => {
            let rasmussen = document.querySelector(".rasmussen");
            let removeButton = document.querySelector("#removeButton");
                rasmussen.remove();
        }
    </script>
@endsection

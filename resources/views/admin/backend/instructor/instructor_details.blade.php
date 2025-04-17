@extends('admin.admin_dashboard')

@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Instructor Details</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Instructor Details</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="container">
        <div class="main-body">
            <div class="row">
                <div class="col-lg-6">
                <div class="card">
                            <div class="card-body">
                                <div class="row mb-3">
                                    <h4 class="pb-2"><strong>Education Background</strong></h4>
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Degree</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <strong>{{ $instructor->degree }}</strong>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Field of Study</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <strong>{{ $instructor->field_of_study }}</strong>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">University Name</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <strong>{{ $instructor->university_name }}</strong>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Graduation Year</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <strong>{{ $instructor->graduation_year }}</strong>
                                    </div>
                                </div>
                            </div>

                    </div>

                </div>
                <div class="col-lg-6">
                    <div class="card">

                            <div class="card-body">
                                <div class="row mb-3">
                                    <h4 class="pb-2"><strong>Teaching Experience</strong></h4>
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Organization Name</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <strong>{{ $instructor->organization_name }}</strong>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Position/Role</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <strong>{{ $instructor->position }}</strong>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Subject Taught</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <strong>{{ $instructor->subject_taught }}</strong>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Start Date</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <strong>{{ $instructor->start_date }}</strong>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">End Date</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <strong>{{ $instructor->end_date }}</strong>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Description</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <strong>{{ $instructor->description }}</strong>
                                    </div>
                                </div>
                            </div>

                    </div>

                </div>
                <div class="col-lg-6">
                    <div class="card">

                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Language</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <strong>{{ $instructor->languageCategory->category_name }}</strong>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Curriculum Vitae</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <a href="{{ asset($instructor->curriculum_vitae) }}" class="btn btn-block btn-info" target="_blank">View CV</a>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Status</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{-- @if($user->status == '0') --}}

                                        <form method="post" action="{{ route('instructor.approve', $instructor->instructor_id) }}" style="display:inline;">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-block btn-warning">Approved</button>
                                        </form>

                                        <form method="post" action="{{ route('instructor.rejected', $instructor->instructor_id) }}" style="display:inline;">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-block btn-danger">Rejected</button>
                                        </form>

                                        {{-- @elseif($user->status == '1') --}}
                                            {{-- <a href="" class="btn btn-block btn-success">Confirm Order</a> --}}
                                        {{-- @endif --}}
                                    </div>
                                </div>
                            </div>

                    </div>

                </div>


            </div>
        </div>
    </div>
</div>

@endsection

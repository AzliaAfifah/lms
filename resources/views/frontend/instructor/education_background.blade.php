@extends('frontend.master')
@section('home')
<!-- ================================
    START BREADCRUMB AREA
================================= -->
<section class="breadcrumb-area section-padding img-bg-2">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-content d-flex flex-wrap align-items-center justify-content-between">
                    <div class="section-heading">
                        <h2 class="section__title text-white">Instructor Register</h2>
                    </div>
                    <ul class="generic-list-item generic-list-item-white generic-list-item-arrow d-flex flex-wrap align-items-center">
                        <li><a href="index.html">Home</a></li>
                        <li>Pages</li>
                        <li>Instructor Register</li>
                    </ul>
                </div><!-- end breadcrumb-content -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end breadcrumb-area -->
<!-- ================================
    END BREADCRUMB AREA
================================= -->

<!--======================================
        START REGISTER AREA
======================================-->
<section class="register-area section--padding dot-bg overflow-hidden">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="register-heading-content-wrap text-center">
                    <div class="section-heading">
                        <h2 class="section__title">Fill Up this Form to Join with Us</h2>
                    </div><!-- end section-heading -->
                </div>
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
        <div class="row pt-50px">
            <div class="col-lg-10 mx-auto">
                <div class="card card-item">
                    <div class="card-body">
                        <h4><strong>Education Background</strong></h4>
                        <form method="POST" action="{{ route('store.education.background') }}" class="row" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="instructor_id" value="{{ $instructorId }}">
                            {{-- <input type="text" name="instructor_id" value="{{ $instructor }}"> --}}
                            <div class="input-box col-lg-6">
                                <label class="label-text">Highest Degree Obtained</label>
                                <div class="form-group">
                                    <div class="select-container w-auto">
                                        <select class="select-container-select" name="degree">
                                            <option selected="">Select Degree</option>
                                            <option value="High School Diploma">High School Diploma</option>
                                            <option value="Associate Degree">Associate Degree</option>
                                            <option value="Bachelor's Degree">Bachelor's Degree</option>
                                            <option value="Master's Degree">Master's Degree</option>
                                            <option value="Doctorate">Doctorate</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>
                                </div>
                            </div><!-- end input-box -->
                            <div class="input-box col-lg-6">
                                <label class="label-text">Field of Study</label>
                                <div class="form-group">
                                    <input class="form-control form--control" type="text" name="field_of_study" placeholder="e.g., Computer Science, Education, English Literature">
                                    <span class="la la-user input-icon"></span>
                                </div>
                            </div><!-- end input-box -->
                            <div class="input-box col-lg-6">
                                <label class="label-text">University/Institution Name</label>
                                <div class="form-group">
                                    <input class="form-control form--control" type="text" name="university_name" placeholder="e.g., Harvard University">
                                    <span class="la la-user input-icon"></span>
                                </div>
                            </div><!-- end input-box -->
                            <div class="input-box col-lg-6">
                                <label class="label-text">Graduation Year</label>
                                <div class="form-group">
                                    <div class="select-container w-auto">
                                        <select class="select-container-select" name="graduation_year">
                                            <option value="">Select Year</option>
                                            <option value="2000">2000</option>
                                            <option value="2001">2001</option>
                                            <option value="2002">2002</option>
                                            <option value="2003">2003</option>
                                            <option value="2004">2004</option>
                                            <option value="2005">2005</option>
                                            <option value="2006">2006</option>
                                            <option value="2007">2007</option>
                                            <option value="2008">2008</option>
                                            <option value="2009">2009</option>
                                            <option value="2010">2010</option>
                                            <option value="2011">2011</option>
                                            <option value="2012">2012</option>
                                            <option value="2013">2013</option>
                                            <option value="2014">2014</option>
                                            <option value="2015">2015</option>
                                            <option value="2016">2016</option>
                                            <option value="2017">2017</option>
                                            <option value="2018">2018</option>
                                            <option value="2019">2019</option>
                                            <option value="2020">2020</option>
                                            <option value="2021">2021</option>
                                            <option value="2022">2022</option>
                                            <option value="2023">2023</option>
                                            <option value="2024">2024</option>
                                            <option value="2025">2025</option>
                                        </select>
                                    </div>
                                </div>
                            </div><!-- end input-box -->
                            <div class="col-lg-12 pt-4">
                                <h4><strong>Teaching Experience</strong></h4>
                                <h6 style="padding-bottom: 1rem; padding-top: 1rem">Fill this if you have relevant teaching experience</h6>
                            </div>
                            <div class="input-box col-lg-6">
                                <label class="label-text">Institution/Organization Name</label>
                                <div class="form-group">
                                    <input class="form-control form--control" type="text" name="organization_name" placeholder="e.g., Computer Science, Education, English Literature">
                                    <span class="la la-user input-icon"></span>
                                </div>
                            </div><!-- end input-box -->
                            <div class="input-box col-lg-6">
                                <label class="label-text">Position/Role</label>
                                <div class="form-group">
                                    <input class="form-control form--control" type="text" name="position" placeholder="e.g., Harvard University">
                                    <span class="la la-user input-icon"></span>
                                </div>
                            </div><!-- end input-box -->
                            <div class="input-box col-lg-6">
                                <label class="label-text">Subject Taught</label>
                                <div class="form-group">
                                    <input class="form-control form--control" type="text" name="subject_taught" placeholder="e.g., Math Teacher">
                                    <span class="la la-user input-icon"></span>
                                </div>
                            </div><!-- end input-box -->
                            <div class="input-box col-lg-6">
                                <label class="label-text">Years of Experience</label>
                                <div class="form-group">
                                    <input class="form-control form--control" type="number" name="years_experience" placeholder="e.g., Math Teacher">
                                    <span class="la la-user input-icon"></span>
                                </div>
                            </div><!-- end input-box -->
                            <div class="input-box col-lg-6">
                                <label class="label-text">Start Date</label>
                                <div class="form-group">
                                    <input class="form-control form--control" type="date" name="start_date" placeholder="e.g., Math Teacher">
                                    <span class="la la-user input-icon"></span>
                                </div>
                            </div><!-- end input-box -->
                            <div class="input-box col-lg-6">
                                <label class="label-text">End Date</label>
                                <div class="form-group">
                                    <input class="form-control form--control" type="date" name="end_date" placeholder="e.g., Math Teacher">
                                    <span class="la la-user input-icon"></span>
                                </div>
                            </div><!-- end input-box -->
                            <div class="input-box col-lg-12">
                                <label class="label-text">Description</label>
                                <div class="form-group">
                                    <textarea class="form-control form--control" type="text" rows="10" name="description" placeholder="e.g., Math Teacher"></textarea>
                                    <span class="la la-user input-icon"></span>
                                </div>
                            </div><!-- end input-box -->

                            <div class="input-box col-lg-12 pt-4">
                                <h4><strong>Additional Information</strong></h4>
                                <label class="label-text">Which language do you intend to tutor in? (You may only select one language)</label>
                                <div class="form-group d-flex align-items-center">
                                    @foreach ($categories as $item)
                                    <div class="custom-control custom-radio fs-15 mr-3">
                                        <input type="radio" class="custom-control-input" name="language" id="{{ $item->id }}RadioCheck" name="radio-stacked" required>
                                        <label class="custom-control-label custom--control-label" for="{{ $item->id }}RadioCheck">{{ $item->category_name }}</label>
                                    </div>
                                    @endforeach
                                </div>
                            </div><!-- end input-box -->
                            <div class="input-box col-lg-12">
                                <label class="label-text">Upload CV (The CV must be a PDF file)</label>
                                <div class="form-group">
                                    <input type="file" name="curriculum_vitae" class="form-control form--control">
                                </div>
                            </div><!-- end input-box -->

                            <div class="btn-box col-lg-12">
                                <div class="custom-control custom-checkbox mb-4 fs-15">
                                    <input type="checkbox" class="custom-control-input" id="agreeCheckbox" required>
                                    <label class="custom-control-label custom--control-label" for="agreeCheckbox">by signing i agree to the
                                        <a href="terms-and-conditions.html" class="text-color hover-underline">terms and conditions</a> and
                                        <a href="privacy-policy.html" class="text-color hover-underline">privacy policy</a>
                                    </label>
                                </div><!-- end custom-control -->
                                <button class="btn theme-btn" type="submit">Submit <i class="la la-arrow-right icon ml-1"></i></button>
                            </div><!-- end btn-box -->
                        </form>
                    </div><!-- end card-body -->
                </div><!-- end card -->
            </div><!-- end col-lg-10 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end register-area -->

@endsection



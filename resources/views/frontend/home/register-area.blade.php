<section class="register-area section-padding dot-bg overflow-hidden">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-item">
                    <div class="card-body">
                        <h3 class="fs-24 font-weight-semi-bold pb-2">Give your Feedback to Our Course</h3>
                        <div class="divider"><span></span></div>
                        <form method="post">
                        <div style="display: flex;">
                            <div class="col-lg-6">
                                <div class="input-box">
                                    <label class="label-text">Name</label>
                                    <div class="form-group">
                                        <input class="form-control form--control" type="text" name="name" placeholder="Your Name">
                                        <span class="la la-user input-icon"></span>
                                    </div>
                                </div><!-- end input-box -->
                                <div class="input-box">
                                    <label class="label-text">Email</label>
                                    <div class="form-group">
                                        <input class="form-control form--control" type="email" name="email" placeholder="Email Address">
                                        <span class="la la-envelope input-icon"></span>
                                    </div>
                                </div><!-- end input-box -->
                            </div>   
                            <div class="col-lg-6">
                                <div class="input-box">
                                    <label class="label-text">Phone Number</label>
                                    <div class="form-group">
                                        <input class="form-control form--control" type="text" name="phone" placeholder="Phone Number">
                                        <span class="la la-phone input-icon"></span>
                                    </div>
                                </div><!-- end input-box -->
                                <div class="input-box">
                                    <label class="label-text">Who Are You?</label>
                                    <div class="form-group">
                                        <select class="form-control form--control" name="position">
                                            <option value="">Select Your Position</option>
                                            <option value="Student">Student</option>
                                            <option value="Instructor">Instructor</option>
                                        </select>
                                        <span class="la la-user input-icon"></span>
                                    </div>
                                </div><!-- end input-box -->
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="input-box">
                                <label class="label-text">Message</label>
                                <div class="form-group">
                                    <textarea class="form-control" type="text" rows="10" name="subject" placeholder="Write Message"></textarea>
                                    {{-- <span class="la la-book input-icon"></span> --}}
                                </div>
                            </div><!-- end input-box -->
                        </div>
                        
                            <div class="btn-box pt-2">
                                <button class="btn theme-btn" type="submit">Submit</button>
                            </div><!-- end btn-box -->
                        </form>
                    </div><!-- end card-body -->
                </div><!-- end card -->
            </div><!-- end col-lg-5 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end register-area -->
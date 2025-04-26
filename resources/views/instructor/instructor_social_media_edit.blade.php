@extends('instructor.instructor_dashboard')

@section('instructor')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Edit Instructor Profile</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Instructor Profile</li>
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

                    <div class="col-lg-8">
                        <div class="card">
                            <form method="POST" action="{{ route('instructor.social.media.update', $media->id) }}" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Platform</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <select class="form-control" name="platform" id="socialMediaSelect">
                                                <option value="facebook" data-icon="fab fa-facebook" {{ $media->platform == 'facebook' ? 'selected' : '' }}>Facebook</option>
                                                <option value="instagram" data-icon="fab fa-instagram" {{ $media->platform == 'instagram' ? 'selected' : '' }}>Instagram</option>
                                                <option value="linkedin" data-icon="fab fa-linkedin" {{ $media->platform == 'linkedin' ? 'selected' : '' }}>LinkedIn</option>
                                                <option value="tiktok" data-icon="fab fa-tiktok" {{ $media->platform == 'tiktok' ? 'selected' : '' }}>TikTok</option>
                                                <option value="github" data-icon="fab fa-github" {{ $media->platform == 'github' ? 'selected' : '' }}>GitHub</option>
                                                <option value="youtube" data-icon="fab fa-youtube" {{ $media->platform == 'youtube' ? 'selected' : '' }}>YouTube</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">URL</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="url" class="form-control" value="{{ $media->url }}"/>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="submit" class="btn btn-primary px-4" value="Save Changes" />
                                        </div>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>



    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>

    <script>
        $('#socialMediaSelect').select2({
            templateResult: formatIcon,
            templateSelection: formatIcon
        });

        function formatIcon(state) {
            if (!state.id) return state.text; // untuk placeholder
            const iconClass = $(state.element).data('icon');
            return $(`<span><i class="${iconClass}" style="margin-right:8px;"></i>${state.text}</span>`);
        }
    </script>
@endsection

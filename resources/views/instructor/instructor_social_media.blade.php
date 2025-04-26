@extends('instructor.instructor_dashboard')

@section('instructor')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Instructor Profile</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Instructor Profile</li>
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
                            <form method="POST" action="{{ route('instructor.social.media.store') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Platform</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <select class="form-control" name="platform" id="socialMediaSelect">
                                                <option value="facebook" data-icon="fab fa-facebook">Facebook</option>
                                                <option value="instagram" data-icon="fab fa-instagram">Instagram</option>
                                                <option value="linkedin" data-icon="fab fa-linkedin">LinkedIn</option>
                                                <option value="tiktok" data-icon="fab fa-tiktok">TikTok</option>
                                                <option value="github" data-icon="fab fa-github">GitHub</option>
                                                <option value="youtube" data-icon="fab fa-youtube">YouTube</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">URL</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="url" class="form-control" />
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

                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Icon</th>
                                        <th>Platform</th>
                                        <th>URL</th >
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $icons = [
                                            'facebook' => 'fab fa-facebook',
                                            'instagram' => 'fab fa-instagram',
                                            'linkedin' => 'fab fa-linkedin',
                                            'tiktok' => 'fab fa-tiktok',
                                            'github' => 'fab fa-github',
                                            'youtube' => 'fab fa-youtube',
                                        ];
                                    @endphp

                                    @foreach ($media as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td><i class="{{ $icons[$item->platform] ?? '' }}"></td>
                                            <td>{{ $item->platform }}</td>
                                            <td>{{  $item->url }}</td>
                                            <td>
                                                <a href="{{ route('instructor.social.media.edit', $item->id) }}" class="btn btn-info"
                                                    title="Edit"><i class="lni lni-eraser"></i> </a>
                                                <a href="{{ route('instructor.social.media.delete', $item->id) }}" class="btn btn-danger"
                                                    title="Delete" id="delete"><i class="lni lni-trash"></i> </a>
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

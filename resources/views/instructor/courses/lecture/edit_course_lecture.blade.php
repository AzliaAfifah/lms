@extends('instructor.instructor_dashboard')

@section('instructor')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<div class="page-content">
     <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Lecture Course</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <a href="{{ route('add.course.lecture',['id' => $clecture->course_id]) }}" class="btn btn-primary px-5">Back</a>
            </div>
        </div>
    </div>
    <!--end breadcrumb-->

    <div class="card">
        <div class="card-body p-4">
            <h5 class="mb-4">Edit Lecture</h5>
            <form id="myForm" action="{{ route('update.course.lecture') }}" method="POST" class="row g-3" enctype="multipart/form-data">
            @csrf

            <input type="hidden" name="id" value="{{ $clecture->id }}">

                <div class="form-group col-md-12">
                    <label class="form-label">Lecture Title</label>
                    <input type="text" name="lecture_title" class="form-control" value="{{ $clecture->lecture_title }}">
                </div>
                {{-- <div class="form-group col-md-6">
                    <label class="form-label">Video Url</label>
                    <input type="text" name="url" class="form-control" value="{{ $clecture->url }}">
                </div>
                <div class="form-group col-md-6">
                    <label class="form-label">File Video</label>
                    <input type="file" name="video" class="form-control" value="{{ $clecture->video }}">
                </div>
                @if ($clecture->video)
                    <small class="text-muted">Current video: {{ basename($clecture->video) }}</small>
                @endif --}}
                <div class="form-group col-md-6">
                    <label class="form-label">Video Type</label>
                    <select name="video_type" class="form-control" onchange="toggleVideoInput(this.value)">
                        <option value="url" {{ $clecture->url ? 'selected' : '' }}>YouTube URL</option>
                        <option value="file" {{ $clecture->video ? 'selected' : '' }}>Upload File</option>
                    </select>
                </div>

                <div id="video_url_input" class="form-group col-md-6" style="{{ $clecture->url ? '' : 'display:none;' }}">
                    <label class="form-label">Video URL</label>
                    <input type="text" name="url" class="form-control" value="{{ $clecture->url }}">
                </div>

                <div id="video_file_input" class="form-group col-md-6" style="{{ $clecture->video ? '' : 'display:none;' }}">
                    <label class="form-label">Upload Video</label>
                    <input type="file" name="video" class="form-control">
                    @if ($clecture->video)
                        <small class="text-muted">Current video: {{ basename($clecture->video) }}</small>
                    @endif
                </div>

                <script>
                    function toggleVideoInput(type) {
                        document.getElementById('video_url_input').style.display = type === 'url' ? '' : 'none';
                        document.getElementById('video_file_input').style.display = type === 'file' ? '' : 'none';
                    }
                </script>
                <div class="form-group col-md-12">
                    <label class="form-label">Lecture Content</label>
                    <textarea name="content" class="form-control">{{ $clecture->content }}</textarea>
                </div>
                <div class="col-md-12">
                    <div class="d-md-flex d-grid align-items-center gap-3">
                        <button type="submit" class="btn btn-primary px-4">Save Changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

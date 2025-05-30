@extends('admin.admin_dashboard')

@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<style>
    .large-checkbox {
        transform: scale(1.5);
    }
</style>

<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    {{-- <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li> --}}
                    <li class="breadcrumb-item active" aria-current="page">All Pending Comment</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
        </div>
    </div>
    <!--end breadcrumb-->

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Blog Name</th>
                            <th>Username</th>
                            <th>Comment</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($comment as $key=>$item)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $item['blog']['post_title'] }}</td>
                            <td>{{ $item['user']['name'] }}</td>
                            <td>{{ $item->comment }}</td>
                            <td>
                                <div class="form-check-danger form-check form-switch">
                                    <input class="form-check-input status-toggle-comment large-checkbox" type="checkbox" id="flexSwitchCheckCheckedDanger" data-comment-id="{{ $item->id }}" {{ $item->status ? 'checked' : '' }} >
                                    <label class="form-check-label" for="flexSwitchCheckCheckedDanger"></label>
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

<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    {{-- <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li> --}}
                    <li class="breadcrumb-item active" aria-current="page">All Pending Reply</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
        </div>
    </div>
    <!--end breadcrumb-->

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Blog Name</th>
                            <th>Username</th>
                            <th>Comment</th>
                            <th>Reply</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reply as $key=>$item)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $item['blog']['post_title'] }}</td>
                            <td>{{ $item['user']['name'] }}</td>
                            <td>{{ $item['comment']['comment'] }}</td>
                            <td>{{ $item->reply }}</td>
                            <td>
                                <div class="form-check-danger form-check form-switch">
                                    <input class="form-check-input status-toggle-reply large-checkbox" type="checkbox" id="flexSwitchCheckCheckedDanger" data-reply-id="{{ $item->id }}" {{ $item->status ? 'checked' : '' }} >
                                    <label class="form-check-label" for="flexSwitchCheckCheckedDanger"></label>
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


<script>
    $(document).ready(function() {
        $('.status-toggle-comment').on('change', function(){
            var commentId = $(this).data('comment-id');
            var isChecked = $(this).is(':checked') ? 1 : 0;

            // send an ajax request to update status
            $.ajax({
                url: "{{ route('update.comment.status') }}",
                method: 'POST',
                data: {
                    comment_id : commentId,
                    is_checked : isChecked ? 1 : 0,
                    _token: "{{ csrf_token() }}"
                },
                success: function(response){
                    toastr.success(response.message);
                },
                error: function(error){
                    console.log(error);
                }
            })
        });
    })
</script>

<script>
    $(document).ready(function() {
        $('.status-toggle-reply').on('change', function(){
            var replyId = $(this).data('reply-id');
            var isChecked = $(this).is(':checked') ? 1 : 0;

            // send an ajax request to update status
            $.ajax({
                url: "{{ route('update.reply.status') }}",
                method: 'POST',
                data: {
                    reply_id : replyId,
                    is_checked : isChecked ? 1 : 0,
                    _token: "{{ csrf_token() }}"
                },
                success: function(response){
                    toastr.success(response.message);
                },
                error: function(error){
                    console.log(error);
                }
            })
        });
    })
</script>

@endsection



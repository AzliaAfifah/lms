@extends('frontend.dashboard.user_dashboard')
@section('userdashboard')



<div class="dashboard-heading mb-5">
    <h3 class="fs-22 font-weight-semi-bold">Quiz Attempts</h3>
</div>
<div class="table-responsive pb-4">
    <table class="table generic-table">
        <thead>
            <p class="fs-14 pt-2">{{ count($quizResult) }} quiz results</p><br>
        <tr>
            <th scope="col">Course Title</th>
            <th scope="col">Questions</th>
            <th scope="col">Correct Answer</th>
            <th scope="col">Wrong Answer</th>
            <th scope="col">Score</th>
            {{-- <th scope="col">Review</th> --}}
        </tr>
        </thead>
        <tbody>
            @foreach ($quizResult as $item)
            <tr>
                <th scope="row">
                    <ul class="generic-list-item">
                        <li>
                            <span>{{ \Carbon\Carbon::parse($item->created_at)->format('F d, Y h:i a') }}</span>
                        </li>
                        <li>
                            <a href="course-details.html" class="text-black">{{ $item['course']['course_title'] }}</a>
                        </li>
                    </ul>
                </th>
                <td>
                    <ul class="generic-list-item">
                        <li>{{ $total_questions->where('course_id', $item->course_id)->first()?->total_questions ?? 0 }}</li>
                    </ul>
                </td>
                <td>
                    <ul class="generic-list-item">
                        <li>{{ $item->score }}</li>
                    </ul>
                </td>
                <td>
                    <ul class="generic-list-item">
                        <li>{{ round($item->wrong_answers,'2') }}</li>
                    </ul>
                </td>
                <td>
                    <ul class="">
                        <div class="progress-circle" style="background: conic-gradient(
                            #4caf50 {{ round($item->correct_answers) }}%,
                            #e0e0e0 0
                        );">
                            <li class="score-text">{{ round($item->correct_answers) }}%</li>
                        </div>
                    </ul>
                </td>
                <style>
                    .progress-circle {
                        width: 80px;
                        height: 80px;
                        border-radius: 50%;
                        position: relative;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                    }

                    .progress-circle::before {
                        content: "";
                        width: 60px;
                        height: 60px;
                        background: white;
                        border-radius: 50%;
                        position: absolute;
                    }

                    .score-text {
                        position: absolute;
                        font-size: 15px;
                        font-weight: bold;
                        justify-self: center;
                        align-self: center;
                        color: #7f8897;
                        line-height: 24px;
                    }
                    </style>
                {{-- <td>
                    <ul class="generic-list-item">
                        <a href="" style="background: #2ea59d; border-color: #2ea59d;" class="btn btn-primary">See Review</a>
                    </ul>
                </td> --}}
            </tr>
            @endforeach

        </tbody>
    </table>
</div>
<div class="text-center py-3">
    <nav aria-label="Page navigation example" class="pagination-box">
        {{ $quiz->links('vendor.pagination.custom') }}
    </nav>
</div>
@endsection

@extends('frontend.master')

@section('home')


<style>
    .container-result {
        justify-self: center;
        align-self: center;
        text-align: center;
        margin:80px;
        padding:80px;
    }

    .container-result h2 {
        font-size: 50px;
    }

    .container-result p {
        font-size: 20px;
    }

    .container-result a {
        padding: 10px;
        font-weight: bold;
        margin: 0 20px;
        border-radius: 15px;
    }

    .btn-group {
        display: flex;
        justify-content: center;
        margin-top: 50px;
    }

</style>

    <div class="container-result">
        <h2 class="mb-3">Quiz Result</h2>
        <p class="mb-3 mt-3">Correct Answer: {{ $correct }}</p>
        <p class="mb-3 mt-3">Wrong Answer: {{ $wrong }}</p>
        <p class="mb-3 mt-3">Score: {{ round($score) }}</p>
        <div class="btn-group">
            <div>
                <a href="{{ route('index') }}" class="btn theme-btn">Back to home</a>
            </div>
        </div>
    </div>

    <script>
        const saveQuizResult = async (courseId, score, correct, wrong) => {
            try {
                const response = await fetch('/quiz/result/store', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    },
                    body: JSON.stringify({
                        course_id: courseId,
                        score: score,
                        correct_answers: correct,
                        wrong_answers: wrong,
                    }),
                });

                if (!response.ok) {
                    const text = await response.text();
                    console.error("Error response from server:", text);
                    toastr.error("Server error!");
                    return;
                }

                const data = await response.json();
                toastr.success(data.message);
            } catch (error) {
                toastr.error("Gagal menyimpan kuis!");
                console.error(error);
            }
        };
        document.addEventListener('DOMContentLoaded', function() {
            const message = localStorage.getItem('toastr_message');
            const type = localStorage.getItem('toastr_type');

            if (message) {
                if (type === 'success') {
                    toastr.success(message);
                } else if (type === 'error') {
                    toastr.error(message);
                } else if (type === 'info') {
                    toastr.info(message);
                } else if (type === 'warning') {
                    toastr.warning(message);
                }

                localStorage.removeItem('toastr_message');
                localStorage.removeItem('toastr_type');
            }
        });
    </script>

@endsection

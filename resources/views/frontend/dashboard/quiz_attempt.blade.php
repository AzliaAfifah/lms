@extends('frontend.dashboard.user_dashboard')
@section('userdashboard')
<div class="dashboard-heading mb-5">
    <h3 class="fs-22 font-weight-semi-bold">Quiz Attempts</h3>
</div>
<div class="table-responsive pb-4">
    <table class="table generic-table">
        <thead>
        <tr>
            <th scope="col">Course Title</th>
            <th scope="col">Questions</th>
            <th scope="col">Total Marks</th>
            <th scope="col">Earned Marks</th>
            <th scope="col">Pass Marks</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">
                <ul class="generic-list-item">
                    <li>
                        <span class="badge bg-success text-white p-1">Passed</span>
                        <span>January 22, 2019 10:50am</span>
                    </li>
                    <li>
                        <a href="course-details.html" class="text-black">Adobe After Effects CC: The Complete Motion Graphics Course</a>
                    </li>
                </ul>
            </th>
            <td>
                <ul class="generic-list-item">
                    <li>12</li>
                </ul>
            </td>
            <td>
                <ul class="generic-list-item">
                    <li>22.00</li>
                </ul>
            </td>
            <td>
                <ul class="generic-list-item">
                    <li>5.00(60%)</li>
                </ul>
            </td>
            <td>
                <ul class="generic-list-item">
                    <li>20.25(75%)</li>
                </ul>
            </td>
        </tr>
        <tr>
            <th scope="row">
                <ul class="generic-list-item">
                    <li>
                        <span class="badge bg-danger text-white p-1">Failed</span>
                        <span>January 22, 2019 10:50am</span>
                    </li>
                    <li>
                        <a href="course-details.html" class="text-black">The Ultimate Text-To-Video Creation Course</a>
                    </li>
                </ul>
            </th>
            <td>
                <ul class="generic-list-item">
                    <li>12</li>
                </ul>
            </td>
            <td>
                <ul class="generic-list-item">
                    <li>22.00</li>
                </ul>
            </td>
            <td>
                <ul class="generic-list-item">
                    <li>2.00(7%)</li>
                </ul>
            </td>
            <td>
                <ul class="generic-list-item">
                    <li>20.25(75%)</li>
                </ul>
            </td>
        </tr>
        <tr>
            <th scope="row">
                <ul class="generic-list-item">
                    <li>
                        <span class="badge bg-success text-white p-1">Passed</span>
                        <span>January 22, 2019 10:50am</span>
                    </li>
                    <li>
                        <a href="course-details.html" class="text-black">Complete Ethical Hacking Course: Zero to Hero</a>
                    </li>
                </ul>
            </th>
            <td>
                <ul class="generic-list-item">
                    <li>12</li>
                </ul>
            </td>
            <td>
                <ul class="generic-list-item">
                    <li>22.00</li>
                </ul>
            </td>
            <td>
                <ul class="generic-list-item">
                    <li>5.00(60%)</li>
                </ul>
            </td>
            <td>
                <ul class="generic-list-item">
                    <li>20.25(75%)</li>
                </ul>
            </td>
        </tr>
        <tr>
            <th scope="row">
                <ul class="generic-list-item">
                    <li>
                        <span class="badge bg-danger text-white p-1">Failed</span>
                        <span>January 22, 2019 10:50am</span>
                    </li>
                    <li>
                        <a href="course-details.html" class="text-black">Javascript - From Beginner to Pro-Build real world JS apps</a>
                    </li>
                </ul>
            </th>
            <td>
                <ul class="generic-list-item">
                    <li>12</li>
                </ul>
            </td>
            <td>
                <ul class="generic-list-item">
                    <li>22.00</li>
                </ul>
            </td>
            <td>
                <ul class="generic-list-item">
                    <li>2.00(7%)</li>
                </ul>
            </td>
            <td>
                <ul class="generic-list-item">
                    <li>20.25(75%)</li>
                </ul>
            </td>
        </tr>
        <tr>
            <th scope="row">
                <ul class="generic-list-item">
                    <li>
                        <span class="badge bg-success text-white p-1">Passed</span>
                        <span>January 22, 2019 10:50am</span>
                    </li>
                    <li>
                        <a href="course-details.html" class="text-black">iOS 12 & Swift: The Complete Developer Course (Project base)</a>
                    </li>
                </ul>
            </th>
            <td>
                <ul class="generic-list-item">
                    <li>12</li>
                </ul>
            </td>
            <td>
                <ul class="generic-list-item">
                    <li>22.00</li>
                </ul>
            </td>
            <td>
                <ul class="generic-list-item">
                    <li>7.00(60%)</li>
                </ul>
            </td>
            <td>
                <ul class="generic-list-item">
                    <li>20.25(75%)</li>
                </ul>
            </td>
        </tr>
        </tbody>
    </table>
</div>
<div class="text-center py-3">
    <nav aria-label="Page navigation example" class="pagination-box">
        <ul class="pagination justify-content-center">
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true"><i class="la la-arrow-left"></i></span>
                    <span class="sr-only">Previous</span>
                </a>
            </li>
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true"><i class="la la-arrow-right"></i></span>
                    <span class="sr-only">Next</span>
                </a>
            </li>
        </ul>
    </nav>
    <p class="fs-14 pt-2">Showing 1-5 of 16 results</p>
</div>
@endsection

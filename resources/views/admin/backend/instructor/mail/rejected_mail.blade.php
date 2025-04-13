<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instructor Application Status</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f6f6f6;
            color: #333;
        }
        .letter-container {
            max-width: 800px;
            margin: 0 auto;
            background: #fff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            border-top: 10px solid #35A49C;
        }
        .letter-header {
            margin-bottom: 20px;
            text-align: right;
            font-size: 14px;
            color: #777;
        }
        .letter-body {
            margin-top: 20px;
        }
        .letter-body h2 {
            color: #35A49C;
            margin-bottom: 10px;
        }
        .signature {
            margin-top: 50px;
            text-align: left;
        }
        .btn-back {
            margin-top: 30px;
            display: inline-block;
            background-color: #35A49C;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 6px;
        }
        @media (max-width: 600px) {
            .letter-container {
                padding: 20px;
            }
        }
    </style>
</head>
<body>

{{-- <div class="letter-container">
    <div class="letter-header">
        {{ date('F d, Y') }}
    </div>

    <div class="letter-body">
        <!-- APPROVED LETTER -->
        <h2>Acceptance Notification</h2>
        <p>Dear <strong>{{ $instructor->name }}</strong>,</p>

        <p>We are pleased to inform you that your application to become an instructor on our platform has been <strong style="color:green">approved</strong>. We are excited to welcome you to our team and look forward to seeing your contributions in our community.</p>

        <p>Please log in to your instructor dashboard to start setting up your courses.</p>

        <p>Thank you for choosing to share your knowledge with us.</p>

        <div class="signature">
            Best Regards,<br>
            <strong>Admin Team</strong>
        </div>

        <a href="/admin/instructors" class="btn-back">Back to Dashboard</a>
    </div>
</div> --}}

<!-- Uncomment ini kalo mau buat surat REJECTED -->

<div class="letter-container">
    <div class="letter-header">
        {{ date('F d, Y') }}
    </div>

    <div class="letter-body">
        <h2>Application Status</h2>
        <p>Dear <strong>{{ $instructor->name }}</strong>,</p>

        <p>We regret to inform you that your application to become an instructor has been <strong style="color:red">rejected</strong> after careful consideration. Although your profile is impressive, it does not fully meet the current needs of our platform at this time.</p>

        <p>We encourage you to apply again in the future as new opportunities arise.</p>

        <p>Thank you for your interest and effort.</p>

        <div class="signature">
            Sincerely,<br>
            <strong>Admin Team</strong>
        </div>
    </div>
</div>


</body>
</html>

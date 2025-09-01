<!DOCTYPE html>
<html>
<head>
    <title>Job Portal Choose Role</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex justify-content-center align-items-center vh-100 bg-light">

<div class="text-center">
    <h2 class="mb-4">What type of account you want to create</h2>

    <a href="{{ route('employer.auth.register') }}" class="btn btn-primary btn-lg m-2">Employer</a>
    <a href="{{ route('register') }}" class="btn btn-success btn-lg m-2">Job Seeker</a>
</div>

</body>
</html>

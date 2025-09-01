<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employer Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex justify-content-center align-items-center vh-100">

    <div class="card shadow-lg p-4" style="max-width: 400px; width: 100%; border-radius: 12px;">
        <h3 class="text-center mb-4">Employer Registration</h3>

        <form method="POST" action="{{ route('employer.auth.login.submit') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label">Email Address</label>
                <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter your password" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>

        @if($errors->any())
            <div class="alert alert-danger mt-3 p-2 text-center">
                {{ $errors->first() }}
            </div>
        @endif


<div class="mb-3">
                <label class="form-label text-center">Don't have an account <a href="register">Register</a></label>
               
            </div>


    </div>

 


</body>
</html>

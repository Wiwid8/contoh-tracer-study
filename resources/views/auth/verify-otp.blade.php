<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Verifikasi OTP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="text-center card-header">
                    Verifikasi OTP
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('otp.verify') }}">
                        @csrf

                        <input type="hidden" name="email" value="{{ session('email') }}">

                        <div class="mb-3">
                            <label>Kode OTP</label>
                            <input type="text" name="otp" class="form-control" required>
                        </div>

                        @error('otp')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror

                        <button class="btn btn-primary w-100">
                            Verifikasi
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>

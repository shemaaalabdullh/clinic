<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'نظام إدارة عيادة الأسنان')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">عيادة الأسنان</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('dashboard') }}">لوحة التحكم</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('doctors.index') }}">الأطباء</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('patients.index') }}">المرضى</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('appointments.index') }}">المواعيد</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('expenses.index') }}">النفقات</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('accountants.index') }}">المحاسبين</a></li> 
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">تسجيل الدخول</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

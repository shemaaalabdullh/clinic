@extends('layouts.layout')

@section('title', 'إضافة طبيب جديد')

@section('content')
    <div class="container">
        <h2 class="text-center my-4">إضافة طبيب جديد</h2>

        <div class="card p-4 shadow-lg">
            <form action="{{ route('doctors.store') }}" method="POST">
                @csrf
                
                <div class="mb-3">
                    <label class="form-label">الاسم الأول:</label>
                    <input type="text" name="first_name" class="form-control" required>
                    @error('first_name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">الاسم الأخير:</label>
                    <input type="text" name="last_name" class="form-control" required>
                    @error('last_name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">التخصص:</label>
                    <input type="text" name="specialization" class="form-control" required>
                    @error('specialization')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">البريد الإلكتروني:</label>
                    <input type="email" name="email" class="form-control" required>
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">رقم الهاتف:</label>
                    <input type="text" name="phone_number" class="form-control" required>
                    @error('phone_number')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">حفظ</button>
                    <a href="{{ route('doctors.index') }}" class="btn btn-secondary">إلغاء</a>
                </div>
            </form>
        </div>
    </div>
@endsection
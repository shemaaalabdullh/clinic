@extends('layouts.layout')

@section('title', 'تعديل بيانات المحاسب')

@section('content')
    <div class="container">
        <h2 class="text-center my-4">تعديل بيانات المحاسب</h2>

        <div class="card p-4 shadow-lg">
            <form action="{{ route('accountants.update', $accountant->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="mb-3">
                    <label class="form-label">الاسم الأول:</label>
                    <input type="text" name="first_name" class="form-control" value="{{ $accountant->first_name }}" required>
                    @error('first_name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">الاسم الأخير:</label>
                    <input type="text" name="last_name" class="form-control" value="{{ $accountant->last_name }}" required>
                    @error('last_name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">البريد الإلكتروني:</label>
                    <input type="email" name="email" class="form-control" value="{{ $accountant->email }}" required>
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">رقم الهاتف:</label>
                    <input type="text" name="phone_number" class="form-control" value="{{ $accountant->phone_number }}" required>
                    @error('phone_number')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">تحديث</button>
                    <a href="{{ route('accountants.index') }}" class="btn btn-secondary">إلغاء</a>
                </div>
            </form>
        </div>
    </div>
@endsection
@extends('layouts.layout')

@section('title', 'تعديل بيانات المريض')

@section('content')
<div class="container mt-4">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white">
            <h4 class="text-center">تعديل بيانات المريض</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('patients.update', $patient->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">الاسم الأول:</label>
                    <input type="text" name="first_name" class="form-control" value="{{ $patient->first_name }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">الاسم الأخير:</label>
                    <input type="text" name="last_name" class="form-control" value="{{ $patient->last_name }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">تاريخ الميلاد:</label>
                    <input type="date" name="dob" class="form-control" value="{{ $patient->dob }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">البريد الإلكتروني:</label>
                    <input type="email" name="email" class="form-control" value="{{ $patient->email }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">رقم الهاتف:</label>
                    <input type="text" name="phone_number" class="form-control" value="{{ $patient->phone_number }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">العنوان:</label>
                    <input type="text" name="address" class="form-control" value="{{ $patient->address }}" required>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-success">تحديث</button>
                    <a href="{{ route('patients.index') }}" class="btn btn-secondary">إلغاء</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
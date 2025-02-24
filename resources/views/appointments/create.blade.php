@extends('layouts.layout')

@section('title', 'إضافة موعد جديد')

@section('content')
    <div class="container">
        <h2 class="text-center my-4">إضافة موعد جديد</h2>

        <div class="card p-4 shadow-lg">
            <form action="{{ route('appointments.store') }}" method="POST">
                @csrf
                
                <div class="mb-3">
                    <label class="form-label">المريض:</label>
                    <select name="patient_id" class="form-control" required>
                        @foreach($patients as $patient)
                            <option value="{{ $patient->id }}">{{ $patient->first_name }} {{ $patient->last_name }}</option>
                        @endforeach
                    </select>
                    @error('patient_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">الطبيب:</label>
                    <select name="doctor_id" class="form-control" required>
                        @foreach($doctors as $doctor)
                            <option value="{{ $doctor->id }}">{{ $doctor->first_name }} {{ $doctor->last_name }}</option>
                        @endforeach
                    </select>
                    @error('doctor_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">تاريخ الموعد:</label>
                    <input type="date" name="appointment_date" class="form-control" required>
                    @error('appointment_date')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">الحالة:</label>
                    <select name="status" class="form-control" required>
                        <option value="confirmed">مؤكد</option>
                        <option value="cancelled">ملغي</option>
                        <option value="completed">مكتمل</option>
                    </select>
                    @error('status')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">خطة العلاج:</label>
                    <textarea name="treatment_plan" class="form-control" rows="3"></textarea>
                    @error('treatment_plan')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">حفظ</button>
                    <a href="{{ route('appointments.index') }}" class="btn btn-secondary">إلغاء</a>
                </div>
            </form>
        </div>
    </div>
@endsection
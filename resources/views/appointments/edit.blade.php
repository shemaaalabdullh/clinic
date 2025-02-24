@extends('layouts.layout')

@section('title', 'تعديل بيانات الموعد')

@section('content')
    <div class="container">
        <h2 class="text-center my-4">تعديل بيانات الموعد</h2>

        <div class="card p-4 shadow-lg">
            <form action="{{ route('appointments.update', $appointment->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="mb-3">
                    <label class="form-label">المريض:</label>
                    <select name="patient_id" class="form-control" required>
                        @foreach($patients as $patient)
                            <option value="{{ $patient->id }}" {{ $appointment->patient_id == $patient->id ? 'selected' : '' }}>
                                {{ $patient->first_name }} {{ $patient->last_name }}
                            </option>
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
                            <option value="{{ $doctor->id }}" {{ $appointment->doctor_id == $doctor->id ? 'selected' : '' }}>
                                {{ $doctor->first_name }} {{ $doctor->last_name }}
                            </option>
                        @endforeach
                    </select>
                    @error('doctor_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">تاريخ الموعد:</label>
                    <input type="date" name="appointment_date" class="form-control" value="{{ $appointment->appointment_date }}" required>
                    @error('appointment_date')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">الحالة:</label>
                    <select name="status" class="form-control" required>
                        <option value="confirmed" {{ $appointment->status == 'confirmed' ? 'selected' : '' }}>مؤكد</option>
                        <option value="cancelled" {{ $appointment->status == 'cancelled' ? 'selected' : '' }}>ملغي</option>
                        <option value="completed" {{ $appointment->status == 'completed' ? 'selected' : '' }}>مكتمل</option>
                    </select>
                    @error('status')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">تحديث</button>
                    <a href="{{ route('appointments.index') }}" class="btn btn-secondary">إلغاء</a>
                </div>
            </form>
        </div>
    </div>
@endsection
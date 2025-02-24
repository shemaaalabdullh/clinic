@extends('layouts.layout')

@section('title', 'قائمة المواعيد')

@section('content')
    <div class="container">
        <h2 class="text-center my-4">قائمة المواعيد</h2>

        <!-- عرض إشعار النجاح إذا كان موجودًا -->
        @if(session('success'))
            <div class="alert alert-success text-center">{{ session('success') }}</div>
        @endif

        <div class="text-start mb-3">
            <a href="{{ route('appointments.create') }}" class="btn btn-success">إضافة موعد جديد</a>
        </div>

        <div class="card shadow-lg p-4">
            <table class="table table-bordered text-center">
                <thead class="table-dark">
                    <tr>
                        <th>المريض</th>
                        <th>الطبيب</th>
                        <th>تاريخ الموعد</th>
                        <th>الحالة</th>
                        <th>الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($appointments as $appointment)
                        <tr>
                            <td>{{ $appointment->patient->first_name }} {{ $appointment->patient->last_name }}</td>
                            <td>{{ $appointment->doctor->first_name }} {{ $appointment->doctor->last_name }}</td>
                            <td>{{ $appointment->appointment_date }}</td>
                            <td>
                                <span class="badge {{ $appointment->status == 'مؤكد' ? 'bg-success' : 'bg-warning' }}">
                                    {{ $appointment->status }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('appointments.edit', $appointment->id) }}" class="btn btn-primary btn-sm">تعديل</a>
                                <form action="{{ route('appointments.destroy', $appointment->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('هل أنت متأكد من حذف هذا الموعد؟')">حذف</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
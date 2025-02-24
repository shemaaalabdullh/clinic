@extends('layouts.layout')

@section('title', 'قائمة المحاسبين')

@section('content')
    <div class="container">
        <h2 class="text-center my-4">قائمة المحاسبين</h2>

        <!-- عرض إشعار النجاح إن وجد -->
        @if(session('success'))
            <div class="alert alert-success text-center">{{ session('success') }}</div>
        @endif

        <div class="text-start mb-3">
            <a href="{{ route('accountants.create') }}" class="btn btn-success">إضافة محاسب جديد</a>
        </div>

        <div class="card shadow-lg p-4">
            <table class="table table-bordered text-center">
                <thead class="table-dark">
                    <tr>
                        <th>الاسم الأول</th>
                        <th>الاسم الأخير</th>
                        <th>البريد الإلكتروني</th>
                        <th>رقم الهاتف</th>
                        <th>الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($accountants as $accountant)
                        <tr>
                            <td>{{ $accountant->first_name }}</td>
                            <td>{{ $accountant->last_name }}</td>
                            <td>{{ $accountant->email }}</td>
                            <td>{{ $accountant->phone_number }}</td>
                            <td>
                                <a href="{{ route('accountants.edit', $accountant->id) }}" class="btn btn-primary btn-sm">تعديل</a>
                                <form action="{{ route('accountants.destroy', $accountant->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('هل أنت متأكد من حذف هذا المحاسب؟')">حذف</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
@extends('layouts.layout')

@section('title', 'قائمة الأطباء')

@section('content')
    <div class="container">
        <h2 class="text-center my-4">قائمة الأطباء</h2>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <a href="{{ route('doctors.create') }}" class="btn btn-success mb-3">إضافة طبيب جديد</a>
        <table class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <th>الاسم</th>
                    <th>التخصص</th>
                    <th>البريد الإلكتروني</th>
                    <th>رقم الهاتف</th>
                    <th>الإجراءات</th>
                </tr>
            </thead>
            <tbody>

            




                @foreach($doctors as $doctor)
                    <tr>
                        <td>{{ $doctor->first_name }} {{ $doctor->last_name }}</td>
                        <td>{{ $doctor->specialization }}</td>
                        <td>{{ $doctor->email }}</td>
                        <td>{{ $doctor->phone_number }}</td>
                        <td>
                            <a href="{{ route('doctors.edit', $doctor->id) }}" class="btn btn-primary btn-sm">تعديل</a>
                            <form action="{{ route('doctors.destroy', $doctor->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('هل أنت متأكد؟')">حذف</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
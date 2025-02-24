@extends('layouts.layout')

@section('title', 'قائمة المرضى')

@section('content')
    <div class="container">
        <h2 class="text-center my-4">قائمة المرضى</h2>
        @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif       
            <a href="{{ route('patients.create') }}" class="btn btn-success mb-3">إضافة مريض جديد</a>

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>الاسم الأول</th>
                            <th>اسم العائلة</th>
                            <th>تاريخ الميلاد</th>
                            <th>البريد الإلكتروني</th>
                            <th>رقم الهاتف</th>
                            <th>العنوان</th>
                            <th>الإجراءات</th>
                        </tr>
                    </thead>
                 


                    <tbody>
                        @foreach($patients as $patient)
                        <tr>
                            <td>{{ $patient->first_name }}</td>
                            <td>{{ $patient->last_name }}</td>
                            <td>{{ $patient->dob }}</td>
                            <td>{{ $patient->email }}</td>
                            <td>{{ $patient->phone_number }}</td>
                            <td>{{ $patient->address }}</td>                       
                            
                            
                            <td class="text-center">
                                <a href="{{ route('patients.edit', $patient->id) }}" class="btn btn-primary btn-sm">تعديل</a>
                                <form action="{{ route('patients.destroy', $patient->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('هل أنت متأكد من الحذف؟')">حذف</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
       
    </div>
@endsection
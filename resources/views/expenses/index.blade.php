@extends('layouts.layout')

@section('title', 'قائمة النفقات')

@section('content')
    <div class="container">
        <h2 class="text-center my-4">قائمة النفقات</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <a href="{{ route('expenses.create') }}" class="btn btn-primary mb-3">إضافة نفقة جديدة</a>

        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>نوع النفقة</th>
                    <th>المبلغ</th>
                    <th>التاريخ</th>
                    <th>الوصف</th>
                    <th>الإجراءات</th>
                </tr>
            </thead>
            <tbody>
                @foreach($expenses as $expense)
                <tr>
                    <td>{{ $expense->expense_type }}</td>
                    <td>{{ $expense->amount }}</td>
                    <td>{{ $expense->date }}</td>
                    <td>{{ $expense->description }}</td>
                    <td>
                        <a href="{{ route('expenses.edit', $expense->id) }}" class="btn btn-warning btn-sm">تعديل</a>
                        <form action="{{ route('expenses.destroy', $expense->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('هل أنت متأكد من حذف هذه النفقة؟')">حذف</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

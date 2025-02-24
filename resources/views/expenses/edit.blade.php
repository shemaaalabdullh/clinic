@extends('layouts.layout')

@section('title', 'تعديل النفقة')

@section('content')
    <div class="container">
        <h2 class="mt-4">تعديل النفقة</h2>

        <form action="{{ route('expenses.update', $expense->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">نوع النفقة</label>
                <input type="text" name="expense_type" class="form-control" value="{{ $expense->expense_type }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">المبلغ</label>
                <input type="number" name="amount" class="form-control" value="{{ $expense->amount }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">التاريخ</label>
                <input type="date" name="date" class="form-control" value="{{ $expense->date }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">الوصف</label>
                <textarea name="description" class="form-control">{{ $expense->description }}</textarea>
            </div>

            <button type="submit" class="btn btn-success">تحديث</button>
            <a href="{{ route('expenses.index') }}" class="btn btn-secondary">إلغاء</a>
        </form>
    </div>
@endsection

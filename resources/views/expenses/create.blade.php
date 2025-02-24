@extends('layouts.layout')

@section('title', 'إضافة نفقة جديدة')

@section('content')
    <div class="container">
        <h2 class="mt-4">إضافة نفقة جديدة</h2>

        <form action="{{ route('expenses.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">نوع النفقة</label>
                <input type="text" name="expense_type" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">المبلغ</label>
                <input type="number" name="amount" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">التاريخ</label>
                <input type="date" name="date" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">الوصف</label>
                <textarea name="description" class="form-control"></textarea>
            </div>

            <button type="submit" class="btn btn-success">حفظ</button>
            <a href="{{ route('expenses.index') }}" class="btn btn-secondary">إلغاء</a>
        </form>
    </div>
@endsection

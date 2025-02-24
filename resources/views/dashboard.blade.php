@extends('layouts.layout')

@section('title', 'لوحة التحكم')

@section('content')
    <div class="d-flex flex-column align-items-center justify-content-center text-center" style="height: 70vh;">
        <img src="{{ asset('images/dental-clinic.png') }}" alt="عيادة الأسنان" class="mb-4" style="width: 150px;">
        <h2 class="mb-3">:!الوقاية خير من علاج</h2>
        <p class="lead">مرحباً بك في نظام إدارة عيادة الأسنان</p>
    </div>
@endsection

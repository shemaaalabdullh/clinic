<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    // عرض جميع الأطباء في الصفحة
    public function index()
    {
        $doctors = Doctor::all();
        return view('doctors.index', compact('doctors'));
    }

    // صفحة إضافة طبيب جديد
    public function create()
    {
        return view('doctors.create');
    }

    // تخزين بيانات الطبيب الجديد
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'specialization' => 'required|string|max:255',
            'email' => 'required|email|unique:doctors',
            'phone_number' => 'required|string|unique:doctors',
        ]);

        Doctor::create($request->all());

        session()->flash('success', 'تمت إضافة الطبيب بنجاح');
        return redirect()->route('doctors.index');
    }

    // عرض بيانات طبيب معين
    public function show(Doctor $doctor)
    {
        return view('doctors.show', compact('doctor'));
    }

    // صفحة تعديل بيانات الطبيب
    public function edit(Doctor $doctor)
    {
        return view('doctors.edit', compact('doctor'));
    }

    // تحديث بيانات الطبيب
    public function update(Request $request, Doctor $doctor)
    {
        $request->validate([
            'first_name' => 'sometimes|string|max:255',
            'last_name' => 'sometimes|string|max:255',
            'specialization' => 'sometimes|string|max:255',
            'email' => 'sometimes|email|unique:doctors,email,' . $doctor->id,
            'phone_number' => 'sometimes|string|unique:doctors,phone_number,' . $doctor->id,
        ]);

        $doctor->update($request->all());

        session()->flash('success', 'تم تحديث بيانات الطبيب بنجاح');
        return redirect()->route('doctors.index');
    }

    // حذف طبيب
    public function destroy(Doctor $doctor)
    {
        $doctor->delete();

        session()->flash('success', 'تم حذف الطبيب بنجاح');
        return redirect()->route('doctors.index');
    }
}

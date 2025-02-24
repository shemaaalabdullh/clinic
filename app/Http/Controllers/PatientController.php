<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    // 1️⃣ عرض قائمة المرضى
    public function index()
    {
        $patients = Patient::all();
        return view('patients.index', compact('patients'));
    }

    // 2️⃣ صفحة إضافة مريض جديد
    public function create()
    {
        return view('patients.create');
    }

    // 3️⃣ حفظ بيانات المريض الجديد
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'dob' => 'required|date',
            'email' => 'required|email|unique:patients',
            'phone_number' => 'required|string|unique:patients',
            'address' => 'required|string',
        ]);

        Patient::create($request->all());

        session()->flash('success', 'تمت إضافة المريض بنجاح');
        return redirect()->route('patients.index');
    }

    // 4️⃣ عرض بيانات مريض معين
    public function show(Patient $patient)
    {
        return view('patients.show', compact('patient'));
    }

    // 5️⃣ صفحة تعديل بيانات المريض
    public function edit(Patient $patient)
    {
        return view('patients.edit', compact('patient'));
    }

    // 6️⃣ تحديث بيانات المريض
    public function update(Request $request, Patient $patient)
    {
        $request->validate([
            'first_name' => 'sometimes|string|max:255',
            'last_name' => 'sometimes|string|max:255',
            'dob' => 'sometimes|date',
            'email' => 'sometimes|email|unique:patients,email,' . $patient->id,
            'phone_number' => 'sometimes|string|unique:patients,phone_number,' . $patient->id,
            'address' => 'sometimes|string',
        ]);

        $patient->update($request->all());

        session()->flash('success', 'تم تحديث بيانات المريض بنجاح');
        return redirect()->route('patients.index');
    }

    // 7️⃣ حذف مريض
    public function destroy(Patient $patient)
    {
        $patient->delete();

        session()->flash('success', 'تم حذف المريض بنجاح');
        return redirect()->route('patients.index');
    }
}

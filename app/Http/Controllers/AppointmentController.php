<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    // 1️⃣ عرض قائمة المواعيد
    public function index()
    {
        $appointments = Appointment::with(['patient', 'doctor'])->get();
        return view('appointments.index', compact('appointments'));
    }

    // 2️⃣ عرض نموذج إضافة موعد جديد
    public function create()
    {
        $patients = Patient::all();
        $doctors = Doctor::all();
        return view('appointments.create', compact('patients', 'doctors'));
    }

    // 3️⃣ حفظ الموعد الجديد
    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'doctor_id' => 'required|exists:doctors,id',
            'appointment_date' => 'required|date',
            'status' => 'required|in:confirmed,cancelled,completed',
            'treatment_plan' => 'nullable|string',
        ]);

        Appointment::create($request->all());

        session()->flash('success', 'تمت إضافة الموعد بنجاح');
        return redirect()->route('appointments.index');
    }

    // 4️⃣ عرض تفاصيل موعد معين
    public function show(Appointment $appointment)
    {
        return view('appointments.show', compact('appointment'));
    }

    // 5️⃣ عرض نموذج تعديل موعد
    public function edit(Appointment $appointment)
    {
        $patients = Patient::all();
        $doctors = Doctor::all();
        return view('appointments.edit', compact('appointment', 'patients', 'doctors'));
    }

    // 6️⃣ تحديث بيانات الموعد
    public function update(Request $request, Appointment $appointment)
    {
        $request->validate([
            'patient_id' => 'sometimes|exists:patients,id',
            'doctor_id' => 'sometimes|exists:doctors,id',
            'appointment_date' => 'sometimes|date',
            'status' => 'sometimes|in:confirmed,cancelled,completed',
            'treatment_plan' => 'sometimes|string',
        ]);

        $appointment->update($request->all());

        session()->flash('success', 'تم تعديل الموعد بنجاح');
        return redirect()->route('appointments.index');
    }

    // 7️⃣ حذف موعد
    public function destroy(Appointment $appointment)
    {
        $appointment->delete();

        session()->flash('success', 'تم حذف الموعد بنجاح');
        return redirect()->route('appointments.index');
    }
}

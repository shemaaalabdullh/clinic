<?php

namespace App\Http\Controllers;

use App\Models\Accountant;
use Illuminate\Http\Request;

class AccountantController extends Controller
{
    // 1️⃣ عرض قائمة المحاسبين
    public function index()
    {
        $accountants = Accountant::all();
        return view('accountants.index', compact('accountants'));
    }

    // 2️⃣ عرض نموذج إضافة محاسب جديد
    public function create()
    {
        return view('accountants.create');
    }

    // 3️⃣ حفظ المحاسب الجديد
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:accountants',
            'phone_number' => 'required|string|unique:accountants',
        ]);

        Accountant::create($request->all());

        session()->flash('success', 'تمت إضافة المحاسب بنجاح');
        return redirect()->route('accountants.index');
    }

    // 4️⃣ عرض تفاصيل محاسب معين
    public function show(Accountant $accountant)
    {
        return view('accountants.show', compact('accountant'));
    }

    // 5️⃣ عرض نموذج تعديل بيانات محاسب
    public function edit(Accountant $accountant)
    {
        return view('accountants.edit', compact('accountant'));
    }

    // 6️⃣ تحديث بيانات المحاسب
    public function update(Request $request, Accountant $accountant)
    {
        $request->validate([
            'first_name' => 'sometimes|string|max:255',
            'last_name' => 'sometimes|string|max:255',
            'email' => 'sometimes|email|unique:accountants,email,' . $accountant->id,
            'phone_number' => 'sometimes|string|unique:accountants,phone_number,' . $accountant->id,
        ]);

        $accountant->update($request->all());

        session()->flash('success', 'تم تعديل بيانات المحاسب بنجاح');
        return redirect()->route('accountants.index');
    }

    // 7️⃣ حذف محاسب
    public function destroy(Accountant $accountant)
    {
        $accountant->delete();

        session()->flash('success', 'تم حذف المحاسب بنجاح');
        return redirect()->route('accountants.index');
    }
}

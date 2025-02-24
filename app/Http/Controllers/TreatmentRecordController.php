<?php
namespace App\Http\Controllers;

use App\Models\TreatmentRecord;
use Illuminate\Http\Request;

class TreatmentRecordController extends Controller
{
    public function index()
    {
        return response()->json(TreatmentRecord::with(['doctor', 'patient'])->get());
    }

    public function store(Request $request)
    {
        $treatmentRecord = TreatmentRecord::create($request->validate([
            'patient_id' => 'required|exists:patients,id',
            'doctor_id' => 'required|exists:doctors,id',
            'treatment_details' => 'required|string',
            'treatment_date' => 'required|date',
        ]));

        return response()->json($treatmentRecord, 201);
    }

    public function show(TreatmentRecord $treatmentRecord)
    {
        return response()->json($treatmentRecord->load(['doctor', 'patient']));
    }

    public function update(Request $request, TreatmentRecord $treatmentRecord)
    {
        $treatmentRecord->update($request->validate([
            'treatment_details' => 'sometimes|string',
            'treatment_date' => 'sometimes|date',
        ]));

        return response()->json($treatmentRecord);
    }

    public function destroy(TreatmentRecord $treatmentRecord)
    {
        $treatmentRecord->delete();
        return response()->json(['message' => 'Treatment record deleted successfully']);
    }
}

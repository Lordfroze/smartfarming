<?php

namespace App\Http\Controllers;

use App\Models\CareTemplate;
use App\Models\PlantType;
use Illuminate\Http\Request;

class CareTemplateController extends Controller
{
    public function index()
    {
        $templates = CareTemplate::with('plantType')
            ->latest()
            ->get();

        return view('care-templates.index', [
            'templates' => $templates,
        ]);
    }

    public function create()
    {
        return view('care-templates.create', [
            'plantTypes' => PlantType::all(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'plant_type_id' => 'required',
            'day_offset' => 'required|integer',
            'activity_type' => 'required',
            'title' => 'required',
            'description' => 'nullable',
        ]);

        CareTemplate::create($validated);

        return redirect()
            ->route('care-templates.index')
            ->with('success', 'Template berhasil ditambahkan');
    }

    public function edit(CareTemplate $careTemplate)
    {
        return view('care-templates.edit', [
            'careTemplate' => $careTemplate,
            'plantTypes' => PlantType::all(),
        ]);
    }

    public function update(Request $request, CareTemplate $careTemplate)
    {
        $validated = $request->validate([
            'plant_type_id' => 'required',
            'day_offset' => 'required|integer',
            'activity_type' => 'required',
            'title' => 'required',
            'description' => 'nullable',
        ]);

        $careTemplate->update($validated);

        return redirect()
            ->route('care-templates.index')
            ->with('success', 'Template berhasil diperbarui');
    }

    public function destroy(CareTemplate $careTemplate)
    {
        $careTemplate->delete();

        return redirect()
            ->route('care-templates.index')
            ->with('success', 'Template berhasil dihapus');
    }
}

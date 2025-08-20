<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function create(Page $page)
{
    return view('admin.sections.create', compact('page'));
}

public function store(Request $request, Page $page)
{
    $data = $request->validate([
        'order' => 'required|integer',
        'questions' => 'required|array',
        'questions.*.question' => 'required|string',
        'questions.*.answer' => 'required|string',
    ]);

    Section::create([
        'page_id' => $page->id,
        'type' => 'faq',
        'order' => $data['order'],
        'content' => ['items' => $data['questions']],
    ]);

    return redirect()->route('admin.pages.edit', $page->id)
        ->with('success', 'Seção FAQ criada!');
}

public function edit(Section $section)
{
    $page = $section->page;
    return view('admin.sections.edit', compact('section', 'page'));
}

public function update(Request $request, Section $section)
{
    $data = $request->validate([
        'order' => 'required|integer',
        'questions' => 'required|array',
        'questions.*.question' => 'required|string',
        'questions.*.answer' => 'required|string',
    ]);

    $section->update([
        'order' => $data['order'],
        'content' => ['items' => $data['questions']],
    ]);

    return redirect()->route('admin.pages.edit', $section->page_id)
        ->with('success', 'Seção FAQ atualizada!');
}

public function destroy(Section $section)
{
    $section->delete();
    return redirect()->route('admin.pages.edit', $section->page_id)
        ->with('success', 'Seção removida!');
}

}

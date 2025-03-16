<?php

namespace App\Http\Controllers\backend\admin;

use App\DataTables\SectionDataTable;
use App\Http\Controllers\Controller;
use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
  
        // عرض قائمة الأقسام
        public function index()
        {
            $sections = Section::all();
            return view('backend.admin.sections.index', compact('sections'));
        }
    
        // عرض نموذج إنشاء قسم جديد
        public function create()
        {
            return view('backend.admin.sections.create');
        }
    

        public function show(Section $section)
        {
            return "kjhjkhnkj";
        }

        // حفظ القسم الجديد في قاعدة البيانات
        public function store(Request $request)
        {
            // التحقق من البيانات
            $request->validate([
                'name' => 'required|string|max:255',
                'status' => 'nullable|boolean',
            ]);
    
            // إنشاء القسم
            Section::create([
                'name' => $request->name,
                'description' => $request->description ?? 'null',
                'status' => $request->status ?? true, // القيمة الافتراضية هي true
            ]);
    
            // إعلام المستخدم بنجاح العملية
            toastr()->success('تم إنشاء القسم بنجاح.');
            return redirect()->route('admin.sections.index');
        }
    
        // عرض نموذج تعديل قسم
        public function edit(Section $section)
        {
            return view('backend.admin.sections.edit', compact('section'));
        }
    
        
        // تحديث بيانات القسم
        public function update(Request $request, Section $section)
        {
            // التحقق من البيانات
            $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'nullable|string',
                'status' => 'nullable|boolean',
            ]);
    
            // تحديث بيانات القسم
            $section->update([
                'name' => $request->name,
                'description' => $request->description,
                'status' => $request->status ?? $section->status,
            ]);
    
            // إعلام المستخدم بنجاح العملية
            toastr()->success('تم تحديث القسم بنجاح.');
            return redirect()->route('admin.sections.index');
        }
    
        // حذف قسم
        public function destroy($id)
        {
            $section = Section::findOrFail($id);
            $section->delete();
        
            return response()->json([
                'status' => 'success',
                'message' => 'تم حذف القسم بنجاح',
            ]);

        }

        
}





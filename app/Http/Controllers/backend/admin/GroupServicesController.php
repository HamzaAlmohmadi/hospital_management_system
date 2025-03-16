<?php

namespace App\Http\Controllers\backend\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GroupServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}






















// namespace App\Http\Controllers;

// use App\Models\Group;
// use App\Models\Service;
// use Illuminate\Http\Request;

// class GroupServicesController extends Controller
// {
//     public function index()
//     {
//         $allServices = Service::all();
//         $groups = Group::all();
//         return view('group_services.index', compact('allServices', 'groups'));
//     }

//     public function store(Request $request)
//     {
//         $total = 0;
//         foreach ($request->GroupsItems as $groupItem) {
//             if ($groupItem['is_saved'] && $groupItem['service_price'] && $groupItem['quantity']) {
//                 $total += $groupItem['service_price'] * $groupItem['quantity'];
//             }
//         }

//         $group = new Group();
//         $group->total_before_discount = $total;
//         $group->discount_value = $request->discount_value;
//         $group->total_after_discount = $total - ((is_numeric($request->discount_value) ? $request->discount_value : 0));
//         $group->tax_rate = $request->taxes;
//         $group->total_with_tax = $group->total_after_discount * (1 + (is_numeric($request->taxes) ? $request->taxes : 0) / 100);
//         $group->name = $request->name_group;
//         $group->notes = $request->notes;
//         $group->save();

//         foreach ($request->GroupsItems as $GroupsItem) {
//             $group->service_group()->attach($GroupsItem['service_id'], ['quantity' => $GroupsItem['quantity']]);
//         }

//         return response()->json(['message' => 'Group saved successfully!'], 200);
//     }

//     public function update(Request $request, $id)
//     {
//         $group = Group::find($id);
//         $total = 0;
//         foreach ($request->GroupsItems as $groupItem) {
//             if ($groupItem['is_saved'] && $groupItem['service_price'] && $groupItem['quantity']) {
//                 $total += $groupItem['service_price'] * $groupItem['quantity'];
//             }
//         }

//         $group->total_before_discount = $total;
//         $group->discount_value = $request->discount_value;
//         $group->total_after_discount = $total - ((is_numeric($request->discount_value) ? $request->discount_value : 0));
//         $group->tax_rate = $request->taxes;
//         $group->total_with_tax = $group->total_after_discount * (1 + (is_numeric($request->taxes) ? $request->taxes : 0) / 100);
//         $group->name = $request->name_group;
//         $group->notes = $request->notes;
//         $group->save();

//         $group->service_group()->detach();
//         foreach ($request->GroupsItems as $GroupsItem) {
//             $group->service_group()->attach($GroupsItem['service_id'], ['quantity' => $GroupsItem['quantity']]);
//         }

//         return response()->json(['message' => 'Group updated successfully!'], 200);
//     }

//     public function destroy($id)
//     {
//         Group::destroy($id);
//         return response()->json(['message' => 'Group deleted successfully!'], 200);
//     }
// }




// $(document).ready(function() {
//     $('#saveGroup').on('click', function(e) {
//         e.preventDefault();

//         let formData = {
//             name_group: $('#name_group').val(),
//             notes: $('#notes').val(),
//             discount_value: $('#discount_value').val(),
//             taxes: $('#taxes').val(),
//             GroupsItems: []
//         };

//         $('.group-item').each(function() {
//             formData.GroupsItems.push({
//                 service_id: $(this).find('.service_id').val(),
//                 quantity: $(this).find('.quantity').val(),
//                 service_price: $(this).find('.service_price').val(),
//                 is_saved: $(this).find('.is_saved').val()
//             });
//         });

//         $.ajax({
//             url: '/group_services',
//             type: 'POST',
//             data: formData,
//             success: function(response) {
//                 alert(response.message);
//             },
//             error: function(xhr) {
//                 alert(xhr.responseText);
//             }
//         });
//     });

//     // Similar Ajax code for update and delete
// });

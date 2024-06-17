<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Students;
use DataTables;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->ajax()) {
            $data = Students::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row) {
                        $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editProduct" id="editbtn" >Edit</a>';
                        $btn .= ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct" id="deletebtn">Delete</a>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view("student.index");
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
        $student =  new Students();
        $student->name = $request->input('name');
        $student->email = $request->input('email');
        $student->phone = $request->input('phone');
        $student->gender = $request->input('gender');
        $student->city = $request->input('city');
        $student->hobby =implode(',', $request->input('hobby'));
        $student->address = $request->input('address');
        $student->save();
        return response()->json(['message' => 'Student saved successfully!', 'student' => $student], 200);

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
        $student = Students::findOrFail($id);
        return response()->json($student);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $student = Students::findOrFail($id);
        $student->name = $request->input('name');
        $student->email = $request->input('email');
        $student->phone = $request->input('phone');
        $student->gender = $request->input('gender');
        $student->city = $request->input('city');
        $student->hobby =implode(',', $request->input('hobby'));
        $student->address = $request->input('address');
        $student->save();
        return response()->json(['message' => 'Student updated successfully!', 'student' => $student], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Students::findOrFail($id);
        $student->delete();
        return response()->json(['message' => 'Student Deleted successfully!', 'student' => $student], 200);
    }
}

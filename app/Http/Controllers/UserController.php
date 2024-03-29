<?php

namespace App\Http\Controllers;

use pagination;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $users = User::all();
        return view('users.index');
    }

    public function getUsers()
    {
        return DataTables::of(User::query())
        // 1st Method to apply condition on Row
        // ->setRowClass(function ($user) {
        //     return $user->id % 2 == 0 ? 'alert-success' : 'alert-info';
        // })
        // 2nd Method to apply condition on Row
        ->setRowClass('{{ $id % 2 == 0 ? "alert-success" : "alert-info" }}')

        // Adds id in Rows
        ->setRowId(function ($user) {
            return $user->id;
        })

        // Center the Rows
        ->setRowAttr([
            'align' => 'center'
        ])

        // Change the name of id and name in ajax
        ->setRowData([
            'data-id' => 'row-{{$id}}',
            'data-name' => 'row-{{$name}}',
        ])
        ->addColumn('intro', 'Hi {{$name}}!')

        // Edit column condition
        ->editColumn('created_at', function(User $user) {
            return $user->created_at->diffForHumans();
        })

        // Edit column using blade
        // ->editColumn('updated_at', 'users.column')

        // The updated at add in raw column
        // ->rawColumns(['updated_at'])

        // Remove Column
        // ->removeColumn('email')

        // Add the action button
        ->addColumn('action', function($row){
            $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
            return $actionBtn;
        })
        ->rawColumns(['action'])

        // to return use both tojson and make(true)
        ->toJson();
        // ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->save();
    
        return response()->json(['message' => 'User created successfully']);
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

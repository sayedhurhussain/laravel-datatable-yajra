<?php

namespace App\Http\Controllers;

use pagination;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Pagination\Paginator;


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
        ->make(true);
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

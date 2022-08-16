<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $permissions= Permission::all();
       return view('admin.permissions.all',compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Permission::create($request->all());
        toast()->success('سطح دسترسی جدید با موفقیت ایجاد شد');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param Permission $permission
     * @return void
     */
    public function show(Permission $permission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Permission $permission
     * @return void
     */
    public function edit(Permission $permission)
    {

        $permissions=Permission::all();
        return view('admin.permissions.edit',compact('permission','permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Permission $permission
     * @return void
     */
    public function update(Request $request, Permission $permission)
    {
        $permission->update($request->all());
        toast()->success('سطح دسترسی ویرایش شد');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Permission $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();
        toast()->success('سطح دسترسی حذف شد');
        return back();
    }
}

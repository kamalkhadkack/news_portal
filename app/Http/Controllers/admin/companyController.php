<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;

class companyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // go to index page company.index
        return view('admin.company.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // go to create page company.create
        return view('admin.company.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $company = new Company();
        $company->name = $request->name;
        $company->email = $request->email;
        $company->phone = $request->phone;
        $company->tel = $request->tel;
        $company->facebook = $request->facebook;
        $company->instagram = $request->instagram;

        if($request->hasFile('logo')){
            $file = $request->File('logo');
            $fileName = time(). "." . $file->getClientOriginalExtension();
            $file->move('images', $fileName);
            $company->logo = 'images/'. $fileName;

        }
        $company->save();
        return "saved";


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
        // go to edit page company.edit
        return view('admin.company.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // update data in database company.update
        return view('admin.company.update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // delete data from database company.destroy
        return view('admin.company.destroy');
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Resources\CompanyResource;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use Inertia\Response;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return Inertia::render('Companies/Index', [
            'items' => CompanyResource::collection(Company::orderByDesc('updated_at')->paginate(50))
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Companies/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'logo' => 'nullable|image',
            'website' => 'nullable|max:255',
        ]);

        $company = Company::create([
            'name' => $request->name,
            'email' => $request->email,
            'website' => $request->website
        ]);

        if ($request->file('logo')) {
            $company->update([
                'logo_url' =>  $request->file('logo')->store('public')
            ]);
        }

        return Redirect::route('companies.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return Inertia::render('Companies/Edit', [
            "company" => new CompanyResource($company)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Company  $company
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Company $company, Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'logo' => 'nullable|image',
            'website' => 'nullable|max:255',
        ]);

        $company->update(FacadesRequest::only('name', 'email', 'website'));

        if ($request->file('logo')) {
            if (Storage::exists($company->logo_url)) {
                Storage::delete($company->logo_url);
            }

            $company->update([
                'logo_url' =>  $request->file('logo')->store('public')
            ]);
        } elseif (Storage::exists($company->logo_url)) {
            Storage::delete($company->logo_url);
            $company->update([
                'logo_url' =>  null
            ]);
        }




        // return Redirect::back()->with('success', 'User updated.');
        return Redirect::route('companies.index');
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {

        Storage::delete($company->logo_url);

        $company->delete();


        return Redirect::route('companies.index');
    }
}

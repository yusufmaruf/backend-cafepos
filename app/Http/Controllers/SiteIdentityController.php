<?php

namespace App\Http\Controllers;

use App\Models\SiteIdentity;
use Illuminate\Http\Request;

class SiteIdentityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $siteIdentity = SiteIdentity::first();
        return view('pages.siteIdentity.index', compact('siteIdentity'));
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
    public function show(SiteIdentity $siteIdentity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $siteIdentity = SiteIdentity::find($id);
        return view('pages.siteIdentity.edit', compact('siteIdentity'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name_website' => 'required',
            'name_apk' => 'required',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $siteIdentity = SiteIdentity::find($id);
        $data =  $request->all();
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();
            $filename = $originalName . '_' . time() . '.' . $extension;
            $file->move(public_path('store/images/siteIdentity'), $filename);
            $data['logo'] = '/store/images/siteIdentity/' . $filename;
            unlink(public_path($siteIdentity->logo));
        }
        $siteIdentity->update($data);
        return redirect()->route('site-identity.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SiteIdentity $siteIdentity)
    {
        //
    }
}

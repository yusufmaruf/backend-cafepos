<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SiteIdentity;
use Illuminate\Http\Client\Request;

class SiteIdentityController extends Controller
{
    public function index(){
        $siteIdentity = SiteIdentity::first();
        return response()->json([
            'message' => 'success',
            'data' => $siteIdentity
        ], 200);
    }
    public function update(Request $request, $id){
        $siteIdentity = SiteIdentity::find($id);
        $siteIdentity->update($request->all());
        return response()->json([
            'message' => 'success updated',
            'data' => $siteIdentity
        ], 200);
    }
}

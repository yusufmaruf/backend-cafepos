<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $products = Product::orderBy('id', 'desc')->get();
        return response()->json([
            'success' => true,
            'message' => 'List Data Products.',
            'data' => $products
        ],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
            'name' => 'required',
            'price' => 'required',
        ]);

        $data =  $request->all();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();
            $filename = $originalName . '_' . time() . '.' . $extension;
            $file->move(public_path('store/images/product'), $filename);
            $data['image'] = '/store/images/product/' . $filename;
        }
        $Product =Product::create([
            'name' => $request->name,
            'price' => (int) $request->price,
            'stock' =>  (int) $request->stock,
            'category' => $request->category,
            'image' => $data['image'],
            'is_favorite' => $request->is_favorite
        ]);
        if($Product){
            return response()->json([
                'success' => true,
                'message' => 'Product created successfully.',
                'data' => $Product
            ],201);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Product created failed.',
            ],409);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
        ]);
        $data =  $request->all();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();
            $filename = $originalName . '_' . time() . '.' . $extension;
            $file->move(public_path('store/images/product'), $filename);
            $data['image'] = '/store/images/product/' . $filename;
        }
        $product = Product::findOrFail($id);
        $product->update($data);
        if($product){
            return response()->json([
                'success' => true,
                'message' => 'Product updated successfully.',
                'data' => $product
            ],200);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Product updated failed.',
            ],409);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $product = Product::findOrFail($id);
        if ($product->image)  {
            unlink(public_path($product->image));
        }
        $product->delete();
        return response()->json([
            'success' => true,
            'message' => 'Product deleted successfully.',
        ],200);
    }
}

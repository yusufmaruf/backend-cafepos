<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

    public function index(Request $request)
    {
        $products = DB::table('products')
        ->when($request->input('name'),function($query, $name){
            return $query->where('name', 'like', '%'.$name.'%');
        })
        ->orderBy('id', 'desc')
        ->paginate(10);
        return view('pages.products.index', compact('products' ));
    }

    public function create()
    {
        return view('pages.products.create');
    }

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
        Product::create($data);
        return redirect()->route('product.index');
    }
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('pages.products.edit', compact('product'));
    }



}

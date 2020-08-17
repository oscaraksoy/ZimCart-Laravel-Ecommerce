<?php

namespace App\Http\Controllers\Admin;

use App\Photo;
use App\Product;
use App\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Product\CreateProductRequest;

class ProductController extends Controller
{
    public function __construct()
    {
        return $this->middleware('verifyCategoryCount')->only('create', 'update');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductRequest $request)
    {

        // $imagePath = $request->image->store('uploads/products', 'public');

        // use intervention image to resize images
        // $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
        // $image->save();

        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'code' => $request->code,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'category_id' => $request->category_id,
            'slug' => Str::slug($request->name),
        ]);

        foreach ($request->images as $photo) {
            $name = Str::random(14);

            $extension = $photo->getClientOriginalExtension();

            $image = Image::make($photo)->fit(1200, 1200)->encode($extension);

            Storage::disk('public')->put($path = "products/{$product->id}/{$name}.{$extension}", (string) $image);

            $photo = Photo::create([
                'images' => $path,
                'product_id' => $product->id,
            ]);

            // $product->images()->save($photo);
        }

        session()->flash('success', "$request->name added successfully.");

        return redirect(route('products.index'));


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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::all();

        return view('admin.products.create', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'category_id' => 'required',
        ]);

        $data = $request->only(['name', 'code', 'description', 'price', 'category_id', 'quantity']);

        $product->update($data);

        if($request->hasFile('images')) {

            $product->photos()->delete();

            foreach ($request->images as $photo) {
                $name = Str::random(14);

                $extension = $photo->getClientOriginalExtension();

                $image = Image::make($photo)->fit(1200, 1200)->encode($extension);

                Storage::disk('public')->put($path = "products/{$product->id}/{$name}.{$extension}", (string) $image);

                $photo = Photo::create([
                    'images' => $path,
                    'product_id' => $product->id,
                ]);
            }
        }

        session()->flash('success', "$product->name updated successfully.");

        return redirect(route('products.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->photos()->delete();

        $product->delete();

        session()->flash('success', "$product->name deleted successfully.");

        return redirect(route('products.index'));
    }
}

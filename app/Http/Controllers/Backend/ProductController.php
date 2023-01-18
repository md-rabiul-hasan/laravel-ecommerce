<?php

namespace App\Http\Controllers\Backend;

use App\Brand;
use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use App\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Traits\ImageOperationTrait;
use Exception;

class ProductController extends Controller
{

    use ImageOperationTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            "sl" => 1,
            "products" => Product::all()
        ];
        return view('backend.product.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            "brands"     => Brand::select(['id', 'title'])->get(),
            "categories" => Category::select(['id', 'title'])->get()
        ];
        return view('backend.product.create', $data);
    }

    public function findSubCategory($id){
        $sub_category = SubCategory::select(['id', 'title'])->where('category_id', $id)->get();
        $html = view('backend.product.sub-category', compact('sub_category'))->render();
        return $html;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product                      = new Product();
        $product->brand_id            = $request->input('brand_id');
        $product->category_id         = $request->input('category_id');
        $product->sub_category_id     = $request->input('sub_category_id');
        $product->title               = $request->input('title');
        $product->slug                = Str::slug($request->input('title'));
        $product->product_code        = uniqid();
        $product->quantity            = $request->input('quantity');
        $product->price               = $request->input('price');
        $product->current_price       = ($request->input('price') - ( ($request->input('price') / 100 ) * $request->input('discount_percentage') ));
        $product->discount_percentage = $request->input('discount_percentage');
        $product->key_features        = $request->input('key_features');
        $product->specifications      = $request->input('specifications');
        $product->description         = $request->input('description');
        $product->stock               = $request->input('quantity') > 0 ? 1 : 0;
        $product->image               = $this->imageUpload($request->file('image'), "storage/product/");
        $product->save();
        return redirect()->route('admin.product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $data = [
            "product" => $product
        ];
        return view('backend.product.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $data = [
            "product"        => $product,
            "brands"         => Brand::select(['id', 'title'])->get(),
            "categories"     => Category::select(['id', 'title'])->get(),
            "sub_categories" => SubCategory::select(['id', 'title'])->where('category_id', $product->category_id)->get()

        ];
        return view('backend.product.edit', $data);
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
        $product->brand_id            = $request->input('brand_id');
        $product->category_id         = $request->input('category_id');
        $product->sub_category_id     = $request->input('sub_category_id');
        $product->title               = $request->input('title');
        $product->slug                = Str::slug($request->input('title'));
        $product->quantity            = $request->input('quantity');
        $product->price               = $request->input('price');
        $product->current_price       = ($request->input('price') - ( ($request->input('price') / 100 ) * $request->input('discount_percentage') ));
        $product->discount_percentage = $request->input('discount_percentage');
        $product->key_features        = $request->input('key_features');
        $product->specifications      = $request->input('specifications');
        $product->description         = $request->input('description');
        $product->stock               = $request->input('quantity') > 0 ? 1 : 0;
        $product->image               = $this->imageRemoveAndUpload($product->image, $request->file('image'), "storage/product/");
        $product->save();
        return redirect()->route('admin.product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        try{
            $this->imageRemove($product->image);
            $product->delete();
            $data = [
                "success" => true,
                "message" => "Product delete successfully"
            ];
            return response()->json($data);
        }catch(Exception $e){
            $data = [
                "success" => false,
                "message" => $e->getMessage()
            ];
            return response()->json($data);
        }
    }
    
}

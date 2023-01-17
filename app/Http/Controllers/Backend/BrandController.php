<?php

namespace App\Http\Controllers\Backend;

use App\Brand;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Traits\ImageOperationTrait;
use Exception;

class BrandController extends Controller
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
            "brands" => Brand::all()
        ];
        return view('backend.parameter-setup.brand.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.parameter-setup.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $brand              = new Brand();
        $brand->title       = $request->input('title');
        $brand->slug        = Str::slug($request->input('title'));
        $brand->description = $request->input('description');
        $brand->image       = $this->imageUpload($request->file('image'), "storage/brands/");
        $brand->save();
        return redirect()->route('admin.brand.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        return view('backend.parameter-setup.brand.show', $brand);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        return view('backend.parameter-setup.brand.edit', $brand);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        $brand->title       = $request->input('title');
        $brand->slug        = Str::slug($request->input('title'));
        $brand->description = $request->input('description');
        $brand->image       = $this->imageRemoveAndUpload($brand->image, $request->file('image'), "storage/brands/");;
        $brand->save();
        return redirect()->route('admin.brand.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        try{
            $brand->delete();
            $data = [
                "success" => true,
                "message" => "Brand delete successfully"
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

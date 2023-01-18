<?php

namespace App\Http\Controllers\Backend;

use App\Category;
use App\Http\Controllers\Controller;
use App\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Traits\ImageOperationTrait;
use Exception;

class SubCategoryController extends Controller
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
            "sub_categories" => SubCategory::with('category')->get()
        ];
        return view('backend.parameter-setup.sub-category.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            "categories" => Category::select(['id', 'title'])->get()
        ];
        return view('backend.parameter-setup.sub-category.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sub_category              = new SubCategory();
        $sub_category->title       = $request->input('title');
        $sub_category->slug        = Str::slug($request->input('title'));
        $sub_category->category_id = $request->input('category_id');
        $sub_category->image       = $this->imageUpload($request->file('image'), "storage/sub-category/");
        $sub_category->save();
        return redirect()->route('admin.sub-category.index');
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
    public function edit(SubCategory $sub_category)
    {
        $data = [
            "sub_category" => $sub_category,
            "categories" => Category::select(['id', 'title'])->get()
        ];
        return view('backend.parameter-setup.sub-category.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubCategory $sub_category)
    {
        $sub_category->title       = $request->input('title');
        $sub_category->slug        = Str::slug($request->input('title'));
        $sub_category->category_id = $request->input('category_id');
        $sub_category->image       = $this->imageRemoveAndUpload($sub_category->image, $request->file('image'), "storage/sub-category/");;
        $sub_category->save();
        return redirect()->route('admin.sub-category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubCategory $sub_category)
    {
        try{
            $this->imageRemove($sub_category->image);
            $sub_category->delete();
            $data = [
                "success" => true,
                "message" => "Sub-Category delete successfully"
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

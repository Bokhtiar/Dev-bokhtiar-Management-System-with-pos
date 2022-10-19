<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequestValidation;
use App\Models\Category;
use App\Models\Room;
use App\Traits\Network\CategoryNetwork;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;




class CategoryController extends Controller
{
    use CategoryNetwork;

    /**category create and category list show same page */
    public function index()
    {
        try {
            $categories = $this->resourceList();
            return view('modules.category.index', compact('categories'));
        } catch (\Throwable $th) {
            return redirect()->route('category.index')->with('error', 'Something went wrong.');
        }
            
    }

    /**category store */
    public function store(CategoryRequestValidation $request)
    {   
        try {
            DB::beginTransaction();
            $category = $this->resourceStore($request, $id=null);
            if (!empty($category)) {
                DB::commit();
                return redirect()->route('category.index')->with('success', 'Category Created successfully!');
            }
            throw new \Exception('Invalid About Information');
        } catch (\Exception $ex) {
            DB::rollBack();
            return back()->with('error', "Something went wrong");
        }
    }


    /**category show details */
    public function show($category_id)
    {
        try {
            $show = $this->resourceFindById($category_id);
            return view('modules.category.show', compact('show'));
        } catch (\Throwable $th) {
            return redirect()->route('category.index')->with('error', 'Something went wrong.');
        }
    }

    /**cateogry edit */
    public function edit($category_id)
    {
        try {
            $categories = $this->resourceList();
            $edit =  $this->resourceFindById($category_id);
            return view('modules.category.index', compact('categories', 'edit'));
        } catch (\Throwable $th) {
            return redirect()->route('category.index')->with('Something went wrong');
        }
    }

    /**category update */
    public function update(CategoryRequestValidation $request, $category_id)
    {
        try {
            DB::beginTransaction();
            $category = $this->resourceUpdate($request, $category_id);
            if (!empty($category)) {
                DB::commit();
                return redirect()->route('category.index')->with('success', 'Category Updated successfully!');
            }
            throw new \Exception('Invalid About Information');
        } catch (\Exception $ex) {
            DB::rollBack();
            return back()->with('error', "Something went wrong");
        }
    }


    /**category delete */
    public function destroy($category_id)
    {
        try {
            $this->resourceFindById($category_id)->delete();
            return redirect()->back()->with('success', 'Category Deleted successfully!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    /**status active or inactive */
    public function status($category_id)
    {
        try {
            $category = Category::find($category_id);
            Category::query()->Status($category); // crud trait
            return redirect()->route('category.index')->with('warning', 'Category Status Change successfully!');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**ajax auto suggest category ways room */
    public function category_weays_room(Request $request)
    {
        $rooms = Room::query()->Active()->where('category_id', $request->category_id)->get();
        return response()->json([
            "status" => true,
            "data" => $rooms
        ],200);
    }
}

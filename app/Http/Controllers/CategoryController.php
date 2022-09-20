<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**category create and category list show same page */
    public function index()
    {
        try {
            $categories = Category::all();
            return view('modules.category.index', compact('categories'));
        } catch (\Throwable $th) {
            return redirect()->route('category.index')->with('error', 'Something went wrong.');
        }
    }

    /**category store */
    public function store(Request $request)
    {
        $validated = Category::query()->Validation($request->all());
        if ($validated) {
            try {
                DB::beginTransaction();
                $category = Category::create([
                    'category_name' => $request->category_name,
                    'category_body' => $request->category_body,
                ]);

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
    }


    /**category show details */
    public function show($category_id)
    {
        try {
            $show = Category::find($category_id);
            return view('modules.category.show', compact('show'));
        } catch (\Throwable $th) {
            return redirect()->route('category.index')->with('error', 'Something went wrong.');
        }
    }

    /**cateogry edit */
    public function edit($category_id)
    {
        try {
            $categories = Category::all();
            $edit = Category::find($category_id);
            return view('modules.category.index', compact('categories', 'edit'));
        } catch (\Throwable $th) {
            return redirect()->route('category.index')->with('Something went wrong');
        }
    }

    /**category update */
    public function update(Request $request, $category_id)
    {
        $validated = Category::query()->Validation($request->all());
        if ($validated) {
            try {
                $category = Category::find($category_id);
                DB::beginTransaction();
                $category = $category->update([
                    'category_name' => $request->category_name,
                    'category_body' => $request->category_body,
                ]);

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
    }


    /**category delete */
    public function destroy($category_id)
    {
        try {
            Category::find($category_id)->delete();
            return redirect()->route('category.index')->with('success', 'Category Deleted successfully!');
        } catch (\Throwable $th) {
            return redirect()->route('category.index')->with('error', 'Something went wrong!');
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
}

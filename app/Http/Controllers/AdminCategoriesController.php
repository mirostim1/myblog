<?php

namespace App\Http\Controllers;

use App\Categ;
use App\Http\Requests\CategoriesCreateRequest;
use App\Http\Requests\CategoriesEditRequest;
use Illuminate\Http\Request;

use App\Http\Requests;

class AdminCategoriesController extends Controller
{

    public function index()
    {
        //
        $categories = Categ::all();

        return view('admin.categories.index', compact('categories'));
    }



    public function store(CategoriesCreateRequest $request)
    {
        //
        Categ::create($request->all());

        session(['category_created' => 'New category has been created']);

        return redirect('/admin/categories');
    }


    public function edit($id)
    {
        //
        $category = Categ::findOrFail($id);

        return view('admin.categories.edit', compact('category'));
    }


    public function update(CategoriesEditRequest $request, $id)
    {
        //
        $input = $request->all();

        Categ::findOrFail($id)->update($input);

        session(['category_updated' => 'Category has been updated']);

        return redirect('admin/categories');
    }


    public function destroy($id)
    {
        //
        Categ::findOrFail($id)->delete();

        session(['category_deleted' => 'Category has been deleted']);

        return redirect('admin/categories');
    }
}

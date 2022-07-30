<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //metodos de vistas
    public function index() //info de tabla o informacion de navegacion
    {
        $categories = $this->read();
        return view('category.table', compact('categories'));
    }
    public function register() //formulario de registro e informacion relacionada
    {
        return view('category.register');
    }
    public function edit($id) //formulario de edicion e informacion relacionada
    {
        $category = Category::find($id);
        return view('category.edit', compact('category'));
    }

    // metodos http crud
    public function create(Request $request)
    {
        $data = $this->validateForm($request);

        Category::insert($data);

        return redirect(route('categoryIndex'));
    }
    public function read() // leer todas las entradas
    {
        return Category::all();
    }
    public function update($id, Request $request)
    {
        $data = $this->validateForm($request);

        Category::find($id)->update($data);

        return redirect(route('categoryIndex'));
    }
    public function delete($id)
    {
        Category::find($id)->delete();
        return redirect(route('categoryIndex'));
    }

    //metodos de ayuda

    public function validateForm(Request $request)
    {
        $validatedData = $request->validate([
            'description' => 'required|max:45'
        ]);

        return $validatedData;
    }
}

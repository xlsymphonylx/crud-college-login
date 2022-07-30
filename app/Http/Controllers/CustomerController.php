<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //metodos de vistas
    public function index() //info de tabla o informacion de navegacion
    {
        $customers = $this->read();
        return view('customer.table', compact('customers'));
    }
    public function register() //formulario de registro e informacion relacionada
    {
        $categories = Category::all();
        return view('customer.register', compact('categories'));
    }
    public function edit($id) //formulario de edicion e informacion relacionada
    {
        $customer = Customer::find($id);
        $categories = Category::all();
        return view('customer.edit', compact('customer', 'categories'));
    }

    // metodos http crud
    public function create(Request $request)
    {
        $data = $this->validateForm($request);

        Customer::insert($data);

        return redirect(route('customerIndex'));
    }
    public function read()
    {
        return Customer::all();
    }
    public function update($id, Request $request)
    {
        $data = $this->validateForm($request);

        Customer::find($id)->update($data);

        return redirect(route('customerIndex'));
    }

    public function validateForm(Request $request)
    {
        $validatedData = $request->validate([
            'category_id' => 'required',
            'name' => 'required',
            'phone_number' => 'required',
            'address' => 'required'
        ]);

        return $validatedData;
    }

    public function delete($id)
    {
        Customer::find($id)->delete();
        return redirect(route('customerIndex'));
    }
}

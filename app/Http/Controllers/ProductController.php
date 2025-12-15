<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        
        $totalQuantity = $products->sum('quantity');
        $totalValue = $products->sum(function($product) {
            return $product->quantity * $product->price;
        });

        return view('products.index', compact('products', 'totalQuantity', 'totalValue'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        // Pega todos os dados do formulário
        $data = $request->all();
        
        // TRUQUE: Troca a vírgula por ponto no preço antes de salvar
        if(isset($data['price'])) {
            $data['price'] = str_replace(',', '.', $data['price']);
        }

        Product::create($data);
        return redirect()->route('products.index');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        
        // Pega todos os dados
        $data = $request->all();

        // TRUQUE: Troca a vírgula por ponto também na edição
        if(isset($data['price'])) {
            $data['price'] = str_replace(',', '.', $data['price']);
        }

        $product->update($data);
        return redirect()->route('products.index');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('products.index');
    }
}
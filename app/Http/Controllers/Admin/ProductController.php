<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CategoryModel;
use App\Models\ProductModel;
use App\Models\StoreModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    // Exibir a lista de produtos
    public function index(Request $request)
    {
        $products = ProductModel::query()
        ->when($request->category, function($query) use ($request) {
            return $query->where('category', $request->category);
        })
        ->when($request->search, function($query) use ($request) {
            return $query->where('name', 'like', '%' . $request->search . '%');
        })
        ->paginate(12); // Paginação com 12 produtos por página
        
        $categories = CategoryModel::all(); // Pega todas as categorias da base de dados

        return view('admin.products.index', compact('products', 'categories')); // Redireciona para a view Blade 'index'
    }

    // Exibir o formulário de criação de produto
    public function create()
    {
        $categories = CategoryModel::all(); // Pega todas as categorias da base de dados
        $stores = StoreModel::all(); // Pega todas as categorias da base de dados

        return view('admin.products.create', compact('categories', 'stores')); // Retorna para a view de criação de produto
    }

    // Armazenar novo produto no banco de dados
    public function store(Request $request)
    {
        $price = str_replace(',', '.', $request->input('price'));
        $possible_profit = str_replace(',', '.', $request->input('possible_profit'));

        // Validação personalizada
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'sales_count' => 'nullable|integer',
            'is_trending' => 'nullable|boolean',
            'rating' => 'nullable|numeric|min:0|max:5',
            'link' => 'nullable|url',
            'image_url' => 'nullable|url',
            'category' => 'nullable|integer',
            'status' => 'nullable|integer',
            'possible_profit' => 'nullable|numeric',
        ]);

        // Criação do produto
        ProductModel::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $price,
            'sales_count' => $request->input('sales_count'),
            'is_trending' => $request->input('is_trending', 0),  // Caso o campo não seja informado, 0 será o valor padrão
            'rating' => $request->input('rating'),
            'link' => $request->input('link'),
            'image_url' => $request->input('image_url'),
            'category' => $request->input('category'),
            'status' => $request->input('status', 1),  // Padrão como visível
            'possible_profit' => $possible_profit,
            'id' => Str::uuid(),  // Gerar ID UUID
        ]);
        return redirect()->route('admin.products.index')->with('success', 'Produto criado com sucesso!'); // Redireciona de volta para a lista de produtos
    }

    // Exibir o formulário de edição do produto
    public function edit(ProductModel $product)
    {
        return view('admin.products.edit', compact('product')); // Retorna para a view de edição do produto
    }

    // Atualizar as informações do produto no banco de dados
    public function update(Request $request, ProductModel $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required',
            'sales_count' => 'nullable|integer',
            'status' => 'nullable|integer',
            'category' => 'nullable|integer',
            'profit_margin' => 'nullable|numeric',
            'link' => 'nullable|url',
        ], [
            'name.required' => 'O nome do produto é obrigatório.',
            'name.string' => 'O nome do produto deve ser uma string válida.',
            'name.max' => 'O nome do produto não pode ter mais que 255 caracteres.',
            
            'price.required' => 'O preço do produto é obrigatório.',
            'sales_count.integer' => 'A quantidade de vendas deve ser um número inteiro.',
            
            'status.integer' => 'O status deve ser um valor numérico.',
            
            'category.integer' => 'A categoria deve ser um valor numérico.',
            
            'profit_margin.numeric' => 'A margem de lucro deve ser um valor numérico.',
            
            'link.url' => 'O link do produto deve ser uma URL válida.',
        ]);;

        $product->update($request->all()); // Atualiza os dados do produto
        return redirect()->route('admin.products.index')->with('success', 'Produto atualizado com sucesso!'); // Redireciona para a lista de produtos
    }

    // Excluir um produto
    public function destroy(ProductModel $product)
    {
        $product->delete(); // Deleta o produto do banco de dados
        return redirect()->route('admin.products.index')->with('success', 'Produto excluído com sucesso!'); // Redireciona para a lista de produtos
    }
}

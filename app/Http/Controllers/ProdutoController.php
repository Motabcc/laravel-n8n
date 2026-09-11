<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto; 

class ProdutoController extends Controller
{
    // READ: Lista todos os produtos (GET /produtos)
    public function index()
    {
        $produtos = Produto::all();
        
        return response()->json($produtos); 
    }

    // CREATE: Salva um novo produto no banco (POST /produtos)
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'preco' => 'required|numeric',
            'quantidade' => 'integer',
            'descricao' => 'nullable|string'
        ]);

        // 2. Salva usando o Eloquent (Mass Assignment)
        $produto = Produto::create($request->all());

        return response()->json(['mensagem' => 'Produto criado com sucesso!', 'produto' => $produto], 201);
    }

    // READ: Mostra apenas um produto específico (GET /produtos/{id})
    public function show($id)
    {
        // findOrFail busca pela Chave Primária e retorna erro 404 automaticamente se não existir
        $produto = Produto::findOrFail($id); 
        
        return response()->json($produto);
    }

    // UPDATE: Atualiza os dados de um produto (PUT/PATCH /produtos/{id})
    public function update(Request $request, $id)
    {
        $produto = Produto::findOrFail($id);

        $request->validate([
            'nome' => 'string|max:255',
            'preco' => 'numeric',
            'quantidade' => 'integer'
        ]);

        // Atualiza apenas os campos enviados na requisição
        $produto->update($request->all());

        return response()->json(['mensagem' => 'Produto atualizado com sucesso!', 'produto' => $produto]);
    }

    // DELETE: Apaga um produto do banco (DELETE /produtos/{id})
    public function destroy($id)
    {
        $produto = Produto::findOrFail($id);
        $produto->delete();

        return response()->json(['mensagem' => 'Produto deletado com sucesso!']);
    }
}
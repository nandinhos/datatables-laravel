<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Sale;

class SaleController extends Controller
{
    public function edit($id)
    {
        // Lógica para exibir o formulário de edição para a venda com o ID $id
        $sale = Sale::findOrFail($id);
        return view('sales.edit', compact('sale'));
    }

    public function destroy($id)
    {
        // Lógica para excluir a venda com o ID $id
        $sale = Sale::findOrFail($id);
        $sale->delete();

        return redirect()->route('sales.index')->with('success', 'Venda excluída com sucesso.');
    }
}


<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Exception;
use Illuminate\Http\Request;

class ApiProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Products::get();

        return response($products, 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $product = Products::create($data);

        return response($product, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $products = Products::where("id", $id)
        ->update([
            "name" => $request->name,
            "sku" => $request->sku,
            "product_description" => $request->product_description
        ]);

        if($products){
            return response([
                "success" => true,
                "message" => "Produto atualizado com sucesso"
            ], 201);
        }

        return response([
            "success" => false,
            "message" => "Houve um erro ao atualizar o produto"
        ], 500);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            Products::where("id", $id)->delete();
            return response([
                "success" => true,
                "message" => "Produto excluído com sucesso"
            ], 201);

        }catch(Exception $e){
            return response([
                "success" => true,
                "message" => "Houve um erro ao excluir o produto"
            ], 500);
        }
    }
}

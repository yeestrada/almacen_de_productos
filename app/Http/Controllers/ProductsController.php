<?php

namespace App\Http\Controllers;

use App\Laptop;
use App\Products;
use App\Shoe;
use App\Tv;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = trans('admin.products');
        $repo  = Products::all();
        $columns = Products::getTableColumns();
        return view('products.index', compact('title', 'repo', 'columns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = trans('admin.create_product');
        $tipo_pantalla = ['LED' => 'LED', 'LCD' => 'LCD', 'OLED' => 'OLED'];
        $procesador = ['Intel' => 'Intel', 'AMD' => 'AMD'];
        $material = ['Piel' => 'Piel', 'Plástico' => 'Plástico'];
        $tipo = ['tv' => 'Tv', 'laptop' => 'Laptop', 'shoes'=>trans('admin.shoe')];
        return view('products.create', compact('title', 'tipo_pantalla', 'procesador', 'material', 'tipo'));
    }

    public function filter(Request $request){
        $data = $request->all();
        $exceptions = ['_token' => ''];
        $selects = ["(case when (Select count(*) FROM laptops where id_product = T.id ) > 0 then 'Laptop' 
                           when (Select count(*) FROM tvs where id_product = T.id) > 0 then 'Tv' 
                           else '".trans('admin.shoe')."' end)  as tipo",
                    "(case when (Select count(*) FROM laptops where id_product = T.id) > 0 then costo * 0.4 
                           when (Select count(*) FROM tvs where id_product = T.id) > 0 then costo * 0.35 
                           else costo * 0.3 end) as precio_venta",
                    "null as selected"];
        $info = [
            'columns' =>  ['selected' ,'id', 'nombre', 'sku', 'marca', 'costo', 'precio_venta', 'tipo'],
            'controller' => 'ProductsController',
            'table' => with(new Products())->getTable(),
            'route' => [
                'show' => [
                    'name' => 'products.show',
                    'text' => trans('admin.show_products')
                ],
                'edit' => [
                    'name' => 'products.edit',
                    'text' => trans('admin.edit_products')
                ],
                'destroy' => [
                    'name' => 'products.destroy',
                    'text' => trans('admin.delete_products')
                ]
            ],
            'replace' =>[
            ]
        ];
        return $this->internalFilter($data, $info ,$exceptions, [], $selects);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        switch ($data['tipo']){
            case 'tv':
                $request->validate([
                    'tamano_pantalla' => 'required|numeric|max:9999|min:0',
                    'tipo_pantalla' => 'required',
                ]);
                $child =  new Tv();
                break;
            case 'laptop':
                $request->validate([
                    'ram' => 'required|numeric|max:9999|min:0',
                    'procesador' => 'required',
                ]);
                $child =  new Laptop();
                break;
            case 'shoes':
                $request->validate([
                    'numero' => 'required|numeric|max:9999|min:0',
                    'material' => 'required',
                ]);
                $child =  new Shoe();
                break;
        }

        $product = new Products();
        $product->fill($data);
        $product->save();

        $child->fill($data);
        $child->id_product = $product->id;
        $child->save();
        return redirect(route('products.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(Products $product)
    {
        $title = $product->nombre;
        return view('products.show', compact('title', 'product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit(Products $product)
    {
        $title = $product->nombre;
        $tipo_pantalla = ['LED' => 'LED', 'LCD' => 'LCD', 'OLED' => 'OLED'];
        $procesador = ['Intel' => 'Intel', 'AMD' => 'AMD'];
        $material = ['Piel' => 'Piel', 'Plástico' => 'Plástico'];
        $tipo = ['tv' => 'Tv', 'laptop' => 'Laptop', 'shoes'=>trans('admin.shoe')];
        return view('products.edit', compact('title', 'product', 'tipo_pantalla', 'procesador', 'material', 'tipo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Products $product)
    {
        $data = $request->all();
        $child = $product->getChildData();
        $compare = $data['tipo'] == $product->getProductType();

        if ($compare){
            switch ($data['tipo']){
                case 'tv':
                    $request->validate([
                        'tamano_pantalla' => 'required|numeric|max:9999|min:0',
                        'tipo_pantalla' => 'required',
                    ]);
                    break;
                case 'laptop':
                    $request->validate([
                        'ram' => 'required|numeric|max:9999|min:0',
                        'procesador' => 'required',
                    ]);
                    break;
                case 'shoes':
                    $request->validate([
                        'numero' => 'required|numeric|max:9999|min:0',
                        'material' => 'required',
                    ]);
                    break;
            }
        }
        else{
            if ($child != null ) $child->delete();
            switch ($data['tipo']){
                case 'tv':
                    $request->validate([
                        'tamano_pantalla' => 'required|numeric|max:9999|min:0',
                        'tipo_pantalla' => 'required',
                    ]);
                    $child =  new Tv();
                    break;
                case 'laptop':
                    $request->validate([
                        'ram' => 'required|numeric|max:9999|min:0',
                        'procesador' => 'required',
                    ]);
                    $child =  new Laptop();
                    break;
                case 'shoes':
                    $request->validate([
                        'numero' => 'required|numeric|max:9999|min:0',
                        'material' => 'required',
                    ]);
                    $child =  new Shoe();
                    break;
            }
        }
        $product->fill($data);
        $child->fill($data);
        $child->id_product = $product->id;

        $product->update();
        $compare? $child->update(): $child->save();
        return redirect(route('products.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(Products $product)
    {
        $child = $product->getChildData();
        $child->delete();
        $product->delete();
        return redirect(route('products.index'));
    }

    /**
     * Remove the specified resource from storage by post.
     *
     * @param  integer  $id
     */
    public function delete($id)
    {
        $product = Products::findOrFail($id);
        $child = $product->getChildData();
        $child->delete();
        $product->delete();
    }

}

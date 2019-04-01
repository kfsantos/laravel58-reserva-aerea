<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Brand;
use App\Http\Requests\BrandStoreUpdateFormRequest;

class BrandController extends Controller
{
    private $brand;
    protected $totalpage = 2;

    public function __construct(Brand $brand ){
        $this->brand = $brand;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Marcas de Avões";

        $brands = $this->brand->paginate($this->totalpage);


        return view('panel.brands.index', compact('title', 'brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Cadastrar Aviões";

        return view('panel.brands.create-edit', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BrandStoreUpdateFormRequest $request)
    {
        $dataForm = $request->all();
        $insert = $this->brand->create($dataForm);

        if($insert){
            return redirect()->route('brands.index')->with('success', 'Cadastro realizado com sucesso!');
        }else{
            return redirect()->back()->with('error', 'Falha ao Cadastrar!');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $brand = $this->brand->find($id);
        
        if(!$brand){
            return redirect()->back();
        }

        $title = "Detalhes da Marca: {$brand->name}";

        return view('panel.brands.show', compact('brand', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand = $this->brand->find($id);
        
        if(!$brand){
            return redirect()->back();
        }

        $title = "Editar Marca: {$brand->name}";
        return view('panel.brands.create-edit', compact('brand', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BrandStoreUpdateFormRequest $request, $id)
    {
        $brand = $this->brand->find($id);
        if(!$brand){
            return redirect()->back();
        }

        $update = $brand->update($request->all());

        if($update){
            return redirect()->route('brands.index')->with('success', 'Atualizado realizado com sucesso!');
        }else{
            return redirect()->back()->with('error', 'Falha ao Editar!');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = $this->brand->find($id);

        if(!$brand){
            return redirect()->back();
        }

        if($brand->delete()){
            return redirect()->route('brands.index')->with('success', 'Remoção realizado com sucesso!');
        }else{
            return redirect()->back()->with('error', 'Falha ao Remover!');
        }
    }


    public function search(Request $request){

        $dataForm = $request->except('_token');

        $brands = $this->brand->search($request->key_search,$this->totalpage);

        $title = "Brands, filtros para: {$request->key_search}";

        return view('panel.brands.index', compact('title', 'brands', 'dataForm'));
    }
}

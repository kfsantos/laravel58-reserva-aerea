<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Plane;
use App\Model\Brand;

class PlaneController extends Controller
{

    private $plane;
    private $totalPage = 20;

    public function __construct(Plane $plane){
        $this->plane = $plane;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Listagem de aviões";

        $planes = $this->plane->paginate($this->totalPage);

        return view('panel.planes.index', compact('title', 'planes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Cadastro de aviões";
        $brands = Brand::pluck('name', 'id');
        $classes = $this->plane->classes();

        return view('panel.planes.create', compact('title', 'classes', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dataForm = $request->all();
        $insert = $this->plane->create($dataForm);

        if($insert){
            return redirect()
                        ->route('planes.index') 
                        ->with('success', 'Cadastro realizado com sucesso!');
        }else{
            return redirect()
                        ->back()
                        ->with('error', 'Falha ao Cadastrar!')
                        ->withInput();
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function search(Request $request){
        
        $dataForm = $request->except('_token');
        $planes = $this->plane->search($request->key_search, $this->totalpage);
        $title = "Planes, filtros para: {$request->key_search}";

        return view('panel.planes.index', compact('title', 'planes', 'dataForm'));
    }
}
<?php

namespace App\Http\Controllers;
use App\Models\Unitkerja;

use Illuminate\Http\Request;

class UnitKerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $unitkerjas = UnitKerja::latest()->paginate(5);
        // return view('unitkerja.index',compact('unitkerjas'))
        // ->with('i', (request()->input('page', 1) - 1) * 5);

        $unitkerjas = UnitKerja::latest();
        
        if(request('search')){
            $unitkerjas->where('name', 'like', '%' . request('search') . '%');
        }
       
        // return view('products.index',compact('products'));
            // ->with('i', (request()->input('page', 1) - 1) * 5);
            return view('unitkerja.index',[
                "unitkerjas" => $unitkerjas->paginate(10)->withQueryString()
            ] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $unitkerjas = UnitKerja::latest()->orderBy('id', 'ASC')->get();

        return view('unitkerja.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required',
            

        ]);

        UnitKerja::create($request->all());
   
        return redirect()->route('unitkerja.indexs')
                        ->with('success','Unit Kerja created successfully.');
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
        // $unitkerja = UnitKerja::latest()->orderBy('id', 'ASC')->get();
        $unitkerjas = UnitKerja::findOrFail($id);
        return view('unitkerja.show',['unitkerjas' => $unitkerjas]);

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
        $unitkerjas = UnitKerja::findOrFail($id);
        return view('unitkerja.edit',compact('unitkerjas'));

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
        $unitkerjas = UnitKerja::findOrFail($id);
        $unitkerjas->name = $request->name;
        // $products->detail = $request->detail;
        // $products->unitkerja = $request->unitkerja;
        // $products->bagian = $request->bagian;
        // $products->jabatan = $request->jabatan;
        // $products->email = $request->email;
        // $products->description = $request->description;
        // $products->permintaan_at = $request->permintaan_at;

        if ( $unitkerjas->save()) {
            return redirect()->route('unitkerjas.indexs')
            ->with('success','Unit Kerja updated successfully.');    
        } else {
            return redirect()->route('unitkerja.edit')->with('error', 'Data failed to update');
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
        //
        $unitkerja = UnitKerja::findOrFail($id);
        $unitkerja->delete();
  
        return redirect()->route('unitkerjas.indexs')
                        ->with('success','Request deleted successfully');
    }
}

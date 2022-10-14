<?php

namespace App\Http\Controllers;
use App\Models\Jabatan;

use Illuminate\Http\Request;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $jabatans = Jabatan::latest();
        
        if(request('search')){
            $jabatans->where('name', 'like', '%' . request('search') . '%');
        }
       
        // return view('products.index',compact('products'));
            // ->with('i', (request()->input('page', 1) - 1) * 5);
            return view('jabatan.index',[
                "jabatans" => $jabatans->paginate(10)->withQueryString()
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
        $jabatans = Jabatan::latest()->orderBy('id', 'ASC')->get();

        return view('jabatan.create');

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

        Jabatan::create($request->all());
   
        return redirect()->route('jabatans.indexs')
                        ->with('success','Jabatan created successfully.');
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
        $jabatans = Jabatan::findOrFail($id);
        return view('jabatan.show',['jabatans' => $jabatans]);

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
        $jabatans = Jabatan::findOrFail($id);
        return view('jabatan.edit',compact('jabatans'));

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
        $jabatans = Jabatan::findOrFail($id);
        $jabatans->name = $request->name;
        // $products->detail = $request->detail;
        // $products->unitkerja = $request->unitkerja;
        // $products->bagian = $request->bagian;
        // $products->jabatan = $request->jabatan;
        // $products->email = $request->email;
        // $products->description = $request->description;
        // $products->permintaan_at = $request->permintaan_at;

        if ( $jabatans->save()) {
            return redirect()->route('jabatans.indexs')
            ->with('success','Jabatan updated successfully.');    
        } else {
            return redirect()->route('jabatans.edit')->with('error', 'Data failed to update');
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
        $jabatans = Jabatan::findOrFail($id);
        $jabatans->delete();
  
        return redirect()->route('jabatans.indexs')
                        ->with('success','Jabatan deleted successfully');
    }
}

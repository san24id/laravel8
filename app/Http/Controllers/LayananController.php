<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
// use App\Models\UnitKerja;
// use App\Models\Jabatan;
// use App\Models\Breaks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use DB;

class LayananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     
    public function index()
    {
        // $products = Product::all();
        // dd(request('search'));
        $layanans = Layanan::latest();
        // dd($layanans);
        // $breaks = Breaks::latest()->orderBy('id', 'ASC')->get();
        // $jabatans = Jabatan::latest()->orderBy('id', 'ASC')->get();
        // $unitkerjas = UnitKerja::latest()->orderBy('id', 'ASC')->get();
        // $breaks = Breaks::latest()->orderByDesc('id')->get();
        // if(request('search')){
        //     $products->where('name', 'like', '%' . request('search') . '%')
        //              ->orWhere('email', 'like', '%' . request('search') . '%')
        //              ->orWhere('id_kategori', 'like', '%' . request('search') . '%');
        // }
       
        // return view('products.index',compact('products'));
            // ->with('i', (request()->input('page', 1) - 1) * 5);
            return view('layanans.index',[
                "layanans" => Layanan::latest()->filter(request(['search']))
                ->paginate(10)->withQueryString()
            ] );
           
    }

    // public function cari(Request $request)
	// {
	// 	// menangkap data pencarian
    //     $products = Product::latest();
	// 	$cari = $request->cari;
    //     dd(request('cari'));

    // 		// mengambil data dari table pegawai sesuai pencarian data
	// 	$products = DB::table('$products')
	// 	->where('name','like',"%".$products."%")
	// 	->paginate();
 
    // 		// mengirim data pegawai ke view index
	// 	return view('products.index',['products' => $products]);
 
	// }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $jabatans = Jabatan::latest()->orderBy('id', 'ASC')->get();
        // $jabatans = DB::table('m_jabatan')->orderBy('id', 'ASC')->get();
        // $unitkerjas = UnitKerja::latest()->orderBy('id', 'ASC')->get();
        // $breaks = Breaks::latest()->orderBy('id', 'ASC')->get();
        // echo $jabatans;
        return view('layanans.create');
    }

    public function createPIP()
    {
        // $jabatans = Jabatan::latest()->orderBy('id', 'ASC')->get();
        // $jabatans = DB::table('m_jabatan')->orderBy('id', 'ASC')->get();
        // $unitkerjas = UnitKerja::latest()->orderBy('id', 'ASC')->get();
        // $breaks = Breaks::latest()->orderBy('id', 'ASC')->get();
        // echo $jabatans;
        return view('layanans.createPIP');
    }
  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validateData = $request->validate([
            'id_layanan' => 'required',
            'name' => 'required',
            'email' => 'required',
            'alamat' => 'required',
            'job' => 'required',
            'telephone' => 'required',
            'alasan' => 'required',
            // 'informasi' => 'required',
            // 'tujuan' => 'required',

        ]);
        // dd($validateData);
        // if($request->file('image')) {
        //     $validateData['image'] = $request->file('image')->store('product-image');
        // }

        Layanan::create($validateData);
   
        return redirect()->route('layanans.indexs')
                        ->with('success','Keberatan Informasi Publik was successfully Submit');
    }

    public function storePIP(Request $request)
    {
        
        $validateData = $request->validate([
            'id_layanan' => 'required',
            'name' => 'required',
            'email' => 'required',
            'alamat' => 'required',
            'job' => 'required',
            'telephone' => 'required',
            // 'alasan' => 'required',
            'informasi' => 'required',
            'tujuan' => 'required',

        ]);
        // dd($validateData);
        // if($request->file('image')) {
        //     $validateData['image'] = $request->file('image')->store('product-image');
        // }

        Layanan::create($validateData);
   
        return redirect()->route('layanans.indexs')
                        ->with('success','Permohonan Informasi Publik was successfully Submit.');
    }
   
    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    
    {
        // $jabatans = Jabatan::latest()->orderBy('id', 'ASC')->get();
        // $unitkerja = UnitKerja::latest()->orderBy('id', 'ASC')->get();
        // $breaks = Breaks::latest()->orderBy('id', 'ASC')->get();

        $layanans = Layanan::findOrFail($id);
        // dd($products);
        return view('layanans.show',compact('layanans'));

    }
   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    
    public function edit($id)
    {
        $layanans = Layanan::findOrFail($id);
        // $breaks = Breaks::all();
        // $jabatans = Jabatan::all();
        // $unitkerja = UnitKerja::all();
      
        return view('layanans.edit',compact('layanans'));
        // echo $breaks;
    }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, Product $product)
    // {
    //     $request->validate([
    //         'name' => 'required',
    //         'detail' => 'required',
    //     ]);
  
    //     $product->update($request->all());
  
    //     return redirect()->route('products.indexs')
    //                     ->with('success','Product updated successfully');
    // }

    // public function update(Request $request, $id)
    // {
    //     $breaks = Breaks::latest()->orderByDesc('id')->get();
    //     $product = Product::findOrFail($id);
    //     $product->name = $request->name;
    //     $product->detail = $request->detail;


    //     if ( $product->save()) {

    //         return redirect()->route('products.indexs')->with('success', 'Data updated successfully');
    
    //        } else {
               
    //         return redirect()->route('products.create')->with('error', 'Data failed to update');
    
    //        }
    // }

    public function update(Request $request, $id)
    {
        //
        $products = Product::findOrFail($id);
        $validateData = $products->validate([
        // $products->name = $request->name;
        // $products->detail = $request->detail;
        // $products->unitkerja = $request->unitkerja;
        // $products->bagian = $request->bagian;
        // $products->jabatan = $request->jabatan;
        // $products->email = $request->email;
        // $products->description = $request->description;
        // $products->permintaan_at = $request->permintaan_at;
            'id_layanan' => 'required',
            'name' => 'required',
            'email' => 'required',
            'alamat' => 'required',
            'job' => 'required',
            'telephone' => 'required',
            'alasan' => 'required',
            'informasi' => 'required',
            'tujuan' => 'required',
        ]);

        $validateData = $products->validate($rules);

        // if($products->file('image')) {
        //     if($products->oldImage) {
        //         Storage::delete($products->oldImage);
        //     }
        //     $validateData['image'] = $request->file('image')->store('products-image');
        // }

        if ( $validateData->save()) {
            return redirect()->route('layanans.indexs')
            ->with('success','Layanan Informasi updated successfully.');    
        } else {
            return redirect()->route('layanans.edit')->with('error', 'Data failed to update');
        }
    }

  
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $layanan = Layanan::findOrFail($id);
        $layanan->delete();
        // if($product->oldImage) {
        //     Storage::delete($product->image);
        // }

        return redirect()->route('layanans.indexs')
                        ->with('success','The Information has been deleted ');
    }
}

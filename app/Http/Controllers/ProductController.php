<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\UnitKerja;
use App\Models\Jabatan;
use App\Models\Breaks;
use Illuminate\Http\Request;
use DB;

class ProductController extends Controller
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
        $products = Product::latest();
        // $breaks = Breaks::latest()->orderBy('id', 'ASC')->get();
        // $jabatans = Jabatan::latest()->orderBy('id', 'ASC')->get();
        // $unitkerjas = UnitKerja::latest()->orderBy('id', 'ASC')->get();
        // $breaks = Breaks::latest()->orderByDesc('id')->get();
        // if(request('search')){
        //     $products->where('name', 'like', '%' . request('search') . '%')
        //              ->orWhere('unitkerja', 'like', '%' . request('search') . '%')
        //              ->orWhere('detail', 'like', '%' . request('search') . '%');
        // }
       
        // return view('products.index',compact('products'));
            // ->with('i', (request()->input('page', 1) - 1) * 5);
            return view('products.index',[
                "products" => Product::with(['unitkerja','jabatan'])->latest()->filter(request(['search']))
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
        $jabatans = Jabatan::latest()->orderBy('id', 'ASC')->get();
        // $jabatans = DB::table('m_jabatan')->orderBy('id', 'ASC')->get();
        $unitkerjas = UnitKerja::latest()->orderBy('id', 'ASC')->get();
        $breaks = Breaks::latest()->orderBy('id', 'ASC')->get();
        // echo $jabatans;
        return view('products.create',compact('breaks','unitkerjas','jabatans'));
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
            'name' => 'required',
            'detail' => 'required',
            'bagian' => 'required',
            'email' => 'required',
            'unitkerja' => 'required',
            'jabatan' => 'required',
            'description' => 'required',
            'permintaan_at' => 'required',
            'image' => 'image|file|max:3024',

        ]);
        
        if($request->file('image')) {
            $validateData['image'] = $request->file('image')->store('product-image');
        }

        Product::create($validateData);
   
        return redirect()->route('products.indexs')
                        ->with('success','Request created successfully.');
    }
   
    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    
    {
        $jabatans = Jabatan::latest()->orderBy('id', 'ASC')->get();
        $unitkerja = UnitKerja::latest()->orderBy('id', 'ASC')->get();
        $breaks = Breaks::latest()->orderBy('id', 'ASC')->get();

        $products = Product::findOrFail($id);
        // dd($products);
        return view('products.show',compact('products'));

    }
   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    
    public function edit($id)
    {
        $products = Product::findOrFail($id);
        $breaks = Breaks::all();
        $jabatans = Jabatan::all();
        $unitkerja = UnitKerja::all();
      
        return view('products.edit',compact('products','breaks','unitkerja','jabatans'));
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
        $products->name = $request->name;
        $products->detail = $request->detail;
        $products->unitkerja = $request->unitkerja;
        $products->bagian = $request->bagian;
        $products->jabatan = $request->jabatan;
        $products->email = $request->email;
        $products->description = $request->description;
        $products->permintaan_at = $request->permintaan_at;

        if ( $products->save()) {
            return redirect()->route('products.indexs')
            ->with('success','Request updated successfully.');    
        } else {
            return redirect()->route('products.edit')->with('error', 'Data failed to update');
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
        $product = Product::findOrFail($id);
        $product->delete();
  
        return redirect()->route('products.indexs')
                        ->with('success','Request has been deleted ');
    }
}

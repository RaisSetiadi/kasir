<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProdukController extends Controller
{
    //
    public function index(): View
    {
        $produks = Produk::latest()->paginate(5);
        $title = 'Delete Data!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return view('produk.index', compact('produks'));
    }

    public function create(): View
    {
        return view('produk.create');
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'nama_produk'     => 'required|min:5',
            'harga'   => 'required',
            'stok' => 'required'
        ]);

        //upload image

        //create post
        Produk::create([
            'nama_produk'     => $request->nama_produk,
            'harga'   => $request->harga,
            'stok' => $request->stok
        ]);

        //redirect to index
        return redirect()->route('produk.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    public function edit(string $id): View
    {
        //get post by ID
        $produks = Produk::findOrFail($id);

        //render view with post
        return view('produk.edit', compact('produks'));
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'nama_produk'     => 'required|min:5',
            'harga'   => 'required',
            'stok' => 'required'

        ]);

        //get post by ID
        $produks = Produk::findOrFail($id);




        //update post without image
        $produks->update([
            'nama_produk'     => $request->nama_produk,
            'harga'   => $request->harga,
            'stok' => $request->stok
        ]);


        //redirect to index
        return redirect()->route('produk.index')->with(['success' => 'Data Berhasil Diubah!']);
    }
    public function destroy(Produk $produk)
    {
        $produk->delete();
        alert()->success('Hore!', 'Post Deleted Successfully');
        return back();
    }
}

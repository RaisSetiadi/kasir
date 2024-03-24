<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class PetugasController extends Controller
{
    //
    public function index(): View
    {
        $petugas = User::latest()->paginate(5);
        return view('petugas.index', compact('petugas'));
    }
    public function create(): View
    {
        return view('petugas.create');
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
            'name'     => 'required|min:5',
            'email'   => 'required',
            'password' => 'required|min:8',
            'usertype' => 'required'
        ]);

        //upload image

        //create post
        User::create([
            'name'     => $request->name,
            'email'   => $request->email,
            'password' => Hash::make($request->get('password')),
            'usertype' => $request->usertype
        ]);

        //redirect to index
        return redirect()->route('petugas.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    public function edit(string $id): View
    {
        //get post by ID
        $petugas = User::findOrFail($id);

        //render view with post
        return view('petugas.edit', compact('petugas'));
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
            'name'     => 'required|min:5',
            'email'   => 'required',
            'password' => 'required|min:8',
            'role' => 'required'

        ]);

        //get post by ID
        $petugas = User::findOrFail($id);




        //update post without image
        $petugas->update([
            'name'     => $request->name,
            'email'   => $request->email,
            'password' => Hash::make($request->get('password')),
            'role' => $request->role
        ]);


        //redirect to index
        return redirect()->route('petugas.index')->with(['success' => 'Data Berhasil Diubah!']);
    }
}

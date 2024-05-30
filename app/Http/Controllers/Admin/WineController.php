<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\WineRequest;
use Illuminate\Http\Request;
use App\Models\Flavor;
use App\Models\Wine;
use App\Functions\Helper as Help;

class WineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $wines = Wine::paginate(12);

        return view('admin.wines.index', compact('wines'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $flavors = Flavor::all();
        $title = 'Crea un nuovo vino';
        $route =  route('admin.wines.store');
        $method = 'POST';
        $wine = null;
        $button = 'Crea';
        return view('admin.wines.create-edit', compact('route', 'method', 'wine', 'title', 'button', 'flavors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(WineRequest $request)
    {
        $form_data = $request->all();
        // dd($form_data);


        $exist = Wine::where('wine', $form_data['wine'])->first();

        if ($exist) {
            return redirect()->route('admin.wines.create')->with('error', 'Nome vino già esistente');
        } else {
            $new_wine = new Wine();
            $form_data['slug'] = Help::createSlug($form_data['wine'], new Wine());

            $new_wine->fill($form_data);

            $new_wine->save();
            if (array_key_exists('flavors', $form_data)) {
                $new_wine->flavors()->sync($form_data['flavors']);
            }
            return redirect()->route('admin.wines.show', $new_wine);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Wine $wine)
    {
        return view('admin.wines.show', compact('wine'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Wine $wine)
    {
        $flavors = Flavor::all();
        $title = 'Aggiorna vino';
        $route =  route('admin.wines.update', $wine);
        $method = 'PUT';
        $button = 'Aggiorna';
        return view('admin.wines.create-edit', compact('route', 'method', 'wine', 'title', 'button', 'flavors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(WineRequest $request, Wine $wine)
    {
        $form_data = $request->all();

        if ($form_data['wine'] === $wine->wine) {
            $form_data['slug'] = $wine->slug;
        } else {
            $form_data['slug'] = Help::createSlug($form_data['wine'], Wine::class);
        }

        $wine->update($form_data);
        if (array_key_exists('flavors', $form_data)) {
            $wine->flavors()->sync($form_data['flavors']);
        } else {
            $wine->flavors()->detach();
        }
        // preghiamo

        return redirect()->route('admin.wines.show', $wine);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Wine $wine)
    {
        $wine->delete();

        return redirect()->route('admin.wines.index')->with('deleted', 'Il vino' . ' ' . $wine->wine . ' ' . 'è stato cancellato con successo!');
    }
}

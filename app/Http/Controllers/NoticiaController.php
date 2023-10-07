<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class NoticiaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $noticias = [];
        // if (Cache::has('dez_primeiras_noticias')) {
        //     $noticias = Cache::get('dez_primeiras_noticias');
        // } else {
        //     $noticias = Noticia::orderByDesc('created_at')->limit(10)->get();
        //     Cache::put('dez_primeiras_noticias', $noticias, 15);
        // }

        $noticias = Cache::remember('dez_primeiras_noticias', 15, function () {
            return Noticia::orderByDesc('created_at')->limit(10)->get();
        });
        return view('noticia', ['noticias' => $noticias]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Noticia $noticia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Noticia $noticia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Noticia $noticia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Noticia $noticia)
    {
        //
    }
}

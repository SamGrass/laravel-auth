<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PorfolioRequest;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use App\Functions\Helper;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $portfolios = Portfolio::orderBy('id', 'desc')->paginate(20);
        return view('admin.portfolios.index', compact('portfolios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.portfolios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PorfolioRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Helper::generateSlug($data['name'], Portfolio::class);
        $portfolio = Portfolio::create($data);

        return redirect()->route('admin.portfolios.show', $portfolio);
    }

    /**
     * Display the specified resource.
     */
    public function show(Portfolio $portfolio)
    {

        return view('admin.portfolios.show', compact('portfolio'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Portfolio $portfolio)
    {
        return view('admin.portfolios.edit', compact('portfolio'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PorfolioRequest $request, Portfolio $portfolio)
    {
        $data = $request->all();
        if (!$data['name'] === $portfolio->name) {
            $data['slug'] = Helper::generateSlug($data['name'], portfolio::class);
        }
        $portfolio->update($data);
        return redirect()->route('admin.portfolios.show', $portfolio)->with('success', 'Elemento modificato con successo');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Portfolio $portfolio)
    {
        $portfolio->delete();
        return redirect()->route('admin.portfolios.index')->with('deleted', 'Elemento eliminato con successo');
    }
}

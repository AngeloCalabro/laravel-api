<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Http\Requests\StoreLanguageRequest;
use App\Http\Requests\UpdateLanguageRequest;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *
     */
    public function index()
    {
        $languages = Language::all();
        return view('admin.languages.index', compact('languages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     *
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLanguageRequest  $request
     *
     */
    public function store(StoreLanguageRequest $request)
    {
        $val = $request->validated();
        $slug = Language::generateSlug($request->name);
        $val['slug'] = $slug;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Language  $language
     *
     */
    public function show(Language $language)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Language  $language
     *
     */
    public function edit(Language $language)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLanguageRequest  $request
     * @param  \App\Models\Language  $language
     *
     */
    public function update(UpdateLanguageRequest $request, Language $language)
    {
        $val_data = $request->validated();
        $slug = Language::generateSlug($request->name);
        $language->update($val_data);
        return redirect()->back()->with('message', 'Language $slug update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Language  $language
     *
     */
    public function destroy(Language $language)
    {
        $language->delete();
        return redirect()->back()->back()->with('message', 'Language $language->name removed successfully');
    }
}

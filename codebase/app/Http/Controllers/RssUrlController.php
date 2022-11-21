<?php

namespace App\Http\Controllers;

use App\Models\RssUrl;
use Illuminate\Http\Request;

class RssUrlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = RssUrl::latest()->paginate(5);

        return view('rss.index', compact('data'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rss.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'rss_name' =>  'required',
            'url'      =>  'required|url|unique:rss_urls',
        ]);


        $rssUrl = new RssUrl();

        $rssUrl->rss_name = $request->rss_name;
        $rssUrl->url = $request->url;

        $rssUrl->save();

        return redirect()->route('urls.index')->with('success', 'Rss url added successfully.');
    }


    /**
     * @param RssUrl $url
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(RssUrl $url)
    {
        return view('rss.show', compact('url'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RssUrl  $rssUrl
     * @return \Illuminate\Http\Response
     */
    public function edit(RssUrl $url)
    {
        return view('rss.edit', compact('url'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RssUrl  $rssUrl
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RssUrl $url)
    {
        $request->validate([
            'rss_name'      =>  'required',
            'url'     =>  'required|url',
        ]);

        $url = RssUrl::find($request->hidden_id);
        $url->rss_name = $request->rss_name;
        $url->url = $request->url;
        $url->save();

        return redirect()->route('urls.index')->with('success', 'Rss url Data has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RssUrl  $rssUrl
     * @return \Illuminate\Http\Response
     */
    public function destroy(RssUrl $url)
    {
        $url->delete();

        return redirect()->route('urls.index')->with('success', 'Rss url Data deleted successfully');
    }
}

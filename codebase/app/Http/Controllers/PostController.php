<?php

namespace App\Http\Controllers;

use App\Jobs\PingJob;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filterTypes = [
            'Title',
            'RSS feed',
            'Date of creation',
        ];
        $filter = $request->query('filter');
        $filterType = $request->query('filter_type');

        if (!empty($filter)) {
            $filterPar = [
                'column' => 'title',
                'operator' => 'like',
                'constrain' => '%'. $filter .'%'
            ];
            if ('RSS feed' == $filterType) {
                $filterPar = [
                    'column' => 'source_url',
                    'operator' => 'like',
                    'constrain' => '%'. $filter .'%'
                ];
            } else if ('Date of creation' == $filterType) {
                $filterPar = [
                    'column' => 'created_at',
                    'operator' => '=',
                    'constrain' => $filter
                ];
            }


            $data = Post::latest()
                ->where(sprintf('posts.%s', $filterPar['column']), $filterPar['operator'], $filterPar['constrain'])
                ->paginate(5);
        } else {
            $data = Post::latest()
                ->paginate(5);
        }

        return view('post.index', compact('data', 'filter', 'filterTypes', 'filterType'));

    }

    public function fetch()
    {
        PingJob::dispatch();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}

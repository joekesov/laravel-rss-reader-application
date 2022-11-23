<?php

namespace App\Http\Controllers;

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
}

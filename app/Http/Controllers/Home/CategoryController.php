<?php

namespace App\Http\Controllers\Home;

use App\Category;
use App\Post;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!$request->has('search') && !$request->has('hasImg') && !$request->has('onlyTitle') && !$request->has('today') && !$request->has('user')) {
            // return redirect(route('category.show', [0]));
            return redirect()->back();
        }
        $cat_id = $request->get('cat-id');

        $value = $request->get('search');
        $category = Category::find($cat_id);

//        $posts = Post::where('title', $request->get('search'))->orderBy('created_at', 'desc')->paginate(config('classifieds.posts_per_page'));
        $posts = Post::where(function ($query) use ($value, $cat_id) {
            $query->orWhere('id', $value);
            $query->orWhere('content', 'LIKE', '%' . $value . '%');
        })->whereNull('deleted_at')->orderBy('created_at', 'desc')->paginate(config('classifieds.posts_per_page'));

        return view('home.category.show', ['posts' => $posts, 'category' => $category]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('parent_id', 0)->get();
        return view('home.category.create', ['categories' => $categories]);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
//        $posts = Post::where('category_id', $id)->orderBy('created_at', 'desc')->paginate(config('classifieds.posts_per_page'));

        if ($id == 0) {
            $posts = Post::whereNull('deleted_at')->orderBy('created_at', 'desc')->paginate(config('classifieds.posts_per_page'));
            $category = null;
        } else {
            $category = Category::find($id);
            $posts = Post::whereIn('category_id', function($query) use ($id) {
                //$query->orWhere('category_id', $id);
                $query->select('id')
                    ->from(with(new Category())->getTable())
                    ->where('parent_id', $id);
            })->orWhere('category_id', $id)
                ->whereNull('deleted_at')

//                use for selecting posts with images only
//                ->join('post_images', 'posts.id', '=', 'post_images.post_id')
//                ->select('posts.*')

                ->orderBy('created_at', 'desc')
                ->paginate(config('classifieds.posts_per_page'));
        }

        return view('home.category.show', ['posts' => $posts, 'category' => $category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

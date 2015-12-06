<?php

namespace App\Http\Controllers\Home;

use App\Category;
use App\Post;
use App\Http\Requests\User\CreatePostRequest;
use App\PostImage;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\File;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($cat_id)
    {
        $category = Category::find($cat_id);
        return view('home.post.create', ['category' => $category]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($cat_id, CreatePostRequest $request)
    {
        $img_array = [];

        $post = new Post();
        $post->price = $request->get('price');
        $post->title = $request->get('title');
        $post->content = $request->get('content');
        $post->user_id = Auth::user()->id;

//        $images = $request->file('images');

        if ($request->hasFile('images')) {
            $destination_path = '/uploads/';
            foreach ($request->file('images') as $image) {
                $canvas = Image::canvas(640, 640, '#ffffff');

                $filename = time() . '-' . str_random(16) . '.' . $image->getClientOriginalExtension();
                $fullname = $destination_path . $filename;

                $new_image = Image::make($image->getRealPath())->resize(640, 640, function ($constraint) {
                    $constraint->aspectRatio();
                });

                if (!File::exists(public_path() . $destination_path)) {
                    $make = File::makeDirectory(public_path() . $destination_path, 0777, true);
                }

                $path = public_path() . $destination_path . $filename;
                /*$canvas->insert($new_image, 'center');
                $canvas->save($path);*/

                $new_image->save($path);

                /*$img = [
                    'path' => $fullname,
                    'title' => $image->getClientOriginalName(),
                    'mime_type' => $image->getMimeType(),
                ];*/

                $img = new PostImage();
                $img->title = $image->getClientOriginalName();
                $img->path = $fullname;
                $img->mime_type = $image->getMimeType();

                array_push($img_array, $img);
            }

        }

        $category = Category::find($cat_id);
        $temp = $category->posts()->save($post);

        if ($img_array != null) {
            $temp->images()->saveMany($img_array);
        }

        return redirect(route('category.show', [$category->id]))->withSuccess('Post added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($cat_id, $id)
    {
        $post = Post::find($id);
        return view('home.post.show', ['post' => $post]);
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

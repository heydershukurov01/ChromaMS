<?php

namespace ChromaMS\Http\Controllers\Backend;

use ChromaMS\Post;

use Illuminate\Http\Request;

use ChromaMS\Http\Requests;

class BlogController extends Controller
{


    protected $posts;

    public function __construct(Post $posts)
    {
        $this->posts = $posts;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Fetch all posts from storage
        $posts = $this->posts->with('author')->orderBy('published_at' , 'desc')->paginate(10);

        return view('backend.blog.index' , compact('posts'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Post $post)
    {
        //Shows Form view
        return view('backend.blog.form' , compact('post'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\StorePostRequest $request)
    {
        //Inserts Post to Database
        $this->posts->create(['author_id'=> auth()->user()->id] + $request->only('title' , 'slug' , 'published_at' , 'body' , 'excerpt'));
        return redirect(route('backend.blog.index'))->with('status' , 'Post Has been created.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Fetching data by id 
        $post = $this->posts->findOrFail($id);
        return view('backend.blog.form' , compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\UpdatePostRequest $request, $id)
    {
        //Updates Posts
        $post = $this->posts->findOrFail($id);

        $post->fill($request->only('title' , 'slug' , 'published_at' , 'body' , 'excerpt'))->save();

        return redirect(route('backend.blog.edit' , $post->id))->with('status' , 'Post Has Been Updated!');

    }
    /**
     * Confirm Removing the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function confirm($id)
    {
        //Confirm Removing the specified resource from storage.
        $post = $this->posts->findOrFail($id);
        return view('backend.blog.confirm' , compact('post'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Deletes Post
        $post = $this->posts->findOrFail($id);

        $post->delete();

        return redirect(route('backend.blog.index'))->with('status' , 'Post Has Been Deleted!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Services\PostService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    private $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function index()
    {
        $posts = $this->postService->index();
        return view('posts.index', compact('posts'));
    }

    public function show($id)
    {
        $post = $this->postService->show($id);
        return view('posts.show', compact('post'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(PostRequest $request)
    {
        $user = Auth::user();

        // ensure the authenticated user is the author of the post
        $request->merge(['user_id' => $user->id]);

        $this->authorize('create', Post::class);

        $data = $request->validated();

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->storeAs('public/images', $data['id'] . '.' . $request->file('image')->getClientOriginalExtension());
            $data['image'] = $imagePath;
        }

        $post = $this->postService->store($data);

        return redirect()->route('posts.show', $post->id);
    }

    public function edit($id)
    {
        $post = $this->postService->show($id);

        $this->authorize('update', $post);

        return view('posts.edit', compact('post'));
    }

    public function update(PostRequest $request, $id)
    {
        $post = $this->postService->show($id);

        $this->authorize('update', $post);

        $data = $request->validated();

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->storeAs('public/images', $data['id'] . '.' . $request->file('image')->getClientOriginalExtension());
            $data['image'] = $imagePath;
        }

        $post = $this->postService->update($post, $data);

        return redirect()->route('posts.show', $post->id);
    }

    public function destroy($id)
    {
        $post = $this->postService->show($id);

        $this->authorize('delete', $post);

        if ($post->image && Storage::exists($post->image)) {
            Storage::delete($post->image);
        }

        $this->postService->destroy($post);

        return redirect()->route('posts.index');
    }
}

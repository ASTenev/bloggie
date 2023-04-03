<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Http\Requests\SearchRequest;
use App\Models\Post;
use App\Services\PostService;
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
        $categories = $this->postService->getCategories();
        return view('posts.index', compact('posts', 'categories'));
    }

    public function search(SearchRequest $request)
    {
        $query = $request->input('query');
        $posts = $this->postService->search($query);
        $categories = $this->postService->getCategories();
        return view('posts.index', compact('posts', 'query', 'categories'));
    }

    public function postsByCategory($id)
    {
        $posts = $this->postService->getByCategory($id);
        $categories = $this->postService->getCategories();
        $selected = $id;
        return view('posts.index', compact('posts', 'categories', 'selected'));
    }

    public function userPosts()
    {
        $posts = $this->postService->getByUser();
        $categories = $this->postService->getCategories();
        return view('posts.index', compact('posts', 'categories'));
    }

    public function show($id)
    {
        $post = $this->postService->show($id);
        return view('posts.show', compact('post'));
    }

    public function create()
    {
        $categories = $this->postService->getCategories();
        return view('posts.create', compact('categories'));
    }

    public function store(PostRequest $request)
    {
        $user = Auth::user();

        $data = $request->validated();
        $image = $request->file('image');
        unset($data['image']);
        $data['user_id'] = $user->id;
        $post = $this->postService->store($data);

        if ($request->hasFile('image')) {
            $image_file_name = $post->id . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('public/images', $image_file_name);
            $data['image'] = $image_file_name;
            $this->postService->update($post->id, $data);
        }

        $categories = $this->postService->getCategories();
        return redirect()->route('posts.show', [$post->id, 'categories' => $categories]);
    }

    public function edit($id)
    {
        $post = $this->postService->show($id);

        $this->authorize('edit', $post);
        $categories = $this->postService->getCategories();
        return view('posts.edit', compact('post', 'categories'));
    }

    public function update(PostRequest $request, $id)
    {
        $post = $this->postService->show($id);

        $this->authorize('update', $post);

        $data = $request->validated();

        if ($request->hasFile('image')) {
            if ($post->image && Storage::exists('public/images/' . $post->image)) {
                Storage::delete('public/images/' . $post->image);
            }
            $image_file_name = $post->id . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('public/images', $image_file_name);
            $data['image'] = $image_file_name;
        }

        $this->postService->update($id, $data);

        $categories = $this->postService->getCategories();
        return redirect()->route('posts.show', [$id, 'categories' => $categories]);
    }

    public function destroy($id)
    {
        $post = $this->postService->show($id);

        $this->authorize('delete', $post);

        if ($post->image && Storage::exists('public/images/' . $post->image)) {
            Storage::delete('public/images/' . $post->image);
        }

        $this->postService->destroy($post);

        return redirect()->route('posts.index');
    }

    public function like($id)
    {
        $post = $this->postService->show($id);
        $this->postService->like($post);
        $likes_count = $this->postService->getLikesCount($id);
        $is_liked = $this->postService->isLiked($id);

        return response()->json([
            'is_liked' => $is_liked,
            'likes_count' => $likes_count,
        ]);
    }

    public function unlike($id)
    {
        $post = $this->postService->show($id);
        $this->postService->unlike($post);
        $likes_count = $this->postService->getLikesCount($id);
        $is_liked = $this->postService->isLiked($id);

        return response()->json([
            'is_liked' => $is_liked,
            'likes_count' => $likes_count,
        ]);
    }
}

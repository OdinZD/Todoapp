<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;


class PostController extends Controller
{

    public function index(): View
    {
        return view('post.index', [
            'posts' => Post::with('user')->latest()->get(),
        ]);
    }

    public function create()
    {

        return view('post.create');

    }
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:25',
            'body' => 'required|string|max:255',

        ]);

        $request->user()->post()->create($validated);

        return redirect(route('post.index'));

    }
    public function show($id)
    {
        $post = Post::find($id);
        if (! $post){
            return to_route('post.index')->withErrors([
                'error' => 'Unable to locate the Todo'
            ]);
        }
        return view('post.show', ['post' => $post]);
    }

    public function edit($id)
    {
        $post = Post::find($id);
        if (! $post){
            return to_route('post.index')->withErrors([
                'error' => 'Unable to locate the Todo'
            ]);
        }
        return view('post.edit', ['post' => $post]);
    }
    public function update(Request $request)
    {
        $post = Post::find($request->post_id);

        $post->update([
            'title' => $request->title,
            'body' => $request->body,
        ]);
        return to_route('post.index');
    }
}

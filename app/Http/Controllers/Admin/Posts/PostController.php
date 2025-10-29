<?php

namespace App\Http\Controllers\Admin\Posts;

use App\Models\Post;
use App\Models\Tag;
use App\Models\Category;
use App\Models\PostImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with(['category', 'tags'])->latest()->paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.posts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'         => 'required|string|max:255',
            'status'        => 'required|in:draft,active',
            'content'       => 'required|string',
            'thumbnail'     => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'category_id'   => 'required|exists:categories,id',
            'published_at'  => 'nullable|date',
            'tags'          => 'nullable|string',
            'images.*'      => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $thumbnailPath = null;
        if ($request->hasFile('thumbnail')) {
            $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        $post = Post::create([
            'title'        => $request->title,
            'slug'         => Str::slug($request->title),
            'status'       => $request->status,
            'content'      => $request->content,
            'thumbnail'    => $thumbnailPath,
            'category_id'  => $request->category_id,
            'published_at' => $request->published_at,
        ]);

        // Handle tags
        if ($request->tags) {
            $tags = array_map('trim', explode(',', $request->tags));
            $tagIds = [];

            foreach ($tags as $tagName) {
                if (!empty($tagName)) {
                    $tag = Tag::firstOrCreate([
                        'name' => $tagName,
                        'slug' => Str::slug($tagName)
                    ]);
                    $tagIds[] = $tag->id;
                }
            }

            $post->tags()->sync($tagIds);
        }

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $img) {
                $path = $img->store('post_images', 'public');
                PostImage::create([
                    'post_id' => $post->id,
                    'image'   => $path
                ]);
            }
        }

        return redirect()->route('posts.index')->with('success', 'Berita berhasil ditambahkan.');
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        $postTags = $post->tags->pluck('name')->implode(', ');

        return view('admin.posts.edit', compact('post', 'categories', 'postTags'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title'         => 'required|string|max:255',
            'status'        => 'required|in:draft,active',
            'content'       => 'required|string',
            'thumbnail'     => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'category_id'   => 'required|exists:categories,id',
            'published_at'  => 'nullable|date',
            'tags'          => 'nullable|string',
            'images.*'      => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'existing_images' => 'nullable|array',
            'existing_images.*' => 'exists:post_images,id',
            'deleted_images' => 'nullable|string'
        ]);

        // Update thumbnail
        $thumbnailPath = $post->thumbnail;
        if ($request->hasFile('thumbnail')) {
            if ($thumbnailPath) {
                Storage::disk('public')->delete($thumbnailPath);
            }
            $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        // Update post data
        $post->update([
            'title'        => $request->title,
            'slug'         => Str::slug($request->title),
            'status'       => $request->status,
            'content'      => $request->content,
            'thumbnail'    => $thumbnailPath,
            'category_id'  => $request->category_id,
            'published_at' => $request->published_at,
        ]);

        // Handle tags
        $tagIds = [];
        if ($request->tags) {
            $tags = array_map('trim', explode(',', $request->tags));

            foreach ($tags as $tagName) {
                if (!empty($tagName)) {
                    $tag = Tag::firstOrCreate([
                        'name' => $tagName,
                        'slug' => Str::slug($tagName)
                    ]);
                    $tagIds[] = $tag->id;
                }
            }
        }

        $post->tags()->sync($tagIds);

        // Handle deleted images
        if ($request->deleted_images) {
            $deletedImageIds = explode(',', $request->deleted_images);
            foreach ($deletedImageIds as $imageId) {
                $image = PostImage::find($imageId);
                if ($image) {
                    Storage::disk('public')->delete($image->image);
                    $image->delete();
                }
            }
        }

        // Handle existing images (keep those that weren't deleted)
        $existingImageIds = $request->existing_images ?? [];
        PostImage::where('post_id', $post->id)
            ->whereNotIn('id', $existingImageIds)
            ->delete();

        // Add new images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $img) {
                $path = $img->store('post_images', 'public');
                PostImage::create([
                    'post_id' => $post->id,
                    'image'   => $path
                ]);
            }
        }

        return redirect()->route('posts.index')->with('success', 'Berita berhasil diperbarui.');
    }

    public function destroy(Post $post)
    {
        // Delete thumbnail
        if ($post->thumbnail) {
            Storage::disk('public')->delete($post->thumbnail);
        }

        // Delete all images
        foreach ($post->images as $image) {
            Storage::disk('public')->delete($image->image);
            $image->delete();
        }

        // Detach all tags
        $post->tags()->detach();

        $post->delete();
        return back()->with('success', 'Berita berhasil dihapus.');
    }

    public function show(Post $post)
    {
        $post->load(['category', 'tags', 'images']);
        $tagsString = $post->tags->pluck('name')->implode(', ');

        return view('admin.posts.show', compact('post', 'tagsString'));
    }
}

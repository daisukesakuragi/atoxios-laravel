<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Article;
use Cloudinary;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::paginate(9);

        return view('admin.articles.index', compact('articles'));
    }

    public function create()
    {
        return view('admin.articles.create');
    }

    public function show($id)
    {
        $article = Article::findOrFail($id);

        return view('admin.articles.show', compact('article'));
    }

    public function store(StoreArticleRequest $request)
    {
        try {
            $thumbnail = Cloudinary::upload($request->file('thumbnail')->getRealPath());

            $thumbnail_id = $thumbnail->getPublicId();
            $thumbnail_url = $thumbnail->getSecurePath();

            Article::create([
                'admin_id' => Auth::guard('admin')->user()->id,
                'slug' => $request->slug,
                'title' => $request->title,
                'thumbnail_id' => $thumbnail_id,
                'thumbnail_url' => $thumbnail_url,
                'description' => $request->description,
                'body' => $request->body
            ]);

            session()->flash('success', '記事を作成しました。');

            return redirect(route('admin.articles.index'));
        } catch (Exception $e) {
            Log::error($e);

            session()->flash('error', '記事を作成できませんでした。');

            return back()->withInput();
        }
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);

        return view('admin.articles.edit', compact('article'));
    }

    public function update(UpdateArticleRequest $request, $id)
    {
        try {
            $article = Article::findOrFail($id);

            $article->slug = $request->slug;
            $article->title = $request->title;

            if ($request->hasFile('thumbnail')) {
                Cloudinary::destroy($article->thumbnail_id);

                $thumbnail = Cloudinary::upload($request->file('thumbnail')->getRealPath());
                $thumbnail_id = $thumbnail->getPublicId();
                $thumbnail_url = $thumbnail->getSecurePath();
                $article->thumbnail_id = $thumbnail_id;
                $article->thumbnail_url = $thumbnail_url;
            }

            $article->description = $request->description;
            $article->body = $request->body;

            $article->save();

            session()->flash('success', '記事を更新しました。');

            return redirect(route('admin.articles.show', $article));
        } catch (Exception $e) {
            Log::error($e);

            session()->flash('error', '記事を更新できませんでした。');

            return back()->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $article = Article::findOrFail($id);

            Cloudinary::destroy($article->thumbnail_id);

            $article->delete();

            session()->flash('success', '記事を削除しました。');

            return redirect(route('admin.articles.index'));
        } catch (Exception $e) {
            Log::error($e);

            session()->flash('error', '記事を削除できませんでした。');

            return back();
        }
    }
}

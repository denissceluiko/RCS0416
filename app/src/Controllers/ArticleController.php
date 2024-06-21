<?php

namespace App\Controllers;

use App\Models\Article;

class ArticleController
{
    public function index()
    {
        $articles = (new Article())->all();
        return view('article.index', compact('articles'));
    }

    public function edit()
    {
        $content = 'edit';
        return view('layouts.app', compact('content'));
    }

    public function store()
    {
        $data = [
            'title' => request('title'),
            'image' => request('image_url'),
            'body' => request('contents'),
        ];

        (new Article)->store($data);
        return redirect('/article');
    }

    public function update()
    {
        $content = 'update';
        return view('layouts.app', compact('content'));
    }

    public function delete()
    {
        $id = request('id'); // $_POST['id']
        (new Article)->delete($id);

        return redirect('/article');
    }
}

?>
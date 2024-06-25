<?php

namespace App\Controllers;

use App\Models\Article;

class ArticleController
{
    public function index()
    {
        $articles = (new Article())->all();

        $table = Article::getTable();
        return view('article.index', compact('articles', 'table'));
    }

    public function edit()
    {
        $id = request('id');
        $article = (new Article())->find($id);
        return view('article.edit', compact('article'));
    }

    public function store()
    {
        $data = [
            'title' => request('title'),
            'image_url' => request('image_url'),
            'body' => request('contents'),
        ];

        (new Article)->store($data);
        return redirect('/article');
    }

    public function update()
    {
        $data = [
            'id' => request('id'),
            'title' => request('title'),
            'image_url' => request('image_url'),
            'body' => request('contents'),
        ];

        (new Article)->update($data);
        return redirect('/article');
    }

    public function delete()
    {
        $id = request('id'); // $_POST['id']
        (new Article)->delete($id);

        return redirect('/article');
    }
}

?>
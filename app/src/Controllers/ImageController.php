<?php

namespace App\Controllers;

use App\Models\Image;

class ImageController
{
    public function index()
    {
        $images = (new Image())->all();
        return view('image.index', compact('images'));
    }

    public function edit()
    {

    }

    public function store()
    {
        $data = [
            'path' => request('path'),
            'description' => request('description'),
        ];

        (new Image)->store($data);
        return redirect('/image');
    }

    public function update()
    {

    }

    public function delete()
    {

    }
}

?>
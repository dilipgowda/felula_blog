<?php

namespace App\Imports;

use App\Models\Post;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Cviebrock\EloquentSluggable\Services\SlugService;

class PostsImport implements ToModel, WithHeadingRow
{
     /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Post([
            'title'     => $row['title'],
            'slug'     => SlugService::createSlug(Post::class, 'slug', $row['title']),
            'short_description'    => $row['short_description'], 
            'description' => $row['description'],
            'image_path' => 'dummy_image',
            'user_id' => auth()->user()->id,

        ]);
    }
}

<?php

namespace App\GraphQL\Query;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Query;

//ini nama model yang sudah dibuat
use App\Post;

class PostQuery extends Query
{
    //nama untuk dipanggil di config/graphql.php dan di query
    protected $attributes = [
        'name' => 'PostQuery',
        'description' => 'Merupakan Query dari post'
    ];

    //mengambil nama type yang akan digunakan (dari config/graphql.php)
    public function type()
    {
        return Type::listOf(GraphQL::type('PostType'));
    }

    //gak ngerti ini buat apa .-.
    //tapi sepertinya buat menyimpan jika user menggunakan input pada query
    public function args()
    {
        return [
            'id' => ['name' => 'id', 'type' => Type::int()],
            'title' => ['name' => 'title', 'type' => Type::string()],
            'content' => ['name' => 'content', 'type' => Type::string()],
            'created_at' => ['name' => 'created_at', 'type' => Type::string()],
            'updated_at' => ['name' => 'updated_at', 'type' => Type::string()],
        ];
    }

    //resolve dijalankan ketika input dimasukkan
    public function resolve($root, $args)
    {
        if (isset($args['id'])) {
            return Post::where('id' , $args['id'])->get();
        } else if(isset($args['title'])) {
            return Post::where('title', $args['title'])->get();
        } else if(isset($args['content'])) {
            return Post::where('content', $args['content'])->get();
        }else {
            return Post::all();
        }
    }
}

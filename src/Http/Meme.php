<?php
namespace Pokeface\Meme\Http;


class Meme
{
    public static function search($keyword)
    {
        $builder = new Builder();
        return $builder->search($keyword);
    }
}
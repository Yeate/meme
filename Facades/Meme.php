<?php 
namespace Pokeface\Meme\Facades;


use Illuminate\Support\Facades\Facade;

class Meme extends Facade {

    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'Meme';
    }

}
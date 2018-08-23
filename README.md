# meme
表情包


php artisan vendor:publish --provider="Pokeface\Meme\MemeServiceProvider"     添加配置文件


#使用

Meme::search('表情关键字')->get()

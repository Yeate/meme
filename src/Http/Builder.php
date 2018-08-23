<?php
namespace Pokeface\Meme\Http;

use Ixudra\Curl\Facades\Curl;


class Builder
{
    protected $getOptions = array(
        'LIMIT'       => 0,
        'PAGE'        => 1,
        'KEYWORD'	  => ''
    );

    public function search($keyword){
    	return $this->withGetOption('KEYWORD',urlencode($keyword));
    }

    public function get(){
    	if(request()->has('meme_page')){
    		$this->withGetOption('PAGE',request()->input('meme_page'));
    	}
    	$data = $this->_fromCurl();
    	return $data;

    }

    protected function _fromCurl(){
    	$url = config('meme.url');
    	foreach($this->getOptions as $option_k => $option_v){
    		$url = str_replace('{'.$option_k.'}',$option_v,$url);
    	}
    	$memes = Curl::to($url)
    	->asJson()
    	->get();
    	if($memes->success){
    		return $memes->data;
    	}else{
    		throw new \Exception($memes->message);	
    	}
    }


    protected function withGetOption($key, $value)
    {
        $this->getOptions[ $key ] = $value;
        return $this;
    }

    
}
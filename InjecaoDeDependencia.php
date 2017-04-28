<?php

interface videoServiceInterface {
	public function getEmbeded();
}
class Youtube implements videoServiceInterface{
	private $url;
	public function __construct($url){
		$this->url = $url;
	}
	public function getEmbeded(){
		return $this->url;
	}
}
class vimeo implements videoServiceInterface{
	private $url;
	public function __construct($url){
		$this->url = $url;
	}
	public function getEmbeded(){
		return $this->url;
	}
}
class xyzQualquerFormato implements videoServiceInterface{
	private $url;
	public function __construct($url){
		$this->url = $url;
	}
	public function getEmbeded(){
		return '<xyz>'.$this->url.'</xyz>';
	}
}
class Video{

	private $video;

	public function __construct(videoServiceInterface $video){
		$this->video = $video;
	}
	public function getVideoHTML(){
		return $this->video->getEmbeded();
	}
}

$video = new Video(new Youtube('https://www.youtube.com/watch?v=iNqK0xzC1g0'));
echo "HTML: ".$video->getVideoHTML();
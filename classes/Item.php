<?php

class Item {

  private $id;
  private $description;
  private $image;
  private $price;
 
  public function __construct($id, $price) {
       $this->id = $id;
	   $this->price = $price;
  }

//Rest of class code

	public function getPrice(){
  		return 'The price is '.$this->_price;
 	}

    public function getDescription($description){
    	$this->description=$description;
  		return $this->description;
  	}

  	public function __toString(){
  		return $this->id.' '.$this->price.' '.$this->description;
  	}

}
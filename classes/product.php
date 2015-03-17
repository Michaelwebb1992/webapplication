<?php
  class Product {
		private $item;
		private $description;
		private $price;
		private $image;
		private $stock = true;

	 	public function __construct($item, $price) {
			$this->item = $item;
			$this->price = $price;
		}
		
//getters

		public function getItem(){
			return $this->item;
		}
		
		public function getPrice(){
			return '£'.$this->price;
		}

		public function getDescription($description){
    		$this->_description=$description;
  				return $this->_description;
  		}
	
		public function changePrice($value){
			$this->price += $value;
		}
	  	
	  	public function __toString() {
			return "Item: ".$this->item." costs £".$this->price;
		}

		//public function getStock(){
		//	return $this->stock = $stock;
		//}

		public function setStock(){
			if ($stock = false)
			{
				Throw new exception("item currently not in stock");
			}
		}
}


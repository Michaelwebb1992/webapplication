<?php


class Printoptions {

  // define properties /attributes 

  private $vinyl; 

  private $produce; 

  private $suitable; 
 
  
  public function __construct($vinyl){ 



  $this->vinyl = $vinyl; 

  $this->produce = $produce; 

  } 

  //Setters


	public function setVinyl($vinyl){

		$this->vinyl = $vinyl;
	}



	public function setProduce($produce){

		$this->produce = $produce;
	}


	public function setSuitable($suitable){

		$this->suitable = $suitable;
	}

	//Getters

	public function getVinyl(){
	
	return $this->vinyl;		
	}

	public function getProduce(){
	
	return $this->produce;		
	}

	public function getSuitable(){
	
	return $this->suitable;		
	}

	public function __toString() {
		
			return "Vinyl Type: ".$this->vinyl.".<br>Produces: ".$this->produce. "<br>Suitable For: ".$this->suitable;
		}



}
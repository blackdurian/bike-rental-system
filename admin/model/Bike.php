<?php

class Bike{
private $id;
private $vendor;
private $photo;
private $category;
private $currentStation;
private $isReturn;
private $unitPrice;
private $description;


/**
 * Get the value of id
 */ 
public function getId()
{
return $this->id;
}

/**
 * Set the value of id
 *
 * @return  self
 */ 
public function setId($id)
{
$this->id = $id;

return $this;
}

/**
 * Get the value of vendor
 */ 
public function getVendor()
{
return $this->vendor;
}

/**
 * Set the value of vendor
 *
 * @return  self
 */ 
public function setVendor($vendor)
{
$this->vendor = $vendor;

return $this;
}

/**
 * Get the value of photo
 */ 
public function getPhoto()
{
return $this->photo;
}

/**
 * Set the value of photo
 *
 * @return  self
 */ 
public function setPhoto($photo)
{
$this->photo = $photo;

return $this;
}

/**
 * Get the value of category
 */ 
public function getCategory()
{
return $this->category;
}

/**
 * Set the value of category
 *
 * @return  self
 */ 
public function setCategory($category)
{
$this->category = $category;

return $this;
}

/**
 * Get the value of currentStation
 */ 
public function getCurrentStation()
{
return $this->currentStation;
}

/**
 * Set the value of currentStation
 *
 * @return  self
 */ 
public function setCurrentStation($currentStation)
{
$this->currentStation = $currentStation;

return $this;
}

/**
 * Get the value of isReturn
 */ 
public function getIsReturn()
{
return $this->isReturn;
}

/**
 * Set the value of isReturn
 *
 * @return  self
 */ 
public function setIsReturn($isReturn)
{
$this->isReturn = $isReturn;

return $this;
}

/**
 * Get the value of unitPrice
 */ 
public function getUnitPrice()
{
return $this->unitPrice;
}

/**
 * Set the value of unitPrice
 *
 * @return  self
 */ 
public function setUnitPrice($unitPrice)
{
$this->unitPrice = $unitPrice;

return $this;
}

/**
 * Get the value of description
 */ 
public function getDescription()
{
return $this->description;
}

/**
 * Set the value of description
 *
 * @return  self
 */ 
public function setDescription($description)
{
$this->description = $description;

return $this;
}
}
?>
<?php

namespace admin\model;

class User {
protected $id;
protected $username;
protected $password;
protected $role;
protected $email;
protected $dob; // Date of born
protected $profilePhoto; // BLOB in MySql



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
 * Get the value of username
 */ 
public function getUsername()
{
return $this->username;
}

/**
 * Set the value of username
 *
 * @return  self
 */ 
public function setUsername($username)
{
$this->username = $username;

return $this;
}

/**
 * Get the value of password
 */ 
public function getPassword()
{
return $this->password;
}

/**
 * Set the value of password
 *
 * @return  self
 */ 
public function setPassword($password)
{
$this->password = $password;

return $this;
}

/**
 * Get the value of role
 */ 
public function getRole()
{
return $this->role;
}

/**
 * Set the value of role
 *
 * @return  self
 */ 
public function setRole($role)
{
$this->role = $role;

return $this;
}

/**
 * Get the value of email
 */ 
public function getEmail()
{
return $this->email;
}

/**
 * Set the value of email
 *
 * @return  self
 */ 
public function setEmail($email)
{
$this->email = $email;

return $this;
}

/**
 * Get the value of dob
 */ 
public function getDob()
{
return $this->dob;
}

/**
 * Set the value of dob
 *
 * @return  self
 */ 
public function setDob($dob)
{
$this->dob = $dob;

return $this;
}

/**
 * Get the value of profilePhoto
 */ 
public function getProfilePhoto()
{
return $this->profilePhoto;
}

/**
 * Set the value of profilePhoto
 *
 * @return  self
 */ 
public function setProfilePhoto($profilePhoto)
{
$this->profilePhoto = $profilePhoto;

return $this;
}
}

?>
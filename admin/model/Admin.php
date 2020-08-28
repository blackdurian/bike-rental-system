<?php
namespace admin\model;

use DataMonkey\Entity\ExportableEntity;
use DataMonkey\Entity\ExportAbstract;

class Admin extends ExportAbstract implements ExportableEntity{
        /**
     * @pk
     * @db_ref id
     * @strategy manual 
     */
    private $id;

    /**
     * @db_ref user_id
     */
    private $user;// join table one to one
    

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
     * Get the value of user
     */ 
    public function getUser()
    { 
        return $this->user;
    }

    /**
     * Set the value of userId
     *
     * @return  self
     */ 
    public function setUser(User $user)
    {
        $this->user = $user;

        return $this;
    }

}
?>
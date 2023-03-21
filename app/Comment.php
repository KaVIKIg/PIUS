<?php 
namespace App;

class Comment
{
       public function __construct(public User $user, public string $messege)
    {
        $this->user = $user;
        $this->messege = $messege;
    }
}

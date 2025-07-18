<?php

abstract class Member {

    public string $user_name;
    protected array $roles;

    protected abstract function initRoles();

    public function __construct(string $user_name)
    {
        $this->user_name = $user_name;
        $this->initRoles();
    }

    public function listRoles()
    {
        echo "Roles of {$this->user_name}: " . implode(', ', $this->roles) . "<br>";
    }
}

class Administrator extends Member
{
    protected function initRoles()
    {
        $this->roles = [
            'manage_user',
            'edit_role',
            'edit_post',
            'delete_user',
            'view_post',
            'delete_post'
        ];
    }
}

// Uses:
$user_a = new Administrator('Mr A');
$user_a->listRoles();

?>
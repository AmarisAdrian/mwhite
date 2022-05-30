<?php

class Authentication
{
    // Fields

    private $session;

    // Methods

    public function __construct()
    {
        $this->session = new Session();
    }

    public function getUser()
    {
        return $this->session->get('user');
    }

    public function clearUser()
    {
        $this->session->remove('user');
    }

    public function destroy()
    {
        $this->session->destroy();
    }

    public function setUser($id, $name, $roles)
    {
        $this->session->set('user', array(

            'id'    => $id,
            'name'  => $name,
            'role' => $roles
        ));
    }

    public function isLoggedIn()
    {
        return $this->getUser() === null ? false : true;
    }
}

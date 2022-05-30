<?php

class UserModel extends Model
{
    const DATE_TIME_FORMAT    = 'Y-m-d H:i:s';

    // Getters & setters
    public function getTableName()
    {
        return 'mwhite_credit_user';
    }
      public function GetAll()
    {
        return $this->findAll();
    }
   public function GetUserById($id)
    {
        $result = self::$db->queryOne('Select * from  ' . $this->getTableName() . '  where id = ?', array($id));
        if ($result) {
            // Return the result
            return $this->createInstance($this->postRead($result));
        }
        // Indicate error
        return false;
    }
    public function GetAllUserClient()
    {
        $result = self::$db->query('select * from ' . $this->getTableName() . ' where role=2');
        if (is_array($result)) {
            $objects = array();

            // Construct the objects representing the result set

            foreach ($result as $value) {
                $objects[] = $this->createInstance($this->postRead($value));
            }

            // Return the result

            return $objects;
        }

        // Indicate error

        return false;
    }

    public function getColumns()
    {
        return array('id', 'role', 'dni_type', 'dni_date', 'dni',   'firstname', 'lastname', 'cellphone', 'email', 'last_activity', 'password', 'date_creation', 'state_auth');
    }
    
    public function getData($raw = false)
    {
        $data = parent::getData();
        if (!$raw) {
            // Hide the password field
            unset($data['password']);
        }
        // Remove all integer indexed entries
        for ($i = 0; $i < count($data); $i++) {
            unset($data[$i]);
        }
        return $data;
    }
    public function getBasicData()
    {
        return array(

            'name' => $this->firstname . ' ' . $this->lastname,
            'email' => $this->email
        );
    }
    public function GetById($id)
    {
        $this->find($id);
    }
    public function toJson()
    {
        $data = $this->getData();
        // Hide the password field
        unset($data['password']);
        return $data;
    }

    // Methods
    public function hasRole($role)
    {
        return $this->role === ROLES[$role];
    }

    public function isClient()
    {
        return $this->hasRole('CLIENT');
    }
    // Reset last activity time (used when logging user out)

    public function resetLastActivity($id)
    {
        self::$db->execute('UPDATE ' . $this->getTableName() . ' SET last_activity = 0 WHERE id = ?', array($id));
    }

    public function hasValidSession()
    {
        $lastActivityTime = strtotime($this->last_activity);

        return time() - $lastActivityTime <= self::GUEST_SESSION_TIME;
    }

    public static function repo()
    {
        return new UserModel;
    }

    public function save()
    {
        $result = parent::save();
        return $result;
    }

    public function preSave()
    {
        $result = parent::preSave();

        if (isset($result['roles'])) $result['roles'] = implode(',', $result['roles']);
        if (isset($result['info']))  $result['info']  = json_encode($result['info']);

        return $result;
    }

    public function postRead($data)
    {
        $data = parent::postRead($data);

        if (isset($data['roles'])) $data['roles'] = explode(',', $data['roles']);
        if (isset($data['info']))  $data['info']  = json_decode($data['info'], true);

        if (isset($data['departments']) && is_string($data['departments'])) {
            $data['departments'] = explode(',', $data['departments']);

            foreach ($data['departments'] as &$department) {
                $department = intval($department);
            }
        }

        return $data;
    }
}

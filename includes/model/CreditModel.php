<?php

class CreditModel extends Model
{
    // Getters & setters
    public function getTableName()
    {
        return 'mwhite_credit_credit';
    }

    public function getColumns()
    {
        return array('id','id_user', 'type_credit', 'amount_requested', 'amount_approved', 'number_quotas', 'date_creation', 'last_activity');
    }

    public static function repo()
    {
        return new creditModel;
    }

    public function GetAll()
    {
        return $this->findAll();
    }

    public function GetMontoUserById($id_user)
    {
        // return $this->find($id_user);
        $query = 'select * from ' . $this->getTableName() . ' where id_user=' . $id_user;

        $result = self::$db->query($query);

        if (is_array($result)) {
            $objects = array();

            // Construct the objects representing the result set

            foreach ($result as $value) {
                $objects[] = $this->createInstance($this->postRead($value));
            }

            // Return the result

            return $objects;
        }
    }

    public function saveRegister()
    {
        $result = parent::save();
        return $result;
    }

    public function save()
    {
        $options = $this->preSave();

        // if(isset($this->id_user) && $this->id_user == self::CANCEL_SAVE_ID) return; // Entity storing was cancelled

        $query  = '';
        $params = null;

        // Check whether it's a create or update operation

        if (isset($this->id)) // Update
        {
            $query  = 'UPDATE ' . $this->getTableName() . ' SET ';
            $params = array();

            $keys  = array_keys($options);
            $key   = $keys[0];
            $value = $options[$key];

            $query .= "`$key` = ?";

            $params[] = $value;

            foreach (array_slice($options, 1) as $key => $value) {
                $query .= ", `$key` = ?";

                $params[] = $value;
            }

            $query .= ' WHERE id = ?';

            $params[] = $this->id;
        } else // Create entry
        {
            $query  = 'INSERT INTO ' . $this->getTableName() . '(';
            $params = array();

            $keys  = array_keys($options);
            $key   = $keys[0];
            $value = $options[$key];

            $query .= "`$key`";

            $params[] = $value;

            foreach (array_slice($options, 1) as $key => $value) {
                $query .= ", `$key`";

                $params[] = $value;
            }

            $query .= ') VALUES(?' . str_repeat(', ?', count($options) - 1) . ')';
        }

        // Execute the query

        $result = self::$db->execute($query, $params);

        if ($result && !isset($this->id)) {
            $this->id_user = self::$db->lastInsertId();
        }

        return $result;
    }

    public function remove()
    {
        if (!isset($this->id)) {
            return false;
        }

        return self::$db->execute('DELETE FROM ' . $this->getTableName() . ' WHERE id_user = ?', array($this->id));
    }

    public static function GetPendingByUserId()
    {
        return true;
    }
}

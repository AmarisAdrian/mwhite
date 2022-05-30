<?php
class UserProfileModel extends Model
{
    const DATE_TIME_FORMAT    = 'Y-m-d H:i:s';

    public function getTableName()
    {
        return 'mwhite_credit_user_profile';
    }

    public function getColumns()
    {
        return array(
            'id_user', 'date_birth', 'adress', 'stratum', 'neighborhood', 'province', 'city', 'recidence', 'marital_status', 'dependants', 'activity', 'sons',
            'type_housing', 'phone', 'education_level', 'profession', 'company', 'company_tax_number', 'company_adress', 'company_economic_activity',
            'monthly_earnings', 'monthly_profit', 'company_date', 'company_phone', 'supplier_name', 'supplier_phone', 'supplier_adress', 'supplier_company',
            'supplier_tax_number', 'supplier_tax_document', 'p_reference_name', 'p_reference_lastname', 'p_reference_time', 'p_reference_phone', 'p_reference_email', 'f_reference_name',
            'f_reference_lastname', 'f_reference_phone', 'f_reference_email', 'dni_front_view', 'dni_rear_view'
        );
    }

    public function GetAll()
    {
        return $this->findAll();
    }

    public function GetUserById($id_user)
    {
        // Query

        $result = self::$db->queryOne('Select * from  ' . $this->getTableName() . '  where id_user = ?', array($id_user));

        if ($result) {
            // Return the result

            return $this->createInstance($this->postRead($result));
        }

        // Indicate error

        return false;
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

        if (isset($this->id_user)) // Update
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

            $query .= ' WHERE id_user = ?';

            $params[] = $this->id_user;
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

        if ($result && !isset($this->id_user)) {
            $this->id_user = self::$db->lastInsertId();
        }

        return $result;
    }

    public function remove()
    {
        if (!isset($this->id_user)) {
            return false;
        }

        return self::$db->execute('DELETE FROM ' . $this->getTableName() . ' WHERE id_user = ?', array($this->id_user));
    }

    public static function repo()
    {
        return new UserProfileModel;
    }
}

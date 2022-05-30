<?php

class CityModel extends Model
{
    const DATE_TIME_FORMAT    = 'Y-m-d H:i:s';
    public static $Tablename = "city";

    public function GetAllCiudadById($id)
    {
        // Query

        $query = 'select * from ' . $this->getTableName() . ' where idprovince=' . $id;

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

        // Indicate error
    }

    public function getColumns()
    {
        return array('id', 'nombre', 'idProvince');
    }

    public static function repo()
    {
        return new CityModel;
    }

    public function getTableName()
    {
        return 'city';
    }

    public function GetAll()
    {
        return $this->findAll();
    }

    public function GetCiudadById($id)
    {
        return $this->find($id);
    }
}

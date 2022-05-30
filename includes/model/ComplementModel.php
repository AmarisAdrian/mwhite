<?php

class ComplementModel extends Model
{
    public static $Tablename_education_level = "education_level";
    public static $Tablename_marital_state = "marital_state";
    public static $Tablename_type_housing = "type_housing";
    public static $Tablename_activity = "activity";
    public static $Tablename_type_credit = "type_credit";


    public function getColumns()
    {
        return array('id', 'nombre');
    }
    public function GetAllActivity()
    {
        $query = "select * from " . self::$Tablename_activity;
        return $this->GetAllInformationByTable($query);
    }   
    public function GetAllEducationLevel()
    {
        $query = "select * from " . self::$Tablename_education_level;
        return $this->GetAllInformationByTable($query);
    }

    public function GetEducationLevelById($id)
    {
        $query = "select * from " . self::$Tablename_education_level . " where id=" . $id;
        return $this->GetAllInformationByTable($query);
    }

    public function GetAllMaritalState()
    {
        $query = "select * from " . self::$Tablename_marital_state;
        return $this->GetAllInformationByTable($query);
    }

    public function GetMaritalStateById($id)
    {
        $query = "select * from " . self::$Tablename_marital_state . " where id=" . $id;
        return $this->GetAllInformationByTable($query);
    }
    public function GetTypeCreditById($id)
    {
        $query = "select * from " . self::$Tablename_type_credit . " where id=" . $id;
        return $this->GetAllInformationByTable($query);
    }

    public function GetAllTypeHousing()
    {
        $query = "select * from " . self::$Tablename_type_housing;
        return $this->GetAllInformationByTable($query);
    }

    public function GetTypeHousingById($id)
    {
        $query = "select * from " . self::$Tablename_type_housing . " where id=" . $id;
        return $this->GetAllInformationByTable($query);
    }
    public static function HashPassword($Pass){
        return password_hash($Pass, PASSWORD_BCRYPT);
    }
    public static function HashVerifyPassword($Pass,$Hash){
         return  password_verify($Pass,$Hash);
    }
    private function GetAllInformationByTable($query)
    {
        // Query

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

    public static function repo()
    {
        return new ComplementModel;
    }
}

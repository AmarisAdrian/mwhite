<?php

class ProvinceModel  extends Model
{
    const DATE_TIME_FORMAT    = 'Y-m-d H:i:s';

    public static $Tablename = "province";

    public function getColumns()
    {
        return array('id','nombre');
    }
     public static function repo()
    {
        return new ProvinceModel;
    }

    public function getTableName()
    {
        return 'province';
    }

    public function GetAll()
    {
        return $this->findAll();
    }
    public function GetProvinceById($id)
    {
        return $this->find($id);
    }
    
}

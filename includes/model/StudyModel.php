<?php

class StudyModel extends Model
{
    // Getters & setters
    public function getTableName()
    {
        return 'mwhite_credit_study';
    }

    public function getColumns()
    {
        return array('id','id_user', 'score', 'status_study', 'comentary', 'date_creation', 'last_activity');
    }

    public static function repo()
    {
        return new StudyModel;
    }
    public function GetAll()
    {
        return $this->findAll();
    }
    public function GetStudyUserById($id_user)
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
}

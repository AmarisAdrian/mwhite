<?php
class Executor extends Model {
	public static function doit($sql){
        $db       =  New Database();
		if(core::$debug_sql){
			print "<pre>".$sql."</pre>";
		}
		return array($db->query($sql));
	}
}

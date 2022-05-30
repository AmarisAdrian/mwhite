<?php
defined("DB_SERVER") ? null : define("DB_SERVER", "127.0.0.1");
defined("DB_NAME")   ? null : define("DB_NAME", "mwhite_creditos");
defined("DB_USER")   ? null : define("DB_USER", "root");
defined("DB_PASS")   ? null : define("DB_PASS", "");

define("ROLES", array('ADMIN' => 1, 'CLIENT' => 2, 'STAFF' => 3));
define("DNI_TYPE", array('Cédula de ciudadanía' => 1, 'Tarjeta de identidad' => 3, 'Tarjeta de identidad' => 2, 'Pasaporte' => 4));
define("STUDY_STATUS", array('Iniciado' => 1, 'Se necesitan mas detalles' => 3, 'Finalizado' => 2));
define("CREDIT_STATUS", array('Aprobado' => 1, 'Rechazado' => 2));
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

ERROR - 2019-09-05 04:13:20 --> Severity: Notice  --> Undefined variable: iIdEstado C:\Xampp\htdocs\alimentaria\addons\shared_addons\modules\planeacion\views\admin\form.php 4
ERROR - 2019-09-05 04:13:20 --> Severity: Notice  --> Undefined variable: localidad C:\Xampp\htdocs\alimentaria\addons\shared_addons\modules\planeacion\views\admin\form.php 8
ERROR - 2019-09-05 04:13:21 --> Severity: Notice  --> Trying to get property of non-object C:\Xampp\htdocs\alimentaria\addons\shared_addons\modules\planeacion\views\admin\form.php 8
ERROR - 2019-09-05 04:14:33 --> Severity: Notice  --> Undefined variable: iIdEstado C:\Xampp\htdocs\alimentaria\addons\shared_addons\modules\planeacion\views\admin\form.php 4
ERROR - 2019-09-05 04:14:33 --> Severity: Notice  --> Undefined variable: localidad C:\Xampp\htdocs\alimentaria\addons\shared_addons\modules\planeacion\views\admin\form.php 8
ERROR - 2019-09-05 04:14:33 --> Severity: Notice  --> Trying to get property of non-object C:\Xampp\htdocs\alimentaria\addons\shared_addons\modules\planeacion\views\admin\form.php 8
ERROR - 2019-09-05 04:16:07 --> Severity: Notice  --> Undefined property: stdClass::$iIdEstado C:\Xampp\htdocs\alimentaria\addons\shared_addons\modules\planeacion\views\admin\form.php 4
ERROR - 2019-09-05 04:16:07 --> Severity: Notice  --> Undefined property: stdClass::$iIdMunicipio C:\Xampp\htdocs\alimentaria\addons\shared_addons\modules\planeacion\views\admin\form.php 8
ERROR - 2019-09-05 04:19:50 --> Severity: Notice  --> Undefined property: stdClass::$cNombre C:\Xampp\htdocs\alimentaria\addons\shared_addons\modules\planeacion\views\admin\form.php 12
ERROR - 2019-09-05 04:25:04 --> Severity: Notice  --> Undefined property: stdClass::$iIdPrograma C:\Xampp\htdocs\alimentaria\addons\shared_addons\modules\planeacion\views\admin\form.php 4
ERROR - 2019-09-05 04:40:32 --> Query error: Unknown column 'tblcatmunicipioIdMunicipio' in 'on clause' - Invalid query: SELECT *, `default_tblcatestado`.`cNombre` as `estado`, `default_tblcatmunicipio`.`cNombre` as `municipio`, `default_tblcatlocalidad`.`cNombre` as `localidad`
FROM `default_tblplaneacionentrega`
JOIN `default_tblcatlocalidad` ON `default_tblplaneacionentrega`.`iIdLocalidad`=`default_tblcatlocalidad`.`iIdLocalidad`
JOIN `default_tblcatmunicipio` ON `default_tblplaneacionentrega`.`iIdMunicipio`=`tblcatmunicipioIdMunicipio`
JOIN `default_tblcatestado` ON `default_tblplaneacionentrega`.`iIdEstado`=`default_tblcatestado`.`iIdEstado`
ERROR - 2019-09-05 04:40:57 --> Severity: Notice  --> Undefined property: stdClass::$programa C:\Xampp\htdocs\alimentaria\addons\shared_addons\modules\planeacion\views\admin\index.php 16
ERROR - 2019-09-05 04:42:20 --> Severity: Notice  --> Undefined property: stdClass::$programa C:\Xampp\htdocs\alimentaria\addons\shared_addons\modules\planeacion\views\admin\index.php 16
ERROR - 2019-09-05 04:42:51 --> Query error: Unknown column 'default_tblplaneacionentrega.cNombre' in 'field list' - Invalid query: SELECT *, `default_tblcatestado`.`cNombre` as `estado`, `default_tblcatmunicipio`.`cNombre` as `municipio`, `default_tblcatlocalidad`.`cNombre` as `localidad`, `default_tblplaneacionentrega`.`cNombre` as `programa`
FROM `default_tblplaneacionentrega`
JOIN `default_tblcatprograma` ON `default_tblcatprograma`.`iIdPrograma`=`default_tblplaneacionentrega`.`iIdPrograma`
JOIN `default_tblcatlocalidad` ON `default_tblplaneacionentrega`.`iIdLocalidad`=`default_tblcatlocalidad`.`iIdLocalidad`
JOIN `default_tblcatmunicipio` ON `default_tblplaneacionentrega`.`iIdMunicipio`=`default_tblcatmunicipio`.`iIdMunicipio`
JOIN `default_tblcatestado` ON `default_tblplaneacionentrega`.`iIdEstado`=`default_tblcatestado`.`iIdEstado`
ERROR - 2019-09-05 04:44:46 --> Severity: Notice  --> Undefined variable: programas C:\Xampp\htdocs\alimentaria\addons\shared_addons\modules\planeacion\views\admin\form.php 4
ERROR - 2019-09-05 04:46:08 --> Severity: Notice  --> Undefined property: stdClass::$iIdEstado C:\Xampp\htdocs\alimentaria\addons\shared_addons\modules\planeacion\views\admin\form.php 8
ERROR - 2019-09-05 04:46:08 --> Severity: Notice  --> Undefined property: stdClass::$iIdMunicipio C:\Xampp\htdocs\alimentaria\addons\shared_addons\modules\planeacion\views\admin\form.php 12
ERROR - 2019-09-05 04:46:08 --> Severity: Notice  --> Undefined property: stdClass::$iIdLocalidad C:\Xampp\htdocs\alimentaria\addons\shared_addons\modules\planeacion\views\admin\form.php 16
ERROR - 2019-09-05 04:50:41 --> Query error: Unknown column 'iIdEstado' in 'field list' - Invalid query: UPDATE `default_tblcatprograma` SET `iIdPrograma` = '1', `iIdEstado` = '1', `iIdMunicipio` = '3', `iIdLocalidad` = '2', `dtModificacion` = '2019-09-05' WHERE `iIdPrograma` =  '1'
ERROR - 2019-09-05 04:54:01 --> Severity: Warning  --> Illegal string offset 'en' C:\Xampp\htdocs\alimentaria\system\cms\modules\addons\models\module_m.php 168
ERROR - 2019-09-05 04:54:01 --> Severity: Warning  --> Illegal string offset 'en' C:\Xampp\htdocs\alimentaria\system\cms\modules\addons\models\module_m.php 168
ERROR - 2019-09-05 04:54:03 --> Severity: Warning  --> Illegal string offset 'en' C:\Xampp\htdocs\alimentaria\system\cms\modules\addons\models\module_m.php 168
ERROR - 2019-09-05 04:54:08 --> Severity: Warning  --> Illegal string offset 'en' C:\Xampp\htdocs\alimentaria\system\cms\modules\addons\models\module_m.php 168

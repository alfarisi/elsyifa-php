<?php
/*
+----------------------------------------------------------------------------+
|   Copyright (c) 2010 by Al Farisi
|   E-mail  : elfarish@gmail.com
|   Website : www.alfarisi.web.id
|             www.indokreatif.net
+----------------------------------------------------------------------------+
*/

$sql_main['get_config'] = "
    SELECT
        `conf_name` AS `name`,
        `conf_value` AS `value`
    FROM
        `_config`
";

?>
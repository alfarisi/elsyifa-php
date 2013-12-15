<?php

// example 01
$sql['get_config'] = "
    SELECT
        `conf_name` AS `name`,
        `conf_value` AS `value`
    FROM
        `_config`
";

$sql['update_config'] = "
    UPDATE
        `_config`
    SET
        `conf_value` = '%s'
    WHERE
        `conf_name` = '%s'
";

// example 02
$sql['add_data'] = "
    INSERT INTO `example` (
        `name`, `address`, `city`, `postcode`,
		`dob`, `phone`, `email`, `other_info`
	) VALUES (
		'%s', '%s', '%s', '%s',
		'%s', '%s', '%s', '%s'
	)
";

$sql['get_data'] = "
    SELECT
        *
    FROM
        `example`
	WHERE
		`name` LIKE '%s'
";

?>
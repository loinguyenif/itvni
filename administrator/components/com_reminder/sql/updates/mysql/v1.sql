
-- - 8< - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
-- Create table : Customers
-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - >8 -
CREATE TABLE IF NOT EXISTS `#__reminder_customers` (
	`id` BIGINT(20) UNSIGNED NOT NULL auto_increment,
	`templete_id` BIGINT(20) UNSIGNED ,
	`package_id` BIGINT(20) UNSIGNED ,
	`domain` VARCHAR(255) ,
	`price` DECIMAL(10,2 ) ,
	`company_name` VARCHAR(255) ,
	`name` VARCHAR(255) ,
	`email` VARCHAR(255) ,
	`phone_no` VARCHAR(255) ,
	`address` VARCHAR(255) ,
	`note` TEXT ,
	`creation_date` DATETIME ,
	`expiration_date` DATE ,
	`published` TINYINT(11) ,
	`modification_date` DATETIME ,
	`created_by` BIGINT(20) UNSIGNED ,
	`modified_by` BIGINT(20) UNSIGNED ,

	PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- - 8< - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
-- Create table : Histories
-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - >8 -
CREATE TABLE IF NOT EXISTS `#__reminder_histories` (
	`id` BIGINT(20) UNSIGNED NOT NULL auto_increment,
	`customer_id` BIGINT(20) UNSIGNED ,
	`subject` VARCHAR(255) ,
	`content` TEXT ,
	`creation_date` DATETIME ,
	`modification_date` DATETIME ,
	`created_by` BIGINT(20) UNSIGNED ,
	`modified_by` BIGINT(20) UNSIGNED ,

	PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- - 8< - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
-- Create table : Templetes
-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - >8 -
CREATE TABLE IF NOT EXISTS `#__reminder_templetes` (
	`id` BIGINT(20) UNSIGNED NOT NULL auto_increment,
	`slug_name` VARCHAR(255) ,
	`subject` VARCHAR(255) ,
	`content` TEXT ,
	`creation_date` DATETIME ,
	`modification_date` DATETIME ,
	`created_by` BIGINT(20) UNSIGNED ,
	`modified_by` BIGINT(20) UNSIGNED ,

	PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- - 8< - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
-- Create table : Packages
-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - >8 -
CREATE TABLE IF NOT EXISTS `#__reminder_packages` (
	`id` BIGINT(20) UNSIGNED NOT NULL auto_increment,
	`name` VARCHAR(255) ,
	`type` VARCHAR(255) ,
	`price` DECIMAL(10,2 ) ,
	`disk` VARCHAR(255) ,
	`param` TEXT ,
	`ordering` INT(11) ,
	`published` TINYINT(11) ,
	`creation_date` DATETIME ,
	`modification_date` DATETIME ,
	`created_by` BIGINT(20) UNSIGNED ,
	`modified_by` BIGINT(20) UNSIGNED ,

	PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


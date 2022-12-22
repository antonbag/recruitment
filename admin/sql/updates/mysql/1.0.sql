
-- - 8< - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
-- Create table : Wheredidus
-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - >8 -
CREATE TABLE IF NOT EXISTS `#__recruitment_wheredidus` (
	`id` BIGINT(20) UNSIGNED NOT NULL auto_increment,
	`description` VARCHAR(255) ,
	`order` INT(11) ,

	PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- - 8< - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
-- Create table : Doc Types
-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - >8 -
CREATE TABLE IF NOT EXISTS `#__recruitment_doctypes` (
	`id` BIGINT(20) UNSIGNED NOT NULL auto_increment,
	`description` VARCHAR(255) ,
	`order` INT(11) ,

	PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- - 8< - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
-- Create table : Genders
-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - >8 -
CREATE TABLE IF NOT EXISTS `#__recruitment_genders` (
	`id` BIGINT(20) UNSIGNED NOT NULL auto_increment,
	`description` VARCHAR(255) ,
	`order` INT(11) ,

	PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- - 8< - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
-- Create table : Overall Ranges
-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - >8 -
CREATE TABLE IF NOT EXISTS `#__recruitment_overallranges` (
	`id` BIGINT(20) UNSIGNED NOT NULL auto_increment,
	`description` VARCHAR(255) ,
	`order` INT(11) ,

	PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- - 8< - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
-- Create table : Programmes
-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - >8 -
CREATE TABLE IF NOT EXISTS `#__recruitment_programmes` (
	`id` BIGINT(20) UNSIGNED NOT NULL auto_increment,
	`description` VARCHAR(255) ,
	`short_description` VARCHAR(255) ,
	`order` INT(11) ,

	PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- - 8< - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
-- Create table : Countries
-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - >8 -
CREATE TABLE IF NOT EXISTS `#__recruitment_countries` (
	`id` BIGINT(20) UNSIGNED NOT NULL auto_increment,
	`printable_name` VARCHAR(255) ,

	PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- - 8< - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
-- Create table : Tabs
-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - >8 -
CREATE TABLE IF NOT EXISTS `#__recruitment_tabs` (
	`id` BIGINT(20) UNSIGNED NOT NULL auto_increment,
	`description` VARCHAR(255) ,
	`order` INT(11) ,

	PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- - 8< - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
-- Create table : Job Status
-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - >8 -
CREATE TABLE IF NOT EXISTS `#__recruitment_jobstatus` (
	`id` BIGINT(20) UNSIGNED NOT NULL auto_increment,
	`description` VARCHAR(255) ,
	`order` INT(11) ,

	PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- - 8< - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
-- Create table : Tabs Job
-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - >8 -
CREATE TABLE IF NOT EXISTS `#__recruitment_tabsjobs` (
	`id` BIGINT(20) UNSIGNED NOT NULL auto_increment,
	`tab_id` BIGINT(20) UNSIGNED ,
	`job_id` BIGINT(20) UNSIGNED ,

	PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- - 8< - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
-- Create table : Status
-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - >8 -
CREATE TABLE IF NOT EXISTS `#__recruitment_status` (
	`id` BIGINT(20) UNSIGNED NOT NULL auto_increment,
	`description` VARCHAR(255) ,
	`email_subject` VARCHAR(255) ,
	`email_body` TEXT ,
	`order` INT(11) ,

	PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- - 8< - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
-- Create table : Jobs
-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - >8 -
CREATE TABLE IF NOT EXISTS `#__recruitment_jobs` (
	`id` BIGINT(20) UNSIGNED NOT NULL auto_increment,
	`short_description` VARCHAR(255) ,
	`description` TEXT ,
	`publish_date` DATE ,
	`closing_date` DATE ,
	`status_id` BIGINT(20) UNSIGNED ,

	PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- - 8< - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
-- Create table : Degrees
-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - >8 -
CREATE TABLE IF NOT EXISTS `#__recruitment_degrees` (
	`id` BIGINT(20) UNSIGNED NOT NULL auto_increment,
	`application_id` BIGINT(20) UNSIGNED ,
	`type` VARCHAR(255) ,
	`degree` VARCHAR(255) ,
	`university` VARCHAR(255) ,
	`institution` VARCHAR(255) ,
	`final_mark` VARCHAR(255) ,
	`overall_range_id` BIGINT(20) UNSIGNED ,
	`country_id` BIGINT(20) UNSIGNED ,
	`start_date` DATE ,
	`end_date` DATE ,
	`director_name` VARCHAR(255) ,
	`creation_date` DATETIME ,

	PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- - 8< - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
-- Create table : Applications
-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - >8 -
CREATE TABLE IF NOT EXISTS `#__recruitment_applications` (
	`id` BIGINT(20) UNSIGNED NOT NULL auto_increment,
	`user_id` BIGINT(20) UNSIGNED ,
	`job_id` BIGINT(20) UNSIGNED ,
	`firstname` VARCHAR(255) ,
	`lastname` VARCHAR(255) ,
	`birth_date` DATE ,
	`gender_id` BIGINT(20) UNSIGNED ,
	`birth_country_id` BIGINT(20) UNSIGNED ,
	`passport` VARCHAR(255) ,
	`email` VARCHAR(255) ,
	`telephone` VARCHAR(255) ,
	`wheredidu_id` BIGINT(20) UNSIGNED ,
	`recruitment_comments` TEXT ,
	`applicant_contacted_date` DATE ,
	`applicant_contacted` TINYINT ,
	`linkedin_public_link` VARCHAR(255) ,
	`submit_date` DATE ,
	`status_id` BIGINT(20) UNSIGNED ,
	`modification_date` DATETIME ,
	`creation_date` DATETIME ,

	PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- - 8< - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
-- Create table : Work Experiences
-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - >8 -
CREATE TABLE IF NOT EXISTS `#__recruitment_workexperiences` (
	`id` BIGINT(20) UNSIGNED NOT NULL auto_increment,
	`application_id` BIGINT(20) UNSIGNED ,
	`company` VARCHAR(255) ,
	`experience` TEXT ,
	`start_date` DATE ,
	`end_date` DATE ,
	`country_id` BIGINT(20) UNSIGNED ,
	`creation_date` DATETIME ,

	PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- - 8< - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
-- Create table : Docs
-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - >8 -
CREATE TABLE IF NOT EXISTS `#__recruitment_docs` (
	`id` BIGINT(20) UNSIGNED NOT NULL auto_increment,
	`doc_type_id` BIGINT(20) UNSIGNED ,
	`application_id` BIGINT(20) UNSIGNED ,
	`filename` VARCHAR(255) ,
	`description` VARCHAR(255) ,
	`creation_date` DATETIME ,

	PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- - 8< - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
-- Create table : Referees
-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - >8 -
CREATE TABLE IF NOT EXISTS `#__recruitment_referees` (
	`id` BIGINT(20) UNSIGNED NOT NULL auto_increment,
	`application_id` BIGINT(20) UNSIGNED ,
	`firstname` VARCHAR(255) ,
	`lastname` VARCHAR(255) ,
	`email` VARCHAR(255) ,
	`filename` VARCHAR(255) ,
	`upload_code` VARCHAR(255) ,
	`sent_email` DATE ,
	`creation_date` DATETIME ,

	PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- - 8< - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
-- Create table : Application Programs
-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - >8 -
CREATE TABLE IF NOT EXISTS `#__recruitment_applicationprograms` (
	`id` BIGINT(20) UNSIGNED NOT NULL auto_increment,
	`application_id` BIGINT(20) UNSIGNED ,
	`programme_id` BIGINT(20) UNSIGNED ,
	`order` INT(11) ,

	PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


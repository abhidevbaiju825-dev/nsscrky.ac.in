<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class LegacySchema extends Migration
{
    public function up()
    {
        $db = \Config\Database::connect();
        $db->query("
            CREATE TABLE IF NOT EXISTS `_departments` (
              `_dep_id` int NOT NULL AUTO_INCREMENT,
              `_department_name` varchar(50) NOT NULL,
              `_description` text NOT NULL,
              `_association_name` varchar(30) NOT NULL,
              `_association_description` text NOT NULL,
              `created_date` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
              `_hod_message` text NOT NULL,
              `_added_by` varchar(50) NOT NULL,
              `_modified_date` date NOT NULL,
              PRIMARY KEY (`_dep_id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
        ");
        
        $db->query("
            CREATE TABLE IF NOT EXISTS `_courses` (
              `_courseid` int NOT NULL AUTO_INCREMENT,
              `_title` text NOT NULL,
              `_category` text NOT NULL,
              `_tagline` text NOT NULL,
              `_description` text NOT NULL,
              `_duration` int NOT NULL,
              `_maxseat` int NOT NULL,
              `_eligibity` text NOT NULL,
              `_vission` text NOT NULL,
              `_mission` text NOT NULL,
              `_objectives` text NOT NULL,
              `_hodmessage` text NOT NULL,
              `_syllabus` varchar(200) NOT NULL,
              PRIMARY KEY (`_courseid`)
            ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
        ");

        $db->query("
            CREATE TABLE IF NOT EXISTS `_ugcprojects` (
              `_ugcid` int NOT NULL AUTO_INCREMENT,
              `_papername` text NOT NULL,
              `_authorname` text NOT NULL,
              `_submittedto` text NOT NULL,
              `_department` text NOT NULL,
              `_pdfloc` text NOT NULL,
              PRIMARY KEY (`_ugcid`)
            ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
        ");

        $db->query("
            CREATE TABLE IF NOT EXISTS `_clubandcells` (
              `_id` int NOT NULL AUTO_INCREMENT,
              `_staf_id` int NOT NULL,
              `_name` varchar(100) NOT NULL,
              `_description` text NOT NULL,
              `_imgloc` text NOT NULL,
              `_display_as` varchar(50) NOT NULL,
              `_dept_id` int NOT NULL,
              `_logo` varchar(200) NOT NULL,
              `_hbanner` varchar(200) NOT NULL,
              `_fbanner` varchar(200) NOT NULL,
              PRIMARY KEY (`_id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
        ");

        $db->query("
            CREATE TABLE IF NOT EXISTS `_clubactivity` (
              `_id` int NOT NULL AUTO_INCREMENT,
              `_clubncell_id` int NOT NULL,
              `_title` varchar(50) NOT NULL,
              `_description` text NOT NULL,
              `_imgloc` text NOT NULL,
              `_doc_loc` varchar(100) NOT NULL,
              `_added_by` varchar(100) NOT NULL,
              `_modified_date` date NOT NULL,
              PRIMARY KEY (`_id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
        ");
        
        $db->query("
            CREATE TABLE IF NOT EXISTS `_basic_teacher_registration` (
              `_teacher_id` int NOT NULL AUTO_INCREMENT,
              `_login_id` int NOT NULL,
              `_name` varchar(50) NOT NULL,
              `_short_name` varchar(10) NOT NULL,
              `_address_line1` text NOT NULL,
              `_address_line2` text NOT NULL,
              `_dateofjoin` date NOT NULL,
              `_gender` varchar(30) NOT NULL,
              `_bool` varchar(30) NOT NULL,
              `_dateofretirement` date NOT NULL,
              `_phone` varchar(20) NOT NULL,
              `_mobile_visible` varchar(10) NOT NULL,
              `_dob` date NOT NULL,
              `_status` varchar(30) NOT NULL,
              `_order` int DEFAULT '0',
              `_qualification` varchar(50) NOT NULL,
              `_area_of_specialization` text NOT NULL,
              `_imgloc` text NOT NULL,
              `_department` int NOT NULL,
              `_seniority` varchar(50) NOT NULL,
              `_email` varchar(30) NOT NULL,
              `_email_visible` varchar(10) NOT NULL,
              `_role` varchar(30) NOT NULL,
              `_designation` varchar(50) NOT NULL,
              `_hod` varchar(50) DEFAULT NULL,
              `_description` text NOT NULL,
              `_subject` text NOT NULL,
              `_pan_number` varchar(20) NOT NULL,
              `_pen_number` varchar(20) NOT NULL,
              `_adhar_number` varchar(20) NOT NULL,
              `_approved_by` varchar(20) NOT NULL,
              PRIMARY KEY (`_teacher_id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
        ");
        
        $db->query("
            CREATE TABLE IF NOT EXISTS `_pta_members` (
              `_id` int NOT NULL AUTO_INCREMENT,
              `_name` varchar(100) NOT NULL,
              `_designation` varchar(100) NOT NULL,
              `_imgloc` text NOT NULL,
              PRIMARY KEY (`_id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
        ");

        $db->query("
            CREATE TABLE IF NOT EXISTS `_alumini_members` (
              `_id` int NOT NULL AUTO_INCREMENT,
              `_login_id` int NOT NULL,
              `_full_name` varchar(50) NOT NULL,
              `_contact_no` varchar(15) NOT NULL,
              `_email_address` varchar(70) NOT NULL,
              `_address` varchar(200) NOT NULL,
              `_location` varchar(40) NOT NULL,
              `_blood_group` varchar(5) NOT NULL,
              `_profile_picture` varchar(200) NOT NULL,
              `_job_specification` text NOT NULL,
              `_designation` varchar(30) DEFAULT NULL,
              `_approved_by` int NOT NULL,
              `_apporval_datetime` datetime NOT NULL,
              `_created_at` datetime NOT NULL,
              `_dob` date NOT NULL,
              `_gender` varchar(10) NOT NULL,
              `_passout_year` varchar(10) NOT NULL,
              `_role` varchar(100) NOT NULL,
              `_testimonial` text NOT NULL,
              `_contribution` text NOT NULL,
              `_feedback` text NOT NULL,
              `_testimonial_rank` varchar(10) NOT NULL,
              PRIMARY KEY (`_id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
        ");

        $db->query("
            CREATE TABLE IF NOT EXISTS `_studentunion_gallery` (
              `_union_gallery_id` int NOT NULL AUTO_INCREMENT,
              `_imgloc` text NOT NULL,
              PRIMARY KEY (`_union_gallery_id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
        ");

        $db->query("
            CREATE TABLE IF NOT EXISTS `_gallery` (
              `_id` int NOT NULL AUTO_INCREMENT,
              `_albumid` int NOT NULL,
              `_imgloc` text NOT NULL,
              `_department_id` int NOT NULL,
              `_img_title` varchar(50) NOT NULL,
              `_img_description` varchar(200) NOT NULL,
              `_added_at` datetime NOT NULL,
              `_added_by` varchar(50) NOT NULL,
              `_modified_date` date NOT NULL,
              PRIMARY KEY (`_id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
        ");

        $db->query("
            CREATE TABLE IF NOT EXISTS `_news` (
              `_newsid` int NOT NULL AUTO_INCREMENT,
              `_date` date NOT NULL,
              `_newsheading` varchar(100) NOT NULL,
              `_newsdescription` text NOT NULL,
              `_imgloc` text NOT NULL,
              `_added_by` varchar(40) NOT NULL,
              `_created_at` datetime NOT NULL,
              PRIMARY KEY (`_newsid`)
            ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
        ");
        
        $db->query("
            CREATE TABLE IF NOT EXISTS `_placement` (
              `_id` int NOT NULL AUTO_INCREMENT,
              `_title` text NOT NULL,
              `_studentcount` int NOT NULL,
              PRIMARY KEY (`_id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
        ");

        $db->query("
            CREATE TABLE IF NOT EXISTS `_notice` (
              `_id` int NOT NULL AUTO_INCREMENT,
              `_title` varchar(300) NOT NULL,
              `_description` text NOT NULL,
              `_link` varchar(250) NOT NULL,
              `_important` varchar(15) NOT NULL,
              `_status` varchar(20) NOT NULL,
              `_display_date` date NOT NULL,
              `_created_date` datetime NOT NULL,
              `_exp_date` date NOT NULL,
              `_pdf_file_loc` varchar(500) NOT NULL,
              PRIMARY KEY (`_id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
        ");
    }

    public function down()
    {
        $db = \Config\Database::connect();
        $tables = [
            '_departments', '_courses', '_ugcprojects', '_clubandcells', '_clubactivity',
            '_basic_teacher_registration', '_pta_members', '_alumini_members',
            '_studentunion_gallery', '_gallery', '_news', '_placement', '_notice'
        ];
        
        foreach($tables as $t) {
            $db->query("DROP TABLE IF EXISTS `$t`");
        }
    }
}

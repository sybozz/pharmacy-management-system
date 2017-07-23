<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Admin
 *
 * @author sybozz
 */
class Admin {

    //DB - server connection
    private $db_connect;

    public function __construct() {
        $host = 'localhost';
        $user = 'sharifio_db';
        $pass = 's1g?*X{GEZ+*';
        $db_name = 'sharifio_pmms';
        mysql_connect($host, $user, $pass);
        $this->db_connect = mysql_select_db($db_name);
        if (!$this->db_connect) {
            die('Failed to connect. ' . mysql_error());
        }
    }

    //Admin login auth
    public function admin_login($data) {

        $user = $data['username'];
        $pass = md5($data['password']);

        $query = "SELECT * FROM tbl_admin WHERE username='$user' AND password='$pass' ";

        if (mysql_query($query)) {

            $result = mysql_query($query);
            $admin_info = mysql_fetch_array($result);

            if ($admin_info) {
                session_start();
                $_SESSION['admin_id'] = $admin_info['id'];
                $_SESSION['admin_username'] = $admin_info['username'];

                header('Location: dashboard.php');
            } else {
                $notice = 'Wrong username or password';
                return $notice;
            }
        } else {
            die('query problem. ' . mysql_error());
        }
    }

    //Admin lotout
    public function admin_logout() {
        unset($_SESSION['admin_id']);
        unset($_SESSION['admin_username']);

        header('Location: index.php');
    }

    //Overview
    public function overview() {
        $query = "SELECT * FROM tbl_medicine ";
        if (mysql_query($query)) {
            $result = mysql_query($query);
            return $result;
        } else {
            die('Query problem. ' . mysql_error());
        }
    }

    //Insert group info
    public function insert_group_info($data) {
        $query = "INSERT INTO tbl_group VALUES('$data[group_id]', '$data[group_name]', '$data[brand_id]') ";
        if (mysql_query($query)) {
            $success = 'Successfully added.';
            return $success;
        } else {
            die('Query proble. ' . mysql_error());
        }
    }

    //retrieve group info
    public function select_group_info() {
        $query = "SELECT * FROM tbl_group ORDER BY group_id DESC";
        if (mysql_query($query)) {
            $group_result = mysql_query($query);
            return $group_result;
        } else {
            die('Query problem. ' . mysql_error());
        }
    }

    //Insert brnd info
    public function insert_brand_info($data) {
        $query = "INSERT INTO tbl_brand(brand_id, brand_name, contact, country) VALUES('$data[brand_id]', '$data[brand_name]', '$data[brand_contact]', '$data[brand_country]') ";
        if (mysql_query($query)) {
            $success = 'Successfully added.';
            return $success;
        } else {
            die('Query proble. ' . mysql_error());
        }
    }

    //retrieve brand info
    public function select_brand_info() {
        $query = "SELECT * FROM tbl_brand ORDER BY brand_id DESC ";
        if (mysql_query($query)) {
            $brand_result = mysql_query($query);
            return $brand_result;
        } else {
            die('Query problem. ' . mysql_error());
        }
    }

    //Insert medicine info
    public function insert_medicine_info($data) {
        $query = "INSERT INTO tbl_medicine VALUES('$data[m_id]', '$data[m_name]', '$data[group_id]', '$data[brand_id]', '$data[m_quantity]', '$data[m_price]') ";
        if (mysql_query($query)) {
            $success = 'Successfully added.';
            return $success;
        } else {
            die('Query proble. ' . mysql_error());
        }
    }

    //Manage info
    //retrieve medicine, group and brand info - join query
    public function select_medicine_record_all() {
        $query = "SELECT tbl_medicine.*, tbl_group.*, tbl_brand.* FROM tbl_medicine INNER JOIN tbl_group, tbl_brand WHERE tbl_medicine.group_id=tbl_group.group_id AND tbl_group.brand_id=tbl_brand.brand_id ORDER BY tbl_medicine.medicine_id DESC ";
        //$query = "SELECT tbl_medicine.*, tbl_group.*, tbl_brand.* FROM tbl_medicine FULL OUTER JOIN tbl_group ON tbl_medicine.group_id=tbl_group.group_id FULL OUTER JOIN tbl_brand ON tbl_group.brand_id=tbl_brand.brand_id ";
        //$query = "SELECT tbl_medicine.* FROM tbl_medicine "
        //. "UNION "
        //. "SELECT tbl_group.* FROM tbl_group "
        //. "UNION "
        //. "SELECT tbl_brand FROM tbl_brand ";
        if (mysql_query($query)) {
            $update_query = mysql_query($query);
            return $update_query;
        } else {
            die('Query problem. ' . mysql_error());
        }
    }
    //retrieve medicine, group and brand info - join
    public function select_medicine_record_by_id($medicine_id) {
        $query = "SELECT tbl_medicine.*, tbl_group.*, tbl_brand.* FROM tbl_medicine, tbl_group, tbl_brand WHERE medicine_id='$medicine_id' AND tbl_medicine.group_id=tbl_group.group_id AND tbl_group.brand_id=tbl_brand.brand_id ";
        if (mysql_query($query)) {
            $medicine_info = mysql_query($query);
            return $medicine_info;
        } else {
            die('Query problem. ' . mysql_error());
        }
    }
    
    //delete records
    public function delete_info_by_id($delete_id) {
        $query = "DELETE FROM tbl_medicine WHERE medicine_id='$delete_id' ";
        if(mysql_query($query)) {
           $warning = 'Successfully deleted.';
           return $warning;
        } else {
            die('Query problem. '.mysql_error());
        }
    }


    
    
    //placement info
    //insert medicine to rack,shelf,shelfbox 
    public function insert_placement_info($data) {
        $query = "INSERT INTO tbl_rack(shelfbox_no, shelf_no, rack_no, medicine_id) VALUES('$data[shelfbox_no]', '$data[shelf_no]', '$data[rack_no]', '$data[medicine_id]') ";
        if (mysql_query($query)) {
            $success = 'Successfully added.';
            return $success;
        } else {
            die('Query proble. ' . mysql_error());
        }
    }
    
    //select rack info
    public function select_rack_info_by_id($medicine_id) {
        $query = "SELECT * FROM tbl_rack WHERE medicine_id='$medicine_id' ";
        if (mysql_query($query)) {
            $rack_result = mysql_query($query);
            return $rack_result;
        } else {
            die('Query problem. ' . mysql_error());
        }
    }
    
    
    //update info by id
    public function update_info_by_id($data) {
        $query = "UPDATE tbl_rack SET shelfbox_no='$data[shelfbox_no]', shelf_no='$data[shelf_no]', rack_no='$data[rack_no]' WHERE medicine_id='$data[medicine_id]' ";
        if (mysql_query($query)) {
            $query = "UPDATE tbl_medicine SET medicine_name='$data[m_name]', price='$data[m_price]' WHERE medicine_id='$data[medicine_id]' ";
            if(mysql_query($query)) {
                $success = 'Successfully updated.';
                return $success;
            }
        } else {
            die('Query proble. ' . mysql_error());
        }
        
    }

    
    
}

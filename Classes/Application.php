<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Application
 *
 * @author sybozz
 */
class Application {
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
    
    //find the location of a medicine - join
    public function find_medicine_by_name($term) {
        $query = "SELECT tbl_medicine.*, tbl_group.*, tbl_rack.*, tbl_brand.* FROM tbl_medicine, tbl_group, tbl_rack, tbl_brand WHERE medicine_name LIKE '$term%' AND tbl_medicine.group_id=tbl_group.group_id AND tbl_rack.medicine_id=tbl_medicine.medicine_id AND tbl_medicine.brand_id=tbl_brand.brand_id ";
        if(mysql_query($query)) {
            $query_result = mysql_query($query);
            return $query_result;
        } else {
            die('Query problem. '.mysql_error());
        }
    }
    
}

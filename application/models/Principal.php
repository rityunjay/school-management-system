<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Principal extends CI_Model{
    
    function __construct() {
        // Set table name
        $this->table = 'gt_principal';
        $this->table1 = 'gt_teachers';
        $this->desigTable = 'gt_designation';
    }
    
    /*
     * Fetch members data from the database
     * @param array filter data based on the passed parameters
     */
    function getRows($params = array()){ 
        $this->db->select('*'); 
        $this->db->from($this->table); 
         
        if(array_key_exists("conditions", $params)){ 
            foreach($params['conditions'] as $key => $val){ 
                $this->db->where($key, $val); 
            } 
        } 
         
        if(array_key_exists("returnType",$params) && $params['returnType'] == 'count'){ 
            $result = $this->db->count_all_results(); 
        }else{ 
            if(array_key_exists("id", $params) || $params['returnType'] == 'single'){ 
                if(!empty($params['id'])){ 
                    $this->db->where('id', $params['id']); 
                } 
                $query = $this->db->get(); 
                $result = $query->row_array(); 
            }else{ 
                $this->db->order_by('id', 'desc'); 
                if(array_key_exists("start",$params) && array_key_exists("limit",$params)){ 
                    $this->db->limit($params['limit'],$params['start']); 
                }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){ 
                    $this->db->limit($params['limit']); 
                } 
                 
                $query = $this->db->get(); 
                $result = ($query->num_rows() > 0)?$query->result_array():FALSE; 
            } 
        } 
         
        // Return fetched data 
        return $result; 
    } 

    public function updateProfile($data, $id) {
        if(!empty($data) && !empty($id)){
            // Add modified date if not included
            if(!array_key_exists("modified", $data)){
                $data['modified'] = date("Y-m-d H:i:s");
            }
            
            // Update member data
            $update = $this->db->update($this->table, $data, array('id' => $id));
            
            // Return the status
            return $update?true:false;
        }
        return false;
    }


    /* 
     * Insert Teacher data into the database 
     * @param $data data to be inserted 
     */ 
    public function insertTeacher($data = array()) { 
        if(!empty($data)){ 
            // Add created and modified date if not included 
            if(!array_key_exists("created_date", $data)){ 
                $data['created_date'] = date("Y-m-d H:i:s"); 
            } 
            if(!array_key_exists("modified", $data)){ 
                $data['modified'] = date("Y-m-d H:i:s"); 
            } 
             
            // Insert member data 
            $insert = $this->db->insert($this->table1, $data); 
             
            // Return the status 
            return $insert?$this->db->insert_id():false; 
        } 
        return false; 
    } 

    public function update($data, $id) {
        if(!empty($data) && !empty($id)){
            // Add modified date if not included
            if(!array_key_exists("modified", $data)){
                $data['modified'] = date("Y-m-d H:i:s");
            }
            
            // Update member data
            $update = $this->db->update($this->table1, $data, array('id' => $id));
            
            // Return the status
            return $update?true:false;
        }
        return false;
    }

    /* delete teacher record */
    public function deleteTeacher($id){
        // Delete member data
        $delete = $this->db->delete($this->table1, array('id' => $id));
        
        // Return the status
        return $delete?true:false;
    }

    /* delete designation record */
    public function deleteDesignation($id){
        // Delete member data
        $delete = $this->db->delete($this->desigTable, array('id' => $id));

        // Return the status
        return $delete?true:false;
    }

    /* add designation data */
    public function insertDesignation($data = array()) { 
        if(!empty($data)){ 
            // Add created and modified date if not included 
            if(!array_key_exists("created_date", $data)){ 
                $data['created_date'] = date("Y-m-d H:i:s"); 
            } 
            if(!array_key_exists("modified", $data)){ 
                $data['modified'] = date("Y-m-d H:i:s"); 
            } 
             
            // Insert member data 
            $insert = $this->db->insert($this->desigTable, $data); 
             
            // Return the status 
            return $insert?$this->db->insert_id():false; 
        } 
        return false; 
    } 

    /* display designation data */
    function getDesignation($params = array()){ 
        $this->db->select('*'); 
        $this->db->from($this->desigTable); 
         
        if(array_key_exists("conditions", $params)){ 
            foreach($params['conditions'] as $key => $val){ 
                $this->db->where($key, $val); 
            } 
        } 
         
        if(array_key_exists("returnType",$params) && $params['returnType'] == 'count'){ 
            $result = $this->db->count_all_results(); 
        }else{ 
            if(array_key_exists("id", $params) || $params['returnType'] == 'single'){ 
                if(!empty($params['id'])){ 
                    $this->db->where('id', $params['id']); 
                } 
                $query = $this->db->get(); 
                $result = $query->row_array(); 
            }else{ 
                $this->db->order_by('id', 'desc'); 
                if(array_key_exists("start",$params) && array_key_exists("limit",$params)){ 
                    $this->db->limit($params['limit'],$params['start']); 
                }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){ 
                    $this->db->limit($params['limit']); 
                } 
                 
                $query = $this->db->get(); 
                $result = ($query->num_rows() > 0)?$query->result_array():FALSE; 
            } 
        } 
         
        // Return fetched data 
        return $result; 
    }
    
    
}
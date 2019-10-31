<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Principal extends CI_Model{
    
    function __construct() {
        // Set table name
        $this->table = 'gt_principal';
        $this->teacherTable = 'gt_teachers';
        $this->subjectTable = 'gt_clsSubject';
        $this->classTable = 'gt_stdClass';
        $this->sectionTable = 'gt_stdSection';
        $this->parentTable = 'gt_parents';
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
            $insert = $this->db->insert($this->teacherTable, $data); 
             
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
            $update = $this->db->update($this->teacherTable, $data, array('id' => $id));
            
            // Return the status
            return $update?true:false;
        }
        return false;
    }

    /* delete teacher record */
    public function deleteTeacher($id){
        // Delete member data
        $delete = $this->db->delete($this->teacherTable, array('id' => $id));
        
        // Return the status
        return $delete?true:false;
    }

    /* delete designation record */
    public function deleteSubject($id){
        // Delete member data
        $delete = $this->db->delete($this->subjectTable, array('id' => $id));

        // Return the status
        return $delete?true:false;
    }

    /* add designation data */
    public function insertSubject($data = array()) { 
        if(!empty($data)){ 
            // Add created and modified date if not included 
            if(!array_key_exists("created_date", $data)){ 
                $data['created_date'] = date("Y-m-d H:i:s"); 
            } 
            if(!array_key_exists("modified", $data)){ 
                $data['modified'] = date("Y-m-d H:i:s"); 
            } 
             
            // Insert member data 
            $insert = $this->db->insert($this->subjectTable, $data); 
             
            // Return the status 
            return $insert?$this->db->insert_id():false; 
        } 
        return false; 
    } 

    /* display designation data */
    function getSubject($params = array()){ 
        $this->db->select('*'); 
        $this->db->from($this->subjectTable);
        $this->db->join($this->teacherTable, 'gt_teachers.id = gt_clsSubject.tid');  
         
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
                    $this->db->where('tid', $params['id']); 
                } 
                $query = $this->db->get(); 
                $result = $query->row_array(); 
            }else{ 
                $this->db->order_by('tid', 'desc'); 
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

    /* display class data */
    function getClass($params = array()){ 
        $this->db->select('*'); 
        $this->db->from($this->teacherTable); 
        $this->db->join($this->classTable, 'gt_teachers.id = gt_stdClass.tid'); 
         
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
                $this->db->order_by('tid', 'desc'); 
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

    /* 
     * Insert Teacher data into the database 
     * @param $data data to be inserted 
     */ 
    public function addClass($data = array()) { 
        if(!empty($data)){ 
            // Add created and modified date if not included 
            if(!array_key_exists("created_date", $data)){ 
                $data['created_date'] = date("Y-m-d H:i:s"); 
            } 
            if(!array_key_exists("modified", $data)){ 
                $data['modified'] = date("Y-m-d H:i:s"); 
            } 
             
            // Insert member data 
            $insert = $this->db->insert($this->classTable, $data); 
             
            // Return the status 
            return $insert?$this->db->insert_id():false; 
        } 
        return false; 
    }

    /* delete designation record */
    public function deleteClass($id){
        // Delete member data
        //$delete = $this->db->delete($this->classTable, array('id' => $id));
        $delete = "DELETE gt_stdClass,gt_stdSection 
        FROM gt_stdClass,gt_stdSection 
        WHERE gt_stdClass.id = gt_stdSection.cid 
        AND gt_stdClass.id = ?";

        $this->db->query($delete, array($id));


        // Return the status
        return $delete?true:false;
    } 

    /* display class data */
    function getSection($params = array()){ 
        /*$this->db->select('*'); 
        $this->db->from($this->teacherTable); 
        $this->db->join($this->classTable, 'gt_teachers.id = gt_stdClass.tid'); 
        $this->db->join($this->sectionTable, 'gt_stdSection.cid = gt_stdClass.id');
        $this->db->join($this->subjectTable, 'gt_clsSubject.tid = gt_stdClass.tid');*/ 

        $this->db->select('*'); 
        $this->db->from($this->sectionTable); 
        $this->db->join($this->teacherTable, 'gt_teachers.id = gt_stdSection.tid'); 
        $this->db->join($this->classTable, 'gt_stdClass.id = gt_stdSection.cid');
        $this->db->join($this->subjectTable, 'gt_clsSubject.tid = gt_teachers.id');

       /* $this->db->select('*');
        $this->db->from($this->sectionTable); 
        $this->db->join($this->classTable, 'gt_stdClass.tid = gt_stdSection.tid');
        $this->db->join($this->teacherTable, 'gt_teachers.id = gt_stdSection.tid');
        $this->db->join($this->subjectTable, 'gt_clsSubject.tid = gt_stdSection.tid', 'left');*/
        //$this->db->where('s.tid','t.id');

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
                $this->db->order_by('cid', 'desc'); 
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

    /* 
     * Insert Teacher data into the database 
     * @param $data data to be inserted 
     */ 
    public function addSection($data = array()) { 
        if(!empty($data)){ 
            // Add created and modified date if not included 
            if(!array_key_exists("created_date", $data)){ 
                $data['created_date'] = date("Y-m-d H:i:s"); 
            } 
            if(!array_key_exists("modified", $data)){ 
                $data['modified'] = date("Y-m-d H:i:s"); 
            } 
             
            // Insert member data 
            $insert = $this->db->insert($this->sectionTable, $data); 
             
            // Return the status 
            return $insert?$this->db->insert_id():false; 
        } 
        return false; 
    }

    /* delete designation record */
    public function deleteSection($id){
        // Delete member data
        $delete = $this->db->delete($this->sectionTable, array('id' => $id));

        // Return the status
        return $delete?true:false;
    }    
    
}
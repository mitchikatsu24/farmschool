<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if(! function_exists("db_execute_query")){
    function db_execute_query(string $sql, array $param = []) {
        $YROS = &Yros::get_instance();
        return $YROS->dblib->setQuery($sql, $param);   
    }
}

if(! function_exists("db_set_query")){
    function db_set_query(string $sql, array $param = []) {
        $YROS = &Yros::get_instance();
        return $YROS->dblib->setQuery($sql, $param);   
    }
}


if(! function_exists("db_dump_errors")){
    /** (Void) display/track sql result error */
    function db_dump_errors(){
        $errs = db_errors();
        if(! empty($errs)){
            $sz = sizeof($errs);
            $msg = "";
            $count = 1;
            foreach($errs as $key){
                $msg .= strval($count).". ".$key."<br>";
                $count += 1;
            }
            if($sz<=1){
                echo "<br>DB transaction error:<br>"."<span style='color:red;'>$msg</span>";exit;
            }else{
                echo "<br>DB transaction errors:<br>"."<span style='color:red;'>$msg</span>";exit;
            }
        }
    }
}

if(! function_exists("db_result_dump")){
     /** (Mixed) display/track result sql result error */
     /** If changeValue is true: when the sql result is success, the result value will changed as the selected key */
    function db_result_dump(array &$result, string $key=null, $changeValue = true){
        $r = null;
        $YROS = &Yros::get_instance();
        $ret = $YROS->dblib->db_result_dump($result, $key);
        if($ret == true){
            if($key != null && $key != ""){
                if($changeValue==true){$result = $result[$key];}else{
                    $result = $result;
                }
                $r = $result;
            }else{
                $result = $result;
                $r = $result;
            }
        }else{
            $result = $result;
            $r = $result;
        }
        return $r;
    }
}


if(! function_exists("db_insert")){
    function db_insert(string $table, string|array|int &$data, bool $array_data_remain = false){
        $YROS = &Yros::get_instance();
        if(is_array($data)){
            $ins = $data;
            if($array_data_remain == false){$data = [];}
            return $YROS->dblib->insert($table, $ins);
        }
        elseif(is_string($data)){
            $arr = preg_split('/[&|]/', $data);
            $dt = array();
            foreach($arr as $key){
                $k = $key;
                $kv = explode("=", $k);
                $kk = $kv[0];
                $vv = $kv[1];
                $dt[$kk] = $vv;
            }
            $dtt = $dt;
            return $YROS->dblib->insert($table, $dtt);
        }
        else{
            $dta = $YROS->dblib->get_db_data($data);
            return $YROS->dblib->insert($table, $dta);
        }
        
    }
}

if(! function_exists("db_select")){
    function db_select(string $table, array|string $columns =["*"], string $patern="", array $parameters =[] ){
        $YROS = &Yros::get_instance();
        return $YROS->dblib->db_select($table, $columns, $patern, $parameters);
    }
}

if(! function_exists("db_select_all_where")){
    function db_select_all_where(string|array $table, array|string $where, array $parameters=[]){
        $YROS = &Yros::get_instance();
        return $YROS->dblib->select_all_where($table, $where, $parameters);
    }
}

if(! function_exists("db_select_all")){
    function db_select_all(string|array $table){
        return db_select($table);
    }
}

if(! function_exists("db_delete")){
    /** (Array) return the result of the delete command */
    /** $table = name of the table where the data you want to delete */
    /** $conditions (where) = where the data to delete */
    function db_delete(string $table, array|string|int &$conditions, bool $array_data_remain = false){
        $YROS = &Yros::get_instance();
        if(is_array($conditions)){
            $ins = $conditions;
            if($array_data_remain == false){$conditions = [];}
            return $YROS->dblib->deleteQuery($table, $ins);
        }
        elseif(is_string($conditions)){
            $arr = preg_split('/[&|]/', $conditions);
            $dt = array();
            foreach($arr as $key){
                $k = $key;
                $kv = explode("=", $k);
                $kk = $kv[0];
                $vv = $kv[1];
                $dt[$kk] = $vv;
            }
            return $YROS->dblib->deleteQuery($table, $dt); 
        }
        else{
            $dta = $YROS->dblib->get_db_data($conditions);
            return $YROS->dblib->deleteQuery($table, $dta);
        }
    }
}

if(! function_exists("db_setData")){
    function db_setData(int $group, array $data){
        $YROS = &Yros::get_instance();
        $YROS->dblib->set_db_data($group, $data);
    }
}

if(! function_exists("dbData")){
    function dbData(int $group){
        $YROS = &Yros::get_instance();
        return $YROS->dblib->get_db_data($group);
    }
}

if(! function_exists("db_update")){
    /** (Array) return the result of the delete command */
    /** $table = name of the table you want to update */
    /** $data (set) = set the new value in the specific column*/
    /** $conditions (where) = where the data to update */
    function db_update(string $table, array|int &$data, array|int &$conditions, bool $array_data_remain = false){
        $YROS = &Yros::get_instance();
        if(is_array($data) && is_array($conditions)){
            $dt = $data;
            $cond = $conditions;
            if($array_data_remain==false){$data=[]; $conditions = [];}
            return $YROS->dblib->updateQuery($table, $dt, $cond);
        }
        elseif(! is_array($data) && is_array($conditions)){
            $cond = $conditions;
            if($array_data_remain==false){$conditions=[];}
            return $YROS->dblib->updateQuery($table, $YROS->dblib->get_db_data($data), $cond);
        }
        elseif(is_array($data) && ! is_array($conditions)){
            $dt = $data;
            if($array_data_remain==false){$data=[];}
            return $YROS->dblib->updateQuery($table, $dt, $YROS->dblib->get_db_data($conditions));
        }
        else{
            return $YROS->dblib->updateQuery($table,$YROS->dblib->get_db_data($data), $YROS->dblib->get_db_data($conditions));
        }
    }
}

if(! function_exists("db_last_query")){
    function db_last_query(){
        $YROS = &Yros::get_instance();
        return $YROS->dblib->db_last_query();
    }
}

if(! function_exists("db_tracker_start")){
    function db_tracker_start(){
        $YROS = &Yros::get_instance();
        $YROS->db->beginTransaction();
        FunctionPair::callFirst('db_tracker_start', 'db_tracker_complete');
    }
}

if(! function_exists("db_tracker_complete")){
    function db_tracker_complete(){
        $YROS = &Yros::get_instance();
        if ($YROS->db->inTransaction()) {
            $YROS->db->commit();
        } else {
            trigger_error("tracker not started, db_tracker_start() must be called", E_USER_WARNING);
        }
        FunctionPair::callSecond('db_tracker_complete');
    }
}

if(! function_exists("db_errors")){
    /** (Array) get the array list of all database errors */
    function db_errors():array{
        $YROS = &Yros::get_instance();
        return $YROS->dblib->db_errors;
    }
}

if(! function_exists("db_last_error")){
    /** (Any) display the error from last query */
    function db_last_error(){
        $YROS = &Yros::get_instance();
        $errs = $YROS->dblib->db_errors;
        if(empty($errs)){
            return null;
        }
        return end($errs);
    }
}

if(! function_exists("db_dump_last_error")){
    /** (Void) display the last database error */
    function db_dump_last_error(){
        $YROS = &Yros::get_instance();
        $errs = $YROS->dblib->db_errors;
        if(! empty($errs)){
            $last = end($errs);
            echo "<br><span style='color:red;'>".$last."</span>";exit;
        }
    }
}

FunctionPair::pair('db_tracker_start', 'db_tracker_complete');

?>
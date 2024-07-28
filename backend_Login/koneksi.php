<?php 
date_default_timezone_set('Asia/Jakarta');
class Connection{
    private $link;


    public function __construct(){
        $this->link = new mysqli("localhost","root","","user_management");
    }

    public function connect(){
        return $this->link;
    }
    public function query($query)
    {        
        $result = $this->link->query($query);
        
       
        return $result;
    }
    public function multi_query($query)
    {        
        $result_multi = $this->link->multi_query($query);
        
       
        return $result_multi;
    }
}

?>
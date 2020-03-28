<?php
class Sessions{
    public function __construct(){ }

    public function init(){
        session_start();
    }

    public function set($varname, $value){		
        $_SESSION[$varname] = $value;	
    }
    public function get($varname){            
        return $_SESSION[$varname];            
    }	
    public function destroy(){
        session_start();	
        session_unset();
        session_destroy();		
    }	
} 
<?php

class Executor {

	public static function doit($sql){
        $con = BaseDatos::getCon();
        
        if( $con !== false){
       
            $result = sqlsrv_query($con,$sql);            
           
        }

        return $result;
	
	}
}








?>
<?php

$id_cliente= $_GET['id'];


    function mostrarcliente($id_cliente){
        $conn = BaseDatos::getCon();
        $sql = "Select * from cliente where id_cliente='".$id_cliente."'; ";
        $resultado = sqlsrv_query($conn,$sql) or die(sqlsrv_error()); 
        $fila = sqlsrv_fetch_array($resultado,SQLSRV_FETCH_ASSOC);
           
        return [
            $fila['id_cliente'],
            $fila['clien_nom1'],
            $fila['clien_nom2'],
            $fila['clien_ape1'],
            $fila['clien_ape2'],
            $fila['clien_compania'],
            $fila['clien_direccion'],
            $fila['clien_correo'],
            $fila['clien_tel1'],
            $fila['clien_tel2'],
            $fila['clien_tel3'],
            $fila['pais_id_pais'],
            $fila['fecha_ingreso']
        ];
    }  

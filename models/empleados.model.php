<?php
    //modelo de datos de productos
    require_once("libs/dao.php");

    function obtenerEmpleados(){
        $empleados = array();
        $sqlstr = "select * from empleados;";
        $empleados = obtenerRegistros($sqlstr);
        return $empleados;
    }
    function obtenerEmpleado($empleadoID){
      $empleado = array();
      $sqlstr = "select * from empleados where emp_reg = %d;";
      $sqlstr = sprintf($sqlstr, $empleadoID);
      $empleado = obtenerUnRegistro($sqlstr);
      return $empleado;
    }
    function insertarEmpleado($empleado){
      if($empleado && is_array($empleado)){
         $sqlInsert = "INSERT INTO empleados(`ctgdsc`,`ctgest`)VALUES('%s','%s');";
         $sqlInsert = sprintf($sqlInsert,
                        valstr($empleado["ctgdsc"]),
                        valstr($empleado["ctgest"])
                      );
         if(ejecutarNonQuery($sqlInsert)){
           return getLastInserId();
         }
      }
      return false;
    }

    function actualizarEmpleado($empleado){
      if($empleado && is_array($empleado)){
        $sqlUpdate = "update empleados set ctgdsc='%s', ctgest='%s' where emp_reg=%d;";
        $sqlUpdate = sprintf($sqlUpdate,
                      valstr($empleado["ctgdsc"]),
                      valstr($empleado["ctgest"]),
                      valstr($empleado["emp_reg"])
                    );
        return ejecutarNonQuery($sqlUpdate);
      }
      return false;
    }

    function borrarEmpleado($empleadoID){
      if($empleadoID){
        $sqlDelete = "delete from empleados where emp_reg=%d;";
        $sqlDelete = sprintf($sqlDelete,
                      valstr($empleadoID)
                    );
        return ejecutarNonQuery($sqlDelete);
      }
      return false;
    }
?>

<?php
    //modelo de datos de productos
    require_once("libs/dao.php");

    function obtenerCamiones(){
        $camiones = array();
        $sqlstr = "select * from camiones;";
        $camiones = obtenerRegistros($sqlstr);
        return $camiones;
    }
    function obtenerCamion($camionID){
      $camion = array();
      $sqlstr = "select * from camiones where cam_id = %d;";
      $sqlstr = sprintf($sqlstr, $camionID);
      $camion = obtenerUnRegistro($sqlstr);
      return $camion;
    }
    function insertarCamion($camion){
      if($camion && is_array($camion)){
         $sqlInsert = "INSERT INTO camiones(`ctgdsc`,`ctgest`)VALUES('%s','%s');";
         $sqlInsert = sprintf($sqlInsert,
                        valstr($camion["ctgdsc"]),
                        valstr($camion["ctgest"])
                      );
         if(ejecutarNonQuery($sqlInsert)){
           return getLastInserId();
         }
      }
      return false;
    }

    function actualizarCamion($camion){
      if($camion && is_array($camion)){
        $sqlUpdate = "update camiones set ctgdsc='%s', ctgest='%s' where cam_id=%d;";
        $sqlUpdate = sprintf($sqlUpdate,
                      valstr($camion["ctgdsc"]),
                      valstr($camion["ctgest"]),
                      valstr($camion["cam_id"])
                    );
        return ejecutarNonQuery($sqlUpdate);
      }
      return false;
    }

    function borrarCamion($camionID){
      if($camionID){
        $sqlDelete = "delete from camiones where cam_id=%d;";
        $sqlDelete = sprintf($sqlDelete,
                      valstr($camionID)
                    );
        return ejecutarNonQuery($sqlDelete);
      }
      return false;
    }
?>

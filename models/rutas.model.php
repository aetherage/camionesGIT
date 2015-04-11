<?php
    //modelo de datos de productos
    require_once("libs/dao.php");

    function obtenerRutas(){
        $rutas = array();
        $sqlstr = "select * from rutas;";
        $rutas = obtenerRegistros($sqlstr);
        return $rutas;
    }
    function obtenerRuta($rutaID){
      $ruta = array();
      $sqlstr = "select * from rutas where ru_id = %d;";
      $sqlstr = sprintf($sqlstr, $rutaID);
      $ruta = obtenerUnRegistro($sqlstr);
      return $ruta;
    }
    function insertarRuta($ruta){
      if($ruta && is_array($ruta)){
         $sqlInsert = "INSERT INTO rutas(`ctgdsc`,`ctgest`)VALUES('%s','%s');";
         $sqlInsert = sprintf($sqlInsert,
                        valstr($ruta["ctgdsc"]),
                        valstr($ruta["ctgest"])
                      );
         if(ejecutarNonQuery($sqlInsert)){
           return getLastInserId();
         }
      }
      return false;
    }

    function actualizarRuta($ruta){
      if($ruta && is_array($ruta)){
        $sqlUpdate = "update rutas set ctgdsc='%s', ctgest='%s' where ru_id=%d;";
        $sqlUpdate = sprintf($sqlUpdate,
                      valstr($ruta["ctgdsc"]),
                      valstr($ruta["ctgest"]),
                      valstr($ruta["ru_id"])
                    );
        return ejecutarNonQuery($sqlUpdate);
      }
      return false;
    }

    function borrarRuta($rutaID){
      if($rutaID){
        $sqlDelete = "delete from rutas where ru_id=%d;";
        $sqlDelete = sprintf($sqlDelete,
                      valstr($rutaID)
                    );
        return ejecutarNonQuery($sqlDelete);
      }
      return false;
    }
?>

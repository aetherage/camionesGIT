<?php
    //modelo de datos de productos
    require_once("libs/dao.php");

    function obtenerFacturas(){
        $facturas = array();
        $sqlstr = "select * from facturas;";
        $facturas = obtenerRegistros($sqlstr);
        return $facturas;
    }
    function obtenerFactura($facturaID){
      $factura = array();
      $sqlstr = "select * from facturas where fac_id = %d;";
      $sqlstr = sprintf($sqlstr, $facturaID);
      $factura = obtenerUnRegistro($sqlstr);
      return $factura;
    }
    function insertarFactura($factura){
      if($factura && is_array($factura)){
         $sqlInsert = "INSERT INTO facturas(`ctgdsc`,`ctgest`)VALUES('%s','%s');";
         $sqlInsert = sprintf($sqlInsert,
                        valstr($factura["ctgdsc"]),
                        valstr($factura["ctgest"])
                      );
         if(ejecutarNonQuery($sqlInsert)){
           return getLastInserId();
         }
      }
      return false;
    }

    function actualizarFactura($factura){
      if($factura && is_array($factura)){
        $sqlUpdate = "update facturas set ctgdsc='%s', ctgest='%s' where fac_id=%d;";
        $sqlUpdate = sprintf($sqlUpdate,
                      valstr($factura["ctgdsc"]),
                      valstr($factura["ctgest"]),
                      valstr($factura["fac_id"])
                    );
        return ejecutarNonQuery($sqlUpdate);
      }
      return false;
    }

    function borrarFactura($facturaID){
      if($facturaID){
        $sqlDelete = "delete from facturas where fac_id=%d;";
        $sqlDelete = sprintf($sqlDelete,
                      valstr($facturaID)
                    );
        return ejecutarNonQuery($sqlDelete);
      }
      return false;
    }
?>

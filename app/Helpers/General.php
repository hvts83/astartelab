<?php

  namespace App\Helpers;

  use DB;
  use DateTime;


  use App\User;


  /**
   *
   * Helper de funciones Generales del sistema de acciones recurrentes
   */
  class General {


    /**
     * Creado de mensajes (pendiente de modificar)
     * @param  Array $mensajes    Conjuto de mensajes que se enviarán
     * @param  string $tipo       Tipo de mensaje que se enviará
     * @param  string $redireccion Lugar donde se realizará la redireccion
     * @return Redireccion
     *
    */
    public static function mensajes($mensajes, $tipo = 'success', $redireccion = ""){
	    $redirectPath = $redirectPath == null ? back() : redirect( $redirectPath );
	     return $redirectPath->with([
	         'message'   =>  $message,
	         'status'    =>  $status,
	    ]);
    }

    /**
     * Generador de mascará de fecha (En caso de no desear usar Carbon)
     * @param  Datetime $date    Fecha a convertir
     * @param  string   $mascara Mascara para convertir fecha, por defecto es d/m/Y (ver php docs)
     * @return Datetime          Fecha convertida
     */
    public static function formatoFecha( $date, $mascara = "d-m-Y"){
        $date = new DateTime($date);
        $Newdate = date_format( $date , $mascara);
        return $Newdate;
    }

    public static function getGenero(){
      $genero = array(
        array("value" => "M", "text" => 'masculino' ),
        array("value" => "F", "text" => 'femenino' )
      );
      return $genero;
    }

    public static function getTipoFrases(){
      $tipo = array(
        array("value" => "B", "text" => "Frases Macro Biopsia"),
        array("value" => "M", "text" => "Frases Micro Biopsia" ),
        array("value" => "C", "text" => "Frases Micro Citología")
      );
      return $tipo;
    }

    public static function getTipoDiagnostico(){
      $tipo = array(
        array("value" => "B", "text" => "Diagnóstico de Biopsia"),
        array("value" => "C", "text" => "Diagnóstico de Citología")
      );
      return $tipo;
    }

    public static function getTipoServicio(){
      $tipo = array(
        array("value" => "B", "text" => "Biopsia"),
        array("value" => "C", "text" => "Citología")
      );
      return $tipo;
    }

    public static function getTipoUsuario(){
      $tipo = array(
        array("value" => "A", "text" => "Administrador"),
        array("value" => "B", "text" => "Empleado tipo 1"),
        array("value" => "C", "text" => "Empleado tipo 2"),
      );
      return $tipo;
    }

    public static function getCondicionPago(){
      $tipo = array(
        array("value" => "PP", "text" => "Prepagado"),
        array("value" => "AP", "text" => "Abono parcial"),
        array("value" => "AC", "text" => "Abono cancelado"),
        array("value" => "PE", "text" => "Pendiente de pago"),
      );
      return $tipo;
    }

    public static function getFacturacion(){
      $tipo = array(
        array("value" => "CF", "text" => "Crédito fiscal"),
        array("value" => "TC", "text" => "Ticket"),
        array("value" => "FA", "text" => "Factura"),
      );
      return $tipo;
    }

    public static function generar_token( $id ){
      $time = time();
      $token = sha1( sprintf("%'.07d", $id ) . str_random(20) . $time );
      return $token;
    }

  }


?>

<?php

namespace App\Services;

use Auth;
use App\Models\Navigation;
use App\Models\Subnavigation;
use Illuminate\Support\Facades\URL;

class Menu {


  /*
   * Crear el menu
   *
   *
   *
   * @return object
   */
  public static function create(){

    //Consultas del menu
    $modulos = Navigation::select('navigation.id', 'navigation.label', 'navigation.icon')
              ->join('Subnavigation', 'navigation.id', '=', 'navigation_id')
              ->join('user_navigation', 'subnavigation.id', '=', 'user_navigation.subnavigation_id')
              ->where('tipo', '=', Auth::user()->rol)
              ->groupBy('Navigation.id', 'Navigation.label', 'Navigation.icon')
              ->get();

    $submodulos = Subnavigation::select('subnavigation.id','subnavigation.label', 'subnavigation.link', 'subnavigation.link_extended', 'navigation_id')
              ->join('user_navigation', 'subnavigation.id', '=', 'user_navigation.subnavigation_id')
              ->where('tipo', '=', Auth::user()->rol)
              ->get();

    //---------------------------
    //inicialización
    //Verifico el módulo activo
    $activo ="";
    //Además especifica el id de la sección a la cual pertenece
    $modulo_activo = 0;
    $submodulo_activo = 0;
    //Recorre las secciones para verificar en que lugar esta apuntando
    foreach( $submodulos as $submodulo){
      if (  isActiveRoute($submodulo->link_extended)  ) {
        $modulo_activo = $submodulo->navigation_id;
        $submodulo_activo = $submodulo->id;
      }
    }

    //si el dashboard es la url activa colocarlo e inicializarlo activo
    if ( isActiveRoute('main') ) { $activo = "active"; }
    $menu = "<li class='". $activo . "'><a href='" . url('/') . "'><i class='fa fa-home'></i> <span class='nav-label'>Inicio</span></a></li>";

    foreach( $submodulos as $submodulo){
      if (  isActiveRoute($submodulo->link_extended)  ) {
        $modulo_activo = $submodulo->navigation_id;
        $submodulo_activo = $submodulo->id;
      }
    }

    foreach ($modulos as $modulo) {
      if ($modulo->id == $modulo_activo) { $activo = "active"; $collapse = ""; }else{ $activo = ""; $collapse = "collapse";} //verificación del modulo con url activa

      //Menu del afiliado
      $menu .= "<li class='" . $activo .  "'>
        <a href='#'>
          <i class='fa ". $modulo->icon ."'></i>
          <span class='nav-label'>" . $modulo->label . "</span>
          <span class='fa arrow'></span>
        </a>
        <ul class='nav nav-second-level " . $collapse ."'>";

      //Generación de las secciones
      $submenu = "";
      foreach( $submodulos as $submodulo){
        if( $modulo->id == $submodulo->navigation_id ){
          if ( $submodulo_activo == $submodulo->id ){ $activo = "active"; }else{ $activo = ""; }
          $submenu .= "<li class='". $activo ."'>
              <a href='" . url($submodulo->link) . "'>
              <span>" .$submodulo->label . "</span>
              </a>
            </li>";
        }
      }
      $menu .= $submenu;
      $menu .= "</ul></li>";
    }
    return $menu;
  }

}

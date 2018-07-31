<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Helpers\General;
use App\User;

class UsuarioController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $data['page_title'] = "Ver Usuarios";
      $data['usuarios'] = User::where('rol', '!=', 'A')->get();
      $data['tipos'] = General::getTipoUsuario();
      return view('usuario.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $data['page_title'] = "Nuevo usuario";
      $data['tipos'] = General::getTipoUsuario();
      return view('usuario.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, [
        'nombre' => 'required',
        'apellido' => 'required',
        'usuario'    => 'required|max:64',
        'rol' => 'required',
        'password' => 'required|string|min:6|confirmed'
      ]);


        DB::beginTransaction();
          try {
            $usuario = new User();
            $usuario->usuario = $request->usuario;
            $usuario->password = bcrypt($request->password);
            $usuario->nombre = $request->nombre;
            $usuario->apellido = $request->apellido;
            $usuario->rol = $request->rol;
            $usuario->save();
        } catch (\Exception $e) {
          DB::rollback();
          throw $e;
        }
       DB::commit();
       return redirect('/usuarios');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $data['page_title']  = "Editar usuario";
      $data['usuario'] =  User::find($id);
      if ($data['usuario']  == null) { return redirect('usuarios'); } //Verificación para evitar errores
      $data['tipos'] = General::getTipoUsuario();
      return view('usuario.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $usuario = User::find($id);
      $this->validate($request, [
        'nombre' => 'required',
        'apellido' => 'required',
        'usuario'    => 'required|max:64',
        'rol' => 'required',
        'password_confirmation' => 'required_with:password'
      ]);

      //Inicio de las inserciones en la base de datos
      DB::beginTransaction();
        try {
          $usuario->usuario = $request->usuario;
          $usuario->nombre = $request->nombre;
          $usuario->apellido = $request->apellido;
          $usuario->rol = $request->rol;
          if ($request->has('password')) {
            $usuario->password = bcrypt($request->password);
          }
          $usuario->save();
      } catch (\Exception $e) {
        DB::rollback();
        throw $e;
      }
     DB::commit();
       return redirect('usuarios/'. $id . "/edit");
    }

    public function destroy($id, Request $request){
      if ($id == 1) {
        return redirect('/usuarios');
      }
      $usuario = User::find( $id );

      $usuario->delete();
      return redirect('/usuarios');

    }
}

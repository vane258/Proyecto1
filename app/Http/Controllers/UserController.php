<?php

namespace App\Http\Controllers;

use Alert;
use App\User;
use Illuminate\Http\Request;
use App\Helpers\DeleteHelper;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class UserController extends Controller
{
    /**
     * Listar los usuarios registrados en el sistema
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Consulta de todos usuarios a la BD(excluyendo al tipo de usuario 6 SUPERADMIN)
        $users = DB::table('users')->where("type","!=",6);

        if(Auth::user()->type==6){
            $users=$users->get();
        }
        else{
            $users=$users->where('users.deleted','=',0)->get();
        }

        return view('users.list')
          ->with('users', $users);
    }

    /**
     * Creando un nuevo usuario.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_types = DB::table("user_types")->where("id","!=",6)->get();
        return view('users.create')->with("user_types",$user_types);
    }

    /**
     * Muestra un registro dependiendo de su id
     *
     * @param  integer  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Se busca en todos los registros el usuario con el id mandado
        $user = User::find($id);

        if(Auth::user()->type!=6){
            if($user->deleted==1){
                return view('errors.404');
            }
        }
        return view('users.show', compact('user'));
    }

    //Se prepara el almacenado de un usuario
    public function store(Request $request)
    {
        $data = request()->validate([
          'first_name' => 'required|max:60',
          'last_name' => 'required|max:60',
          'second_last_name' => 'max:60',
          'username' => 'required|max:128',
          'password' => 'required|max:128',
          'email'=>'required',
          'address'=>'required',
          'phone'=>'required',
        ], [
          'first_name.required' => ' * Este campo es obligatorio.',
          'first_name.max' => ' * Este campo debe contener sólo 60 caracteres.',
          'last_name.required' => ' * Este campo es obligatorio.',
          'last_name.max' => ' * Este campo debe contener sólo 60 caracteres.',
          'second_last_name.max' => ' * Este campo debe contener sólo 60 caracteres.',
          'username.required' => ' * Este campo es obligatorio.',
          'username.max' => ' * Este campo debe contener sólo 128 caracteres.',
          'password.required' => ' * Este campo es obligatorio.',
          'password.max' => ' * Este campo debe contener sólo 128 caracteres.',
          'email.required' => ' * Este campo es obligatorio.',
          'address.required' => ' * Este campo es obligatorio.',
          'phone.required' => ' * Este campo es obligatorio.',
        ]);

        //Se crea una nueva instancia de usuario
        $user = new User;

        //Se llena el usuario con los datos ingresados en la vista
        $user->first_name = filter_var(Input::get('first_name'), FILTER_SANITIZE_STRING);
        $user->last_name = filter_var(Input::get('last_name'), FILTER_SANITIZE_STRING);
        $user->second_last_name = filter_var(Input::get('second_last_name'), FILTER_SANITIZE_STRING);
        $user->username = filter_var(Input::get('username'), FILTER_SANITIZE_STRING);
        $user->password = bcrypt(filter_var(Input::get('password'), FILTER_SANITIZE_STRING));
        $user->address = filter_var(Input::get('address'), FILTER_SANITIZE_STRING);
        $user->phone = filter_var(Input::get('phone'), FILTER_SANITIZE_STRING);
        $validar_email = DB::table("users")->where("email","=",filter_var(Input::get("email"), FILTER_SANITIZE_STRING))->get();
        if(sizeof($validar_email) != 0){
            Alert::error('El e-mail que desea ingresar ya existe registrado con otro usuario','Fallido')->autoclose(6000);
            return redirect()->route('users.list');
        }

        $user->email = filter_var(Input::get('email'), FILTER_SANITIZE_STRING);

        $user->type = filter_var(Input::get('type'), FILTER_SANITIZE_STRING);


        //Se muestran los mensajes de cofirmacion para cada tipo de usuario y se realiza
        //el almacenamiento necesario para cada tipo de usuario
        if ($user->type == 1) {         //En caso de que sea administrador
            $user->save();
            Alert::success('Exitosamente', 'Administrador Registrado')->autoclose(6000);
        }
        if ($user->type == 2) {         //En caso de que sea administrador
            $user->save();
            Alert::success('Exitosamente', 'Residente de Obra Registrado')->autoclose(6000);
        }
        if ($user->type == 3) {         //En caso de que sea administrador
            $user->save();
            Alert::success('Exitosamente', 'Usuario del Departamento de Compras Registrado')->autoclose(6000);
        }
        if ($user->type == 4) {         //En caso de que sea administrador
            $user->save();
            Alert::success('Exitosamente', 'Usuario del Departamento de Pagos Registrado')->autoclose(6000);
        }
        if ($user->type == 5) {         //En caso de que sea administrador
            $user->save();
            Alert::success('Exitosamente', 'Bodeguero Registrado')->autoclose(6000);
        }
        return redirect()->route('users.list');
    }

    /**
     * Permite realizar el actualizado del usuario en la base de datos
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(User $user)
    {
        $data = request()->validate([
            'first_name' => 'required|max:60',
            'last_name' => 'required|max:60',
            'second_last_name' => 'max:60',
            'username' => 'required|max:128',
        ], [
            'first_name.required' => ' * Este campo es obligatorio.',
            'first_name.max' => ' * Este campo debe contener sólo 60 caracteres.',
            'last_name.required' => ' * Este campo es obligatorio.',
            'last_name.max' => ' * Este campo debe contener sólo 60 caracteres.',
            'second_last_name.max' => ' * Este campo debe contener sólo 60 caracteres.',
            'username.required' => ' * Este campo es obligatorio.',
            'username.max' => ' * Este campo debe contener sólo 128 caracteres.',
        ]);

        //Se cargan todos los datos mandados de la vista
        $user->first_name = filter_var(Input::get('first_name'), FILTER_SANITIZE_STRING);
        $user->last_name = filter_var(Input::get('last_name'), FILTER_SANITIZE_STRING);
        $user->second_last_name = filter_var(Input::get('second_last_name'), FILTER_SANITIZE_STRING);
        $user->username = filter_var(Input::get('username'), FILTER_SANITIZE_STRING);
        $user->email = filter_var(Input::get('email'), FILTER_SANITIZE_STRING);
        $user->type = filter_var(Input::get('type'), FILTER_SANITIZE_STRING);
        $user->address = filter_var(Input::get('address'), FILTER_SANITIZE_STRING);
        $user->phone = filter_var(Input::get('phone'), FILTER_SANITIZE_STRING);

        //Se actualiza el usuario
        $user->update();
        //Si el usuario cambia la contraseña, se actualiza, en caso contrario se queda como estaba guardada
        if (filter_var(Input::get('password'), FILTER_SANITIZE_STRING) != null) {
            $password = bcrypt(Input::get('password'));
            DB::update('UPDATE users SET password = ? WHERE id = ?', [$password, $user->id]);
        }

        if ($user->type == 1) {             //En caso de que el usuario sea administrador
            Alert::success('Exitosamente', 'Administrador Modificado')->autoclose(6000);
        }
        if ($user->type == 2) {         //En caso de que sea administrador
            $user->save();
            Alert::success('Exitosamente', 'Residente de Obra Modificado')->autoclose(6000);
        }
        if ($user->type == 3) {         //En caso de que sea administrador
            $user->save();
            Alert::success('Exitosamente', 'Usuario del Departamento de Compras Modificado')->autoclose(6000);
        }
        if ($user->type == 4) {         //En caso de que sea administrador
            $user->save();
            Alert::success('Exitosamente', 'Usuario del Departamento de Pagos Modificado')->autoclose(6000);
        }
        if ($user->type == 5) {         //En caso de que sea administrador
            $user->save();
            Alert::success('Exitosamente', 'Bodeguero Modificado')->autoclose(6000);
        }

        return redirect()->route('users.list');
    }

    /**
     * Permite la edicion de un usuario mandado como parametro
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $user_types = DB::table("user_types")->where("id","!=","6")->get();

        if(Auth::user()->type!=6){
            if($user->deleted==1){
                return view('errors.404');
            }
        }
        return view('users.edit', compact('user',"user_types"));
    }

    /**
     * Permite el borrado(logico de un usuario)
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        DeleteHelper::instance()->onCascadeLogicalDelete('users', 'id', $user->id);
        return redirect()->route('users.list');
    }

    /**
     * Restaurar(de manera logica) el usuario.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function restore(Request $request)
    {
        //Se llama el delete helper que realiza el restaurado logico
        DeleteHelper::instance()->restoreLogicalDelete('users', 'id', $request->id);
        return redirect()->route('users.list');
    }


    /**
     * Muestra el perfil personal del usuario en sesion activa
     *
     * @param  integer  $id
     * @return \Illuminate\Http\Response
     */
    public function showOwnProfile()
    {
        //Se obtiene el id del usuario con la sesion activa
        $user = DB::table('users')->where('id', '=', Auth::user()->id)->first();

        return view('profile.show', compact('user'));
    }

    /**
     * Permite la edicion de un usuario mandado como parametro
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function editOwnProfile()
    {
        $user = User::find(Auth::user()->id);

        return view('profile.edit', compact('user'));
    }

    /**
     * Permite realizar la actualizacion del usuario en sesion
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function updateOwnProfile(User $user)
    {
        //Se obtiene el id del usuario en sesion
        $user_id = Auth::user()->id;
        $user = User::find(Auth::user()->id);

        if(Auth::user()->type==1 || Auth::user()->type==6){
            //Validaciones a los datos de entrada
            $data = request()->validate([
                'email' => 'required|max:70',
                'first_name' => 'required|max:60',
                'last_name' => 'required|max:60',
                'username' => 'required|max:128',
            ], [
                'first_name.required' => ' * Este campo es obligatorio.',
                'first_name.max' => ' * Este campo debe contener sólo 60 caracteres.',
                'last_name.required' => ' * Este campo es obligatorio.',
                'last_name.max' => ' * Este campo debe contener sólo 60 caracteres.',
                'email.required' => ' * Este campo es obligatorio.',
                'email.max' => ' * Este campo debe contener sólo 70 caracteres.',
                'username.required' => ' * Este campo es obligatorio.',
                'username.max' => ' * Este campo debe contener sólo 128 caracteres.',
            ]);

            $user->first_name = filter_var(Input::get('first_name'), FILTER_SANITIZE_STRING);
            $user->last_name = filter_var(Input::get('last_name'), FILTER_SANITIZE_STRING);
            $user->second_last_name = filter_var(Input::get('second_last_name'), FILTER_SANITIZE_STRING);
            $user->username = filter_var(Input::get('username'), FILTER_SANITIZE_STRING);
            $user->address = filter_var(Input::get('address'), FILTER_SANITIZE_STRING);
            $user->phone = filter_var(Input::get('phone'), FILTER_SANITIZE_STRING);
            $user->email = filter_var(Input::get('email'), FILTER_SANITIZE_STRING);
        }else{
            //Validaciones a los datos de entrada
            $data = request()->validate([
                'email' => 'required|max:70',
                'username' => 'required|max:128',
            ], [
                'email.required' => ' * Este campo es obligatorio.',
                'email.max' => ' * Este campo debe contener sólo 70 caracteres.',
                'username.required' => ' * Este campo es obligatorio.',
                'username.max' => ' * Este campo debe contener sólo 128 caracteres.',
            ]);
            $user->username = filter_var(Input::get('username'), FILTER_SANITIZE_STRING);
            $user->email = filter_var(Input::get('email'), FILTER_SANITIZE_STRING);
        }

        if(Auth::user()->type==1 || Auth::user()->type==6 || Auth::user()->type==3){
            //Imagen nueva(mandada atraves del file input)
            $image = Input::file('image');
            //Imagen actual(registrada en la base de datos)
            $image2 = Input::get('image_2');
        }

        //Se actualiza el usuario
        $user->update();

        if(Auth::user()->type==1 || Auth::user()->type==6 || Auth::user()->type==3){
            //Actualizar imagen, eliminando la anterior
            if ($image!=null) {
                if ($image2!=null) {
                    //Se realiza el eliminado de la imagen de la direccion fisica de
                    //la imagen en el disco duro
                    unlink(public_path()."/storage/".$image2);
                }
                //Se realiza el almacenado de la nueva imagen(cargada en el file input)
                $path=Input::file('image')->store('/public/images/user-signature/');
                //Se obtiene el nombre de la imagen
                $image_url = '/images/user-signature/'.Input::file('image')->hashName();
                //Se realiza la nueva actualizacion al registro del usuario actual con el
                //nombre de la nueva imagen
                DB::update('UPDATE users SET signature_url = ? WHERE id = ?', [$image_url, $user_id]);
            }
        }

        //Si el usuario cambia la contraseña, se actualiza, es caso contrario se queda como estaba guardada
        if (Input::get('password') != null) {
            $password = bcrypt(filter_var(Input::get('password'), FILTER_SANITIZE_STRING));
            DB::update('UPDATE users SET password = ? WHERE id = ?', [$password, $user_id]);
        }

        Alert::success('Exitosamente', 'Perfil Modificado');
        return redirect()->route('profile.show_own_profile');
    }

    /**
     * Permite confirmar la requisicion
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function deleteImage(Request $request){
        if(Auth::user()->signature_url!=""){
            unlink(public_path()."/storage/".Auth::user()->signature_url);
        }

        DB::table('users')
            ->where('id', Auth::user()->id)
            ->update(['signature_url' => ""]);

        return response()->json(['response'=>"success"]);
    }

}

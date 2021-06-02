<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Imgarticulos;
use App\Models\Articulos;
use Session;
use Redirect;
use App\Http\Requests;
use App\Http\Requests\ItemCreateRequest;
use App\Http\Requests\ItemUpdateRequest;
use Illuminate\Support\Facades\Validator;
use DB;
use Input;
use Storage;
use Illuminate\Support\Str;
use File;

class ArticulosController extends Controller
{
    // Leer Registros (Read)
    public function index()
    {
        $articulos = Articulos::select('id', 'nombre', 'precio', 'stock', 'imagenes', 'url')->with('Imagenesarticulos:nombre')->get();

        //$ib = Bicicletas::find(3)->imagenesbicicletas;

        //dd($ib);

        // $imagenes = Bicicletas::find(3)->imagenesbicicletas;

        return view('admin/articulos.index', compact('articulos'));
    }

    // Crear un Registro (Create)
    public function crear()
    {
        $articulos = Articulos::all();
        return view('admin.articulos.crear', compact('articulos'));
    }

    // Proceso de Creación de un Registro
    public function store(ItemCreateRequest $request)
    {
        $articulos= new Articulos;
        $articulos->nombre = $request->nombre;
        $articulos->precio = $request->precio;
        $articulos->stock = $request->stock;
        $articulos->imagenes = date('dmyHi');
        $articulos->url = Str::slug($request->nombre, '-');  // Acá generamos la URL amigable a partir del nombre y la guardamos en la Base de Datos

        $articulos->save();

        $ci = $request->file('img');

        // Validamos que el nombre y el formato de imagen esten presentes, tu puedes validar mas campos si deseas
        $this->validate($request, [

            'nombre' => 'required',
            'img.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'

        ]);

        // Recibimos una o varias imágenes y las guardamos en la carpeta 'uploads'
        foreach($request->file('img') as $image)
        {
            $imagen = $image->getClientOriginalName();
            $formato = $image->getClientOriginalExtension();
            $image->move(public_path().'/uploads/', $imagen);

            // Guardamos el nombre de la imagen en la tabla 'img_bicicletas'
            DB::table('img_articulos')->insert(
                [
                    'nombre' => $imagen,
                    'formato' => $formato,
                    'articulos_id' => $articulos->id,
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s")
                ]
            );

        }

        // Redireccionamos con mensaje
        return redirect('admin/articulos')->with('message','Guardado Satisfactoriamente !');
    }

    // Leer un Registro específico (Leer)
    public function show($id)
    {
        //
    }

    //  Actualizar un registro (Update)
    public function actualizar($id)
    {
        $articulos = Articulos::find($id);

        $imagenes = Articulos::find($id)->imagenesarticulos;

        return view('admin/articulos.actualizar', compact('imagenes'), ['articulos' => $articulos]);
    }

    // Proceso de Actualización de un Registro (Update)
    public function update(ItemUpdateRequest $request, $id)
    {
        $articulos= Articulos::find($id);
        $articulos->nombre = $request->nombre;
        $articulos->precio = $request->precio;
        $articulos->stock = $request->stock;

        $articulos->save();

        $ci = $request->file('img');

        // Si la variable '$ci' no esta vacia, actualizamos el registro con las nuevas imágenes
        if(!empty($ci)){

            // Validamos que el nombre y el formato de imagen esten presentes, tu puedes validar mas campos si deseas
            $this->validate($request, [

                'nombre' => 'required',
                'img.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'

            ]);

            // Recibimos una o varias imágenes y las actualizamos
            foreach($request->file('img') as $image)
            {
                $imagen = $image->getClientOriginalName();
                $formato = $image->getClientOriginalExtension();
                $image->move(public_path().'/uploads/', $imagen);

                // Actualizamos el nuevo nombre de la(s) imagen(es) en la tabla 'img_bicicletas'
                DB::table('img_articulos')->insert(
                    [
                        'nombre' => $imagen,
                        'formato' => $formato,
                        'articulos_id' => $articulos->id,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ]
                );

            }

        }

        // Redireccionamos con mensaje
        Session::flash('message', 'Editado Satisfactoriamente !');
        return Redirect::to('admin/articulos');
    }

    // Eliminar un Registro
    public function eliminar($id)
    {
        $articulos = Articulos::find($id);

        // Selecciono las imágenes a eliminar
        $imagen = DB::table('img_articulos')->where('articulos_id', '=', $id)->get();
        $imgfrm = $imagen->implode('nombre', ',');
        //dd($imgfrm);

        // Creamos una lista con los nombres de las imágenes separadas por coma
        $imagenes = explode(",", $imgfrm);

        // Recorremos la lista de imágenes separadas por coma
        foreach($imagenes as $image){

            // Elimino la(s) imagen(es) de la carpeta 'uploads'
            $dirimgs = public_path().'/uploads/'.$image;

            // Verificamos si la(s) imagen(es) existe(n) y procedemos a eliminar
            if(File::exists($dirimgs)) {
                File::delete($dirimgs);
            }

        }


        // Borramos el registro de la tabla 'bicicletas'
        Articulos::destroy($id);

        // Borramos las imágenes de la tabla 'img_bicicletas'
        $articulos->imagenesarticulos()->delete();

        // Redireccionamos con mensaje
        Session::flash('message', 'Eliminado Satisfactoriamente !');
        return Redirect::to('admin/articulos');
    }

    // Eliminar imagen de un Registro
    public function eliminarimagen($id, $bid)
    {
        $articulos = Imgarticulos::find($id);

        $bi = $bid;

        // Elimino la imagen de la carpeta 'uploads'
        $imagen = Imgarticulos::select('nombre')->where('id', '=', $id)->get();
        $imgfrm = $imagen->implode('nombre', ', ');
        //dd($imgfrm);
        Storage::delete($imgfrm);

        Imgarticulos::destroy($id);

        // Redireccionamos con mensaje
        Session::flash('message', 'Imagen Eliminada Satisfactoriamente !');
        return Redirect::to('admin/articulos/actualizar/'.$bi.'');
    }

    // Detalles del Producto
    public function detallesproducto($id)
    {
        // Seleccionar un registro por su 'id'
        $articulos = Articulos::where('id','=', $id)->firstOrFail();

        // Seleccionamos las imágenes por su 'id'
        $imagenes = Articulos::find($id)->imagenesarticulos;

        return view('admin/articulos.detallesproducto', compact('articulos', 'imagenes'));
    }

}


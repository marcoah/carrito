<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Producto;
use Cart;

class CarritoController extends Controller
{
    //

    public function mostrarcarrito($sesion)
    {
        Cart::session($sesion);

        $items = Cart::getContent();

        return view('carrito', compact('items'));
    }

    public function vaciarcarrito($sesion)
    {
        Cart::session($sesion)->clear();

        return view('carrito');
    }

    public function agregaritem(Request $request)
    {
        //

        $userID = Auth::user()->username;

        $productId = $request->id;
        $cantidad = $request->cantidad;

        $producto = Producto::find($productId);

        $impuesto = new \Darryldecode\Cart\CartCondition(array(
            'name' => 'IVA 16%',
            'type' => 'tax',
            'value' => '+16%',
        ));

        // add the product to cart
        Cart::session($userID)->add(array(
            'id' => $productId,
            'name' => $producto->nombre,
            'price' => $producto->precio,
            'quantity' => $cantidad,
            'attributes' => array(),
            'conditions' => $impuesto,
            'associatedModel' => $producto
        ));

        $mensaje = "Item agregado: ". $producto->nombre;

        return redirect()->route('carrito', ['sesion' => $userID])->with('message',$mensaje);
    }

    public function removeitem($item)
    {
        $userID = Auth::user()->username;
        Cart::session($userID)->remove($item);
        return redirect()->route('carrito', ['sesion' => $userID])->with('success','item eliminado correctamente.');
    }

}

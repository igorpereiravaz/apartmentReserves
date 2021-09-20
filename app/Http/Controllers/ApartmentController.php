<?php

namespace App\Http\Controllers;

use App\Models\Apartment;
use Illuminate\Http\Request;
use App\Util\Notification;

class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $apartments = Apartment::all();

        return view('Apartments.index')->with('apartments', $apartments);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Apartments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $regras =[
            'name' => 'required',
            'rooms' => 'required',
            'address_complete' => 'required',
            'address_city' => 'required',
            'address_state' => 'required',
        ];
        $mensagens = [
            'required'=> 'O campo :attribute é obrigatório',
        ];
        $request->validate($regras, $mensagens);

        $apartment = new Apartment();
        $apartment->name = $request->name;
        $apartment->rooms = $request->rooms;
        $apartment->address_complete = $request->address_complete;
        $apartment->address_city = $request->address_city;
        $apartment->address_state = $request->address_state;

        $apartment->save();

        return redirect()->route("apIndex")->with('sucess', 'Casdastrado!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $apartment = Apartment::find($id);
        return view('Apartments.edit')->with('apartment', $apartment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $regras =[
            'name' => 'required',
            'rooms' => 'required',
            'address_complete' => 'required',
            'address_city' => 'required',
            'address_state' => 'required',
        ];
        $mensagens = [
            'required'=> 'O campo :attribute é obrigatório',
        ];
        $request->validate($regras, $mensagens);

        $apartment = Apartment::find($request->id);
        $apartment->name = $request->name;
        $apartment->rooms = $request->rooms;
        $apartment->address_complete = $request->address_complete;
        $apartment->address_city = $request->address_city;
        $apartment->address_state = $request->address_state;

        $apartment->save();

        return redirect(route('apIndex'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $apartment = Apartment::find($id);
        if($apartment->reserves){
            $notificationMessage = '<h4>Erro ao deletar.</h4><h5>O apartamento selecionado possui reservas</strong></h5>';
            Notification::setNotification($notificationMessage);
            return redirect()->back();
        } else {
            $apartment->delete();
            return redirect()->route("apIndex")->with('sucess', 'Excluido!');
        }

    }
}

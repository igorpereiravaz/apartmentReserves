<?php

namespace App\Http\Controllers;

use App\Models\Apartment;
use App\Models\Reserve;
use Illuminate\Http\Request;
use App\Util\Notification;

class ReserveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reserves = Reserve::all();

        return view('Reserves.index')->with('reserves', $reserves);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $apartment = Apartment::find($id);
        return view('Reserves.create')->with('apartment', $apartment);
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
            'description' => 'required',
            'reserve_date' => 'required',
        ];
        $mensagens = [
            'required'=> 'O campo :attribute é obrigatório',
        ];
        $request->validate($regras, $mensagens);

        $apartment = Apartment::find($request->apartment_id);
        $reservesAp = $apartment->reserves->pluck('reserve_date');

        if($reservesAp->contains($request->reserve_date)){
            $notificationMessage = '<h4>Erro ao efetuar reserva.</h4><h5>O apartamento selecionado não possui reservar para a data informada</strong></h5>';
            Notification::setNotification($notificationMessage);
            return redirect()->back();
        } else {
            $reserve = new Reserve();
            $reserve->description = $request->description;
            $reserve->reserve_date = $request->reserve_date;
            $reserve->apartment_id = $request->apartment_id;

            $reserve->save();

            return redirect()->route("apIndex")->with('sucess', 'Reserva Concluída!');

        }
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
        $reserve = Reserve::find($id);
        return view('Reserves.edit')->with('reserve', $reserve);
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
            'description' => 'required',
            'reserve_date' => 'required',
        ];
        $mensagens = [
            'required'=> 'O campo :attribute é obrigatório',
        ];
        $request->validate($regras, $mensagens);

        $reserve = Reserve::find($request->reserve_id);
        $apartment = Apartment::find($reserve->apartment_id);

        $reservesAp = $apartment->reserves->pluck('reserve_date');

        if($request->reserve_date == $reserve->reserve_date){
            $reserve->description = $request->description;
            $reserve->save();

            return redirect()->route("apIndex")->with('sucess', 'Reserva Alterada!');
        } else {
            if($reservesAp->contains($request->reserve_date)){
                $notificationMessage = '<h4>Erro ao efetuar reserva.</h4><h5>O apartamento selecionado não possui reservar para a data informada</strong></h5>';
                Notification::setNotification($notificationMessage);
                return redirect()->back();
            } else {
                $reserve->description = $request->description;
                $reserve->reserve_date = $request->reserve_date;
                $reserve->save();

                return redirect()->route("reserveIndex")->with('sucess', 'Reserva Alterada!');
            }
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reserve = Reserve::find($id);
        $reserve->delete();

        return redirect()->route("reserveIndex")->with('sucess', 'Excluido!');
    }
}

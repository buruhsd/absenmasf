<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Peserta;
use App\PesertaConfirm;
use Mail;
// use BaconQrCode\Encoder\QrCode;

class PesertaController extends Controller
{
    public function index(){
    	$data = Peserta::paginate(20);

    	return view('backend.peserta', compact('data'));
    }

    public function show(Peserta $peserta){
        return view('backend.show')
            ->withPeserta($peserta);
    }

    public function add(){
        return view('backend.create');
    }

    public function store(Request $request){
        $data = new Peserta;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->nama_perusahaan = $request->nama_perusahaan;
        $data->no_hp = $request->no_hp;
        $data->save();

        // return QrCode::generate($data);
        // return \QrCode::generate('Make me into a QrCode!');



        return redirect()->back();
    }

    public function edit(){

    }

    public function update(){

    }



    public function register(){
        return view('backend.register');
    }

    public function confirm_register(Request $request){
        $data = new Peserta;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->nama_perusahaan = $request->nama_perusahaan;
        $data->no_hp = $request->no_hp;
        $data->save();


        Mail::send('components.email', compact('data'), function ($m) use ($data) {
                $m->to($data->email, $data->name)->subject('Konfirmasi Permohonan');
          echo "Basic Email Sent. Check your inbox.";

        });


    }


    public function confirm($data){
        $data = PesertaConfirm::find($data);
        $data->hadir = true;
        $data->save()
    }
}

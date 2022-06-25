<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notif;
use App\User;
use Alert;

class NotifController extends Controller
{
   
   public function __construct(){
         $this->middleware([
            'auth',
            //'privilege:admin'
         ]);
    }
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
              'notif' => Notif::orderBy('id', 'DESC')->paginate(10),
              'user' => User::find(auth()->user()->id),
         ];
         
        return view('dashboard.notif.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $messages = [
            'required' => ':attribute tidak boleh kosong!',
         ];
         
         $validasi = $request->validate([
            'subjek' => 'Required',
            'body' => 'Required',
         ], $messages);
      
         if($validasi) :
             $create = Notif::create([
                  'subjek' => $request->subjek,
                  'body' => $request->body
            ]);
            
            if($create) :
                 Alert::success('Berhasil!', 'Data Berhasil Ditambahkan');
            else :
                 Alert::error('Gagal!', 'Data Gagal Ditambahkan');
            endif;
         endif;
      
        return back();
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
      
         $data = [
            'edit' =>  Notif::find($id),
            'user' => User::find(auth()->user()->id),
         ];
         
         return view('dashboard.notif.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        if($update = Notif::find($id)) :
               $stat = $update->update([
                  'subjek' => $req->subjek,
                  'body' => $req->body
               ]);
               if($stat) :
                     Alert::success('Berhasil!', 'Data Berhasil di Edit!');
                  else :
                      Alert::success('Terjadi Kesalahan!', 'Data Gagal di Edit!');
                     return back();
                  endif;
         endif;
         
         return redirect('dashboard/notif');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Notif::find($id)->delete()) :
            Alert::success('Berhasil!', 'Data Berhasil Dihapus');
         else :
            Alert::error('Terjadi Kesalahan!', 'Data Gagal Dihapus');
         endif;
         
         return back();
    }
}

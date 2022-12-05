<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Player;
use app\Http\Controllers\TeamController;
use app\Http\Controllers\PlayerController;
use app\Http\Controllers\DivisiController;
use App\Models\Divisi;
use App\Models\Team;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PlayerController extends Controller
{
    public function index(){
        $players = DB::select('SELECT * FROM player WHERE is_deleted = 0');


        return view('player.index')
        ->with('players', $players);

    }

    public function create(){

        $divisis = Divisi::all();
        $teams = Team::all();
        return view('player.add', compact('divisis', 'teams'));
    }

    public function store (Request $request) {
        $request->validate([
            'ID_PLAYER',
            'nickname' => 'required',
            'roles' => 'required',
            'ID_DIVISI' => 'required',
            'ID_TEAM' => 'required'
        ]);

        DB::insert('INSERT INTO player(ID_PLAYER, nickname, roles,  ID_DIVISI, ID_TEAM) VALUES (:ID_PLAYER, :nickname, :roles, :ID_DIVISI,  :ID_TEAM)',
        [
            'ID_PLAYER' => $request->ID_PLAYER,
            'nickname' => $request->nickname,
            'roles' => $request->roles,
            'ID_DIVISI' => $request->ID_DIVISI,
            'ID_TEAM' => $request->ID_TEAM
        ]
        );

        return redirect()->route('player.index')->with('success', 'Data berhasil disimpan');
    }
    public function edit($id) {
        $data = DB::table('player')->where('ID_PLAYER',
        $id)->first();

        return view('player.edit')->with('data', $data);
    }

    public function update($id, Request $request) {
        $request->validate([
            'ID_PLAYER',
            'nickname' => 'required',
            'roles' => 'required',
            'ID_DIVISI' => 'required',
            'ID_TEAM' => 'required'
        ]);

        DB::table('player')->where('ID_PLAYER', $id)->update(array(
            'ID_PLAYER' => $request->ID_PLAYER,
            'nickname' => $request->nickname, 
            'roles' => $request->roles,
            'ID_DIVISI' => $request->ID_DIVISI,
            'ID_TEAM' => $request->ID_TEAM
        ));

        return redirect()->route('player.index')->with('success', 'Data berhasil diubah');
    }
    public function delete($id) {
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::delete('DELETE FROM player WHERE ID_PLAYER = :ID_PLAYER', ['ID_PLAYER' => $id]);

        // Menggunakan laravel eloquent
        // reservasi::where('id_reservasi', $id)->delete();

        return redirect()->route('player.index')->with('success', 'Data  berhasil dihapus');
    }

    public function cariplayer(Request $request) {
        $cari = $request->cariplayer;

        $datas = DB::table('player')->where('ID_PLAYER', 'like', "%".$cari."%");

        return view('player.index')
            ->with('datas', $datas);
    }

    public function cariteam(Request $request) {
        $cariteam = $request->cariteam;

        $joins = DB::table('player')
        ->join('team', 'player.ID_TEAM', '=', 'team.ID_TEAM')
        ->join('divisi', 'player.ID_DIVISI', '=', 'divisi.ID_DIVISI')
        ->select('player.ID_PLAYER', 'team.nama_team', 'divisi.nama_divisi', 'team.tahun_dibentuk', 'player.nickname', 'player.roles' )
        ->where('nama_team', 'like', "%$cariteam%")
        ->orWhere('ID_PLAYER', 'like', "%$cariteam%")
        ->orWhere('nickname', 'like', "%$cariteam%")
        ->orWhere('nama_divisi', 'like', "%$cariteam%")
        ->orWhere('tahun_dibentuk', 'like', "%$cariteam%")
        ->orWhere('nickname', 'like', "%$cariteam%")
        ->get();

        return view('index')
        ->with('joins', $joins);


    }

    public function home(){
        $joins = DB::table('player')
        ->join('team', 'player.ID_TEAM', '=', 'team.ID_TEAM')
        ->join('divisi', 'player.ID_DIVISI', '=', 'divisi.ID_DIVISI')
        ->select('player.ID_PLAYER', 'team.nama_team', 'divisi.nama_divisi', 'team.tahun_dibentuk', 'player.nickname', 'player.roles' )
        ->get();

        return view('index')

        ->with('joins', $joins);
    }
    public function softDelete($id) {
        DB::update('UPDATE player SET is_deleted = 1 WHERE ID_PLAYER = :ID_PLAYER', ['ID_PLAYER' => $id]);
        return redirect()->route('player.index')->with('success', 'Data dihapus sementara');
    }

    public function restore($id){
        // DB::table('pelanggan')->update(['is_deleted' => 0]);
        DB::update('UPDATE player SET is_deleted = 0 WHERE ID_PLAYER = :ID_PLAYER = 1', ['ID_PLAYER' => $id]);

        return redirect()->route('player.bin')->with('success', 'Data direstore');
    }

    public function Playerbin(){
        $players = DB::select('SELECT * FROM player where is_deleted = 1');

        return view('player.bin')
        ->with('players', $players);

    }
}

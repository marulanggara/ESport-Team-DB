<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TeamController extends Controller
{
     public function index(){
        $teams = DB::select('SELECT * FROM team where is_deleted = 0');

        return view('team.index')
        ->with('teams', $teams);
    }

    public function create(){
        return view('team.add');
    }

    public function store (Request $request) {
        $request->validate([
            'ID_TEAM',
            'nama_team' => 'required',
            'tahun_dibentuk' => 'required'
        ]);

        DB::insert('INSERT INTO team(ID_TEAM, nama_team, tahun_dibentuk) VALUES (:ID_TEAM, :nama_team, :tahun_dibentuk)',
        [
            'ID_TEAM' => $request->ID_TEAM,
            'nama_team' => $request->nama_team,
            'tahun_dibentuk' => $request->tahun_dibentuk
        ]
        );

        return redirect()->route('team.index')->with('success', 'Sukses Menyimpan Data Team');
    }

    public function edit($id) {
        $data = DB::table('team')->where('ID_TEAM', $id)->first();
        return view('team.edit')->with('data', $data);
    }

    public function update($id, Request $request) {
        $request->validate([
            'ID_TEAM',
            'nama_team' => 'required',
            'tahun_dibentuk' => 'required'
        ]);

        DB::table('team')->where('ID_TEAM', $id)->update(array(
            'ID_TEAM' => $request->ID_TEAM,
            'nama_team' => $request->nama_team, 
            'tahun_dibentuk' => $request->tahun_dibentuk
        ));

        return redirect()->route('team.index')->with('success', 'Sukses mengubah data Team');
    }

    public function delete($id) {
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::delete('DELETE FROM team WHERE ID_TEAM = :ID_TEAM', ['ID_TEAM' => $id]);

        // Menggunakan laravel eloquent
        // team::where('ID_TEAM', $id)->delete();

        return redirect()->route('team.index')->with('success', 'Data team berhasil dihapus');
    }

    public function cariteam(Request $request) {
        $cari = $request->cariteam;

        $datas = DB::table('team')->where('', 'like', "%".$cari."%");

        return view('team.index')
            ->with('datas', $datas);
    }

    public function softDelete($id) {
        DB::update('UPDATE team SET is_deleted = 1 WHERE ID_TEAM = :ID_TEAM', ['ID_TEAM' => $id]);
        return redirect()->route('team.index')->with('success', 'Data team berhasil dihapus sementara');
    }

    public function restore($id){
        // DB::table('team')->update(['is_deleted' => 0]);
        DB::update('UPDATE team SET is_deleted = 0 WHERE ID_TEAM = :ID_TEAM = 1', ['ID_TEAM' => $id]);

        return redirect()->route('team.bin')->with('success', 'Data berhasil direstore');
    }

    public function Teambin(){
        $teams = DB::select('SELECT * FROM team where is_deleted = 1');

        return view('team.bin')
        ->with('teams', $teams);

    }
}

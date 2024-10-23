<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\UserModel;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    public $userModel;
    public $kelasModel;

    public function profile($nama = '', $kelas = '', $ipk = '')
    {
        $data = [
            'nama' => $nama,
            'kelas' => $kelas,
            'ipk' => $ipk
        ];
        return view('profile', $data);
    }
    public function create(){ 
        $kelasModel = new Kelas();

        $kelas = $kelasModel->getKelas();

        $data = [
            'title' => 'Create User',
            'kelas' => $kelas,
        ];

        return view('create_user', $data);
    }

    public function store(Request $request)
        {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'ipk' => 'required|numeric',
            'kelas_id' => 'required|integer',
            'foto' =>
            'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $filename = time() . '_' . $foto->getClientOriginalName();
            $fotoPath = $foto->move(('upload/img'), $filename);
        } else {
            $fotoPath = null;
        }

        $this->userModel->create([
            'nama' => $request->input('nama'),
            'ipk' => $request->input('ipk'),
            'kelas_id' => $request->input('kelas_id'),
            'foto' => 'upload/img/'.$filename,
        ]);
        return redirect()->to('/user')->with('success', 'User berhasil ditambahkan');
}
    public function __construct(){
        $this -> userModel = new UserModel();
        $this -> kelasModel = new Kelas();
    }

    public function index(){
        $data = [
            'title' => 'Create User',
            'users' => $this->userModel->getUser(),
        ];
        return view('list_user', $data);
    }

    public function show($id){
        $user =  $this->userModel->getUser($id);
        $data = [
            'title' => 'Profile',
            'user' => $user,
        ];
        return view('profile', $data);
    }
    public function edit($id){
        $user = UserModel::findOrFail($id);
        $kelasModel = new Kelas();
        $kelas = $kelasModel->getKelas();
        $title = 'Edit User';
        return view('edit_user', compact('user','kelas','title'));
    }
    public function update(Request $request, $id){
        $user = UserModel::findOrFail($id);
        $user->nama = $request->nama;
        $user->ipk = $request->ipk;
        $user->kelas_id = $request->kelas_id;

        if($request->hasFile('foto')){
            $fileName = time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('upload/img/'), $fileName);
            $user->foto = 'upload/img/' . $fileName;
        }

        $user->save();

        return redirect()->route('user.index')->with('success', 'User updated succesfully');
    }

    public function destroy($id){
        $user = UserModel::findOrFail($id);
        $user->delete();

        return redirect()->to('/user')->with('success', 'User has been deleted successfully');
    }
}
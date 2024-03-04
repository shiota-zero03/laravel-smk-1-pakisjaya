<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Member;
use App\Models\Guru;
use App\Models\Absensi;
use App\Models\Penilaian;
use App\Models\Prestasi;
use App\Models\Ekskul;
use App\Models\Berita;
use App\Models\Pembimbing;
use Session;

class ViewControllerAdmin extends Controller
{
    public function dashboard(){
    	if(!Session::has('idadmin')){
            return redirect('/admin')->with('error', 'Login first');
        }
        $member = Member::all()->count();
        $pkl = Member::where('status_pkl', 'Sedang PKL')->get()->count();
        $guru = Guru::all()->count();
        $admin = Admin::all()->count();
        $berita = Berita::all()->count();
        $ekskul = Ekskul::all()->count();
        $prestasi = Prestasi::all()->count();
        $data = [
            'member' => $member,
            'pkl' => $pkl,
            'guru' => $guru,
            'admin' => $admin,
            'berita' => $berita,
            'ekskul' => $ekskul,
            'prestasi' => $prestasi,
        ];
    	return view('admin.dashboard.index')->with($data);
    }
    public function industripkl(Request $request){
        if(!Session::has('idadmin')){
            return redirect('/admin')->with('error', 'Login first');
        }
        $pembimbing = Pembimbing::all();
        $data = [
            'pembimbing' => $pembimbing
        ];
        return view('admin.kelolapembimbing.index')->with($data);
    }
    public function addpembimbingindustri(Request $request){
        $nama = $request->nama;
        $cekpi = Pembimbing::where('nama', $nama)->get()->count();
        if($cekpi > 0){
            return back()->with('error', 'Nama industri sudah ada');
        } else {
            $cekus = Pembimbing::where('username', $request->username)->get()->count();
            if($cekus > 0){
                return back()->with('error', 'Username sudah digunakan');
            } else {
                $pem = new Pembimbing;
                $pem->nama = $nama;
                $pem->username = $request->username;
                $pem->password = password_hash($request->password, PASSWORD_DEFAULT);
                $pem->save();

                if($pem){
                    return back()->with('success', 'Data pembimbing industri pkl berhasil ditambahkan');
                }
            }
        }
    }
    public function deletepembimbingindustri(Request $request){
        $update = Pembimbing::where('id_pembimbing', $request->id)->delete();
        if($update){
            return back()->with('success', 'Berhasil menghapus akun');
        }
    }
    public function jsonbyidpembimbing(Request $request){
        $id = $request->id;
        $data = Pembimbing::where('id_pembimbing', $id)->first();
        return response()->json(['data' => $data]);
    }
    public function updatepembimbingindustri(Request $request){
        $getdata = Pembimbing::where('id_pembimbing', $request->id_pembimbing)->first();
        if($request->nama == $getdata->nama){
            if($request->username == $getdata->username){
                $data = [
                    'nama' => $request->nama,
                    'username' => $request->username,
                    'password' => password_hash($request->password, PASSWORD_DEFAULT)
                ];
            } else {
                $countuser = Pembimbing::where('username', $request->username)->get()->count();
                if($countuser > 0){
                    return back()->with('error', 'Username sudah pernah digunakan');
                } else {
                    $data = [
                        'nama' => $request->nama,
                        'username' => $request->username,
                        'password' => password_hash($request->password, PASSWORD_DEFAULT)
                    ];
                }
            }
        } else {
            $countdata = Pembimbing::where('nama', $request->nama)->get()->count();
            if($countdata > 0){
                return back()->with('error', 'Nama industri sudah pernah digunakan');
            } else {
                if($request->username == $getdata->username){
                    $data = [
                        'nama' => $request->nama,
                        'username' => $request->username,
                        'password' => password_hash($request->password, PASSWORD_DEFAULT)
                    ];
                } else {
                    $countuser = Pembimbing::where('username', $request->username)->get()->count();
                    if($countuser > 0){
                        return back()->with('error', 'Username sudah pernah digunakan');
                    } else {
                        $data = [
                            'nama' => $request->nama,
                            'username' => $request->username,
                            'password' => password_hash($request->password, PASSWORD_DEFAULT)
                        ];
                    }
                }
            }
        }
        if($data){
            $update = Pembimbing::where('id_pembimbing', $request->id_pembimbing)->update($data);
            if($update){
                return back()->with('success', 'Berhasil mengupdate data');
            }
        }
    }


    public function kelolauser(){
    	if(!Session::has('idadmin')){
            return redirect('/admin')->with('error', 'Login first');
        }
        $member = Member::all();
        $data = [
        	'member' => $member
        ];
    	return view('admin.kelolauser.index')->with($data);
    }
    public function aktifkanuser(Request $request){
    	$update = Member::where('id_member', $request->id)->update(['status_akun' => 'Active']);
    	if($update){
    		return back()->with('success', 'Berhasil mengaktifkan akun');
    	}
    }
    public function viewuser(Request $request){
    	if(!Session::has('idadmin')){
            return redirect('/admin')->with('error', 'Login first');
        }
        $member = Member::where('id_member', $request->id)->first();
        $data = [
        	'member' => $member
        ];
    	return view('admin.kelolauser.view')->with($data);
    }
    public function deleteuser(Request $request){
    	$update = Member::where('id_member', $request->id)->delete();
    	if($update){
    		return back()->with('success', 'Berhasil menghapus akun');
    	}
    }
    public function kelolaadmin(){
    	if(!Session::has('idadmin')){
            return redirect('/admin')->with('error', 'Login first');
        }
        $member = Admin::where('id_admin', '!=', 1)->where('id_admin', '!=', Session::get('idadmin'))->get();
        $data = [
        	'member' => $member
        ];
    	return view('admin.kelolaadmin.index')->with($data);
    }
    public function addadmin(Request $request){
    	$cekuser = Admin::where('username', $request->username)->get()->count();
    	if($cekuser > 0){
    		return back()->with('error', 'username sudah pernah digunakan');
    	} else {
    		$admin = new Admin;
    		$admin->username = $request->username;
    		$admin->password = password_hash($request->password, PASSWORD_DEFAULT);
    		$admin->save();
    		if($admin){
    			return back()->with('success', 'admin berhasil ditambahkan');
    		}
    	}
    }
    public function deleteadmin(Request $request){
    	$update = Admin::where('id_admin', $request->id)->delete();
    	if($update){
    		return back()->with('success', 'Berhasil menghapus akun');
    	}
    }
    public function pengajuanpkl(){
    	if(!Session::has('idadmin')){
            return redirect('/admin')->with('error', 'Login first');
        }
        $member = Member::where('status_pkl', '!=', 'Belum PKL')->get();
        $guru = Guru::all();
        $data = [
        	'member' => $member,
        	'guru' => $guru
        ];
    	return view('admin.pengajuanpkl.index')->with($data);
    }
    public function tolakpkl(Request $request){
    	$update = Member::where('id_member', $request->id)->update(['status_pkl' => 'Belum PKL', 'mulai_pkl' => null, 'selesai_pkl' => null, 'lokasi_pkl' => null]);
    	if($update){
    		return back()->with('success', 'PKL berhasil ditolak');
    	}
    }
    public function updatepkl(Request $request){
    	$update = Member::where('id_member', $request->id_member)->update(['status_pkl' => 'Sedang PKL', 'pembimbing_sekolah' => $request->pembimbing_sekolah]);
    	if($update){
    		return back()->with('success', 'PKL berhasil diacc');
    	}
    }
    public function absensipkl(){
    	if(!Session::has('idadmin')){
            return redirect('/admin')->with('error', 'Login first');
        }
        $member = Member::where('status_pkl', '!=', 'Belum PKL')->get();
        $guru = Guru::all();
        $data = [
        	'member' => $member,
        	'guru' => $guru
        ];
    	return view('admin.absensipkl.index')->with($data);
    }
    public function lihatabsensi(Request $request){
    	if(!Session::has('idadmin')){
            return redirect('/admin')->with('error', 'Login first');
        }
        $member = Member::where('id_member', $request->id)->first();
        $data = [
        	'member' => $member
        ];
    	return view('admin.absensipkl.view')->with($data);
    }
    public function penilaian(){
    	if(!Session::has('idadmin')){
            return redirect('/admin')->with('error', 'Login first');
        }
        $member = Member::where('status_pkl', '!=', 'Belum PKL')->get();
        $guru = Guru::all();
        $data = [
        	'member' => $member,
        	'guru' => $guru
        ];
    	return view('admin.penilaian.index')->with($data);
    }
    public function lihatpenilaian(Request $request){
    	$kedisiplinan = Penilaian::where('id_member', $request->id)->where('jenis_penilaian', 'pelaksanaan')->where('aspek', 'Kedisiplinan')->first();
    	$tanggungjawab = Penilaian::where('id_member', $request->id)->where('jenis_penilaian', 'pelaksanaan')->where('aspek', 'Tanggung Jawab')->first();
    	$inisiatif = Penilaian::where('id_member', $request->id)->where('jenis_penilaian', 'pelaksanaan')->where('aspek', 'Inisiatif')->first();
    	$kerajinan = Penilaian::where('id_member', $request->id)->where('jenis_penilaian', 'pelaksanaan')->where('aspek', 'Kerajinan')->first();
    	$kerjasama = Penilaian::where('id_member', $request->id)->where('jenis_penilaian', 'pelaksanaan')->where('aspek', 'Kerjasama')->first();
    	$keterampilan = Penilaian::where('id_member', $request->id)->where('jenis_penilaian', 'keterampilan')->get();
    	$sumpelaksanaan = Penilaian::where('id_member', $request->id)->where('jenis_penilaian', 'pelaksanaan')->sum('nilai');
    	$avgpelaksanaan = Penilaian::where('id_member', $request->id)->where('jenis_penilaian', 'pelaksanaan')->average('nilai');
    	$sumketerampilan = Penilaian::where('id_member', $request->id)->where('jenis_penilaian', 'keterampilan')->sum('nilai');
    	$avgketerampilan = Penilaian::where('id_member', $request->id)->where('jenis_penilaian', 'keterampilan')->average('nilai');
    	$member = Member::where('id_member', $request->id)->first();
    	$data = [
    		'member' => $member,
    		'kedisiplinan' => $kedisiplinan,
			'tanggungjawab' => $tanggungjawab,
			'inisiatif' => $inisiatif,
			'kerajinan' => $kerajinan,
			'kerjasama' => $kerjasama,
			'keterampilan' => $keterampilan,
			'sumpelaksanaan' => $sumpelaksanaan,
			'avgpelaksanaan' => $avgpelaksanaan,
			'sumketerampilan' => $sumketerampilan,
			'avgketerampilan' => $avgketerampilan
    	];
    	return view('admin.penilaian.view')->with($data);
    }
}

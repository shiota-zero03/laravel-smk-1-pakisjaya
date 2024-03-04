<?php

namespace App\Http\Controllers\Pembimbing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Guru;
use App\Models\Member;
use App\Models\Absensi;
use App\Models\Penilaian;
use Session;

class ViewControllerPembimbing extends Controller
{
    public function dashboard(){
    	if(!Session::has('idpembimbing')){
            return redirect('/pembimbing')->with('error', 'Login first');
        }
        $pembimbing = Guru::where('id_guru', Session::get('idpembimbing'))->first();
        $member = Member::where('pembimbing_sekolah', $pembimbing->nama_guru)->get()->count();
        $member2 = Member::where('pembimbing_sekolah', $pembimbing->nama_guru)->where('status_pkl', '=', 'Sedang PKL')->get()->count();
        $data = [
        	'member' => $member,
        	'member2' => $member2,
        	'pembimbing' => $pembimbing
        ];
    	return view('pembimbing.dashboard.index')->with($data);
    }
    public function profilpembimbing(){
    	if(!Session::has('idpembimbing')){
            return redirect('/pembimbing')->with('error', 'Login first');
        }
        $pembimbing = Guru::where('id_guru', Session::get('idpembimbing'))->first();
        $data = [
        	'pembimbing' => $pembimbing
        ];
    	return view('pembimbing.profil.index')->with($data);
    }
    public function updatepembimbing(Request $request){
    	$pembimbing = Guru::where('id_guru', Session::get('idpembimbing'))->first();
    	$ceknip = Guru::where('nip_guru', $request->nip_guru)->get()->count();
    	if($pembimbing->nip_guru == $request->nip_guru){
	    	if(!$request->foto_guru){
	    		if($request->password == $pembimbing->password){
	    			$data = [
	    				'nama_guru' => $request->nama_guru,
	    				'nip_guru' => $request->nip_guru
	    			];
	    		} else {
	    			$data = [
	    				'nama_guru' => $request->nama_guru,
	    				'nip_guru' => $request->nip_guru,
	    				'password' => password_hash($request->password, PASSWORD_DEFAULT)
	    			];
	    		}
	    	} else {
	    		$tujuan_upload = 'assets/images/guru/';
	            $file = $request->file('foto_guru');
	            $namafile = time().'_'.$file->getClientOriginalName();

	            if($file->move($tujuan_upload,$namafile)){
	            	if($request->password == $pembimbing->password){
		    			$data = [
		    				'foto_guru' => $namafile,
		    				'nama_guru' => $request->nama_guru,
		    				'nip_guru' => $request->nip_guru
		    			];
		    		} else {
		    			$data = [
		    				'foto_guru' => $namafile,
		    				'nama_guru' => $request->nama_guru,
		    				'nip_guru' => $request->nip_guru,
		    				'password' => password_hash($request->password, PASSWORD_DEFAULT)
		    			];
		    		}
	            }
	    	}
	    } else {
	    	if($ceknip > 0){
	    		return back()->with('error', 'nip sudah digunakan');
	    	} else {
	    		if(!$request->foto_guru){
		    		if($request->password == $pembimbing->password){
		    			$data = [
		    				'nama_guru' => $request->nama_guru,
		    				'nip_guru' => $request->nip_guru
		    			];
		    		} else {
		    			$data = [
		    				'nama_guru' => $request->nama_guru,
		    				'nip_guru' => $request->nip_guru,
		    				'password' => password_hash($request->password, PASSWORD_DEFAULT)
		    			];
		    		}
		    	} else {
		    		$tujuan_upload = 'assets/images/guru/';
		            $file = $request->file('foto_guru');
		            $namafile = time().'_'.$file->getClientOriginalName();

		            if($file->move($tujuan_upload,$namafile)){
		            	if($request->password == $pembimbing->password){
			    			$data = [
			    				'foto_guru' => $namafile,
			    				'nama_guru' => $request->nama_guru,
			    				'nip_guru' => $request->nip_guru
			    			];
			    		} else {
			    			$data = [
			    				'foto_guru' => $namafile,
			    				'nama_guru' => $request->nama_guru,
			    				'nip_guru' => $request->nip_guru,
			    				'password' => password_hash($request->password, PASSWORD_DEFAULT)
			    			];
			    		}
		            }
		    	}
	    	}
	    }
	    Member::where('pembimbing_sekolah', $pembimbing->nama_guru)->update(['pembimbing_sekolah' => $request->nama_guru]);
    	$update = Guru::where('id_guru', Session::get('idpembimbing'))->update($data);
    	if($update){
    		return back()->with('success', 'Data berhasil diupdate');
    	}
    }
    public function absensipkl(){
    	if(!Session::has('idpembimbing')){
            return redirect('/pembimbing')->with('error', 'Login first');
        }
        $pembimbing = Guru::where('id_guru', Session::get('idpembimbing'))->first();
        $member = Member::where('pembimbing_sekolah', $pembimbing->nama_guru)->where('status_pkl', '!=', 'Belum PKL')->get();
        $data = [
        	'member' => $member
        ];
    	return view('pembimbing.bimbingan.absensi.index')->with($data);
    }
    public function lihatabsensi(Request $request){
    	if(!Session::has('idpembimbing')){
            return redirect('/pembimbing')->with('error', 'Login first');
        }
        $member = Member::where('id_member', $request->id)->first();
        $data = [
        	'member' => $member
        ];
    	return view('pembimbing.bimbingan.absensi.view')->with($data);
    }
    public function penilaian(){
    	if(!Session::has('idpembimbing')){
            return redirect('/pembimbing')->with('error', 'Login first');
        }
        $pembimbing = Guru::where('id_guru', Session::get('idpembimbing'))->first();
        $member = Member::where('pembimbing_sekolah', $pembimbing->nama_guru)->where('status_pkl', '!=', 'Belum PKL')->get();
        $data = [
        	'member' => $member
        ];
    	return view('pembimbing.bimbingan.penilaian.index')->with($data);
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
    	return view('pembimbing.bimbingan.penilaian.view')->with($data);
    }
    public function editpenilaian(Request $request){
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
    	return view('pembimbing.bimbingan.penilaian.edit')->with($data);
    }
    public function updatepenilaian(Request $request){
    	if(isset($_POST['pelaksanaan'])){
    		$cekpenilaian = Penilaian::where('id_member', $request->id_member)->where('jenis_penilaian', 'pelaksanaan')->where('aspek', $request->aspek)->get()->count();
    		if($cekpenilaian > 0){
    			$getdata = Penilaian::where('id_member', $request->id_member)->where('jenis_penilaian', 'pelaksanaan')->where('aspek', $request->aspek)->first();
    			$update = Penilaian::where('id_nilai', $getdata->id_nilai)->update(['nilai' => $request->nilai]);
    			if($update){
    				return back()->with('success', 'Nilai berhasil diupdate');
    			}
    		} else {
    			$pen = new Penilaian;
    			$pen->id_member = $request->id_member;
    			$pen->jenis_penilaian = 'pelaksanaan';
    			$pen->aspek = $request->aspek;
    			$pen->nilai = $request->nilai;

    			$pen->save();
    			if($pen){
    				return back()->with('success', 'Nilai berhasil diupdate');
    			}
    		}
    	} elseif (isset($_POST['keterampilanstore'])){
    		$pen = new Penilaian;
    		$pen->id_member = $request->id_member;
			$pen->jenis_penilaian = 'keterampilan';
			$pen->aspek = $request->aspek;
			$pen->nilai = $request->nilai;

			$pen->save();
			if($pen){
				return back()->with('success', 'Nilai berhasil diupdate');
			}
    	} elseif(isset($_POST['keterampilanupdate'])){
    		$update = Penilaian::where('id_nilai', $request->id_nilai)->update(['nilai' => $request->nilai]);
			if($update){
				return back()->with('success', 'Nilai berhasil diupdate');
			}
    	}
    }
    public function hapuspenilaian(Request $request){
    	$delete = Penilaian::where('id_nilai', $request->id)->delete();
    	if($delete){
    		return back()->with('success', 'nilai berhasil dihapus');
    	}
    }
}

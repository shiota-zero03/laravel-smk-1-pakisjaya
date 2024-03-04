<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Absensi;
use App\Models\Penilaian;
use App\Models\Pembimbing;
use Session;

class ViewControllerUser extends Controller
{
    public function dashboard(){
    	if(!Session::has('loginId') || !Session::has('role')){
            return redirect('/akademik?filter=login-pkl')->with('error', 'Login first');
        }
        $member = Member::where('id_member', Session::get('loginId'))->first();
        $hadir = Absensi::where('id_member', Session::get('loginId'))->where('status_absen', 'Hadir')->get()->count();
        $izin = Absensi::where('id_member', Session::get('loginId'))->where('status_absen', 'Izin')->get()->count();
        if($member->status_pkl != 'Belum PKL'){
            $count = strtotime($member->selesai_pkl) - strtotime($member->mulai_pkl);
            $countmember = $count/(60*60*24);
            $alfa = $countmember - ($hadir + $izin);
        } else {
            $alfa = 0;
        }
        $data = [
            'member' => $member,
            'hadir' => $hadir,
            'izin' => $izin,
            'alfa' => $alfa,
        ];
    	return view('homepage.pkl.siswa.dashboard.index')->with($data);
    }
    public function profil(){
    	if(!Session::has('loginId') || !Session::has('role')){
            return redirect('/akademik?filter=login-pkl')->with('error', 'Login first');
        }
        $member = Member::where('id_member', Session::get('loginId'))->first();
        $data = [
        	'member' => $member
        ];
    	return view('homepage.pkl.siswa.profil.index')->with($data);
    }
    public function userdata(){
    	if(!Session::has('loginId') || !Session::has('role')){
            return redirect('/akademik?filter=login-pkl')->with('error', 'Login first');
        }
        $member = Member::where('id_member', Session::get('loginId'))->first();
        $data = [
        	'member' => $member
        ];
    	return view('homepage.pkl.siswa.userdata.index')->with($data);
    }
    public function editprofil(){
    	if(!Session::has('loginId') || !Session::has('role')){
            return redirect('/akademik?filter=login-pkl')->with('error', 'Login first');
        }
        $member = Member::where('id_member', Session::get('loginId'))->first();
        $data = [
        	'member' => $member
        ];
    	return view('homepage.pkl.siswa.profil.edit')->with($data);
    }
    public function updateprofil(Request $request){
    	if(isset($_POST['profilupdate'])){
	    	if(!$request->foto_profil){
	    		$data = [
	    			'nama' => $request->nama,
					'no_identitas' => $request->no_identitas,
					'tempat_lahir' => $request->tempat_lahir,
					'tanggal_lahir' => $request->tanggal_lahir,
					'jenis_kelamin' => $request->jenis_kelamin,
					'no_telepon' => $request->no_telepon,
					'alamat' => $request->alamat,
					'nama_orangtua' => $request->nama_orangtua,
					'no_telepon_orangtua' => $request->no_telepon_orangtua,
					'alamat_orangtua' => $request->alamat_orangtua,
					'keahlian' => $request->keahlian,
					'pembimbing_industri' => $request->pembimbing_industri,
	    		];
	    		$update = Member::where('id_member', Session::get('loginId'))->update($data);
	    		if($update){
	    			return redirect('/siswa-pkl/profil')->with('success', 'Data update succesfully');
	    		}
	    	} else {
	    		$tujuan_upload = 'assets/images/profil/';
	            $file = $request->file('foto_profil');
	            $namafile = time().'_'.$file->getClientOriginalName();

	            if($file->move($tujuan_upload,$namafile)){
		    		$data = [
		    			'nama' => $request->nama,
						'foto_profil' => $namafile,
						'no_identitas' => $request->no_identitas,
						'tempat_lahir' => $request->tempat_lahir,
						'tanggal_lahir' => $request->tanggal_lahir,
						'jenis_kelamin' => $request->jenis_kelamin,
						'no_telepon' => $request->no_telepon,
						'alamat' => $request->alamat,
						'nama_orangtua' => $request->nama_orangtua,
						'no_telepon_orangtua' => $request->no_telepon_orangtua,
						'alamat_orangtua' => $request->alamat_orangtua,
						'keahlian' => $request->keahlian,
						'pembimbing_industri' => $request->pembimbing_industri,
		    		];
		    		$update = Member::where('id_member', Session::get('loginId'))->update($data);
		    		if($update){
		    			return redirect('/siswa-pkl/profil')->with('success', 'Data update succesfully');
		    		}
		    	} else {
		    		return back()->with('error', 'Failed to update data');
		    	}
	    	}
    	} elseif(isset($_POST['ajukansekarang'])){
            if($request->selesai_pkl < $request->mulai_pkl){
                return back()->with('error', 'Tanggal pengajuan tidak valid');
            } else{
        		$data = [
        			'mulai_pkl' => $request->mulai_pkl,
        			'selesai_pkl' => $request->selesai_pkl,
        			'lokasi_pkl' => $request->lokasi_pkl,
        			'status_pkl' => 'Menunggu ACC Guru'
        		];

                $countpembimbing = Pembimbing::where('nama', $request->lokasi_pkl)->get()->count();

        		$update = Member::where('id_member', Session::get('loginId'))->update($data);
        		if($update){
                    if($countpembimbing == 0){
                        $pem = new Pembimbing;
                        $pem->nama = $request->lokasi_pkl;
                        $pem->save();
                    }
        			return back()->with('success', 'Data update succesfully');
        		}
            }
    	} elseif(isset($_POST['userdata'])){
    		$cek = Member::where('id_member', Session::get('loginId'))->first();

    		if($request->email == $cek->email){
    			$email = $cek->email;
    		} else {
    			$cekemail = Member::where('email', $request->email)->get()->count();
    			if($cekemail > 0){
    				return back()->with('error', 'Email sudah digunakan');
    			} else {
    				$email = $request->email;
    			}
    		}
    		if($request->username == $cek->username){
    			$username = $cek->username;
    		} else {
    			$cekusername = Member::where('username', $request->username)->get()->count();
    			if($cekusername > 0){
    				return back()->with('error', 'Username sudah digunakan');
    			} else {
    				$username = $request->username;
    			}
    		}

    		if(!$request->password_lama){
    			$data = [
    				'email' => $email,
    				'username' => $username
    			];
    			$update = Member::where('id_member', Session::get('loginId'))->update($data);
    			if($update){
    				return back()->with('success', 'Data update succesfully');
    			}
    		} else {
    			if(!password_verify($request->password_lama, $cek->password)){
    				return back()->with('error', 'Wrong password');
    			} else {
    				$data = [
    					'email' => $email,
    					'username' => $username,
    					'password' => password_hash($request->password_baru, PASSWORD_DEFAULT)
    				];
    				$update = Member::where('id_member', Session::get('loginId'))->update($data);
    				if($update){
    					return back()->with('success', 'Data update succesfully');
    				}
    			}
    		}
    	}
    }
    public function absensi(){
    	if(!Session::has('loginId') || !Session::has('role')){
            return redirect('/akademik?filter=login-pkl')->with('error', 'Login first');
        }
        $member = Member::where('id_member', Session::get('loginId'))->first();
        $data = [
        	'member' => $member
        ];
    	return view('homepage.pkl.siswa.absensi.index')->with($data);
    }
    public function storeabsensi(Request $request){
    	date_default_timezone_set('Asia/Jakarta');
    	$absen = new Absensi;
    	if(isset($_POST['hadir'])){
    		$cekmember = Absensi::where('id_member', Session::get('loginId'))->where('tangal_absen', date('Y-m-d'))->get()->count();
    		if($cekmember > 0){
    			return back()->with('error', 'Sudah absen hari ini');
    		} else {
	    		$absen->id_member = Session::get('loginId');
	    		$absen->tangal_absen = date('Y-m-d');
	    		$absen->jam_absen = date('H:i:s');
	    		$absen->status_absen = 'Hadir';

	    		$absen->save();

	    		if($absen){
	    			return back()->with('success', 'Berhasil absen');
	    		}
    		}
    	} elseif(isset($_POST['izin'])){
    		$cekmember = Absensi::where('id_member', Session::get('loginId'))->where('tangal_absen', date('Y-m-d'))->get()->count();
    		if($cekmember > 0){
    			return back()->with('error', 'Sudah absen hari ini');
    		} else {
    			if(!$request->file_izin){
    				$absen->id_member = Session::get('loginId');
		    		$absen->tangal_absen = date('Y-m-d');
		    		$absen->jam_absen = date('H:i:s');
		    		$absen->status_absen = 'Alfa';

		    		$absen->save();

		    		if($absen){
		    			return back()->with('success', 'Berhasil absen');
		    		}
    			} else {
	    			$tujuan_upload = 'assets/file/absen/';
		            $file = $request->file('file_izin');
		            $namafile = time().'_'.$file->getClientOriginalName();

		            if($file->move($tujuan_upload,$namafile)){
			    		$absen->id_member = Session::get('loginId');
			    		$absen->tangal_absen = date('Y-m-d');
			    		$absen->jam_absen = date('H:i:s');
			    		$absen->status_absen = 'Izin';
			    		$absen->file_absen = $namafile;

			    		$absen->save();

			    		if($absen){
			    			return back()->with('success', 'Berhasil absen');
			    		}
			    	}
			    }
    		}
    	} elseif(isset($_POST['updatefile'])){
    		$tujuan_upload = 'assets/file/absen/';
            $file = $request->file('file_izin');
            $namafile = time().'_'.$file->getClientOriginalName();

            if($file->move($tujuan_upload,$namafile)){
            	$data = [
		    		'status_absen' => 'Izin',
		    		'file_absen' => $namafile
            	];
            	$absen = Absensi::where('id_absen', $request->id_absen)->update($data);

	    		if($absen){
	    			return back()->with('success', 'Berhasil update absen');
	    		}
	    	}
    	} elseif(isset($_POST['simpanlaporan'])){
    		$data = [
    			'laporan_absen' => $request->laporan
    		];
    		$absen = Absensi::where('id_absen', $request->id_absen)->update($data);

    		if($absen){
    			return back()->with('success', 'Berhasil update laporan');
    		}
    	}
    }
    public function laporan(){
    	if(!Session::has('loginId') || !Session::has('role')){
            return redirect('/akademik?filter=login-pkl')->with('error', 'Login first');
        }
        $member = Member::where('id_member', Session::get('loginId'))->first();
        $absen = Absensi::orderby('tangal_absen', 'DESC')->where('id_member', Session::get('loginId'))->get();
        $data = [
        	'member' => $member,
        	'absen' => $absen
        ];
    	return view('homepage.pkl.siswa.laporan.index')->with($data);
    }
    public function penilaian(){
        if(!Session::has('loginId') || !Session::has('role')){
            return redirect('/akademik?filter=login-pkl')->with('error', 'Login first');
        }
    	$kedisiplinan = Penilaian::where('id_member', Session::get('loginId'))->where('jenis_penilaian', 'pelaksanaan')->where('aspek', 'Kedisiplinan')->first();
    	$tanggungjawab = Penilaian::where('id_member', Session::get('loginId'))->where('jenis_penilaian', 'pelaksanaan')->where('aspek', 'Tanggung Jawab')->first();
    	$inisiatif = Penilaian::where('id_member', Session::get('loginId'))->where('jenis_penilaian', 'pelaksanaan')->where('aspek', 'Inisiatif')->first();
    	$kerajinan = Penilaian::where('id_member', Session::get('loginId'))->where('jenis_penilaian', 'pelaksanaan')->where('aspek', 'Kerajinan')->first();
    	$kerjasama = Penilaian::where('id_member', Session::get('loginId'))->where('jenis_penilaian', 'pelaksanaan')->where('aspek', 'Kerjasama')->first();
    	$keterampilan = Penilaian::where('id_member', Session::get('loginId'))->where('jenis_penilaian', 'keterampilan')->get();
    	$sumpelaksanaan = Penilaian::where('id_member', Session::get('loginId'))->where('jenis_penilaian', 'pelaksanaan')->sum('nilai');
    	$avgpelaksanaan = Penilaian::where('id_member', Session::get('loginId'))->where('jenis_penilaian', 'pelaksanaan')->average('nilai');
    	$sumketerampilan = Penilaian::where('id_member', Session::get('loginId'))->where('jenis_penilaian', 'keterampilan')->sum('nilai');
    	$avgketerampilan = Penilaian::where('id_member', Session::get('loginId'))->where('jenis_penilaian', 'keterampilan')->average('nilai');
    	$data = [
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
    	return view('homepage.pkl.siswa.penilaian.index')->with($data);
    }
}

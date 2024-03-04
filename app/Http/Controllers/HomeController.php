<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prestasi;
use App\Models\Ekskul;
use App\Models\Guru;
use App\Models\Berita;
use App\Models\Picture;
use App\Models\KalenderAkademik;
use Session;

class HomeController extends Controller
{
    public function index(){
    	$prestasi = Prestasi::orderby('tanggal_prestasi', 'DESC')->limit(4)->get();
    	$ekskul = Ekskul::all();
    	$guru = Guru::all();
        $berita = Berita::limit(5)->get();
    	$data = [
    		'prestasi' => $prestasi,
    		'ekskul' => $ekskul,
    		'guru' => $guru,
            'berita' => $berita
    	];
    	return view('landing-page.home.index')->with($data);
    }
    public function akademik(){
        return view('landing-page.akademik.index');
    }
    public function sejarah(){
        return view('landing-page.sejarah.index');
    }
    public function visimisi(){
        return view('landing-page.visimisi.index');
    }
    public function gurustaff(){
        $guru = Guru::paginate(8);
        $data = [
            'guru' => $guru
        ];
        return view('landing-page.gurustaff.index')->with($data);
    }
    public function programstudi(){
        return view('landing-page.programstudi.index');
    }
    public function jsonCalendar(){
        $kalender = KalenderAkademik::all();
            foreach ($kalender as $key => $value) {
            	$data = [
                    'id' => $value->id_akademik,
                    'title' => $value->judul_kegiatan,
                    'start' => $value->mulai_kegiatan,
                    'end' => $value->akhir_kegiatan,
                ];
                $array[] = $data;
            }
    	return json_encode($array);
    }
    public function kesiswaan(){
        $ekskul = Ekskul::all();
        $osis = Picture::where('jenis_foto', 'Osis')->first();
        $data = [
            'ekskul' => $ekskul,
            'osis' => $osis
        ];
        return view('landing-page.kesiswaan.index')->with($data);
    }
    public function berita(){
        $berita = Berita::paginate(6);
        $data = [
            'berita' => $berita
        ];
        return view('landing-page.berita.index')->with($data);
    }
    public function viewberita(Request $request){
        $berita = Berita::where('id_berita', $request->id)->first();
        $data = [
            'berita' => $berita
        ];
        return view('landing-page.berita.view')->with($data);
    }
    public function prestasi(){
        $prestasi = Prestasi::orderby('tanggal_prestasi', 'DESC')->paginate(8);
        $data = [
            'prestasi' => $prestasi
        ];
        return view('landing-page.prestasi.index')->with($data);
    }
    public function admin(){
        if(Session::has('idadmin')){
            return redirect('/admin/dashboard');
        }
        return view('admin.index');
    }
    public function pembimbing(){
        if(Session::has('idpembimbing')){
            return redirect('/pembimbing/dashboard');
        }
        return view('pembimbing.index');
    }
    public function pembimbingindustripkl(){
        if(Session::has('idpembimbingindustri')){
            return redirect('/pembimbing-industri-pkl/dashboard');
        }
        return view('pembimbing-industri.index');
    }
}

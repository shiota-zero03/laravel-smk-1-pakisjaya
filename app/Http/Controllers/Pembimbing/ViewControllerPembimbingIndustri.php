<?php

namespace App\Http\Controllers\Pembimbing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pembimbing;
use App\Models\Member;
use App\Models\Absensi;
use App\Models\Penilaian;
use Session;

class ViewControllerPembimbingIndustri extends Controller
{
    public function dashboard(){
    	if(!Session::has('idpembimbingindustri')){
            return redirect('/pembimbing-industri-pkl')->with('error', 'Login first');
        }
        $pembimbing = Pembimbing::where('id_pembimbing', Session::get('idpembimbingindustri'))->first();
        $member = Member::where('lokasi_pkl', $pembimbing->nama)->get()->count();
        $member2 = Member::where('lokasi_pkl', $pembimbing->nama)->where('status_pkl', '=', 'Sedang PKL')->get()->count();
        $data = [
        	'member' => $member,
        	'member2' => $member2,
        	'pembimbing' => $pembimbing
        ];
    	return view('pembimbing-industri.dashboard.index')->with($data);
    }
    public function absensipkl(){
    	if(!Session::has('idpembimbingindustri')){
            return redirect('/pembimbing')->with('error', 'Login first');
        }
        $pembimbing = Pembimbing::where('id_pembimbing', Session::get('idpembimbingindustri'))->first();
        $member = Member::where('lokasi_pkl', $pembimbing->nama)->where('status_pkl', '!=', 'Belum PKL')->get();
        $data = [
        	'member' => $member
        ];
    	return view('pembimbing-industri.bimbingan.absensi.index')->with($data);
    }
    public function lihatabsensi(Request $request){
    	if(!Session::has('idpembimbingindustri')){
            return redirect('/pembimbing')->with('error', 'Login first');
        }
        $member = Member::where('id_member', $request->id)->first();
        $data = [
        	'member' => $member
        ];
    	return view('pembimbing-industri.bimbingan.absensi.view')->with($data);
    }
    public function penilaian(){
    	if(!Session::has('idpembimbingindustri')){
            return redirect('/pembimbing')->with('error', 'Login first');
        }
        $pembimbing = Pembimbing::where('id_pembimbing', Session::get('idpembimbingindustri'))->first();
        $member = Member::where('lokasi_pkl', $pembimbing->nama)->where('status_pkl', '!=', 'Belum PKL')->get();
        $data = [
        	'member' => $member
        ];
    	return view('pembimbing-industri.bimbingan.penilaian.index')->with($data);
    }
    public function lihatpenilaian(Request $request){
    	if(!Session::has('idpembimbingindustri')){
            return redirect('/pembimbing')->with('error', 'Login first');
        }
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
    	return view('pembimbing-industri.bimbingan.penilaian.view')->with($data);
    }
    public function editpenilaian(Request $request){
    	if(!Session::has('idpembimbingindustri')){
            return redirect('/pembimbing')->with('error', 'Login first');
        }
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
    	return view('pembimbing-industri.bimbingan.penilaian.edit')->with($data);
    }
}

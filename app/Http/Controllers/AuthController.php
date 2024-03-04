<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Admin;
use App\Models\Pembimbing;
use App\Models\Guru;
use Session;

class AuthController extends Controller
{
    public function daftarpkl(Request $request){
    	$validated = $request->validate([
    		'username' => 'required|unique:members',
            'email' => 'required|email|unique:members',
            'name' => 'required',
            'password' => 'required',
            'privacy_and_policy' => 'required'
        ]);

        $member = new Member;
        $member->nama = $request->name;
        $member->username = $request->username;
        $member->email = $request->email;
        $member->password = password_hash($request->password, PASSWORD_DEFAULT);
        $member->status_akun = 'Nonactive';
        $member->status_pkl = 'Belum PKL';
        $member->role = 'siswa';
        $member->save();
        if($member){
        	return back()->with('success', 'Data register succesfully');
        }
    }
    public function loginpkl(Request $request){
    	$validated = $request->validate([
    		'email' => 'required|email',
    		'password' => 'required'
    	]);

    	$cekemail = Member::where('email', $request->email)->first();
    	if(!$cekemail){
    		return back()->with('error', 'Email not found');
    	} else {
    		if(!password_verify($request->password, $cekemail->password)){
    			return back()->with('error', 'Email or password is wrong');
    		} else {
    			if($cekemail->status_akun == 'Nonactive'){
    				return back()->with('error', 'Your account has not activated, please contact your teacher');
    			} else {
    				$request->session()->put('loginId', $cekemail->id_member);
                	$request->session()->put('role', $cekemail->role);

                	if($cekemail->role == 'siswa'){
                		return redirect('/siswa-pkl');
                	}
    			}
    		}
    	}
    }
    public function loginadmin(Request $request){
        $cekusername = Admin::where('username', $request->username)->first();
        if(!$cekusername){
            return back()->with('error', 'username not found');
        } else {
            if(!password_verify($request->password, $cekusername->password)){
                return back()->with('error', 'username or password is wrong');
            } else {
                $request->session()->put('idadmin', $cekusername->id_admin);

                return redirect('/admin/dashboard');
            }
        }
    }
    public function loginpembimbing(Request $request){
        $ceknip = Guru::where('nip_guru', $request->nip)->first();
        if(!$ceknip){
            return back()->with('error', 'nip not found');
        } else {
            if(!password_verify($request->password, $ceknip->password)){
                return back()->with('error', 'nip or password is wrong');
            } else {
                $request->session()->put('idpembimbing', $ceknip->id_guru);

                return redirect('/pembimbing/dashboard');
            }
        }
    }
    public function loginpembimbingindustri(Request $request){
        $cekusername = Pembimbing::where('username', $request->username)->first();
        if(!$cekusername){
            return back()->with('error', 'username not found');
        } else {
            if(!password_verify($request->password, $cekusername->password)){
                return back()->with('error', 'username or password is wrong');
            } else {
                $request->session()->put('idpembimbingindustri', $cekusername->id_pembimbing);

                return redirect('/pembimbing-industri-pkl/dashboard');
            }
        }
    }
    public function logout(){
        if(Session::has('loginId') && Session::has('role')){
            Session::pull('loginId');
            Session::pull('role');
            return redirect('/akademik?filter=login-pkl')->with('success', 'Logout success');
        }
    }
    public function logoutadmin(){
        if(Session::has('idadmin')){
            Session::pull('idadmin');
            return redirect('/');
        }
    }
    public function logoutpembimbing(){
        if(Session::has('idpembimbing')){
            Session::pull('idpembimbing');
            return redirect('/');
        }
    }
    public function logoutpembimbingindustri(){
        if(Session::has('idpembimbingindustri')){
            Session::pull('idpembimbingindustri');
            return redirect('/');
        }
    }
}

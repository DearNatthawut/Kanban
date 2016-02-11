<?php

namespace App\Http\Controllers\Login;

use App\User;
use \Auth;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;
use \Input;
class LoginController extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @return Response
     */
    public function postLogin()
    {
       Auth::logout();

            $uname =  Input::get('username');
            $upass =  Input::get('password');
            $server = "dcup-01.up.local";
            //dc1-nu
            $user = $uname . "@up.local";
            // connect to active directory
            $ad = ldap_connect($server);
            if (!$ad) {
                die("Connect not connect to " . $server);
                $return['msg'] = "ไม่สามารถติดต่อ server มหาลัยเพื่อตรวจสอบรหัสผ่านได้";
            } else {

                $b = @ldap_bind($ad, $user, $upass);
                if (!$b) {
                    $return['msg'] = "ไม่สามารถเข้าสู่ระบบได้ กรุณาตรวจสอบอีกครั้ง !!";
                    $return['status'] = FALSE;
                    //$return['records'] = "";
                    echo "ไม่สามารถเข้าสู่ระบบได้ กรุณาตรวจสอบข้อมูลอีกครั้ง !!";
                } else {
                            echo "ยินดีต้อนรับ";
                    return redirect('/index');
                }
        }


/*
        Auth::logout();

        $email = Input::get('email');
        $password = Input::get('password');

        if (Str::contains($email,'@')) {

            if (Auth::attempt(['email' => $email, 'password' => $password])) {
                $user = Auth::user();
                $user->roles;
                return $user;
            } else {
                return \Response::json([
                    "error" => "E-mail or Password is invalid"
                ], 500);
            }
        } else {
            $username = $email;
            $password = $password;

            $server = "dcup-01.up.local";
            //dc1-nu
            $userlocal = $username . "@up.local";

            // connect to active directory
            $ad = ldap_connect($server);
            if (!$ad) {
                return \Response::json([
                    "error" => "ไม่สามารถติดต่อ server มหาลัยเพื่อตรวจสอบรหัสผ่านได้"
                ], 500);
            } else {

                $b = @ldap_bind($ad, $userlocal, $password);
                if (!$b) {
                    return \Response::json([
                        "error" => "ไม่สามารถเข้าสู่ระบบได้ กรุณาตรวจสอบอีกครั้ง"
                    ], 500);

                } else {
                    //ldap ok
                    /*$useremail = $username."@up.ac.th";
                    $user = User::with('roles')->where('email','=',$useremail)->first();
                    if($user){
                        Auth::login($user);
                    }else {
                        $user = $this->userService->createUserFromSoap($username,$password);
                        Auth::login($user);
                    }
                    echo "wtwtwtwtwt";
                }
            }
        }





*/






    }
}
?>
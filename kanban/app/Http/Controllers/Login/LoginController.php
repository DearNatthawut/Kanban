<?php

namespace App\Http\Controllers\Login;

use \Auth;
use Illuminate\Routing\Controller;
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
    }
}
?>
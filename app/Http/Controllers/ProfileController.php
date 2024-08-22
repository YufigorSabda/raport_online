<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\LogActivities;
use DB;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{

    public function index()
    {
        $profile = User::find(Auth()->user()->id);
        if ($profile) {
            return view('backend/profile/index', compact('profile'));
        } else {
            Abort('404');
        }
    }

    private function cekExist($column, $var, $id)
    {
        $cek = User::where('id', '!=', $id)->where($column, '=', $var)->first();
        return (!empty($cek) ? false : true);
    }

    public function save(Request $req)
    {
        try {
            DB::beginTransaction();
            $dir            = 'files/staff/';
            $photo          = $req->file;
            $cek_nik        = $this->cekExist('nik', $req->nik, $req->user()->id);
            $cek_email      = $this->cekExist('email', $req->email, $req->user()->id);
            $cek_phone      = $this->cekExist('no_telp', $req->phone, $req->user()->id);

            if (!$cek_nik) {
                $json_data = array(
                    "success"         => false,
                    "message"         => '' . __('menu_wording.validation.nik_exist') . ''
                );
            } elseif (!$cek_email) {
                $json_data = array(
                    "success"         => false,
                    "message"         => '' . __('menu_wording.validation.email_exist') . ''
                );
            } elseif (!$cek_phone) {
                $json_data = array(
                    "success"         => false,
                    "message"         => '' . __('menu_wording.validation.phone_exist') . ''
                );
            } else {
                $user = User::find($req->user()->id);
                $user->nik              = $req->nik;
                $user->name             = $req->name;
                $user->gender           = $req->gender;
                $user->email            = $req->email;
                $user->no_telp          = $req->phone;
                $user->address          = $req->address;
                $user->save();
                if ($user) {
                    $saveImageUser = User::find($req->user()->id);
                    if ($photo != 'undefined') {
                        if (!file_exists($dir)) {
                            mkdir($dir, 0777, true);
                            chmod($dir, 0777);
                        }
                        $image_name = 'staff_' . time() . '.png';
                        $path       = $dir . $image_name;
                        $photo->move($dir, $path);
                        chmod($path, 0664);
                        if ($saveImageUser->photo != 'files/staff/no_img.png') {
                            $db_path = $saveImageUser->photo;
                            if (file_exists($db_path)) {
                                unlink($db_path);
                            }
                        }
                        $saveImageUser->photo          = $path;
                    }
                    $saveImageUser->save();

                    if (!$saveImageUser->wasRecentlyCreated) {
                        $changes = $user->getChanges();
                        app('App\Http\Controllers\LogActivitiesController')->createLog(
                            LogActivities::PROFILE,
                            $user->nik,
                            $req->user()->id,
                            'update',
                            $user->name . ' ' . __('menu_wording.log.profile_edit'),
                            json_encode($saveImageUser),
                            json_encode($changes),
                            $req->user()->email
                        );
                    }
                    DB::commit();
                    $json_data = array(
                        "success"         => true,
                        "message"         => '' . __('menu_wording.alert.edit_ok') . ''
                    );
                } else {
                    $json_data = array(
                        "success"         => false,
                        "message"         => '' . __('menu_wording.alert.edit_no') . ''
                    );
                }
            }
        } catch (\Throwable $th) {
            DB::rollback();
            $json_data = array(
                "success"         => false,
                "message"         => $th->getMessage()
            );
        }
        return json_encode($json_data);
    }

    public function password()
    {
        return view('backend/profile/newpassword');
    }

    public function saveNewPassword(Request $req)
    {
        try {
            DB::beginTransaction();
            $profil = User::find($req->user()->id);
            if (Hash::check($req->password_old, $profil->password)) {
                $profil->password   = bcrypt($req->password_new);
                $profil->save();
                if ($profil) {
                    if (!$profil->wasRecentlyCreated) {
                        $changes = $profil->getChanges();
                        app('App\Http\Controllers\LogActivitiesController')->createLog(
                            LogActivities::PROFILE,
                            $profil->nik,
                            $req->user()->id,
                            'update password',
                            $profil->name . ' ' . __('menu_wording.log.change_password'),
                            json_encode($profil),
                            json_encode($changes),
                            $req->user()->email
                        );
                    }
                    DB::commit();
                    $json_data = array(
                        "success"         => true,
                        "message"         => '' . __('menu_wording.alert.password_ok') . ''
                    );
                } else {
                    $json_data = array(
                        "success"         => false,
                        "message"         => '' . __('menu_wording.alert.password_no') . ''
                    );
                }
            } else {
                $json_data = array(
                    "success"         => false,
                    "message"         => '' . __('menu_wording.alert.password_old_no') . ''
                );
            }
        } catch (\Throwable $th) {
            DB::rollback();
            $json_data = array(
                "success"         => false,
                "message"         => $th->getMessage()
            );
        }
        return json_encode($json_data);
    }
}

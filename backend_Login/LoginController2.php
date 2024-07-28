<?php

use \Jacwright\RestServer\RestException;

require_once 'koneksi.php';
require '_encryption.php';

class RegistController
{
    /**
     * Logs in a user with the given username and password POSTed. Though true
     * REST doesn't believe in sessions, it is often desirable for an AJAX server.
     *
     * @url POST /register
     */
    public function register()
    {
        $con = new Connection;
        $fullname = trim($_POST['nama_lengkap']);
        $username = trim($_POST['username']);
        $password = $_POST['password'];
        $enkripsi = md5($password);

        if ($fullname) {
            if ($username) {
                if ($password) {
                    $select_user = "SELECT * FROM `register` WHERE `user` = '$username'";
                    $res_user = $con->query($select_user);
                    $cek_user = mysqli_num_rows($res_user);
                    if ($cek_user == 0) {
                        $InsertNewUser = "INSERT into `register`(`nama_lengkap`,`user`,`pass`) VALUES ('$fullname','$username','$enkripsi')";
                        $res_insert = $con->query($InsertNewUser);
                        if ($res_insert) {
                            $sts = true;
                            $msg = "Pendaftaran Berhasil";
                        } else {
                            $sts = false;
                            $msg = "Pendaftaran Gagal";
                        }
                    } else {
                        $sts = false;
                        $msg = "Username Sudah Terdaftar";
                    }
                } else {
                    $sts = false;
                    $msg = "Password Tidak Boleh Kosong";
                }
            } else {
                $sts = false;
                $msg = "Username Tidak Boleh Kosong";
            }
        } else {
            $sts = false;
            $msg = "Nama Lengkap Tidak Boleh Kosong";
        }
        $arr = array(
            "status" => $sts,
            "message" => $msg,
        );
        return $arr;
    }
    /**
     * Logs in a user with the given username and password POSTed. Though true
     * REST doesn't believe in sessions, it is often desirable for an AJAX server.
     *
     * @url POST /login
     */
    public function login()
    {
        $con = new Connection;
        $username = trim($_POST['username']);
        $password = $_POST['password'];
        $enkripsi = md5($password);

        if ($username) {

            if ($password) {
                $cek="SELECT * FROM `register` WHERE `user`='{$username}' AND `pass`='{$enkripsi}'";
                $res_user = $con->query($cek);
                $cek_user = mysqli_num_rows($res_user);
                if($cek_user>0){
                    $sts = true;
                    $msg = "Berhasil login";
                }
                else{
                    $sts = false;
                $msg = "Username tidak terdaftar / Password tidak sesuai";
                }
            } 
            else {
                $sts = false;
                $msg = "Password harus diisi";
            }
        } else {
            $sts = false;
            $msg = "Username harus diisi";
        }

        $arr = array(
            "status" => $sts,
            "message" => $msg,
        );
        return $arr;
    }
}
     /**
     * Logs in a user with the given username and password POSTed. Though true
     * REST doesn't believe in sessions, it is often desirable for an AJAX server.
     *
     * @url POST /take_data
     */
 //public function take_data()
    {
        $con = new Connection;
        //$username = trim($_POST['username']);
        //$password = $_POST['password'];
        //$enkripsi = md5($password);
        $take_data ="SELECT * FROM `news` WHERE `id`= '1'";
        return $take_data;
    }
<?php

use \Jacwright\RestServer\RestException;

require_once 'koneksi.php';

class addnewsController
{
    /**
     * Logs in a user with the given username and password POSTed. Though true
     * REST doesn't believe in sessions, it is often desirable for an AJAX server.
     *
     * @url POST /submit
     */
    public function submit()
    {
        $con = new Connection;
        $nama_penulis = trim($_POST['nama_penulis']);
        $tanggal = trim($_POST['tanggal']);
        $headline = trim($_POST['headline']);
        $gambar = trim($_POST['gambar']);
        $isi_berita = trim($_POST['isi_berita']);

        if ($nama_penulis) {
            if ($tanggal) {
                if ($headline) {
                    if ($gambar) {

                        if ($isi_berita) {
                            $InsertNewUser = "INSERT INTO `news`(`gambar`, `headline`, `tanggal`, `nama_penulis`, `isi_berita`) VALUES ('$gambar','$headline','$tanggal','$nama_penulis','$isi_berita')";
                            $res_insert = $con->query($InsertNewUser);
                            //var_dump($InsertNewUser);
                            if ($res_insert) {
                                $sts = true;
                                $msg = "Berhasil";
                            } else {
                                $sts = false;
                                $msg = "Failed to submit news";
                            }
                        } else {
                            $sts = false;
                            $msg = "News must be filled";
                        }
                    } else {
                        $sts = false;
                        $msg = "Picture must be filled";
                    }
                } else {
                    $sts = false;
                    $msg = "Headline must be filled";
                }
            } else {
                $sts = false;
                $msg = "Date must be filled";
            }
        } else {
            $sts = false;
            $msg = "Name must be filled";
        }
        $arr = array(
            "status" => $sts,
            "message" => $msg,
        );
        return $arr;
    }
}

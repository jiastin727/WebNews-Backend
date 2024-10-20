<?php

use \Jacwright\RestServer\RestException;

require_once 'koneksi.php';

class accsetController
{
    /**
     * Logs in a user with the given username and password POSTed. Though true
     * REST doesn't believe in sessions, it is often desirable for an AJAX server.
     *
     * @url POST /submitprofile
     */
    public function submitprofile()
    {
        $con = new Connection;
        $first_name = trim($_POST['first_name']);
        $last_name = trim($_POST['last_name']);
        $birth_date = trim($_POST['birth_date']);
        $place_of_birth = trim($_POST['place_of_birth']);
        $address = trim($_POST['address']);
        $gender = trim($_POST['gender']);
        $phone_number = trim($_POST['phone_number']);
        $email = ($_POST['email']);
        $id=

        if ($first_name) {
            if ($last_name) {
                if ($birth_date) {
                    if ($place_of_birth) {
                        if ($address) {
                            if ($gender) {
                                if ($phone_number) {
                                    if ($email) {
                                        
                                        $InsertNewUser = "INSERT INTO `profile`(`id_register`,`first_name`, `last_name`, `birth_date`, `place_of_birth`, `address`, `gender`, `phone_number`, `email`) VALUES ('$id','$first_name','$last_name','$birth_date','$place_of_birth','$address','$gender','$phone_number','$email')";
                                        $res_insert = $con->query($InsertNewUser);
                                        //var_dump($InsertNewUser);
                                        if ($res_insert) {
                                            $sts = true;
                                            $msg = "Berhasil";
                                        } else {
                                            $sts = false;
                                            $msg = "Failed to register";
                                        }
                                    } else {
                                        $sts = false;
                                        $msg = "Email cant be empty";
                                    }
                                } else {
                                    $sts = false;
                                    $msg = "Phone number must be filled";
                                }
                            } else {
                                $sts = false;
                                $msg = "You have to choose a gender";
                            }
                        } else {
                            $sts = false;
                            $msg = "Address must be filled";
                        }
                    } else {
                        $sts = false;
                        $msg = "Place of birth must be filled";
                    }
                } else {
                    $sts = false;
                    $msg = "Birth date must be filled";
                }
            } else {
                $sts = false;
                $msg = "Last name must be filled";
            }
        } else {
            $sts = false;
            $msg = "First name must be filled";
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
* @url POST /login
*/


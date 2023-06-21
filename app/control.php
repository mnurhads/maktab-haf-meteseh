<?php
date_default_timezone_set("Asia/Jakarta");
/**
 * The font metrics class
 *
 * Global function system app booking
 * 
 * powered by Muhammad Nur Hadi
 * 
 **/
/** GLOBAL FUNCTION **/
require_once 'config.php';
require_once 'security.php';

class model extends Security {
    function get_app() {
        $nameApp = "Info Maktab HAF Meteseh";
        
        return $nameApp;
    }
 
    function get_version_app() {
       $ver = "Version 1.0";
 
       return $ver;
    }

    function baseUrl() {
        $base = "http://localhost/maktab-haf";

        return $base;
    }

    function TanggalIndo($date){
        $BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
    
        $tahun = substr($date, 0, 4);
        $bulan = substr($date, 5, 2);
        $tgl   = substr($date, 8, 2);
    
        $result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;		
        return($result);
    } 

    function BulanIndo($x) {
         if ($x == '01' ) {
             $bulan = "Januari"; }
        elseif ($x == '02') {
             $bulan = "Februari"; }
        elseif ($x == '03') {
             $bulan = "Maret"; }
        elseif ($x == '04') {
             $bulan = "April"; }
        elseif ($x == '05') {
             $bulan = "Mei"; }
        elseif ($x == '06') {
             $bulan = "Juni"; }
        elseif ($x == '07') {
             $bulan = "Juli"; }
        elseif ($x == '08') {
             $bulan = "Agustus"; }
        elseif ($x == '09') {
             $bulan = "September"; }
        elseif ($x == '10') {
             $bulan = "Oktober"; }
        elseif ($x == '11') {
             $bulan = "November"; }
        elseif ($x == '12') {
             $bulan = "Desember"; }

        return $bulan;

    }

    function get_token($panjang){
        $token = array(
         range(1,50),
         range('a','z'),
         range('A','Z'),
        );
      
        $karakter = array();
        foreach($token as $key =>$val){
         foreach($val as $k =>$v){
          $karakter[] = $v;
         }
        }
      
        $token = null;
        for($i=1; $i<=$panjang; $i++){
         // mengambil array secara acak
         $token .= $karakter[rand($i, count($karakter) - 3)];
        }
      
         return $token;
       }

    function loginWeb($login) {
        $mail    = $this->clean_post($logIn["username"]);
        $pass    = $this->clean_post(md5($logIn["password"]));
        $ip      = $_SERVER['REMOTE_ADDR'];
        $browser = $_SERVER['HTTP_USER_AGENT'];
        $dateNow = date("Y-m-d H:i:s");
        $token   = $this->get_token(50);

        $query = $this->query("SELECT * FROM users WHERE username = '$mail' AND password = '$pass'");

       if(mysqli_num_rows($query) > 0) {
            $users  = $query->fetch_assoc();
            $userId = $users["id"];
            $nama   = $users["username"];

            $query = $this->query("UPDATE users SET login_token = '$token', login_time = '$dateNow', ip_position = '$ip', default_browser = '$browser' WHERE username = '$mail'");
                
            $_SESSION["user_id"]          = $users["id"];
            $_SESSION["username"]  		  = $users["username"];
            $_SESSION["fullname"]         = $users["fullname"];
            $_SESSION["email"]		      = $users["email"];
            $_SESSION["status"]		      = $users["status"];

            if($users["status"] === "AKTIF") {
                if($users["level"] === "ADMIN") {
                    echo "<script>alert('Selamat datang,anda login sebagai Administrator') 
                    location.replace('../admin/home')</script>";
                } else {
                     echo '<div class="alert alert-danger alert-dismissible">
                    <a type="button" class="close text-white" data-dismiss="alert" aria-hidden="true"><span class="mdi mdi-cancel"></span></a>
                    <h4><i class="icon fa fa-ban"></i> Warning!</h4>
                    Mohon maaf, anda tidak memiliki akses disini.
                  </div>';
                }
            } else {
                echo '<div class="alert alert-danger alert-dismissible">
                    <a type="button" class="close text-white" data-dismiss="alert" aria-hidden="true"><span class="mdi mdi-cancel"></span></a>
                    <h4><i class="icon fa fa-ban"></i> Warning!</h4>
                    Mohon maaf, akun anda telah dinonaktifkan,hubungi admin untuk info lebih lanjut.
                  </div>';
            }
       } else {
            echo '<div class="alert alert-danger alert-dismissible">
                    <a type="button" class="close text-white" data-dismiss="alert" aria-hidden="true"><span class="mdi mdi-cancel"></span></a>
                    <h4><i class="icon fa fa-ban"></i> Warning!</h4>
                    Periksa kembali data login anda.
                  </div>';
       }
    }

    function logoutWeb() {
        session_start(); 
        $dateOut = date("Y-m-d H:i:s"); 
        $name = $_SESSION["username"];
        $logout = $this->query("UPDATE users SET logout_waktu = '$dateOut' WHERE username = '$name'"); 
        session_destroy(); 
        setcookie('notifLogin','Berhasil Logout',time() + 10); 
        if($logout) {
            echo "<script>alert('Anda berhasil logout ".$name."') 
            location.replace('../auth')</script>";
        }
    }

    function getCoo() {
        $rows = array();
        $query = $this->query("SELECT sec.sektor, co.nama, co.no_telp, co.created_at FROM koordinators AS co INNER JOIN sektors AS sec ON co.sektor_id = sec.id ORDER BY co.created_at DESC");
        while($row = $query->fetch_assoc()) {
            $rows[] = $row;
        }

        return $rows;
    }

    function insertCoo($coo) {
        $name       = $this->clean_post($coo['name']);
        $notelp     = $this->clean_post($coo['notelp']);
        $sektorId   = $this->clean_all($coo['sektorId']);

        $query = $this->query("INSERT INTO koordinators (nama, no_telp, sektor_id) VALUES ('$name','$notelp', '$sektorId')");

        if($query) {
            echo "<script>alert('Korrdinator berhadil ditambahkan') 
                        location.replace('../co')</script>";
        } else {
            echo '<div class="alert alert-danger alert-dismissible">
                    <a type="button" class="close text-white" data-dismiss="alert" aria-hidden="true"><span class="mdi mdi-cancel"></span></a>
                    <h4><i class="icon fa fa-ban"></i> Warning!</h4>
                    Koordinator gagal di tambahkan
                  </div>';
        }   
    }

    function updateCoo($upCoo) {
        $id        = $this->clean_all($upCoo['id']);
        $name      = $this->clean_post($upCoo['name']);
        $notelp    = $this->clean_post($upCoo['notelp']);
        $sektorId  = $this->clean_all($upCoo['sektorId']);

        $query     = $this->query("UPDATE koordinators SET nama = '$name', no_telp = '$notelp', sektor_id = '$sektorId' WHERE id = '$id'");

        if($query) {
            echo "<script>alert('Koordinator Berhasil Diperbarui') 
                        location.replace('../sektor/')</script>";
        } else {
            echo '<div class="alert alert-danger alert-dismissible">
                    <a type="button" class="close text-white" data-dismiss="alert" aria-hidden="true"><span class="mdi mdi-cancel"></span></a>
                    <h4><i class="icon fa fa-ban"></i> Warning!</h4>
                    Koordinator gagal di perbarui
                  </div>';
        } 
    }

    function deleteCoo($id) {
        $query = $this->query("DELETE FROM koordinators WHERE id = '$id'");
        if($query) {
            echo "<script>alert('Koordinator berhadil dihapus') 
                        location.replace('../co/')</script>";
        } else {
            echo '<div class="alert alert-danger alert-dismissible">
                    <a type="button" class="close text-white" data-dismiss="alert" aria-hidden="true"><span class="mdi mdi-cancel"></span></a>
                    <h4><i class="icon fa fa-ban"></i> Warning!</h4>
                    Koordinator gagal dihapus
                  </div>';
        }
    }

    function getSektor() {
        $rows = array();
        $query = $this->query("SELECT * FROM sektors ORDER BY created_at DESC");
        while($row = $query->fetch_assoc()) {
            $rows[] = $row;
        }

        return $rows;
    }

    function insertSektor($sektor) {
        $sektor = $this->clean_post($sektor['sektor']);

        $query = $this->query("INSERT INTO sektors (sektor) VALUES ('$sektor')");

        if($query) {
            echo "<script>alert('Sektor Berhasil Ditambahkan') 
                        location.replace('../sektor/')</script>";
        } else {
            echo '<div class="alert alert-danger alert-dismissible">
                    <a type="button" class="close text-white" data-dismiss="alert" aria-hidden="true"><span class="mdi mdi-cancel"></span></a>
                    <h4><i class="icon fa fa-ban"></i> Warning!</h4>
                    Sektor gagal di tambahkan
                  </div>';
        }   
    }

    function updateSektor($upSektor) {
        $id     = $this->clean_all($upSektor['id']);
        $sektor = $this->clean_post($upSektor['sektor']);

        $query  = $this->query("UPDATE sektors SET sektor = '$sektor' WHERE id = '$id'");

        if($query) {
            echo "<script>alert('Sektor berhasil diperbarui') 
                        location.replace('../sektor/')</script>";
        } else {
            echo '<div class="alert alert-danger alert-dismissible">
                    <a type="button" class="close text-white" data-dismiss="alert" aria-hidden="true"><span class="mdi mdi-cancel"></span></a>
                    <h4><i class="icon fa fa-ban"></i> Warning!</h4>
                    Sektor gagal di perbarui
                  </div>';
        } 
    }

    function deleteSektor($id) {
        $query = $this->query("DELETE FROM sektors WHERE id = '$id'");
        if($query) {
            echo "<script>alert('Sektor berhadil dihapus') 
                        location.replace('../sektor/')</script>";
        } else {
            echo '<div class="alert alert-danger alert-dismissible">
                    <a type="button" class="close text-white" data-dismiss="alert" aria-hidden="true"><span class="mdi mdi-cancel"></span></a>
                    <h4><i class="icon fa fa-ban"></i> Warning!</h4>
                    Koordinator gagal dihapus
                  </div>';
        }
    }

    function getMaktab() {
        $rows = array();
        $query = $this->query("SELECT * FROM maktabs AS mak INNER JOIN sektors AS sek ON mak.sektor_id = sek.id INNER JOIN koordinators AS co ON mak.koordinator_id = co.id ORDER BY mak.created_at DESC");
        while($row = $query->fetch_assoc()) {
            $rows[] = $row;
        }

        return $rows;
    }

    function insertMaktab($maktab) {
        $asal       = $this->clean_post($maktab['asal']);
        $kota       = $this->clean_post($maktab['kota']);
        $sektorId   = $this->clean_all($maktab['sektorId']);
        $coId       = $this->clean_all($maktab['coId']);
        $tuan       = $this->clean_post($maktab['tuanrumah']);
        $kontak     = $this->clean_post($maktab['kontak']);
        $alamat     = $this->clean_post($maktab['alamat']);

        $query  = $this->query("INSERT INTO maktabs (asal_rombongan, kota, sektor_id, koordinator_id, tuan_rumah, kontak_rumah, alamat_maktab) VALUES ('$asal', '$kota', '$sektorId', '$coId', '$tuan', '$kontak', '$alamat')");

        if($query) {
            echo "<script>alert('Maktab Berhasil Ditambahkan') 
                        location.replace('../sektor/')</script>";
        } else {
            echo '<div class="alert alert-danger alert-dismissible">
                    <a type="button" class="close text-white" data-dismiss="alert" aria-hidden="true"><span class="mdi mdi-cancel"></span></a>
                    <h4><i class="icon fa fa-ban"></i> Warning!</h4>
                    Maktab gagal di tambahkan
                  </div>';
        } 
    }

    function updateMaktab($upMaktab) {
        $id      = $this->clean_all($upMaktab['id']);
        $asal    = $this->clean_post($upMaktab['asal']);
        $kota    = $this->clean_post($upMaktab['kota']);
        $sektorId= $this->clean_all($upMaktab['sektorId']);
        $coId    = $this->clean_all($upMaktab['coId']);
        $tuan    = $this->clean_post($upMaktab['tuan']);
        $kontak  = $this->clean_post($upMaktab['kontak']);
        $alamat  = $this->clean_post($upMaktab['alamat']);

        $query   = $this->query("UPDATE maktabs SET asal_rombongan = '$asal', kota = '$kota', sektor_id = '$sektorId', koordinator_id = '$coId', tuan_rumah = '$tuan', kontak_rumah = '$kontak', alamat_rumah = '$alamat' WHERE id = '$id'");

        if($query) {
            echo "<script>alert('maktab Berhasil Diperbarui') 
                        location.replace('../maktab/')</script>";
        } else {
            echo '<div class="alert alert-danger alert-dismissible">
                    <a type="button" class="close text-white" data-dismiss="alert" aria-hidden="true"><span class="mdi mdi-cancel"></span></a>
                    <h4><i class="icon fa fa-ban"></i> Warning!</h4>
                    Maktab gagal di perbarui
                  </div>';
        } 
    }

    function deleteMaktab($id) {
        $query = $this->query("DELETE FROM maktabs WHERE id = '$id'");

        if($query) {
            echo "<script>alert('Maktab berhadil dihapus') 
                        location.replace('../sektor/')</script>";
        } else {
            echo '<div class="alert alert-danger alert-dismissible">
                    <a type="button" class="close text-white" data-dismiss="alert" aria-hidden="true"><span class="mdi mdi-cancel"></span></a>
                    <h4><i class="icon fa fa-ban"></i> Warning!</h4>
                    Maktab gagal dihapus
                  </div>';
        }
    }
}
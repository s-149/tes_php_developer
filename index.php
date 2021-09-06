<?php 

// tidak menampilkan error yg terjadi pada sistem 
error_reporting(0);

// memanggil fungsi rupiah
include "rupiah.php";

// memanggil koneksi ke database
include "koneksi.php";

// memanggil script kepala
include "kepala.php";
 
// memulai sesion
session_start();
    
// mendefinisikan login user
if (empty($_SESSION['username']) AND empty($_SESSION['password']))
    {    

      // menampilkan konten bagi user yang belum login    
      $page = $_GET['page'];
      $aksi = $_GET['aksi'];

        if ($page=="") 
            {
              include "page/login/index.php";
            }

        else 
            {
              if ($aksi=="") 
                  {
                    include "page/".$page."/index.php";
                  }

              else 
                  {
                    include "page/".$page."/".$aksi.".php";
                  }
            }

    }
else 
    {
      // mendefinisikan Username
      $UserName=$_SESSION['username'];

      // memanggil variabel
      include "variabel.php";

      // memanggil header
      include "header.php";

      // menampilkan konten bagi user yang sudah login        
      $page = $_GET['page'];
      $aksi = $_GET['aksi'];

        if ($page=="") 
            {
              include "page/member/index.php";
            }

        else 
            {
              if ($aksi=="") 
                  {
                    include "page/".$page."/index.php";
                  }

              else 
                  {
                    include "page/".$page."/".$aksi.".php";
                  }
            }

    }

// memanggil script kaki
include "kaki.php";

?>

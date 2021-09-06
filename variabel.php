<?php
    
    
    // memanggil koneksi ke database
    include "koneksi.php";

    $Tahun=date('Y');
    $Bulan=date('m');
    $Tanggal=date('d');
    $Jam=date('h');
    $Menit=date('i');
    $Detik=date('s');
    $Waktu=date('d_M_Y_h_i_s');

    // mendefinisikan validasi waktu
    //$Time1=date('d-F-Y-h:i:s');
    $Time1=date('Y-m-d-h:i:s');
    $Time2=date('Y-m-d-h:i:s', strtotime('+8 hours', time()));
    $Time3=str_replace("-", "", $Time1);
    $Time4=str_replace(":", "", $Time3);
    $Time5=str_replace(" ", "", $Time4);

    // memanggil data login tiap user
      $akun=mysqli_fetch_array(mysqli_query($koneksi,"select * from `user` where `Email` ='$UserName'"));
      $_Id_User=$akun['Id_User'];
      $Email=$akun['Email'];
      $Name=$akun['Name'];

    // memanggil data saldo tiap user
      $up=mysqli_query($koneksi,"select * from `saldo_top_up` where `Email` ='$UserName'");
      $topup=mysqli_fetch_array(mysqli_query($koneksi,"select * from `saldo_top_up` where `Email` ='$UserName'"));
      if(mysqli_num_rows($up) == 1)
          {
            $nomor=$topup['Mobile_Number'];
            $saldo=$topup['Value'];
            $input="<input class='form-control' type='number' name='Mobile_Number' value='".$nomor."' placeholder='Mobile Number' required autofocus readonly>";
            $input1="<input class='form-control' type='hidden' name='SaldoAwal' value='".$saldo."' required autofocus readonly>";
            $input2="<input class='form-control' type='hidden' name='valid' value='1' required autofocus readonly>";
          }
      else
          {
            $nomor=$topup['Mobile_Number'];
            $saldo=$topup['Value'];
            $input="<input class='form-control' type='number' name='Mobile_Number' placeholder='Mobile Number' required autofocus>";
            $input1="<input class='form-control' type='hidden' name='SaldoAwal' value='0' required autofocus readonly>";
            $input2="<input class='form-control' type='hidden' name='valid' value='0' required autofocus readonly>";
          }

      
      // mendefinisikan data product
      $product=mysqli_query($koneksi,"select * from `product` ");


      // mendefinisikan data unpaid order
      $unpaid=0;
      $Harga=0;
      $query=mysqli_query($koneksi,"select * from `product_page` where `Email` ='$UserName' and  `Verifikasi`='Pay' ");
      while($data=mysqli_fetch_array($query))
          {
            $unpaid++;
            $Harga+=$data['Total_Harga'];
          }

      // mendefinisikan jumlah unpaid order
      if ($unpaid !=0) 
          {
            $Unpaid_order="<br><a href='index.php?page=member&aksi=order_history&verif=Pay'><font color='red'> ".$unpaid." </font></a>Unpaid order, <a href='index.php?page=member&aksi=order_history&verif=0'>History</a>";
            $padding='15px';
          }
      else
          {
            $Unpaid_order="<br><a href='index.php?page=member&aksi=order_history&verif=0'>Order history</a>";
          }

      
      // memanggil data produk page
      $history=mysqli_fetch_array(mysqli_query($koneksi,"select * from `product_page` where `Email` ='$UserName' and `Token`='0'"));
      $_Id_Product_Page=$history['Id_Product_Page'];

      // membuat no order 10 digit
      $_Order_no=substr($_Id_User.($_Id_Product_Page+1).$Menit.$Detik.$Jam.$Tanggal, 0, 10);

      // membuat token
      $Token1=$_Id_User.$_Id_Product_Page.$Detik.$Menit.$Jam;

      // menghitung digit token
      $Token2=strlen($Token1);

      // menambah jumlah digit token jika digit token kurang dari 8 digit
      $Token3=$Token1.'1';

      // menampilkan sebagian token atau mengurangi jumlah digit token jika jumlah digit token lebih dari 8 digit
      $Token4=substr($Token1, 0, 8);

      // mendefinisikan jumlah digit token
      if ($Token2==8) 
            {
                $Token=$Token1;
            }
      elseif ($Token2==7) 
            {
                $Token=$Token3;
            }
      else 
            {
                $Token=$Token4;
            }


      // mendefinisikan data history
      $_history=0;
      $query=mysqli_query($koneksi,"select * from `order_history` where `Email` ='$UserName' and `Token`='0' ");
      while(mysqli_fetch_array($query))
          {
            $_history++;
          }

      // mendefinisikan jumlah _history order
      if ($_history !=0) 
          {
            $_history_order=$_Id_Product_Page;
          }
      else
          {
            $_history_order="";
          }

      // Verifikasi=Pay now, Failed, Shiping kode, Succes, Canceled

      
?> 
                        <div class="card-body">
                            <div class="card-title">
                                <h1><strong>Pay your order</strong></h1><br>
                            </div>
                            <div class="login-form">
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="No_Order" value="<?=$_GET['order']?>" readonly required autofocus>
                                        <input class="form-control" type="hidden" name="harga" value="<?=$_GET['harga']?>" readonly required autofocus>
                                        <input class="form-control" type="hidden" name="saldo" value="<?=$saldo?>" placeholder="Order no" readonly required autofocus>
                                        <input class="form-control" type="hidden" name="akhir" value="<?=$_GET['akhir']?>" readonly required autofocus>
                                        <input class="form-control" type="hidden" name="awal" value="<?=$Time5?>" readonly required autofocus>
                                        <input class="form-control" type="hidden" name="email" value="<?=$Email?>" readonly required autofocus>
                                    </div>
                                    <div class="form-group" style="padding-top: 200px;">
                                        <button class="form-control btn btn-primary" type="submit" name="proses">Pay now</button>
                                    </div>
                                    <div class="form-group">
                                        <button class="form-control btn btn-warning" type="submit" name="cancel">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    
<?php
                
    if(isset($_POST['proses']))
        {
            $email=$_POST['email'];
            $No_Order=$_POST['No_Order'];
            $harga=$_POST['harga'];
            $SaldoAwal=$_POST['saldo'];
            $awal=$_POST['awal'];
            $akhir=$_POST['akhir'];

            // menjumlahkan saldo
            $SaldoAkhir=$SaldoAwal-$harga;

            if ($awal >= $akhir)
                {
                    $query2 = mysqli_query($koneksi, "UPDATE `product_page` SET `Verifikasi`='Failed' WHERE `product_page`.`Order_No`='$No_Order' ");

                            print '
                                    <script type="text/javascript">
                            
                                        alert ("Upzz,proses gagal karna waktu pembayaran telah habis.");
                                        window.location.href="index.php";

                                    </script>
                            ';
                }
            else 
                {

                    if ($SaldoAkhir <=0 ) 
                        {
                            print '
                                    <script type="text/javascript">
                            
                                        alert ("Upzz, saldo anda kurang.");
                                        window.location.href="index.php";

                                    </script>
                            ';
                        }
                    else
                        {
                            $query = mysqli_query($koneksi, "UPDATE `product_page` SET `Token`='$Token', `Verifikasi`='Shiping' WHERE `product_page`.`Order_No`='$No_Order' ");

                            

                            if($query)
                                {
                                    $query1 = mysqli_query($koneksi, "UPDATE `saldo_top_up` SET `Value`='$SaldoAkhir' WHERE `saldo_top_up`.`Email`='$email' ");
                                    print '
                                            <script type="text/javascript">
                                    
                                                alert ("Data Berhasil Disimpan.");
                                                window.location.href="index.php?page=member&aksi=order_history&verif=0";

                                            </script>
                                    ';
                                }
                            else
                                {
                                    print '
                                            <script type="text/javascript">
                                    
                                                alert ("Proses terhenti, Silahkan ulangi kembali.");
                                                window.location.href="index.php?page=member&aksi=order_history&verif=0";

                                            </script>
                                    ';
                                }
                        }
                }
            


            
                    
        }
                
    if(isset($_POST['cancel']))
        {
            $email=$_POST['email'];
            $No_Order=$_POST['No_Order'];
            $harga=$_POST['harga'];
            $SaldoAwal=$_POST['saldo'];
            $awal=$_POST['awal'];
            $akhir=$_POST['akhir'];

            // menjumlahkan saldo
            $SaldoAkhir=$SaldoAwal-$harga;

            $query = mysqli_query($koneksi, "UPDATE `product_page` SET `Verifikasi`='Canceled' WHERE `product_page`.`Order_No`='$No_Order' ");

            if($query)
                {
                    print "
                            <script type='text/javascript'>
                    
                                window.location.href='index.php?page=member&aksi=order_history&verif=0';

                            </script>
                    ";
                }
            else
                {
                    print "
                            <script type='text/javascript'>
                    
                                window.location.href='index.php?page=member&aksi=order_history&verif=0';

                            </script>
                    ";
                }
    
        }

?>
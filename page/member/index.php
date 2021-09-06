
                        <div class="card-body">
                            <div class="card-title">
                                <h1><strong>Prepaid Balance</strong></h1><br>
                                <p>Saldo top up : <?=BuatRp($saldo)?></p>
                            </div>
                            <div class="login-form">
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <?=$input?><?=$input1?><?=$input2?>
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control" name="Value" required autofocus>
                                            <option value="10000">Rp 10.000.00</option>
                                            <option value="50000">Rp 50.000.00</option>
                                            <option value="100000">Rp 100.000.00</option>
                                        </select>
                                    </div>
                                    <div class="form-group" style="padding-top: 200px;">
                                        <button class="form-control btn btn-primary" type="submit" name="proses">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>

<?php
                
    if(isset($_POST['proses']))
        {
            $Email=$UserName;
            $Mobile_Number=$_POST['Mobile_Number'];
            $SaldoAwal=$_POST['SaldoAwal'];
            $Value=$_POST['Value'];
            $SaldoAkhir=$SaldoAwal+$Value;
            $valid=$_POST['valid'];

            if ($valid == 1) 
                {
                    $query = mysqli_query($koneksi, "UPDATE `saldo_top_up` SET `Value`='$SaldoAkhir' WHERE `saldo_top_up`.`Email`='$Email' ");
                }
            else
                {
                    $query = mysqli_query($koneksi, "INSERT INTO `saldo_top_up`(`Email`, `Mobile_Number`, `Value`) VALUES ('$Email', '$Mobile_Number', '$Value')");
                }
            
    
            if($query)
                {
                    print '
                            <script type="text/javascript">
                    
                                alert ("Data Berhasil Disimpan.");
                                window.location.href="index.php?page=member&aksi=index";

                            </script>
                    ';
                }
            else
                {
                    print '
                            <script type="text/javascript">
                    
                                alert ("Proses terhenti, Silahkan ulangi kembali.");
                                window.location.href="index.php?page=member&aksi=index";

                            </script>
                    ';
                }
                    
        }

?>
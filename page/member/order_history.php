                        <div class="card-body">
                            <div class="card-title">
                                <h1><strong>Order History</strong></h1><br>
                            </div>
                            <div class="login-form">
                                <div class="table-responsive">
                                    <table class="table" id="dataTables-example">
                                        <thead>
                                            <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                <?php
                                $Verif=$_GET['verif'];
                                    if ($Verif=='Pay') 
                                        {
                                            $sql="select * from `product_page` where `Email` ='$UserName' and `Verifikasi`='Pay'";
                                        }
                                    else
                                        {
                                            $sql="select * from `product_page` where `Email` ='$UserName' ";
                                        }
                                    $query=mysqli_query($koneksi,$sql);
                                    while($h=mysqli_fetch_array($query)) { 
                                        $t=$h['Order_No'];
                                        $harga=$h['Total_Harga'];
                                        $v2=$h['Time2'];
                                        $v3=str_replace("-", "", $v2);
                                        $v4=str_replace(":", "", $v3);
                                        $akhir=str_replace(" ", "", $v4);
                                        $v=$h['Verifikasi'];
                                        if ($v=='Succes') 
                                            {
                                                $ver="<font color='green'>Succes</font>";
                                            }
                                        elseif ($v=='Canceled') 
                                            {
                                                $ver="<font color='red'>Canceled</font>";
                                            }
                                        elseif ($v=='Failed') 
                                            {
                                                $ver="<font color='chocolate'>Failed</font>";
                                            }
                                        elseif ($v=='Shiping') 
                                            {
                                                $ver="<font color='black'>Shiping Code<br>".$h['Token']."</font>";
                                            }
                                        else
                                            {
                                                $ver="<a href='index.php?page=member&aksi=order&order=$t&harga=$harga&akhir=$akhir' class='btn btn-primary'>Pay Now</a>";
                                            }
                                        ?>
                                        <tr>
                                            <td><?=$h['Order_No']?></td>
                                            <td><?=BuatRp($h['Total_Harga'])?></td>
                                            <td><div align="center"><?=$ver?></div></td>
                                        </tr>

                                <?php } ?>
                                        </tbody>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>


<?php
                
    if(isset($_POST['proses']))
        {
            $Name=$_POST['Name'];
            $Email=$_POST['Email'];
            $Password=$_POST['Password'];
            $query = mysqli_query($koneksi, "INSERT INTO `user`(`Email`, `Name`, `Password`) VALUES ('$Email', '$Name', '$Password')");
    
            if($query)
                {
                    print '
                            <script type="text/javascript">
                    
                                alert ("Data Berhasil Disimpan.");
                                window.location.href="index.php";

                            </script>
                    ';
                }
            else
                {
                    print '
                            <script type="text/javascript">
                    
                                alert ("Proses terhenti, Silahkan ulangi kembali.");
                                window.location.href="index.php";

                            </script>
                    ';
                }
                    
        }

?>
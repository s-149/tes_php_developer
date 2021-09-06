
                        <div class="card-body">
                            <div class="card-title">
                                <h1><strong>Product Page</strong></h1><br>
                            </div>
                            <div class="login-form">
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <select class="form-control" name="Id_Product"  required autofocus>
                                            <option value="">=Product=</option>
                                            <?php
                                            while ($data=mysqli_fetch_array($product)) { ?>
                                                <option value="<?=$data['Id_Product']?>"><?=$data['Nama_Produk']?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" name="Shipping_Address" placeholder="Shipping Address" rows="4" maxlength="150" required autofocus></textarea>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" type="number" name="Price" min="1" placeholder="Price" required autofocus>
                                    </div>
                                    <div class="form-group" style="padding-top: 50px;">
                                        <button class="form-control btn btn-primary" type="submit" name="proses">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    

<?php
                
    if(isset($_POST['proses']))
        {
            $Order_No=$_Order_no;
            $Email=$UserName;
            $Id_Product=$_POST['Id_Product'];
            $Shipping_Address=$_POST['Shipping_Address'];
            $Price=$_POST['Price'];

            // mendefinisikan data produk
            $array_product=mysqli_fetch_array(mysqli_query($koneksi,"select * from `product` where `Id_Product`='$Id_Product'"));

            // menjumlahkan total harga per 1 produk
            $Total_Harga=$array_product['Harga']*$Price;

            $query = mysqli_query($koneksi, "INSERT INTO `product_page`(`Order_No`,`Email`, `Id_Product`, `Shipping_Address`, `Price`,`Total_Harga`, `Verifikasi`, `Time1`, `Time2`) VALUES ('$Order_No','$Email', '$Id_Product', '$Shipping_Address', '$Price','$Total_Harga','Pay','$Time1','$Time2')");
            
    
            if($query)
                {
                    print "
                            <script type='text/javascript'>
                    
                                alert ('Data Berhasil Disimpan.');
                                window.location.href='index.php?page=member&aksi=succes&order=$_Order_no';

                            </script>
                    ";
                }
            else
                {
                    print '
                            <script type="text/javascript">
                    
                                alert ("Proses terhenti, Silahkan ulangi kembali.");
                                window.location.href="index.php?page=member&aksi=product_page";

                            </script>
                    ';
                }
                    
        }

?>
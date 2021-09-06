
                        <div class="card-body">
                            <div class="card-title">
                                <h1><strong>Success !</strong></h1><br>
                            </div>
                            <div class="login-form">
                                <div class="table-responsive">
                                    <table class="table">
                                <?php
                                    $query=mysqli_query($koneksi,"select * from `product_page` where `Email` ='$UserName' and `Token`='0' ORDER BY `product_page`.`Id_Product_Page` DESC");
                                    while($h=mysqli_fetch_array($query)) {

                                        $t=$h['Order_No'];
                                        $harga=$h['Total_Harga'];
                                        $v2=$h['Time2'];
                                        $v3=str_replace("-", "", $v2);
                                        $v4=str_replace(":", "", $v3);
                                        $akhir=str_replace(" ", "", $v4);
                                    }
                                ?>
                                        <tr>
                                            <th>Order no</th>
                                            <td><?=$t?></td>
                                        </tr>
                                        <tr>
                                            <th>Total</th>
                                            <td><?=BuatRp($harga)?></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </table>
                                </div>
                                <div style="padding-top: 200px;">
                                    <a href='index.php?page=member&aksi=order&order=<?=$t?>&harga=<?=$harga?>&akhir=<?=$akhir?>' class='form-control btn btn-primary'>Pay Now</a>
                                </div>
                            </div>
                        </div>

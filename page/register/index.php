
                    <div class="login-content">
                        <h1><strong>Register</strong></h1><br>
                        <div class="login-form">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <input class="form-control" type="text" name="Name" placeholder="Name" required autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="email" name="Email" placeholder="Email" required autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="password" name="Password" placeholder="Password" maxlength="6" required autofocus>
                                </div>
                                <div class="form-group">
                                    <button class="form-control btn btn-primary" type="submit" name="proses">Register</button>
                                </div>
                            </form>
                        </div>
                        <div class="login-logo">
                            <h4><a href="index.php?&page=login">Login</a></h4>
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
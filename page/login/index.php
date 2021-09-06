
                    <div class="login-content">
                        <h1><strong>Login</strong></h1><br>
                        <div class="login-form">
                            <form action="" method="POST">
                                <div class="form-group">
                                    <input class="form-control" type="email" name="Email" placeholder="Email" required autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="password" name="Password" placeholder="Password" maxlength="6" required autofocus>
                                </div>
                                <div class="form-group">
                                    <button class="form-control btn btn-primary" type="submit" name="proses">Login</button>
                                </div>
                            </form>
                        </div>
                        <div class="login-logo">
                            <h4><a href="index.php?&page=register">Register</a></h4>
                        </div>
                    </div>

<?php
                
    if(isset($_POST['proses']))
        {
            $Email=$_POST['Email'];
            $Password=$_POST['Password'];
            $query = mysqli_query($koneksi, "SELECT * FROM `user` WHERE `Email`='$Email' AND `Password`='$Password' ");
    
            if(mysqli_num_rows($query) == 1)
                {
                    session_start(); 
                    $_SESSION['username']=$Email;
                    $_SESSION['password']=$Password;
                    print '
                            <script type="text/javascript">
                    
                                alert ("Selamat, Login Berhasil.");
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
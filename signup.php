<?php
    session_start();
    require 'connection.php';
    $passwordMismatch = false;
    $userExists = false;
    if(isset($_POST['submit']))
	{	
		$name=$_POST['Name'];
		$email=$_POST['Email'];
        $password=$_POST['Password'];
        $retypepassword=$_POST['retypepassword'];
        if ($password != $retypepassword) {
            $passwordMismatch = true;
        } else {
            $md5pass=md5($password);

            $sql = "SELECT id FROM users WHERE uemail = '$email' ";
            $result = $conn->query($sql);
    
            if ($result->num_rows > 0 )
            {
                $userExists = true;
            }
            else
            {
                $sql = "INSERT INTO users (uname,uemail,upassword) VALUES ('$name','$email','$md5pass')";
                if ($conn->query($sql) === TRUE) 
                {
                    
                    header("location:login.php");
                }
            }

        }

	}

    if(isset($_SESSION['user'])) {
        header('location:index.php');
    }
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="./css/app.css">

    <title>Sign up here</title>
</head>
<!-- # czu-Serverside-side-2022
#Group-12
#Faisal Ibn Haque
#Shahina Islam Tripty
#Sharikul Islam -->

<body>
    <!--Navebar Start-->
    <?php
        include('header.php');
    ?>
    <!-- navbar end -->


    <!-- Main Body start -->
    <div class="container mt-4 col-md-4">
        <div class="text-center p-5 shadow">
            <h2>Create an Account</h2>
            <p class="lead">Welcome</p>
        </div>

    </div>
    <div class="container col-md-5">
        <form class="mt-4 form-control shadow mb-4" method="post" action="">
            <div class="row">
            <div class="mb-3">
                    <label class="form-label">Name: </label>
                    <input type="text" required name="Name" id="email" class="form-control" placeholder="Type your name (max 20)" maxlength="20">
                </div>
                <div class="mb-3">
                    <label class="form-label">Email: </label>
                    <input type="email" required name="Email" id="email" class="form-control" placeholder="Type your Email">

                </div>
                <?php 
                    if ($userExists)
                    { 
                ?>
                        <div class="alert alert-danger" role="alert">
                            Email already exists
                        </div>
                <?php
                     
                    }                
                ?>
                <div class="mb-3">
                    <label class="form-label">Password: </label>
                    <input type="password" required name="Password" id="pass" class="form-control" maxlength="8" placeholder="(min 6 and max 8 char)" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 6 or more characters">
                    <input type="checkbox" onclick="myFunction()">Show Password 
                    <div id="mess">
                    <h6>Password must contain the following:</h6>
                    <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                    <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                    <p id="number" class="invalid">A <b>number</b></p>
                    <p id="length" class="invalid">Minimum <b>6 characters</b></p>
                </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Re-type Password: </label>
                    <input type="password" required name="retypepassword" id="retypepass" class="form-control" maxlength="8" placeholder="(max 8 char)">
                    <input type="checkbox" onclick="myFunction2()">Show Password
                    <span id='message'></span>
                </div>
                <?php 
                    if ($passwordMismatch)
                        { 
                ?>
                            <div class="alert alert-danger" role="alert">
                                Password Mismatch
                            </div>
                <?php
                     
                        }                
                ?>
                
            </div>
            <button class="btn btn-primary mb-5" type="submit" name="submit"> Sign up</button>

        </form>
    </div>
    <!-- Main Body End -->


    <!-- footer start -->
    <footer class="text-center">
        <div class="container-fluid justify-content-center border-top border-1" style="background-color:#e1ecf7 ;">
            <p class="fs-6 fw-bolder"> Follow us</p>
            <!-- facebook -->
            <a class="btn " href="https://www.facebook.com/" role="button"> <i class="bi bi-meta"> <svg
                        xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-meta"
                        viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M8.217 5.243C9.145 3.988 10.171 3 11.483 3 13.96 3 16 6.153 16.001 9.907c0 2.29-.986 3.725-2.757 3.725-1.543 0-2.395-.866-3.924-3.424l-.667-1.123-.118-.197a54.944 54.944 0 0 0-.53-.877l-1.178 2.08c-1.673 2.925-2.615 3.541-3.923 3.541C1.086 13.632 0 12.217 0 9.973 0 6.388 1.995 3 4.598 3c.319 0 .625.039.924.122.31.086.611.22.913.407.577.359 1.154.915 1.782 1.714Zm1.516 2.224c-.252-.41-.494-.787-.727-1.133L9 6.326c.845-1.305 1.543-1.954 2.372-1.954 1.723 0 3.102 2.537 3.102 5.653 0 1.188-.39 1.877-1.195 1.877-.773 0-1.142-.51-2.61-2.87l-.937-1.565ZM4.846 4.756c.725.1 1.385.634 2.34 2.001A212.13 212.13 0 0 0 5.551 9.3c-1.357 2.126-1.826 2.603-2.581 2.603-.777 0-1.24-.682-1.24-1.9 0-2.602 1.298-5.264 2.846-5.264.091 0 .181.006.27.018Z" />
                    </svg></i></a>
            <!-- instagram -->
            <a class="btn" href="https://www.instagram.com/" role="button"> <i class="bi bi-instagram"> <svg
                        xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                        class="bi bi-instagram" viewBox="0 0 16 16">
                        <path
                            d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
                    </svg></i></a>
            <!-- youtube -->
            <a class="btn" href="https://www.youtube.com/" role="button"> <i class="bi bi-youtube"><svg
                        xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                        class="bi bi-youtube" viewBox="0 0 16 16">
                        <path
                            d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.007 2.007 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.007 2.007 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31.4 31.4 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.007 2.007 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A99.788 99.788 0 0 1 7.858 2h.193zM6.4 5.209v4.818l4.157-2.408L6.4 5.209z" />
                    </svg></i></a>
            <!-- twitter -->
            <a class="btn" href="https://twitter.com/" role="button"> <i class="bi bi-twitter"><svg
                        xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                        class="bi bi-twitter" viewBox="0 0 16 16">
                        <path
                            d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z" />
                    </svg></i> </a>
            <!-- linkedin -->
            <a class="btn" href="https://www.linkedin.com/" role="button"> <i class="bi bi-linkedin"><svg
                        xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                        class="bi bi-linkedin" viewBox="0 0 16 16">
                        <path
                            d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z" />
                    </svg></i></a>

        </div>

        <div class="text-sm-center pb-2 fs-6 fw-lighter" style="background-color:#e1ecf7 ;">
            © 2021
            <a
                href="https://www.pef.czu.cz/en/r-9396-study/r-9485-study-programmes/r-10299-masters-study/r-10525-informatics-infoan">FEM,</a>
            All contents for academic purposes by various web pages of kutna hora.
        </div>

        </div>

    </footer>
    <!-- footer End -->

    <script src="./js/bootsrap/bootstrap.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">
            $('#password, #retypepass').on('keyup', function () {
            if ($('#pass').val() == $('#retypepass').val()) {
                $('#message').html('Password Matched').css('color', 'green');
            } else 
                $('#message').html('Not Matching').css('color', 'red');
            });

            function myFunction() 
            {
            var x = document.getElementById("pass");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
            }             
            function myFunction2() 
            {
            var x = document.getElementById("retypepass");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
            } 
// Password validation
            var myInput = document.getElementById("pass");
            var letter = document.getElementById("letter");
            var capital = document.getElementById("capital");
            var number = document.getElementById("number");
            var length = document.getElementById("length");

            // When the user clicks on the password field, show the message box
            myInput.onfocus = function() {
            document.getElementById("mess").style.display = "block";
            }

            // When the user clicks outside of the password field, hide the message box
            myInput.onblur = function() {
            document.getElementById("mess").style.display = "none";
            }

            // When the user starts to type something inside the password field
            myInput.onkeyup = function() {
            // Validate lowercase letters
            var lowerCaseLetters = /[a-z]/g;
            if(myInput.value.match(lowerCaseLetters)) {  
                letter.classList.remove("invalid");
                letter.classList.add("valid");
            } else {
                letter.classList.remove("valid");
                letter.classList.add("invalid");
            }
            
            // Validate capital letters
            var upperCaseLetters = /[A-Z]/g;
            if(myInput.value.match(upperCaseLetters)) {  
                capital.classList.remove("invalid");
                capital.classList.add("valid");
            } else {
                capital.classList.remove("valid");
                capital.classList.add("invalid");
            }

            // Validate numbers
            var numbers = /[0-9]/g;
            if(myInput.value.match(numbers)) {  
                number.classList.remove("invalid");
                number.classList.add("valid");
            } else {
                number.classList.remove("valid");
                number.classList.add("invalid");
            }
            
            // Validate length
            if(myInput.value.length >= 6) {
                length.classList.remove("invalid");
                length.classList.add("valid");
            } else {
                length.classList.remove("valid");
                length.classList.add("invalid");
            }
            }
            
</script>
</body>

</html>
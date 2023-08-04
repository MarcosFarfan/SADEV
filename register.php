<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Registro</title>
</head>
<body>
      <div class="container">
        <div class="box form-box">

        <?php 
         
         include("php/config.php");
         if(isset($_POST['submit'])){
            $username = $_POST['username'];
            $email = $_POST['email'];
            $age = $_POST['age'];
            $password = $_POST['password'];

         //verificar email unico

         $verify_query = mysqli_query($con,"SELECT Email FROM users WHERE Email='$email'");

         if(mysqli_num_rows($verify_query) !=0 ){
            echo "<div class='message'>
                      <p>Este email ya fue utilizado, prueba otro por favor!</p>
                  </div> <br>";
            echo "<a href='javascript:self.history.back()'><button class='btn'>Volver</button>";
         }
         else{

            mysqli_query($con,"INSERT INTO users(Username,Email,Age,Password) VALUES('$username','$email','$age','$password')") or die("Error");

            echo "<div class='message'>
                      <p>Registro completo!</p>
                  </div> <br>";
            echo "<a href='index.php'><button class='btn'>Iniciar</button>";
         

         }

         }else{
         
        ?>

            <header>Registro</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="username">Usuario</label>
                    <input type="text" name="username" id="username" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="age">Edad</label>
                    <input type="number" name="age" id="age" autocomplete="off" required>
                </div>
                <div class="field input">
                    <label for="password">Clave</label>
                    <input type="password" name="password" id="password" autocomplete="off" required>
                </div>

                <div class="field">
                    
                    <input type="submit" class="btn" name="submit" value="Registrarse" required>
                </div>
                <div class="links">
                    Ya tiene una cuenta? <a href="index.php">Acceder</a>
                </div>
            </form>
        </div>
        <?php } ?>
      </div>
</body>
</html>
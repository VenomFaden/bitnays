<html>
  <link rel="stylesheet" href="girisborsa.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="bootstrap-theme.min.css"> 
  <link rel="stylesheet" href="bootstrap-theme.min.css">
  <script src="https://kit.fontawesome.com/490f4b90e6.js" crossorigin="anonymous"></script>
  <body class="abc">

<?php
$conn = new mysqli("localhost", "root", "", "dbtest");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$passw = $fname = "";
if(!empty($_POST['fname'] ))
  $fname = mysqli_real_escape_string($conn, $_POST['fname']);
else {
  echo "<script>alert('Girdi Boş Olamaz!');</script>";
}

if(!empty($_POST['passw']))
  $passw = mysqli_real_escape_string($conn, $_POST['passw']);
else {
  echo "<script>alert('Girdi Boş Olamaz!');</script>";
}

$sql = "SELECT id, fname, passw FROM uyeler WHERE fname='$fname' ";
$result = $conn->query($sql);
 if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    //echo "<br> id: ". $row["id"]. " - Name: ". $row["fname"]. " " . $row["passw"] . "<br>";
    if( $passw != $row["passw"] || $fname != $row["fname"] )    
    {
    echo "<script>alert('Bilgiler Yanlış');</script>";    
    $error="abc";
    } 
    else
    {
      header("Location: anasayfa.php");

    }
                                       }
  }  
  else {
  //  echo "0 results";
  }
  ?>
<div class="head">
  <div class="logo">
  <h2>benays</h2>
  </div>
  <div class="dil">
   <a class="a" href="#"> English<a>
  <i class="far fa-sun"></i>  </div>
</div>
<div class="firsatlar">
       <h3> Fırsatlar: </h3>
</div>
<div class="maindiv"> 
<div class="welcome">
  <h1>benays Hesap Girişi</h1>
   <p>Hoşgeldiniz benays sizi özledi.<p>
</div>
  <div class="giris">
    <table cellpadding="20"	>
      <form method="POST" action=""> 
        <tr>
       <td>
         <input class="name" type="text" name="fname" placeholder="Kullanıcı Adı"></td> 
        </tr>
        <tr>
         
          <td><input class="pass" type="password" name="passw"  placeholder="Şifre "></td>
        </tr>
        <tr>
          <td>  <input class="submit" type="submit" value="Giriş Yap"></td>
          <td> <?php echo !empty($error); ?></td>
        </tr>
     <table>
       </form>
        <div class="bilgilendirme">
          <h3>Bilgilendirme:</h3>
          <p>
          Merhaba bu site eğitim/eğlençe amaçlı yapılmıştır.</br></br>
          Burda istediginiz para birimdeki paradan bir test parası alıp, gerçek paranızla yatırım yapmadan kendinizi test edebilirsiniz.</br></br>
          Siteye herhangi bir kart bilgisi girmeyiniz.
          </p>

        </div>
      
  </div>

</div>  
  </body>


   </html>
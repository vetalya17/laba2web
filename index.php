<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <title>Voloshin Vitaliy KS-32</title>
</head>
  <body>
    <?php session_start(); ?>
    <nav class="navbar navbar-light bg-light">
      <a class="navbar-brand" href="index.php">
        <img src="img/logo.png" width="30" height="30" class="d-inline-block align-top" alt=""> Laba 1</a>
        <span class="right">
        
        <?php if (empty($_SESSION['user'])): ?>
          <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModalCenter">Log in</button>
          <button type="button" class="btn btn-light" data-toggle="modal" data-target="#myModalsearch">Sign in</button>
        <?php else: ?>
          <img src="<?=$_SESSION['photo']?>" width="30" height="30" class="d-inline-block align-top" alt=""><?=$_SESSION['user']?></a>
          <a href="exit.php" class="btn btn-light" role="button" aria-pressed="true">Exit</a>
        
     <?php endif; ?>
     </nav>
      </span>
    <?php
      if (!empty($_SESSION['user']) && ($_SESSION['user_id'] == 2)):{
      $conn = new mysqli('localhost', 'root', '', 'lb1');
      if($conn->connect_error) {}
      $sql = "SELECT id, first_name, last_name, email, password, photo, role_id FROM users";
      $result = $conn->query($sql); ?> 
      <table class="table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Surname</th>
            <th>email</th>
            <th>Password</th>
            <th>Role_id</th>
            <th>Photo</th>
            <th></th>
          </tr>
        </thead>
        <tbody> 
          <?php while(($row = $result->fetch_assoc()) != false) { echo 
            "<tr>
              <th>"
                ."<a  href='person_page.php?id=".$row['id']."'>".$row['id']."</a>".
              "</th>" ?>
              <td><?php print($row["first_name"]) ?></td>
              <td><?php print($row["last_name"]) ?></td>
              <td><?php print($row["email"]) ?></td>
              <td><?php print($row["password"]) ?></td>
              <td><?php print($row["role_id"]) ?></td>
              <td><img width="30" src="<?php print($row["photo"])?>"></td> <?php 
              $_SESSION['id_id1'] = $row['id'];
              echo 
              "<td>"
                  ."<a  href='person_change.php?id=".$row['id']."'  >Change</a>".
              "</td>" ?>
              <td>
                <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModalCenter1">Change</button>  
              </td>
              <td>
                  <input type="submit" name="Delete" value="Delete" onclick="del(93);" title="Delete" class="btn btn-danger">
                
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>  
      <?php $conn->close(); } ?>


      <?php
      elseif (!empty($_SESSION['user']) && ($_SESSION['user_id'] == 1)):{
      $conn = new mysqli('localhost', 'root', '', 'lb1');
      if($conn->connect_error) {}
      $sql = "SELECT id, first_name, last_name, email, password, photo, role_id FROM users";
      $result = $conn->query($sql); ?> 
      <table class="table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Surname</th>
            <th>email</th>
            <th>Role_id</th>
            <th>Photo</th>
          </tr>
        </thead>
        <tbody> 
          <?php while(($row = $result->fetch_assoc()) != false) { echo 
            "<tr>
              <th>"
                ."<a  href='person_page.php?id=".$row['id']."'>".$row['id']."</a>".
              "</th>" ?>
            <td><?php print($row["first_name"]) ?></td>
            <td><?php print($row["last_name"]) ?></td>
            <td><?php print($row["email"]) ?></td>
            <td><?php print($row["role_id"]) ?></td>
            <td><img width="30" src="<?php print($row["photo"])?>"></td> 
          </tr>
          <?php } ?>
        </tbody>
      </table>  
      <?php $conn->close();  } ?>


      <?php
      else:{
            $conn = new mysqli('localhost', 'root', '', 'lb1');
      if($conn->connect_error) {}
      $sql = "SELECT id, first_name, last_name, email, password, photo, role_id FROM users";
      $result = $conn->query($sql); ?> 
      <table class="table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Surname</th>
            <th>email</th>
            <th>Role_id</th>
            <th>Photo</th>
          </tr>
        </thead>
        <tbody> 
          <?php while(($row = $result->fetch_assoc()) != false) { echo 
            "<tr>
              <th>"
                ."<a  href='person_page.php?id=".$row['id']."'>".$row['id']."</a>".
              "</th>" ?>
            <td><?php print($row["first_name"]) ?></td>
            <td><?php print($row["last_name"]) ?></td>
            <td><?php print($row["email"]) ?></td>
            <td><?php print($row["role_id"]) ?></td>
            <td><img width="30" src="<?php print($row["photo"])?>"></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>  
    <?php $conn->close();  } endif; ?>
      
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Authorization form</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
              <form action="auth.php" method="post">
                <input type="text" class="form-control" name="email" id="email" placeholder="E-mail"><br>
                <input type="password" class="form-control" name="password" id="password" placeholder="Password"><br>
                <div class="modal-footer">
                  <button class="btn btn-secondary" type="submit">Log in</button><br>
                </div>
              </form>  
            </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="myModalsearch" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Registration form</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
              <form action="check.php" method="post" enctype="multipart/form-data">
                <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First name" minlength="3"  required><br>
                <div class="registrationFormAlert" id="divCheckFirstNameMatch" ></div><br>
                <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last name"minlength="3"   required><br>
                <div class="registrationFormAlert" id="divCheckLastNameMatch" ></div><br>
                <input type="email" class="form-control" name="mail" id="mail" placeholder="E-mail"  required><br>
                <span id="check_mail"></span>
                <div class="registrationFormAlert" id="divCheckMailMatch" ></div><br>
                <input type="password" class="form-control" name="pass" id="pass"  placeholder="Password"minlength="6"  required><br>
                <input type="password" class="form-control" name="pass1" id="pass1" onChange="checkPasswordMatch();" placeholder="Re-Enter Password" minlength="6" required><br>
                <div class="registrationFormAlert" id="divCheckPasswordMatch" ></div><br>
                <select class="custom-select" name="role">
                  <option selected value="1">User</option>
                  <option value="2">Admin</option>
                </select><br><br>
                <form method="post" enctype="multipart/form-data">
                  <input type="file"  name="fileToUpload" id="fileToUpload" required><br>
                  <div class="registrationFormAlert" id="divCheckFileMatch" ></div><br><br>
                  <div class="modal-footer">
                    <button class="btn btn-secondary" id="submit" type="submit" disabled>Log in</button><br>
                  </div> 
                </form>
              </form>  
            </div>
        </div>
      </div>
    </div>




    <div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="container mt-4">




      <?php
      
      $conn = new mysqli('localhost', 'root', '', 'lb1');
      if($conn->connect_error) {}
      $sql = "SELECT id, first_name, last_name, email, password, photo, role_id FROM users";
      $result = $conn->query($sql); ?> 
      
        
         
          <?php while(($row = $result->fetch_assoc()) != false) { 
            if($row["id"] == $_SESSION['id_id1']) { ?>
          
            


    




          <h2>Change form</h2> 
          <form action="change_bd.php" method="post" enctype="multipart/form-data"><br>

            <img width="100" src="<?php print($row["photo"])?>"><br><br>
            <input type="text" class="form-control" name="id" id="id" value="<?php print($row["id"]) ?>" minlength="" disabled><br>
            <input type="text" class="form-control" name="first_name" id="first_name" value="<?php print($row["first_name"]) ?>" minlength="3" required><br>
            <input type="text" class="form-control" name="last_name" id="last_name" value="<?php print($row["last_name"]) ?>"minlength="3" required><br>
            <input type="email" class="form-control" name="mail" id="mail" value="<?php print($row["email"]) ?>" required><br>
             <?php 
             if($_SESSION['user_id'] == 1) { ?>
            <input type="password" class="form-control" name="pass" id="pass" value="<?php print($row["password"]) ?>"minlength="6" disabled><br> 
              <?php } else{  ?>
            <input type="password" class="form-control" name="pass" id="pass" value="<?php print($row["password"]) ?>"minlength="6" required><br>
              <?php } ?>
            <select class="custom-select" name="role">
              <?php if($row["role_id"] == 1){ ?>
              <option selected value="1">User</option>
              <option  value="2">Admin</option>
            <?php } else {?>
              <option  value="1">User</option>
              <option selected value="2">Admin</option>
            <?php } ?>
            </select><br><br>
            <form method="post" enctype="multipart/form-data">
              <input type="file"  name="fileToUpload" id="fileToUpload" >
              <button class="btn btn-secondary" type="submit">Sign in</button><br> 
            </form><br>
          </form> 
    </div>
        <?php } }?>

       
      <?php $conn->close();   ?>
            
        </div>
      </div>
    </div>










    <footer id="sticky-footer" class="py-4 bg-dark text-white-50">
      <div class="container text-center">
        <small>V. N. Karazin Kharkiv National University | Voloshin Vitalik</small>
      </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script src="js/pass1.js"></script>
    <script src="js/pass.js"></script>
    <script src="js/admin_panel.js"></script>
    <script type="text/javascript">
      function del(id){ 
    jQuery.ajax({
            type: "post",
            url: "delete.php",
            data: "id=" + id + "&vid=lids",
            dataType: 'json',
            success: function(data){
                if(data.succes == 0){
                    jQuery('#msg').html('' + data.msg + '').delay(3000).fadeOut('fast');
                }
                if(data.succes == 1){
                    $('li[data-lidid=' + data.lidid + ']').animate({ bottom:"+=30%",opacity:0 }, "slow", function(){jQuery(this).hide();}); // удаляем удаленный элемент
                }
            }
    });
}
</script>
    
    

  </body>
</html>
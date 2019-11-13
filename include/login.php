<?php
/**
 * Copyright (c) 2019. Arash Hatami
 */
session_start();
?>

<div style="padding-top: 5%;"  class="login-box">
  <div class="card">
    <div class="card-header">
      <h3><?= $_please_login ?></h3>
    </div>
    <div class="card-body">
      <div class="text-center pd-5">
        <img src="img/logo.png" width="200px" alt="MIKHMON Logo">
      </div>
      <div  class="text-center">
      <span style="font-size: 25px; margin: 10px;"></span>
      </div>
      <form autocomplete="off" action="" method="post">
      <table class="table">
        <tr>
          <td class="align-middle text-center">
            <input class="form-control" type="text" name="user" placeholder="Username" required="1" autofocus>
          </td>
        </tr>
        <tr>
          <td class="align-middle text-center">
            <input class="form-control" type="password" name="pass" placeholder="Password" required="1">
          </td>
        </tr>
        <tr>
          <td class="align-middle text-center">
            <input style="cursor:pointer; width: 100%; height: 35px; font-weight: bold; font-size: 17px;" class="btn-login bg-primary" type="submit" name="login" value="Login">
          </td>
        </tr>
        <tr>
          <td class="align-middle text-center">
            <?= $error; ?>
          </td>
        </tr>
      </table>
      </form>
    
    </div>
  </div>
</div>
</body>
</html>

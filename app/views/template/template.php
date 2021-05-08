<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css" />
    <script src="https://code.jquery.com/jquery-1.9.1.js"></script>
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />
    <link rel="stylesheet" href="/app/views/css/main.css?v=<?php echo date('His'); ?>" />

    <title>Red Brick</title>
  </head>
  <body>

  <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white sticky-top">
      <h5 class="my-0 mr-md-auto font-weight-normal" id="nav-home">RedBrick.com</h5>
      <nav class="my-2 my-md-0 mr-md-3">
      <?php
        if(Session::get('user')!==null && Session::get('user')>0){?>
        <a class="p-2 text-dark" href="<?php echo BASE_DIR; ?>home">home</a>
        <a class="p-2 text-dark" href="<?php echo BASE_DIR; ?>project">project</a>
        <a class="p-2 text-dark" href="<?php echo BASE_DIR; ?>profile">profile</a>
      <?php  }
      ?>
      </nav>
        <?php
          if(Session::get('user')!==null && Session::get('user')>0){
          ?>
            <a class="btn btn-outline-primary" id="btn-logout">Logout</a>
            <!-- <input type="button" id="btn-logout" value="Logout" class="btn btn-info btn-sm"> -->
          <?php } else { ?>
            <a class="p-2 text-dark" href="./">Sign in</a>
            <a class="btn btn-outline-primary" href="./register">Sign up</a>
          <?php } ?>
    </div>

    <div class="container-fluid">
        <div class="row">
          <div class="container">
            <div class="row">
            </div>
          </div>
        </div>
    </div>
    <div class="container">
        <?php
          View::render($data);
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    
    <?php
      switch($data->view)
      {
          case 'Login':
            ?>
              <script src="app/views/js/login.js?v=<?php echo date('Hi'); ?>"></script>
              <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.min.js"></script>
            <?php
          break;
          case 'Register':
            ?>
              <script src="app/views/js/register.js?v=<?php echo date('Hi'); ?>"></script>
              <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.min.js"></script>
            <?php
          break;
          case 'Profile':
            ?>
              <script src="app/views/js/profile.js?v=<?php echo date('Hi'); ?>"></script>
            <?php
          break;
          case 'Project':
            ?>
              <script src="<?php echo BASE_DIR; ?>app/views/js/projectcreate.js?v=<?php echo date('His'); ?>"></script>
              <script src="<?php echo BASE_DIR; ?>app/views/js/project.js?v=<?php echo date('His');?>"></script>
              <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

            <?php
          break;
      }
    ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
 

    <script>
      $('#btn-logout').on('click', function(){
        window.location='../logout';
      });
      $('#nav-home').on('click', function(){
            window.location="../";
      });
    </script>
  </body>
</html>
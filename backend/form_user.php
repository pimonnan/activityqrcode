<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Login System</title>
</head>
<body>
      <div class="container">
        <?php include('nav.php')?>
        <div class="row">
          <div class="col-md-12 mt-4">
            <h2 class="text-center">แบบฟอร์มการลงทะเบียน</h2>
            <form action = "insert_data.php" id = "insert_data" method = "POST">
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" name = "name" class="form-control" id="fullname" aria-describedby="emailHelp" placeholder="Enter name" required>
                  </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Username</label>
                  <input type="text" name = "username" class="form-control" id="username" aria-describedby="emailHelp" placeholder="Enter Username" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" name = "password" class="form-control" id="password" placeholder="Enter Password" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Position</label>
                    <input type="text" name = "position" class="form-control" id="position" aria-describedby="emailHelp" placeholder="Enter Position" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Photo Link</label>
                    <input type="text" name = "photo" class="form-control" id="image" aria-describedby="emailHelp" placeholder="Enter Photo" required>
                </div>
                <button type="submit" class="btn btn-info btn-block">Submit</button>
              </form>
          </div>
        </div>
      </div>
      <script src="js/jquery.js"></script>
      <script src="js/bootstrap.bundle.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script>
        $(document).ready(function() {
          $('#insert_data').submit(function(e) {
            e.preventDefault();
            var name = $('#fullname').val();
            var username = $('#username').val();
            var password = $('#password').val();
            var position = $('#position').val();
            var photo = $('#image').val();

            $.ajax({
                url : "insert_data.php",
                type : "POST",
                data : {name : name, username : username, password : password, position : position, photo : photo},
                success : function(data) {
                  alert(data);
                }
            });
            
          });
        });
      </script>
</body>
</html>
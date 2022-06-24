<nav class="navbar navbar-expand-lg navbar-light bg-info">
  <a class="navbar-brand" href="index.php">หน้าหลัก</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="student.php">การจัดการนักศึกษา</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="personnel.php">การจัดการบุคลากร</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="product.php">การจัดการงานกิจกรรม</a>
        </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">ออกจากระบบ</a>
          </li>
      </ul>
    </div>
    <ul><img src="images-removebg-preview.png" alt="images-removebg-preview" width="35" height="35">
      <a href="#" class="text-white">welcome : <?php echo $_SESSION['auth-name'] ?></a></ul>
    </ul>   
 </nav>
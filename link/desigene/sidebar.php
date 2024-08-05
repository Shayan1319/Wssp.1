<style>
  .sidenav {
    height: 100%;
    width: 250px;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #0f1286;
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 10px;
  }

  .sidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 20px !important;
    color: #fff;
    display: block;
    transition: 0.3s;
    background-color: #1873e8;
    margin-left: 20px;
    margin-right: 10px;
    margin-top: 10px;
    border-radius: 12px;
  }

  .sidenav a:hover {
    color: #000;
    background-color: #f1f1f1;
  }

  .sidenav .closebtn {
    font-size: 36px;
    margin-left: 50px;
  }

  #main {
    transition: margin-left .5s;
    margin-left: 250px;
  }


  .dropdown .dropbtn {
    outline: none;
  }
  .dropdown-content {
    display: none;
    z-index: 1;
  }

  .dropdown-content a {
    float: none;
    display: block;
    text-align: left;
  }

  .dropdown:hover .dropdown-content {
    display: block;
  }
</style>
<div id="mySidenav" class="sidenav">
  <div class="row w-100">
    <div class="profile col-12">
      <img src="image/download.jfif" alt="">
      <h3>Name</h3>
      <h4>Designation</h4>
    </div>

  </div>
  <a href="index.php" class="nav-link mt-3">Dashboard</a>
</div>
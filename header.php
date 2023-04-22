
<nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark" >
  <div class="container-fluid" >
    <a class="navbar-brand" href="index.php">Gsol</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link <?php if(isset($_SESSION['current_page'])){ if($_SESSION['current_page']=='index.php'){echo"active";}} ?>" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if(isset($_SESSION['current_page'])){ if($_SESSION['current_page']=='game-page.php'){echo"active";}} ?>" aria-current="page" href="game-page.php">Games</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if(isset($_SESSION['current_page'])){ if($_SESSION['current_page']=='forums.php'){echo"active";}} ?>" href="forum-page.php">Forum</a>
        </li>

        

        <?php
        if(isset($_COOKIE['logged_in'])){
            echo"
            
            <li class = 'nav-item'>
                <a class = 'nav-link' ";   if(isset($_SESSION['current_page'])){ if($_SESSION['current_page']=='user-profile.php'){echo"active";}}    echo" aria-current='page' href='user-profile.php'>My Profile</a>
            </li>
            
            </ul>

           


            ";
          #  <li class = 'nav-item'>
           #     <a class='nav-link'";    if(isset($_SESSION['current_page'])){ if($_SESSION['current_page']=='my-game-list.php'){echo"active";}}  echo"  aria-current='page' href='my-game-list.php'>My Game List</a>
          #</li>  

        }
        else{
            echo"<li class='nav-item'>
          <a class='nav-link' href='login-signup.php'>Login/Signup</a>
        </li></ul>";
        }
        

        ?>

      
      
       <ul class="navbar-nav navbar-right mx-5">
        <li class="nav-item">

          <form class=" d-flex navbar-form navbar-right " role="search" action ="game-search.php" method = "get" autocomplete="off">
            <input class="form-control me-2" name ="keyword" id="keyword"type="search" placeholder="Search" aria-label="Search">
            <input type='hidden' id='page' name='page' value='1'>
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
        </li>
      </ul>


      <?php
      if(isset($_COOKIE['logged_in'])){
        echo" <ul class = 'nav navbar navbar-right'>
            <li class = 'nav-item'>
                <button class = 'btn btn-outline-danger'><a class='nav-link link-danger h-10'  aria-current='page' href='logout.php'>Logout</a></button>
            </li>  
            </ul";
      }
      ?>

    </div>
  </div>
</nav>

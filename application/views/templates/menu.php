<div class="topnav">
  <?php 
    if (empty($_SESSION['id'])) {
      echo '<a href="'.base_url().'">Index</a><a href="'.base_url().'auth/register">Register</a><a href="'.base_url().'auth/login">Login</a>';
    }else{
      echo '<a href="'.base_url().'">Index</a><a href="'.base_url().'home">Home</a><a href="'.base_url().'auth/logout">Logout</a>';
    }
  ?>
</div>



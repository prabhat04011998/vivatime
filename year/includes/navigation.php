<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <div class="container">
    <a class="navbar-brand" href="#">
      <?php
      if(isset($_GET['s_id'])){
        $s_id=$_GET['s_id'];

        $select_query="SELECT * from subjects WHERE sub_id=$s_id";
        $query=mysqli_query($connection,$select_query);
        $row=mysqli_fetch_assoc($query);
        $sub_title=$row['sub_title'];
       ?>
    <?php echo ucwords($sub_title);}else{
      echo "All Subject Questions";
    } ?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active ">
          <a class="nav-link" href="../index.php">Home
            <span class="sr-only">(current)</span>
          </a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="#">About</a>
        </li>

        <li class="nav-item active">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="dropdown">
          <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
            Select Subject
          </button>
          <div class="dropdown-menu">
            <?php

            $select_query="SELECT * from subjects";
            $query=mysqli_query($connection,$select_query);
            while($row=mysqli_fetch_assoc($query)){
              $sub_title=$row['sub_title'];
              $sub_id=$row['sub_id'];
            ?>
            <a class="dropdown-item" href="subject.php?s_id=<?php echo $sub_id; ?>"><?php echo $sub_title; ?></a>
          <?php } ?>
           <hr>
           <a href="index.php" class="dropdown-item">All Subject Questions</a>
          </div>
        </li>
      </ul>
    </div>
  </div>
</nav>

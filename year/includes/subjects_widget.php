<div class="card my-4">
  <h5 class="card-header">Subjects</h5>
  <div class="card-body">
    <div class="row">
      <div class="col-lg-12">
        <ul class="list-unstyled text-center mb-0">

            <?php

               $select_query="SELECT * from subjects";
               $query=mysqli_query($connection,$select_query);

               while ( $row=mysqli_fetch_assoc($query)) {
                 $sub_title=$row['sub_title'];
                 $sub_id=$row['sub_id'];
             ?>
          <li class="p-2">  <a class="btn btn-primary" href="subject.php?s_id=<?php echo $sub_id; ?>"><?php echo ucwords($sub_title); ?></a></li>
<?php } ?>
        <hr>
        <li><a href="index.php" class="btn btn-dark">All Subject Questions</a></li>
        </ul>
      </div>

    </div>
  </div>
</div>

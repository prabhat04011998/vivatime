<?php include "includes/header.php" ?>
    <!-- Navigation -->
  <?php include "includes/navigation.php" ?>

    <!-- Page Content -->
    <div class="container">

      <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-8">

        <?php
         if(isset($_GET['s_id'])){
           $s_id=$_GET['s_id'];
         }
         $select_question="SELECT * from posts WHERE post_subject_id='$s_id' ";
         $select_query=mysqli_query($connection,$select_question);
         if(!$select_query){
           die("Connection failed ".mysqli_error($connection));
         }
         $i=1;
         while($row=mysqli_fetch_assoc($select_query)){
           $question=$row['post_question'];
           $answer=$row['post_answer'];
           $date=$row['post_date'];
           $author_name=$row['post_author_name'];

         ?>

          <!-- Post Question -->
          <h2 class="mt-4"><?php
           echo "Q".$i.". ";
           echo ucwords($question); ?></h2>

          <!-- Author -->
          <p class="lead">
              by
            <a href="#"><?php echo ucwords($author_name); ?></a>
          </p>

          <hr>

          <!-- Date/Time -->
          <p>Posted on <?php echo $date; ?></p>

          <hr>


          <!-- Post Answer -->
          <p class="lead"><?php echo  ucwords($answer); ?></p>
          <br>
        <?php $i++;} ?>
          <br><br>


     <?php

       if(isset($_POST['submit'])){
           $ques=$_POST['question'];
           $ans=$_POST['answer'];
           $name=$_POST['author_name'];
           $pid= $_POST['post_subject_id'];
           $insert_post="INSERT INTO `posts` (`post_id`, `post_question`, `post_answer`, `post_date`,
                         `post_author_name`,`post_subject_id`) VALUES('','$ques','$ans',now(),'$name','$pid')";
           $insert_query=mysqli_query($connection,$insert_post);
           if(!$insert_query){
             die("Connection failed ".mysqli_error($connection));
           }
           header("Location:subject.php?s_id=$pid");

       }


      ?>
          <!-- Add Question -->
          <div class="card my-4">
            <h5 class="card-header">Post Your Question</h5>
            <div class="card-body">
              <form action="" method="post" onsubmit="alert('Question added successfuly')">
                <div class="form-group">
                  <input type="text" name="author_name" class="form-control" placeholder="Enter Your Name" required>
                </div>
                <div class="form-group">
                  <label for="subject">Select Subject:</label>
                  <select  name="post_subject_id">

                    <?php

                      $select_query="SELECT * from subjects";
                      $query=mysqli_query($connection,$select_query);
                      while($row=mysqli_fetch_assoc($query)){
                        $sub_id=$row['sub_id'];
                        $sub_title=$row['sub_title'];
                     ?>
                    <option value="<?php echo $sub_id;?>"><?php echo ucwords($sub_title); ?></option>
                  <?php } ?>
                  </select>

                </div>
                <div class="form-group">
                  <textarea class="form-control" rows="1" placeholder="Enter Question" name="question" required></textarea>
                </div>
                <div class="form-group">
                  <textarea class="form-control" rows="3" placeholder="Enter Answer" name="answer" required></textarea>
                </div>
                <button type="submit" name="submit" class="btn btn-outline-primary" onsubmit="alert('Question added successfuly')">Add Question</button>
              </form>
            </div>
          </div>

          <!-- Single Comment -->




        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">

          <!-- Search Widget -->
          <div class="card my-4">
            <h5 class="card-header">Search</h5>
            <div class="card-body">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for...">
                <span class="input-group-btn">
                  <button class="btn btn-secondary" type="button">Go!</button>
                </span>
              </div>
            </div>
          </div>

          <!-- Subjects Widget -->
          <?php include "includes/subjects_widget.php" ?>
          <!-- Side Widget -->
          <div class="card my-4">
            <h5 class="card-header">Side Widget</h5>
            <div class="card-body">
              You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
            </div>
          </div>

        </div>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
  <?php include "includes/footer.php" ?>

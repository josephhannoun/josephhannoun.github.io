<!DOCTYPE html>
<html>
<style>
/* Full-width input fields */
input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

/* Set a style for all buttons */
button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

/* Extra styles for the cancel button */
.cancelbtn {
    padding: 14px 20px;
    background-color: #f44336;
}

/* Float cancel and signup buttons and add an equal width */
.cancelbtn,.signupbtn {
    float: left;
    width: 50%;
}

/* Add padding to container elements */
.container {
    padding: 16px;
}

/* Clear floats */
.clearfix::after {
    content: "";
    clear: both;
    display: table;
}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
    .cancelbtn, .signupbtn {
       width: 100%;
    }
}
</style>
<body>

<h2>Blog</h2>

<form method="post" action="blog.php" style="border:1px solid #ccc">
  <div class="container">
    <label><b>Title</b></label>
    <input type="text" placeholder="Title" name="title" required>

    <label><b>Excerpt</b></label>
    <input type="text" placeholder="Enter Excerpt" name="excerpt" required>

    <label><b>Description</b></label>
    <input type="text" placeholder="Enter Description" name="description" required>

    <label><b>Picture</b></label>
    <input type="text" placeholder="Enter Picture" name="picture" required>

    <label><b>URL</b></label>
    <input type="text" placeholder="Enter URL" name="url" required>

    <div class="clearfix">
      <button type="button" class="cancelbtn">Cancel</button>
      <button type="submit" class="signupbtn">Post Blog</button>
    </div>
  </div>
</form>
<section class="py-5">
     <div class="container">
       <h1 id=sections >Available blogs</h1>
     </div>
   </section>
       <section class="bg-light" >
         <div class="container">
           <div class="row">
               <?php require ("connect.php");
                   $sql = "SELECT title , excerpt ,description, picture , url FROM blog";
                   $result = mysqli_query($mysqli, $sql);
                   if (mysqli_num_rows($result) > 0) {
                     while($row = mysqli_fetch_assoc($result)) {
               ?>

        <div class="col-md-12 col-sm-12 ">
           <h3> Title : <?=$row["title"]?></h3>
           <p> Excerpt: <?=$row["excerpt"]?></p>
           <p>Description: <?=$row["description"]?></p>
           <p>Picture: <?=$row["picture"]?></p>
           <p>URL: <?=$row["url"]?></p>

         </div>
       <?php
             }
         } else {
             echo "0 results";
         }
         mysqli_close($mysqli);?>
           </div>
         </div>
       </section>
</body>
</html>

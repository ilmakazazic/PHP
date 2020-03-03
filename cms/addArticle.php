<?php
require "config.php";
require "templates/header.php";

session_start();
$category = new Category;
$cat = $category->all();

if (isset($_POST['btn_add_art'])) {
  $art=new Article;
  $art->Add($_POST['title_input'], $_POST['description_input'], $_POST['content_input'], $_POST['category_input']);
  $_SESSION['mess']="Article was added!";
  header("Location: index.php");

}

?>
<div class="card-body">
  <form method="POST" class="mx-auto">
<div class="form-group">
    <label>Title:</label><br/>
    <input class="form-control" type="text" name="title_input" ><br/>
    </div>
    <div class="form-group">
    <label>Description:</label><br/>
    <textarea class="form-control" name="description_input"></textarea><br/>
    </div>
    <div class="form-group">
    <label>Content:</label><br/>
    <textarea  class="form-control" name="content_input"></textarea><br/>
    </div>
    <div class="form-group">
    <select  class="form-control" name="category_input">
    <?php foreach ($cat as $obj) : ?>

  <option value="<?php echo $obj['category_id']?>"><?php echo $obj['category_name']?></option>
  <?php endforeach ?>
    </select>
  </div> <br/>
 <input type="submit" name="btn_add_art" class="btn btn-primary mb-2" value="Post">
</select>
</form>
</div>

<p ><a href="./">Return to Homepage</a> </p>


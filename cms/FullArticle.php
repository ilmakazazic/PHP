<?php
require "config.php";
require "templates/header.php";

session_start();

$art = new Article();
$article = $art->getOne($_GET['ID']);

if (isset($_POST['btn_remove'])) {

      $art->Remove($_POST['article-id-del']);
      $_SESSION['mess']="Article was removed!";
      header("Location: index.php");
}



$com = new Comment();
$comment = $com->getAll($_GET['ID']);

if (isset($_POST['btn_remove_comm'])) {
  
      $com->Remove($_POST['comment-id-del']);
      header('Location: '.$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING']);
}

if (isset($_POST['btn_comm'])) {
      $com->AddComm($_POST['comment'], $_SESSION['username'], $_GET['ID']);
      header('Location: '.$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING']);
}


if (isset($_GET['category_id'])) {
      $cat = "index.php?category_id=" . $_GET['category_id'];
} else {
      $cat = "";
}

?>

<div class="card-body ustify-content-center">
<br/>

<h1 class="display-4 text-center"><?php echo ($article['Title']) ?></h1><br/>
<div class="card-text"><?php echo $article['Content'] ?></div><br/>
<p class="text-right">Published on: <?php echo $article['Date'] ?></p>


<?php if (isset($_SESSION['user_logged'])) : ?>
      <div>
            <form method="POST">
                  <input type="hidden" name="article-id-del" value="<?php echo $article['ID']; ?>">
                  <input type="submit" name="btn_remove" value="Delete">
      </div>


<?php endif ?>


</div>
<div class="container-fluid">
      <h3 class="font-weight-lighter">Comments:</h3>
      <?php foreach ($comment as $obj) : ?>
      <br/>
      <br/>
      <div class="card-body border">
                  <p class="card-text"><?php echo $obj['content']; ?></p>
                  <p class="text-right">Author: <?php echo $obj['author_id'] . " " . $obj['time_date'] ?></p>
            </div>


            <?php if (isset($_SESSION['user_logged']) || (isset($_SESSION['basic_user']) && $obj['author_id']==$_SESSION['username'])) : ?>
                  <div>
                        <form method="POST">
                              <input type="hidden" name="comment-id-del" value="<?php echo $obj['comment_id']; ?>">
                           <input type="submit" name="btn_remove_comm" class="btn btn-light btn-sm float-right" value="Delete comment">
                  </div>
            

            <?php endif ?>

      <?php endforeach ?>

      <?php if (isset($_SESSION['user_logged']) || isset($_SESSION['basic_user'])) : ?>
</div>
<div class="container-fluid"> 
      <h3 class="font-weight-lighter">Add comment:</h3>
      <form method="POST">
      <textarea class="form-control" name="comment"></textarea><br/>
      <input type="submit" name="btn_comm" class="btn btn-light" value="Confrim">
      </form>

      <?php endif ?>
      <p><a href="./">Return to Homepage</a> <a href="/cms/<?php echo $cat ?>">Return to cat</a></p>

</div>

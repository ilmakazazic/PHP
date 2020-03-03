<?php
require "config.php";
require "templates/header.php";
session_start();
$art = new Article();
$category = new Category;
$cat = $category->all();

if (isset($_SESSION['user_logged']) || isset($_SESSION['basic_user'])) {
    echo "<h3 class='display-4 text-center'> Welcome " . $_SESSION['username'] . "</h3></br>";
    if (isset($_SESSION['mess'])) {
        echo "<h1 class='display-4 text-center'>". $_SESSION['mess']."</h1>";
        $_SESSION['mess'] = "";
    }
}
if (isset($_GET['category_id'])) {
    $articles = $art->GetByCategory($_GET['category_id']);
    $view = 'ListOfCategories.php';
} else {
    $article = $art->getAll();
    $view = 'article.php';
}

if ($_GET && isset($_GET['ID'])) {
    $article = $art->getOne($_GET['ID']);
    $view = 'FullArticle.php';
}
?>



    <ul class="nav">
        <li class="nav-item"> <a class="nav-link" href="/cms">Home</a></li>
        <?php foreach ($cat as $obj) : ?>

            <li class="nav-item" <?php echo (isset($_GET['category_id']) && $_GET['category_id'] == $obj['category_id']) ?>>
                <a class="nav-link" href="/cms/index.php?category_id=<?php echo $obj['category_id']; ?>"> <?php echo $obj['category_name']; ?> </a></li>
        <?php endforeach ?>

    </ul>

    <ul class="nav justify-content-end">
        <?php if (isset($_SESSION['user_logged']) || isset($_SESSION['basic_user'])): ?>
            <li class="nav-item"> <a class="nav-link" href="/cms/login/logout.php">Logout</a></li>
        <?php else : ?>
            <li class="nav-item"> <a class="nav-link" href="/cms/login/index.php">Login</a></li>
            <li class="nav-item"> <a class="nav-link" href="/cms/login/registration.php">Sing up</a></li>
        <?php endif ?>

        <?php if (isset($_SESSION['user_logged'])) : ?>
            <li class="nav-item">
                <a class="nav-link" href="/cms/addArticle.php">Add Article</a>
            </li>
        <?php endif ?>

    </ul>


    <div>
        <?php include($view); ?>
    </div>
</body>

</html>

<?php
require "templates/footer.php";

?>
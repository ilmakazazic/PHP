
<div class="row">		
	<?php foreach ($article as $obj): ?>
		<div class="col-4 mr-auto card" >
		<div class="card-body">
			<h2 class="card-title"><?php echo $obj['Title']; ?></h2>
			<p class="card-text"><?php echo $obj['Description']; ?></p>
			<a href="FullArticle.php?ID=<?php echo $obj['ID'] ?>" class="card-link">Više</a>
		</div>	
		</div>
	<?php endforeach ?>
</div>

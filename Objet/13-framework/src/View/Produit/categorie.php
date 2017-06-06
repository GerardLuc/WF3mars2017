		<div class="row">
			<div class="col-md-3">
				<p class="lead">Vêtements</p>
				<div class="list-group">
					<a href="?categorie=all" class="list-group-item" >Toutes les catégories</a>

					<?php foreach($categories as $categorie) : ?>

						<a href="?categorie=<?= $categorie['categorie'] ?>" class="list-group-item"><?= $categorie['categorie'] ?></a>
						
						
					<?php endforeach;  ?>
				</div>
			</div>
			
			<div class="col-md-9">
				<div class="row">
					<?php foreach ($produits AS $produit) : ?>
					<div class="col-sm-4 col-lg-4 col-md-4">
						<div class="thumbnail">
							<a href=""><img src="photo/<?= $produit['photo'] ?>" width="130" height="100" ></a>
							
							<div class="caption">
								<h4 class="pull-right"><?= $produit['prix'] ?>€</h4>
								<h4><?=  $produit['titre'] ?></h4>
								<p><?=  $produit['description'] ?></p>
							</div>
				
						</div>
					</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
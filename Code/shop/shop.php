<?php require 'header.php'; ?>

<div class="home">
	<div class="row">
		<div class="wrap">
			<?php $products = $DB->query('SELECT * FROM products'); ?>
			<?php foreach ( $products as $product ): ?>
				<div class="box">
					<div class="product full">
						<a href="#">
							<img src="img/<?= $product->id; ?>.jpg">
						</a>
						<div class="description">
							<?= $product->name; ?>
							<a href="#" class="price"><?= number_format($product->price,2,',',' '); ?> €</a>
						</div>
						<a href="addpanier.php?id=<?= $product->id; ?>" class="gift addPanier">
							Gift
						</a>
						<div class="rating">
							<span>Rating :</span>
							<ul>
								<li><a href="#">1</a></li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#">4</a></li>
								<li><a href="#" class="off">5</a></li>
							</ul>
						</div>
						<a class="add addPanier" href="addpanier.php?id=<?= $product->id; ?>">
							add
						</a>
					</div>
				</div>
			<?php endforeach ?>
		</div>
	</div>
</div>
    <div id="pagination">
    <nav aria-label="Page navigation">
        <ul class="pagination">
            <li>
                <a href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <li><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li>
                <a href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
    </div>


<?php require 'footer.php'; ?>
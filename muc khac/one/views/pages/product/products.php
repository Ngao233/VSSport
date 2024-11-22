<div class="container my-4">
    <div class="d-flex justify-content-between mb-2">
        <button class="btn btn-link">Filter +</button>
        <button class="btn btn-link">Sort By ▾</button>
    </div>

    <?php 
    $result = $product->show_products_list($prolist);
    ?>
    <div class="row">
        <!-- Card 1 -->
        <?=$result?>
    </div>
</div>
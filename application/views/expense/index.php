<h2><?php echo $Title ?></h2>

<?php foreach ($expenses as $expense): ?>

        <h3><?php echo $expense['Name'] ?></h3>
        <div class="main">
                <?php echo $expense['Description'] ?>
        </div>
        <p><a href="<?php echo base_url("expense/" . $expense['Slug']) ?>">View expense</a></p>

<?php endforeach ?>

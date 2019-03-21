<?php $this->layout('layout') ?>

<h1>My Tasks</h1>

<?php foreach($tasksInView as $item): ?>

<h2><?php echo $item ; ?></h2>

<?php endforeach; ?>


<section class="container">
    <h1>Página de <?php $this->getPageTitle(); ?></h1>
    <?php foreach ($this->view->posts as $post): ?>
    <p>Post: <?php echo $post->posts; ?> </p>
    <?php endforeach; ?>
</section>
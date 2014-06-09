<!-- template-snippet.php -->
<h1 class="title"><?php the_title() ?></h1>

<div class="the-content">
    <h2>Snippet Description</h2>
    <?php the_content(); ?>
    <h2>The code:</h2>
    <pre><?php echo $cfs->get('code'); ?></pre>

    <?php wp_link_pages(); ?>
</div>

<!-- /template-snippet.php -->
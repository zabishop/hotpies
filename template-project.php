<!-- template-project.php -->
<h1 class="title"><?php the_title() ?></h1>

<!--/post-meta -->

<div class="the-content">
    <h2>Project Description</h2>
    <?php the_content(); ?>

    <h2>Status</h2>
    <?php
    $values = $cfs->get('status');

    foreach ($values as $value => $label) {
        echo "<p>";
        echo $value;
        echo "</p>";
    }
    ?>

    <h2>Developer(s)</h2>
    <?php
    $values = $cfs->get('developer');
    $i = 0;
    echo "<p>";
    foreach ($values as $value => $label) {

        $i++;
        if ($i != count($values)) {
            $value .= ", ";
        }
        echo $value;

    }
    echo "</p>";
    ?>

    <h2>Documents</h2>
    <ul>
        <?php
        $fields = $cfs->get('documents');
        foreach ($fields as $field) {
            $url = $field['file'];
            $title = $field['title'];
            echo "<li><a href='{$url}'>{$title}</a></li>";
        }
        ?>
    </ul>

    <h2>Points of Contact</h2>
    <ul>
        <?php
        $fields = $cfs->get('points_of_contact');
        foreach ($fields as $field) {
            $name  = $field['name'];
            $email = $field['email'];
            $phone = $field['phone'];
            echo "<li>$name, $email, $phone</li>";
        }
        ?>
    </ul>

    <h2>Events</h2>
    <ul>
        <?php
        $fields = $cfs->get('events');
        foreach ($fields as $field) {
            $date  = $field['date'];
            $desc = $field['description'];

            echo "<li><strong>{$date}:</strong> {$desc}</li>";
        }
        ?>
    </ul>

    <?php //wp_link_pages(); ?>
</div>
<!-- the-content -->
<!-- /template-project.php -->
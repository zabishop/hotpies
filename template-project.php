<!-- template-project.php -->
<h1 class="title"><?php the_title() ?></h1>

<!--/post-meta -->

<div class="the-content">
    <h2>Project Description</h2>
    <?php the_content(); ?>

    <h2>Status</h2>
    <?php
    $status = $cfs->get('status');

    foreach ($status as $value => $label) {
        echo "<p class='status {$label}'>";
        echo $value;
        echo "</p>";
    }
    ?>

    <h2>Developer(s)</h2>
    <?php
    $developer = $cfs->get('developer');
    $i = 0;
    echo "<ul>";
    foreach ($developer as $value => $label) {
        echo "<li>";
        echo $value;
        echo "</li>";
    }
    echo "</ul>";
    ?>

    <?php
    $documents = $cfs->get('documents');
    if ($documents) {
        ?>
        <h2>Documents</h2>
        <ul>
            <?php
            foreach ($documents as $field) {
                $url = $field['file'];
                $title = $field['title'];
                echo "<li><a href='{$url}'>{$title}</a></li>";
            }
            ?>
        </ul>
    <?php } ?>

    <?php
    $points_of_contacts = $cfs->get('points_of_contact');
    if ($points_of_contacts) {
        ?>
        <h2>Points of Contact</h2>
        <ul>
            <?php
            foreach ($points_of_contacts as $contact) {

                $name = $contact['name'] ? $contact['name'] : null;
                $email = $contact['email'] ? '- '. $contact['email'] : null;
                $phone = $contact['phone'] ? '- '. $contact['phone'] : null;
                echo "<li>$name $email $phone</li>";
            } ?>
        </ul>
    <?php } ?>

    <?php
    $events = $cfs->get('events');
    if ($events) {
        ?>
        <h2>Events</h2>
        <ul>
            <?php
            foreach ($events as $event) {
                $date = $event['date'];
                $desc = $event['description'];

                echo "<li><strong>{$date}:</strong> {$desc}</li>";
            } ?>
        </ul>
    <?php } ?>

    <?php //wp_link_pages(); ?>
</div>
<!-- the-content -->
<!-- /template-project.php -->
<?php
/*
Template Name: Student List Template
*/

get_header();

$args = array(
    'post_type' => 'student',
    'posts_per_page' => -1,
    'orderby' => 'title',
    'order' => 'ASC',
);

$query = new WP_Query($args);

while ($query->have_posts()) :
    $query->the_post();
    ?>

    <!-- Output the student information -->
    <article class="student">
        <h2 class="student-name">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h2>
        <div class="student-excerpt">
            <?php
            $biography = get_field('biography');
            if ($biography) {
                $excerpt = wp_trim_words($biography, 25);
                echo $excerpt;
            }
            ?>
            <a class="read-more-link" href="<?php the_permalink(); ?>">Read More</a>
        </div>
        <div class="student-image">
            <?php the_post_thumbnail(); ?>
        </div>
        <div class="student-taxonomy">
            <?php the_terms(get_the_ID(), 'student_skill', 'Skills: ', ', '); ?>
        </div>
    </article>

<?php endwhile;

get_footer();
?>

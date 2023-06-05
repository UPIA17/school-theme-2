<?php
/*
Template Name: Schedule Template
*/

get_header();

while (have_posts()) :
    the_post();
    ?>

    <h2><?php the_title(); ?></h2>

    <?php if (have_rows('program_schedule')) : ?>
        <table>
            <thead>
                <tr>
                    <th>Time</th>
                    <th>Instructor</th>
                    <th>Class</th>
                </tr>
            </thead>
            <tbody>
                <?php while (have_rows('program_schedule')) : the_row(); ?>
                    <tr>
                        <td><?php the_sub_field('date'); ?></td>
                        <td><?php the_sub_field('instructor'); ?></td>
                        <td><?php the_sub_field('class'); ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else : ?>
        <p>No schedule available.</p>
    <?php endif; ?>

<?php endwhile;

get_footer();
?>
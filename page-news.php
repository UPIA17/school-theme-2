<?php
/*
Template Name: News Template
*/

get_header();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <header class="page-header">
            <h1 class="page-title"><?php the_title(); ?></h1>
        </header>

        <div class="posts-list">
            <?php
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => 3,
            );
            $query = new WP_Query($args);

            if ($query->have_posts()) :
                while ($query->have_posts()) :
                    $query->the_post();
                    ?>
                    <article class="post animate__animated animate__fadeInUp">
                        <h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        <div class="post-excerpt"><?php the_excerpt(); ?></div>
                    </article>
                    <?php
                endwhile;
                wp_reset_postdata();
            else :
                echo '<p>No posts found.</p>';
            endif;
            ?>
        </div>
    </main>
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>

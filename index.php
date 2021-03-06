<?php get_header(); ?>
<!-- ==========      
    HERO
===========-->
<div class="hero">
    <div class="container">
        <h1 class="title">learn from our stories</h1>
        <h4 class="mb-4">live a life far from mediocrity</h4>
        <a href="/about" class="btn-3 mt-5">about greyich</a>
    </div>
</div>
<!-- ==========      
    FEATURED  POSTS
===========-->
<div class="mt-5">
    <?php get_template_part('templates/featured-posts') ?>
</div>
<!-- ==========      
    CONTENT LAYOUT
===========-->
<div class="container mt-4">
    <div class="row">
        <!-- ==========      
            RECENT  POSTS
        ===========-->
        <div class="col-lg-8">
            <div class="sectionLabel">
                recent posts
            </div>
            <div class="row mt-4 mb-3">
                <?php
                    $paged = (get_query_var('page')) ? get_query_var('page') : 1;

                    $query = new WP_Query(
                        array(
                        'post_type'=>'blog',
                        'posts_per_page'=>3,
                        'paged'=>$paged,
                        // 'tax_query' => array(
                        //     array(
                        //         'taxonomy'  => 'blog_category',
                        //         'field'     => 'slug',
                        //         'terms'     => 'featured',
                        //         'operator'  => 'IN'
                        //     )
                        // )
                        )
                    );

                    if ( $query->have_posts() ) : 
                    while ( $query->have_posts() ) : $query->the_post();
                ?>
                <!-- POST CONTENT -->
                    <?php get_template_part('templates/post-template'); ?>
                <!-- POST CONTENT END -->
                <?php 
                endwhile; // end loop
                ?>
                <!-- pagination -->
                <!-- <div class="col-12 mt-1">
                    <div class="pagination p-1">
                        <?php echo paginate_links(array('total' => $query->max_num_pages)) ?>
                    </div>
                </div> -->
                <!--  -->
                <?php else: ?>
                    <div class="col-12">
                        <p>Sorry, no post to display.</p>
                    </div>
                <?php
                // Reset things, for good measure
                wp_reset_postdata();
                // end the loop
                endif;
                ?>
            </div>
            <div class="mb-5 d-flex justify-content-center d-lg-block">
                <a href="#" class="btn-2">view all posts</a>
            </div>
        </div>

        <!-- ==========      
            SIDE BAR
        ===========-->
        <div class="col-lg-4">
        <?php get_template_part('templates/sidebar') ?>
        </div>
    </div>
</div>
<!-- ==========      
    NEWSLETTER
===========-->
<?php get_template_part('templates/newsletter') ?>
<!-- ==========      
    FOOTER
===========-->
<?php get_footer(); ?>
<?php get_header() ; ?>

<section class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
            <div class="panel-heading">Blog Post</div> <!-- .panel-heading -->
            <div class="panel-body">
                 <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                 <article class="blog">
                        <div class="blog-meta">
                             <h2 class="blog-meta-title"><?php the_title() ; ?></h2>
                             <p class="blog-meta-detail">
                                 Posted by <?php the_author_posts_link(); ?> on <?php the_time('F j, Y'); ?>
                                 Category <?php if(has_category()) {
                                        the_category(', ');
                                      } else {
                                       echo("No Category Found!!");
                                        }
                              ?>
                              <?php if(has_tag()) {
                                        the_tags();
                                      } else {
                                       echo("No Tags Found!!");
                                        }
                              ?>
                            </p>
                        </div> <!-- blog-meta -->
                         <?php if ( has_post_thumbnail() ) : ?>
                         <div class="blog-img">
                         <?php the_post_thumbnail('full',array(
                               'class' => 'img-responsive',
                             )); ?>
                          </div> <!-- blog-post-img -->
                         <?php endif ; ?> <!-- if ends here of thumbnail -->
                             <div class="blog-excerpt">
                             <?php the_content() ; ?>
                             </div> <!-- blog-content -->
                 </article>
                 <hr>
                 <?php endwhile; else : ?> <!-- while ends here of post loop and else starts -->
	                 <article class="blog">
	                 <p><?php _e( 'Sorry, no posts found yo can always start writing' ); ?></p>
	                 </article>
                     <?php endif; ?> <!-- if ends here post loop -->
            <div class="blog-comment">
                <?php comments_template(); ?>
            </div>
            </div> <!-- .panel-body -->
            </div> <!-- .panel-default -->
        </div> <!-- .col-md-8 -->
        <div class="col-md-4">
            <aside class="sidebar">
                <?php if(is_active_sidebar('sidebar')) : ?>
					<?php dynamic_sidebar('sidebar'); ?>
				<?php endif; ?>
            </aside>
        </div> <!-- .col-md-4 -->
    </div> <!-- .row -->
</div> <!-- .container -->
</section> <!-- .container -->

<?php get_footer() ; ?>
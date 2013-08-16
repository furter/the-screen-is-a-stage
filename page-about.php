<?php
/*
Template Name: About
*/


get_header(); // This fxn gets the header.php file and renders it ?>
    <div id="primary" class="row-fluid">
        <div id="content" role="main" class="span8 offset2">

            <?php if ( have_posts() ) : 
            // Do we have any posts in the databse that match our query?
            // In the case of the home page, this will call for the most recent posts 
            ?>

                <?php while ( have_posts() ) : the_post(); 
                // If we have some posts to show, start a loop that will display each one the same way
                ?>

                    <article class="post">
                    
                        <div class="browser">
                            <div class="browser-tab"><?php echo '<div class="favicon">' . get_post_meta( get_the_ID(), 'favicon', TRUE ) . '</div>'; ?><?php echo '<div class="tab-title">' . get_post_meta( get_the_ID(), 'tab-text', TRUE ) . '</div>'; ?></div>
                            <div class="dropt-info" style="position: relative; float: left; margin: 8px 0px 0px 12px; font-family: RobotoLight; font-size: 17px"><div><?php echo get_post_meta( get_the_ID(), 'info', TRUE ); ?></div>+</div>
                            <div style="position: absolute; top: 6px; right: 15px; font-size: 16px">About</div>
                            <div class="browser-bar">
                                <div style="position: absolute; left: 20px; top: 12px; font-size: 17px; color: #E8E8E8 ">
                                    ←
                                </div>
                                <div style="position: absolute; left: 55px; top: 12px; font-size: 17px; color: #E8E8E8 ">
                                    →
                                </div>
                                <div class="browser-url"><a href="<?php the_title(); ?>"><?php the_title(); // Show the title of the posts ?></a></div>
                            </div>
                            <div style="position: relative; float: left; height: 600px">
                                <?php the_content( 'Continue...' ); 
                                // This call the main content of the post, the stuff in the main text box while composing.
                                // This will wrap everything in p tags and show a link as 'Continue...' where/if the
                                // author inserted a <!-- more --> link in the post body
                                ?>
                                
                                <?php wp_link_pages(); // This will display pagination links, if applicable to the post ?>
                            </div><!-- the-content -->
                        </div><!-- browser -->

                    </article>

                <?php endwhile; // OK, let's stop the posts loop once we've exhausted our query/number of posts ?>

            <?php else : // Well, if there are no posts to display and loop through, let's apologize to the reader (also your 404 error) ?>
                
                <article class="post error">
                    <h1 class="404">Nothing has been posted like that yet, but you can propose it to the curator of the site.</h1>
                </article>

            <?php endif; // OK, I think that takes care of both scenarios (having posts or not having any posts) ?>
        </div><!-- #content .site-content -->
    </div><!-- #primary .content-area -->
<?php get_footer(); // This fxn gets the footer.php file and renders it ?>
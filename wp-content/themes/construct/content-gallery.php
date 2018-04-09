<article class="hentry">
    <div class="post-media clearfix">
        <div class="owl-carousel owl-theme blog-slide">
        <?php if( function_exists( 'rwmb_meta' ) ) { ?>
            <?php $images = rwmb_meta( '_cmb_images', "type=image" ); ?>
            <?php if($images){ ?>              
                <?php  foreach ( $images as $image ) {  ?>
                    <?php $img = $image['full_url']; ?>
                    <div class="item"><img src="<?php echo esc_url($img); ?>" alt=""></div>
                <?php } ?>                
            <?php } ?>
        <?php } ?>
        </div>
    </div><!-- /.post-media -->

    <div class="post-content-wrap">
        <h2 class="post-title">
            <span class="post-title-inner">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </span>
        </h2><!-- /.post-title -->

        <div class="post-meta style-2">
            <div class="post-meta-content">
                <div class="post-meta-content-inner">
                    <span class="post-by-author item">
                        <span class="inner"><?php esc_html_e('By', 'construct'); ?> <?php the_author_posts_link(); ?> </span>
                    </span>

                    <span class="post-date item">
                        <span class="inner"><span class="entry-date"><?php the_time( get_option( 'date_format' ) ); ?></span></span>
                    </span>

                    <span class="post-comment item">
                        <span class="inner"><?php comments_number( esc_html__('0 comments', 'construct'), esc_html__('1 comment', 'construct'), __('% comments', 'construct') ); ?></span>
                    </span>

                    <?php if(has_tag()){ ?>
                        <span class="post-meta-categories item">
                            <span class="inner">
                                <?php the_tags('',', ') ?>
                            </span>
                        </span>
                    <?php } ?>
                </div>
            </div>
        </div><!-- /.post-meta -->

        <div class="post-content post-excerpt">
            <p><?php echo construct_excerpt_length(); ?></p>
        </div><!-- /.post-excerpt -->

        <div class="post-read-more">
            <div class="post-link">
                <a href="<?php the_permalink(); ?>"><?php if(construct_get_option('readmore_btn')){echo htmlspecialchars_decode(construct_get_option('readmore_btn'));}else{ esc_html_e('Read More', 'construct'); } ?></a>
            </div>
        </div><!-- /.post-read-more -->
    </div><!-- /.post-content-wrap -->
</article>

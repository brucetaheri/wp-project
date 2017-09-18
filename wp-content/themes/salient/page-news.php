<?php 
/*template name: News*/
get_header(); ?>
<div class="news_blog_1">
    <div class="blog_img"> 
    <?php
        $args = array(
                'numberposts' => 6,
                'offset' => 0,
                'category' => 0,
                'orderby' => 'post_date',
                'order' => 'DESC',
                'include' => '',
                'exclude' => '',
                'meta_key' => '',
                'meta_value' => '',
                'post_type' => 'post',
                'post_status' => 'draft, publish, future, pending, private',
                'suppress_filters' => true 
        );
        $recent_posts = wp_get_recent_posts($args);
        
        
            if (has_post_thumbnail($recent_posts[0]["ID"])) {
                echo get_the_post_thumbnail($recent_posts[0]["ID"], 'large');
            }?>
    </div>
    <div class="news_blog_overlay">
        <div class="blog_date">
            <?php echo get_the_date('M d, Y', $recent_posts[0]["ID"]); ?>
        </div>
        <div class="blog_title"> 
            <?php echo get_the_title($recent_posts[0]["ID"]);?>
        </div>
        <button>Read More</button>
    </div>
</div>

<div class="news_blog_2">
    <div class="blog_date">
        <?php echo get_the_date('M d, Y', $recent_posts[1]["ID"]); ?>
    </div>
    <div class="blog_title"> 
        <?php echo get_the_title($recent_posts[1]["ID"]);?>
    </div>
    <div class="blog_img"> 
    <?php   
        
            if (has_post_thumbnail($recent_posts[1]["ID"])) {
                echo get_the_post_thumbnail($recent_posts[1]["ID"], 'large');
            }?>
    </div>
    <div class="news_blog_overlay">
        
        <button>Read More</button>
    </div>
</div>

<div style="color: rgb(6, 42, 71); line-height: 180px; font-size: 30px; margin-left: 40px; font-weight: bold;">Recent</div>

<div class="news_blog_bottom">
    <div class="news_blog_3">
        <div class="blog_img"> 
        <?php   
            
                if (has_post_thumbnail($recent_posts[2]["ID"])) {
                    echo get_the_post_thumbnail($recent_posts[2]["ID"], 'large');
                }?>
        </div>
        <div class="news_blog_overlay">
            <div class="blog_date">
                <?php echo get_the_date('M jS, Y', $recent_posts[2]["ID"]); ?>
            </div>
            <div class="blog_title"> 
                <?php echo get_the_title($recent_posts[2]["ID"]);?>
            </div>
            <div style="width: 35px; height: 3px; border-top: 3px solid #fa4c06; margin-top: 20px"></div>
            <button>+ Read More</button>
        </div>
    </div>

    <div class="news_blog_4">
        <div class="blog_img"> 
        <?php   
            
                if (has_post_thumbnail($recent_posts[3]["ID"])) {
                    echo get_the_post_thumbnail($recent_posts[3]["ID"], 'medium');
                }?>
        </div>
        <div class="news_blog_overlay">
            <div class="blog_date">
                <?php echo get_the_date('M jS, Y', $recent_posts[3]["ID"]); ?>
            </div>
            <div class="blog_title"> 
                <?php echo get_the_title($recent_posts[3]["ID"]);?>
            </div>
            <div style="width: 35px; height: 3px; border-top: 3px solid white; margin-top: 20px;"></div>
            <button>+ Read More</button>
        </div>
    </div>

    <div class="news_blog_5">
        <div class="blog_img"> 
        <?php   
            
                if (has_post_thumbnail($recent_posts[4]["ID"])) {
                    echo get_the_post_thumbnail($recent_posts[4]["ID"], 'medium');
                }?>
        </div>
        <div class="news_blog_overlay">
            <div class="blog_date">
                <?php echo get_the_date('M jS, Y', $recent_posts[4]["ID"]); ?>
            </div>
            <div class="blog_title"> 
                <?php echo get_the_title($recent_posts[4]["ID"]);?>
            </div>
            <div style="width: 35px; height: 3px; border-top: 3px solid white; margin-top: 20px;"></div>
            <button>+ Read More</button>
        </div>
    </div>

    <div class="news_blog_6">
        <div class="blog_img"> 
        
        </div>
        <div class="news_blog_overlay">
            <div class="blog_date">
                <?php echo get_the_date('M jS, Y', $recent_posts[5]["ID"]); ?>
            </div>
            <div class="blog_title"> 
                <?php echo get_the_title($recent_posts[5]["ID"]);?>
            </div>
            <div style="width: 35px; height: 3px; border-top: 3px solid white; margin-top: 20px;"></div>
            <button>+ Read More</button>
        </div>
    </div>
</div>



<?php get_footer(); ?>
<?php
/**
 * The template for displaying home page.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package SKT Girlie
 */

get_header(); 
?>
    <div id="menu">
        <?php wp_nav_menu( array('theme_location' => 'primary')); ?>
    </div><!-- nav -->
 <div class="row">
     <div class="col-lg-5">
         <h2>今日活动</h2>
         <ul class="list-group">
             <?php query_posts("showposts=5&cat=4")?> 
             <?php while (have_posts()) : the_post(); ?>
             <li class="list-group-item"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></li>


             <?php endwhile; ?>
          </ul>
     </div>
     <div class="col-lg-7">
         <h2>活动环境</h2>
         <ul class="photo_list">
             <?php query_posts("showposts=6&cat=6")?>
             <?php while (have_posts()) : the_post();
                $args=array(
                    'post_type'=>'attachment',
                    'posts_per_page'=>1,
                    'post_mime_type'=>'image',
                    'post_parent'=>$post->ID
                );
                $attachments=get_posts($args);
             $image=wp_get_attachment_image_src($attachments[0]->ID,'medium');
                 ?>
                 <li><a href="<?php the_permalink() ?>" rel="bookmark">


                   <img src="<?php echo $image[0]; ?>"/></a></li>




             <?php endwhile; ?>
         </ul>
     </div>

 </div>
    <ul class="row">
        <div class="col-lg-5">
            <h2>活动视频</h2>
            <ul class="video_list">
                <?php query_posts("showposts=4&cat=8")?>
                <?php while (have_posts()) : the_post();
                    $phrase=get_the_content();
                    $phrase=apply_filters('the_content',$phrase);
                    $replace='<div class="player" style="height: 200px;width: 100%;">';
                    $video=str_replace('<div class="player">',$replace,$phrase);
                    ?>
                <li> <?php echo $video; ?></li>




                <?php endwhile; ?>
            </ul>
        </div>
        <div class="col-lg-7">
            <h2>交友话题</h2>
            <ul class="list-group">

                <?php query_posts("showposts=4&cat=3")?>
                <?php while (have_posts()) : the_post();
                    $phrase=substr(strip_tags(get_the_content()),0,201);
                    ?>

                    <li class="list-group-item"><h3><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h3>
                        <p><?php echo $phrase;?> <a href="<?php the_permalink();?>">详情</a></p>

                    </li>


                <?php endwhile; ?>
             </ul>

        </div>
    <div class="row">
        <div class="col-lg-5">
            <h2>行车路线</h2>
            <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
            <p><a class="btn btn-default" href="#">more</a></p>
        </div>
        <div class="col-lg-7">
            <h2>活动现场</h2>
            <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>

        </div>

    </div>
<?php get_footer(); ?>
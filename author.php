<?php
$user_id = NULL;
$user_acf_prefix = get_the_author_meta('ID');
$user_id_prefixed = $user_acf_prefix . $user_id;
	
get_header();
?>

<style type="text/css" media="screen">
	.author-profile-card {
    background: #eee;
    border: 1px solid #ccc;
    padding: 20px;
    margin-bottom: 20px;
}
.author-photo {
    float: left;
    text-align: left;
    padding: 5px;
}
</style>

<?php $author_header = get_field( 'author_header', $user_id_prefixed ); ?>
<?php if ( $author_header ) { ?>
	<img class="uk-width-1-1" src="<?php echo $author_header['url']; ?>" alt="<?php echo $author_header['alt']; ?>" />
<?php } ?>

<div id="wrap">
	
	
</div><!-- #wrap -->


<?php
// Set the Current Author Variable $curauth
$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
?>

    <?php echo $curauth->display_name; ?><br>
		<?php echo $curauth->ID; ?><br>
		<?php echo $curauth->jabber; ?><br>
		<?php echo $curauth->user_email; ?><br>
		<?php echo $curauth->user_registered; ?><br>
		<?php echo $curauth->user_url; ?><br>
		<?php echo $curauth->yim; ?><br>
     
<div class="author-profile-card">
    <h2>About: <?php echo $curauth->nickname; ?></h2>
    <div class="author-photo">
    <?php echo get_avatar( $curauth->user_email , '90 '); ?>
    </div>
    <p><strong>Website:</strong> <a href="<?php echo $curauth->user_url; ?>"><?php echo $curauth->user_url; ?></a><br />
    <strong>Bio:</strong> <?php echo $curauth->user_description; ?></p>
</div>
     
<h2>Posts by <?php echo $curauth->nickname; ?>:</h2>
 
 
         <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<h3>
<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>">
<?php the_title(); ?></a>
</h3>
<p class="posted-on">Posted on: <?php the_time('d M Y'); ?></p>
 
<?php the_excerpt(); ?>
 
<?php endwhile; 
 
// Previous/next page navigation.
the_posts_pagination();
 
 
else: ?>
<p><?php _e('No posts by this author.'); ?></p>
 
<?php endif; ?>

<?php get_footer(); ?>
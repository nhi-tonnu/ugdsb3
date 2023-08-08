<?php
/**
 * The template for displaying search forms in ugdsb3
 *
 * @package ugdsb3
 */
?>

<form role="search" method="get" class="form-search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
  <div class="input-group">
  	<label class="screen-reader-text" for="s"><?php _e( 'Search for:', 'ugdsb3' ); ?></label>
    <input type="text" class="form-control search-query" placeholder="<?php echo esc_attr_x( 'Search&hellip;', 'placeholder', 'ugdsb3' ); ?>" value="<?php echo get_search_query(); ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label', 'ugdsb3' ); ?>" />
    <span class="input-group-btn">
      <button type="submit" class="btn btn-default" name="submit" id="searchsubmit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'ugdsb3' ); ?>"><span class="glyphicon glyphicon-search"></span></button>
    </span>
  </div>
</form>
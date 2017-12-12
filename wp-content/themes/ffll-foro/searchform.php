<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
    <label for="search-input">
        <span class="screen-reader-text"><?php echo _x( 'Buscar por:', 'ungrynerd' ) ?></span>
        <input type="search" class="search-field"
            placeholder="<?php echo esc_attr_x( 'Buscar', 'ungrynerd' ) ?>"
            value="<?php echo get_search_query() ?>" name="s"
            title="<?php echo esc_attr_x( 'Buscar por:', 'ungrynerd' ) ?>"
            id="search-input"/>
    </label>
    <input type="submit" class="search-submit"
        value="<?php echo esc_attr_x( 'Search', 'submit button' ) ?>" title="<?php echo esc_attr_x( 'Buscar', 'ungrynerd' ) ?>" />
</form>

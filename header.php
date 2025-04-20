<header class="bg-gray-100 py-4">
    <div class="container mx-auto flex justify-between items-center">
        <h1 class="text-3xl font-bold">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
        </h1>
        <nav>
            <?php
            wp_nav_menu( array(
                'theme_location' => 'primary',
                'menu_class'     => 'flex space-x-4',
            ) );
            ?>
        </nav>
    </div>
</header>
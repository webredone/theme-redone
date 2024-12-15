<footer class="footer">
    <div class="container">
        <h2>Footer</h2>

        <h4>Footer Menu 1</h4>
        <?php
        wp_nav_menu([
            'theme_location' => 'menu-footer',
            'depth' => 1,
        ]);
        ?>

        <p class="copyright">
            <small>&copy; <?= date("Y") ?></small>
        </p>
    </div>
</footer>

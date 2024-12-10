</main>
<div class="backdrop"></div>
<footer class="footer">
    <div class="container">
        <h2>Footer</h2>

        <h4>Footer Menu 1</h4>
        <?php
        echo wp_nav_menu([
            'theme_location' => 'menu-footer',
            'depth' => 1,
        ]);
        ?>

        <p class="copyright">
            <small>Copyright &copy; <?php echo date("Y"); ?></small>
        </p>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>

<footer>
  &copy; <?= date('Y'); ?> WNC Birds
</footer>

</body>
<?= display_error_ids($bird->error_ids); ?>
</html>

<?php
  db_disconnect($database);
?>

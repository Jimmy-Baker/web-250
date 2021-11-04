<footer>
  &copy; <?= date('Y'); ?> WNC Birds
</footer>

</body>
<?php if(isset($bird->error_ids)){display_error_ids($bird->error_ids);}; ?>
</html>

<?php
  db_disconnect($database);
?>

<footer>
  &copy; <?php echo date('Y'); ?> WNC Birds
</footer>

</body>
<?php echo display_error_ids($bird->error_ids); ?>
</html>

<?php
  db_disconnect($database);
?>

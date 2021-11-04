<footer>
  &copy; <?php echo date('Y'); ?> WNC Birds
</footer>

</body>
<?php if(isset($bird->error_ids)) {echo display_error_ids($bird->error_ids);}; ?>
</html>

<?php
  db_disconnect($database);
?>

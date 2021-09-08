   <script src="//code.jquery.com/jquery-3.5.1.min.js"></script>

    <!-- define the project's URL (to make AJAX calls possible, even when using this in sub-folders etc) -->
    <script>
        var url = "<?php echo substr_replace(URL,'/',-1); ?>";
    </script>

    <!-- our JavaScript -->
    <script src="<?php echo substr_replace(URL,'/',-1); ?>js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo substr_replace(URL,'/',-1); ?>js/application.js"></script>
</body>
</html>

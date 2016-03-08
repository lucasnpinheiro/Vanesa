<script>
    var router = {
        url: "<?php echo \Cake\Routing\Router::url('/', true); ?>",
        params: <?php echo json_encode($this->request->params); ?>
    };
</script>

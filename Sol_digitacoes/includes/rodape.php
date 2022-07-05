</main>

<footer class="fixarRodape">

    <p>Site desenvolvido por Vagner</p>


    <?php

    date_default_timezone_set("America/Sao_Paulo");
    $data = date ("d/m/Y - H:i:s");

    ?>

    <p> <?= $data ?> </p>

</footer>

    <!-- bootstrap e jquery -->

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>


    <!-- javascript para post.php e usuarios.php -->
    <?php if($pagina == 'posts.php' || $pagina == 'usuarios.php'){ ?>
    
        <script src="../js/confirm-exclusao.js"></script>
        <script src="../js/contador-de-caracteres.js"></script>
    
    <?php } ?>

    <!-- javascript para post-insere.php e post-atualiza.php -->
    <?php if($pagina == 'post-insere.php' || $pagina == 'post-atualiza.php'){ ?>
    
        <script src="../js/confirm-exclusao.js"></script>
        <script src="../js/contador-de-caracteres.js"></script>

    <?php } ?>

    <!-- javascript para formulario.php -->
    <?php if($pagina == 'contato.php'){ ?>

        <script src="js/calcular-idade.js"></script>
        
        <!-- script.js depende do vanilla-masker.min.js -->
        <script src="js/vanilla-masker.min.js"></script>
        <script src="js/scripts.js"></script>

    <?php } ?>

</body>
</html>

<?php ob_end_flush(); ?>
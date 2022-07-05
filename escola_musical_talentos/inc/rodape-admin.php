    </main>

    <footer>
    <a href="index.php"><img src="../imagens/rodape/logo-musical-talentos.jpg" alt="" width="85" height="85"></a>
        <!-- Endereço do projeto Musical Talentos -->
        <address>
            <p><b>Projeto Musical Talentos</b><br>Escola Estadual José Candido de Souza<br>Rua Diana, 1070 - Pompéia, São Paulo/SP<br>Cep: 05019-000</p>
        </address>
    </footer>

        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

        <?php if($pagina == 'posts.php' || $pagina == 'usuarios.php'){ ?>
            <script src="../js/confirm-exclusao.js"></script>
        <?php } ?>

        <?php if($pagina == 'post-insere.php' || $pagina == 'post-atualiza.php'){ ?>
            <script src="../js/contador-de-caracteres.js"></script>
        <?php } ?>

</body>
</html>

<?php ob_end_flush(); ?>
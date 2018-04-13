
            <h2>Listagem de Categoria</h2>

            <table>
                <thead>
                    <th>#</th>
                    <th>Nome da Categoria</th>
                </thead>
                <tbody>

                    <?php foreach ($categorias as $categoria):?>

                    <tr>
                        <td><?= $categoria->getId()?></td>
                        <td><a href="?acao=show&id"><?= $categoria->getId()?>
                                <?= $categoria->getNome()?>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach;?>

                </tbody>
            </table>

    </body>


</head>

</html>
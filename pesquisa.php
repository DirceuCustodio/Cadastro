<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet"  href="css/bootstrap.min.css">

    <title>Pesquisar</title>
  </head>
  <body>

    <?php 

        $pesquisa = $_POST['busca'] ??'';

        include "conexao.php";

        $sql = "SELECT * FROM pessoas WHERE nome LIKE '%$pesquisa%'";

        $dados = mysqli_query($conn, $sql);

    ?>

    <div class="container">
      <div class="row">
        <div class="col">
          <h1>Pesquisar</h1>
          
          <nav class="navbar bg-body-tertiary">
            <div class="container-fluid">
              <form class="d-flex" role="search" action="pesquisa.php" method="POST">
                <input class="form-control me-2" type="search" placeholder="Nome" aria-label="Search" name="busca" autofocus>
                <button class="btn btn-outline-success" type="submit">Pesquisar</button>
              </form>
            </div>
          </nav>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Endereço</th>
                        <th scope="col">Telefone</th>
                        <th scope="col">Email</th>
                        <th scope="col">Data de Nascimento</th>
                        <th scope="col">funções</th>
                    </tr>
                </thead>
                <tbody>

                <?php

                      while ($linha = mysqli_fetch_assoc($dados) ) {
                        $cod_pessoa = $linha['cod_pessoa'];
                        $nome = $linha['nome'];
                        $endereco = $linha['endereco'];
                        $telefone = $linha['telefone'];
                        $email = $linha['email'];
                        $data_nascimento = $linha['data_nascimento'];
                        $data_nascimento = mostra_data($data_nascimento);

                        echo "<tr>
                                  <th scope='row'>$nome</th>
                                  <td>$endereco</td>
                                  <td>$telefone</td>
                                  <td>$email</td>
                                  <td>$data_nascimento</td>
                                  <td>
                                      <a href='cadastro_edit.php? id=$cod_pessoa' class='btn btn-success btn-sm'>Editar</a>
                                      <a href='#' class='btn btn-danger btn-sm' data-bs-toggle='modal' data-bs-target='#confirma'
                                      onclick=" .'"' ."pegar_dados($cod_pessoa, '$nome')" .'"'.">Excluir</a>
                                  </td>

                              </tr>";
                      }
                ?>

                      <!-- onclick="pegar_dados($id, '$nome')"  O segredo está aqui!! -->

                </tbody>
            </table>
            
              <a href="index.php" class="btn btn-info">Voltar para o Início</a>
        </div>  
      </div>
    </div>

    <!-- Modal -->
<div class="modal fade" id="confirma" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title fs-5" id="exampleModalLabel">Confirmação de exclusão</h2>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="excluir_script.php" method="POST">
          <p>Deseja realmente excluir?</p>
          <b id="nome_pessoa">Nome do pessoa</b>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Não</button>
            <input type="hidden" name="id" id="cod_pessoa" value="">
            <input type="submit" class="btn btn-danger" value="Sim">
        </form>
      </div>
    </div>
  </div>
</div>
    

<script type="text/javascript">
    function pegar_dados(id, nome) {
        document.getElementeById('nome_pessoa').innerHTML = nome;
        document.getElementeById('cod_pessoa').value = id;
    }

</script>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>
<?php
  $pdo = new PDO('mysql:host=localhost;dbname=bootstrap_projeto','root','');
  $sobre = $pdo->prepare("SELECT * FROM `tb_sobre`");
  $sobre->execute();
  $sobre = $sobre->fetch()['sobre'];
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-fixed-top bg-light">
      <div class="container">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="box">
      <section class="banner">
        <div class="overlay">
          <div class="container chamada-banner">
              <div class="row">
                <div class="col-md-12 text-center">
                    <h2> <?php echo htmlentities('<'); ?>Danki.Code<?php echo htmlentities('>'); ?></h2>
                    <p>Empresa voltada para desenvolvimento web e marketing digital.</p>
                    <a href="">Saiba Mais</a>
                </div>
              </div>
          </div>
        </div>
      </section>
      <section class="cadastro-lead">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-6">
                    <h2><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-square-text-fill" viewBox="0 0 16 16">
                          <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2h-2.5a1 1 0 0 0-.8.4l-1.9 2.533a1 1 0 0 1-1.6 0L5.3 12.4a1 1 0 0 0-.8-.4H2a2 2 0 0 1-2-2V2zm3.5 1a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9zm0 2.5a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9zm0 2.5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5z"/>
                        </svg> Entra na nossa lista!</h2>
                </div>
                <div class="col-md-6">
                    <form>
                        <input type="text" name="nome" /><button type="button" class="btn btn-dark">Enviar!</button>                     
                    </form>
                </div>
            </div>
        </div>
      </section>
      <section class="depoimento text-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Depoimento</h2>  
                        <blockquote class="blockquote">
                            <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam at nisl et mauris vehicula interdum in eget nulla. Sed pellentesque iaculis mi, non mollis ligula egestas vitae. Integer iaculis tincidunt neque sit amet varius. Nullam eget neque id ligula ornare sollicitudin. Pellentesque ac urna sed ipsum auctor bibendum ac vitae enim. Suspendisse fringilla, est nec cursus hendrerit, elit est faucibus neque, vitae molestie nisl erat ut tellus. Mauris congue aliquet blandit. Phasellus sagittis malesuada feugiat."</p>
                        </blockquote>
                    </div>   
                </div>
            </div>
      </section>
      <section class="diferenciais text-center">
        <h2>Conheça nossa empresa</h2>
            <div class="container diferenciais-container">
                <div class="row">
                    <?php echo $sobre ?>
                </div>
            </div>
      </section>
      <section class="equipe">
        <h2>Equipe</h2>
        <div class="container equipe-container">
            <div class="row">
              <?php 
                $selectMembros = $pdo->prepare("SELECT * FROM `tb_equipe`");
                $selectMembros->execute();
                $membros = $selectMembros->fetchAlL();
                for($i = 0; $i < count($membros); $i++){
              ?>
                <div class="col-md-6">
                    <div class="equipe-single">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="user-picture">
                                    <div class="user-picture-child"><svg xmlns="http://www.w3.org/2000/svg" width="85" height="85" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                      <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                      <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                                      </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <h3><?php echo $membros[$i]['nome'] ?></h3>
                                <p>"<?php echo $membros[$i]['descricao'] ?>"</p>
                            </div>
                        </div>
                    </div>
                </div> 
                <?php } ?>               
            </div>  
        </div>
      </section>
      <section class="final-site">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h2>Fale conosco</h2>
                        <form>
                            <div class="form-group">
                                <label for="email">Nome:</label>
                                <input type="text" name="nome" class="form-control" id="nome">
                            </div>
                            <div class="form-group">
                                <label for="email">E-mail:</label>
                                <input type="email" name="email" class="form-control" id="email">
                            </div>
                            <div class="form-group">
                                <label for="email">Mensagem:</label>
                                <textarea class="form-control"></textarea>
                            </div>
                            <button type="subtmit" class="btn btn-dark">Subtmit</button>
                        </form> 
                    </div>
                    <div class="col-md-6">
                        <h2>Nossos planos</h2>
                        <table class="table">
                            <thead>
                              <tr>
                                <th>Plano Semanal</th>
                                <th>Plano Diário</th>
                                <th>Plano Anual</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>R$199,00</td>
                                <td>R$299,00</td>
                                <td>R$99,00</td>
                              </tr>
                              <tr>
                                <td>R$199,00</td>
                                <td>R$299,00</td>
                                <td>R$99,00</td>
                              </tr>
                              <tr>
                                <td>R$199,00</td>
                                <td>R$299,00</td>
                                <td>R$99,00</td>
                              </tr>
                            </tbody>
                          </table>    
                    </div>
                </div>   
            </div>
      </section>
    </box>
    <footer class="footer mt-auto py-3 bg-light">
        <div class="container">
          <span class="text-muted">Place sticky footer content here.</span>
        </div>
      </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>
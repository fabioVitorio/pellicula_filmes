<?php 

session_start();

require_once('../../config/Conexao.php');
require_once('../../dao/FilmeDao.php');
require_once('../../dao/UserDao.php');
require_once('../../model/Filme.php');
require_once('../../model/Usuario.php');


//instancia as classes
$filme = new Filme();
$filmedao = new FilmeDao();

$usuario = new Usuario();
$userdao = new UserDao();

$login = new UserDao();

$id = $_SESSION['user_session'];

if(!$login->checkLogin()) {
    header("Location: ../Login/login.php");
}



?>


<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <title> Ranking de Melhores Avaliados </title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    </head>

    <body>

        <!-- HEADER -->
        <nav id="menu">
            <a href="../../"><section id="logo"></section></a>
            <!-- menu lateral -->
            <a href="#menu" id="toggle"><span></span></a>
            <div id="menuu">
                <ul id="ulMenu">
                    <li class="liMenu"><a class="a" href="../../">HOME</a></li>
                    <li class="liMenu"><a class="a" href="">RANK</a></li>
                    <li class="liMenu"><a class="a" href="">CONTATO</a></li>
                </ul>
            </div>
            <ul id="ul">
                <li><a href="../../">Home</a></li>
                <li><a href="">Ranking</a></li>
                <li><a href="">Contato</a></li>
            </ul>
            <a href="#">
				<div class="action">
				<section id="icon_user" class="profile" onclick="menuToggle();">
					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle"
						viewBox="0 0 16 16" id="user">
						<path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
						<path fill-rule="evenodd"
							d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
					</svg>
				</section>
			</a>
			<?php foreach ($userdao->user() as $usuario) : ?>
			<div class="menuUser">
                <h3>
					<?= $usuario->getNome() ?>
                    <div style="margin-top: 5px;">

					<?php
					if($usuario->getID() != 1) {
    				echo 'Usuário';
					} else {
						echo 'Administrador';
					}
					?>

                    </div>
                </h3>
                <ul>
                    <li>
                        <span class="icons-size"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                            <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                          </svg></span>
                        <a href="../../controller/UsuarioController.php?logout=true">Sair</a>
                    </li>
                </ul>
            </div>
			<?php endforeach ?>
            <section id="pesquisa">
                <form action="#" method="post">
                    <input type="text" id="barra_pesquisa" placeholder="Pesquise pelo nome" />
                </form>
                <button>
                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor" class="bi bi-search"
                        viewBox="0 0 16 16" id="lupa">
                        <path
                            d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                    </svg>
                </button>
            </section>
            
        </nav>

        <!-- CARROSSEL -->
        <section id="display">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="img/film4.png" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="img/film5.jpg" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="img/fiml3.jpg" class="d-block w-100" alt="...">
              </div>
            </div>
        </div>
        </section>

        <!-- MAIN TABELA DO RANKING -->
        <main class="table-responsive">
            <table class="table-bordered">
                <tr>
                    <td class="titulo">
                        <p>TÍTULO</p>
                    </td>
                    <td class="nota">
                        <p>NOTA</p>
                    </td>
                </tr>

                <tr>
                    <td class="vazia">
                        
                    </td>
                    <td class="vazia">
                    
                    </td>
                </tr>

                
                <?php foreach ($filmedao->listaranking() as $filme) : ?>

                <tr>
                    <td class="tabela">
                        <article>
                            <form action="../Pag_Individual/index.php" method="post" name="armazena">
                                <section id="imagem_filme" style="height: 25vh; width: 25vh; position: relative;"> 
                                <input type="submit" value="" class="btnSubmit"/>
                                <img src="../../img/<?= $filme->getImg() ?>" style="width:100%; height: 100%;"/>
                                <input type="hidden" id="id_pag" name="id_pag" value="<?= $filme->getID() ?>" style="width: 100%; height: 100%;"/>
                                
                            
                            </section>
                            </form>
                            <section id="texto_filme">
                                <p class="title"><?= $filme->getNome() ?></p>
                                <p class="texto">LANÇAMENTO: <?= $filme->getLancamento() ?></p>
                            </section>
                        </article>
                    </td>
                    <td class="tabela">
                        <p class="texto_grande"><?= $filme->getMedia()?></p>
                    </td>
                </tr>
                <?php endforeach ?>
                
            </table>
        </main>

        <!-- FOOTER -->
        <footer>
            <section id="logoFooter"></section>
            <label id="copy"> &copy; Copyrigth reserved By: PELLICULA</label>
            <label id="contactFooter">pellicula@email.com</label>
        </footer>

        <!-- SCRIPT JS -->
        <script src="script.js"></script>
    </body>

</html>
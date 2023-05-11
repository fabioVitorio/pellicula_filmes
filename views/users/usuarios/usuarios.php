<?php 

session_start();

require_once('../../../config/Conexao.php');
require_once('../../../dao/FilmeDao.php');
require_once('../../../dao/UserDao.php');
require_once('../../../model/Filme.php');

//instancia as classes
$filme = new Filme();
$filmedao = new FilmeDao();

$login = new UserDao();


?>


<!DOCTYPE html>
<html lang="pt-br">

	<head>
		<title> Home</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- CSS -->
		<link rel="stylesheet" href="style.css">
		<!-- BOOTSTRAP -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  	</head>

	<body id="body">

		<!-- HEADER -->
		<nav id="menu">
			<a href="#"><section id="logo"></section></a>
			<!-- menu lateral -->
			<a href="#menu" id="toggle"><span></span></a>
			<div id="menuu">
				<ul id="ulMenu">
					<li class="liMenu"><a class="a" href="#">HOME</a></li>
					<li class="liMenu"><a class="a" href="../../Ranking_Filmes_Deslogado">RANK</a></li>
					<li class="liMenu"><a class="a" href="">CONTATO</a></li>
				</ul>
			</div>
			<ul id="ul">
				<li><a href="#">Home</a></li>
				<li><a href="../../Ranking_Filmes_Deslogado">Ranking</a></li>
				<li><a href="">Contato</a></li>
			</ul>
			<a href="">
				<section id="icon_user">
					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle"
						viewBox="0 0 16 16" id="user">
						<path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
						<path fill-rule="evenodd"
							d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
					</svg>
				</section>
			</a>
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
				<a href="../../Login/login.php"><button id="btnLogin">LOGIN</button></a>
			</section>
		</nav>

		<!-- MAIN -->
		<main>
			<aside id="carousel">
			</aside>
			<article id="article1">
				<article id="article2">
					<?php foreach ($filmedao->listar() as $filme) : ?>

						<section>
							<section class="logofilme">
							<img src="../../../img/<?= $filme->getImg()?>" style="width: 100%; height: 100%;"/>
							</section>
							<form action="../../Pag_Individual_Deslogado/index.php" method="post" name="armazena">      			
							<input type="hidden" id="id_pag" name="id_pag" value="<?= $filme->getID() ?>" style="width: 100%; height: 100%;"/>
							<input type="submit" value="" class="btnSubmit"/>				
							</form>
							<section class="nomefilme" style="text-align:center;"><h4><?= $filme->getNome() ?></h4></section>
						</section>
					<?php endforeach ?>
				</article>
			</article>
		</main>

		<!-- FOOTER -->
        <footer>
            <section id="logoFooter"></section>
            <label id="copy"> &copy; Copyrigth reserved By: PELLICULA</label>
            <label id="contactFooter">pellicula@email.com</label>
        </footer>

		<!-- SCRIPT JS -->
		<script src="script.js"></script>
		<!-- SCRIPT BOOTSTRAP -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  

	</body>

</html>

	

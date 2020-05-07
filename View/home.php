<?php ob_start(); ?>

<div class="home">
    <h2 class="home__titre">Bienvenue sur le site de Jean Forteroche</h2>
    <p class="home__text">
        <img class="home__img" src="/public/img/jean_forteroche.jpg" alt="jean forteroche">
        Je me présente Jean Forteroche écrivain, acteur, passionné de littérature, à travers ce site je veux vous faire découvrir mon dernier roman "Billet simple pour l'Alaska" au fur et à mesure de sa conception, je publirai chaque semaine un nouveau chapitre pour le partager avec vous et avoir vos retours grâce à l'espace commentaire afin de pouvoir avoir une vraie interaction avec mes lecteurs.
        À travers ma carrière d'auteur, c'est la première fois que je me lance dans une écriture de roman 2.0, pouvoir partager mon roman directement avec vous me motive à me dépasser j'espère que ce challenge vous plaira autant qu'à moi.
    </p>
    <div class="home__boutons">
        <a class="home__bouton" href="">Ma biographie</a>
        <a class="home__bouton" href="/articles">Lire un chapitre</a>
    </div>
</div>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>

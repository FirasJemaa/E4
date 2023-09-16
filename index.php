<?php

// Définissez les variables vides pour stocker les données du formulaire
$nom = $email = $message = "";
$erreur = "";

// Vérifiez si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérez les données du formulaire
    $nom = test_input($_POST["nom"]);
    $email = test_input($_POST["email"]);
    $message = test_input($_POST["message"]);

    // Vérifiez si l'e-mail est valide
    if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match('/^[A-Za-z]+$/', $nom)) {
        $erreur = "L'adresse e-mail ou le nom ne sont pas valide.";
    } else {
        // Adresse e-mail de destination
        $destinataire = "firas.jemaa@yahoo.fr";

        // Sujet de l'e-mail
        $sujet = "Nouveau message de $nom";

        // Corps de l'e-mail
        $corps = "Nom: $nom\n";
        $corps .= "E-mail: $email\n";
        $corps .= "Message:\n$message";

        // En-têtes de l'e-mail
        $entetes = "De: $email";

        // Envoyer l'e-mail
        if (mail($destinataire, $sujet, $corps, $entetes)) {
            echo "Votre message a été envoyé avec succès.";
        } else {
            echo "Une erreur s'est produite lors de l'envoi de votre message.";
        }
    }
}

// Fonction pour nettoyer les données du formulaire
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>portfolio</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&family=Roboto+Flex:opsz,wght@8..144,100;8..144,300;8..144,500;8..144,700;8..144,900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <header>
        <nav>
            <a href="#" class="nav-icon " aria-label="homepage" aria-current="page">
                <span id="Name" class="animated-Top">Firas Jemaa</span>
            </a>

            <div class="main-navlinks">
                <button type="button" class="hamburger" aria-label="Toggle Navigation" aria-expanded="false">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                <div class="navlinks-container">
                    <a class="soulignage" href="#presentation" aria-current="page">Présentation</a>
                    <a class="soulignage" href="#connaissance">Connaissances</a>
                    <a class="soulignage" href="#formation">Formation</a>
                    <a class="soulignage" href="#">Entreprise</a>
                    <a class="soulignage" href="#contact">Contact</a>
                    <a class="soulignage" href="#">Veille technologique</a>
                    <a class="soulignage" href="#">Projet</a>
                </div>
            </div>
        </nav>
        <div class="row container animated-Left">
            <div class="column">
                <h2 class="soulignage">Bonjour !</h2>
                <br>
                <p>
                    Je m'appelle Firas est je suis en BTS SIO, à l'IFC d'Avignon
                </p>
            </div>
            <img class="animated-Right svg-tall" id="img-presentation" src="images/presentation.svg" alt="Description de l'image">
        </div>
    </header>

    <!--Section présentation-->
    <section id="presentation" class="column container">
        <h1 class="soulignage reveal">Présentation</h1>
        <div class="row">
            <div class="column">
                <p style="padding: 50px;">Passionné par l’informatique et attiré par la programmation,
                    j'ai choisi l'option SLAM <br> en alternance pour allier théorie et pratique.

                </p><a id="CV" href="CV_Jemaa_Firas.pdf" download="CV_Jemaa_Firas.pdf">CV et LM</a>
            </div>
            <img class="svg-small" src="images/meeting.svg" alt="moi">
        </div>
    </section>

    <!--Section Connaissance-->
    <section id="connaissance" class="column container">
        <h1 class="soulignage reveal">Connaissances</h1>
        <h2 class="soulignage">Client-Leger</h2>

        <div id="Client-Leger">
            <div class="langage">
                <img src="images/html.png" alt="html">
                <h3>HTML</h3>
            </div>
            <div class="langage">
                <img src="images/CSS.png" alt="css">
                <h3>CSS</h3>
            </div>
            <div class="langage">
                <img src="images/sass.png" alt="cass">
                <h3>SASS</h3>
            </div>
            <div class="langage">
                <img src="images/js.png" alt="javascript">
                <h3>Javascript</h3>
            </div>
            <div class="langage">
                <img src="images/php.png" alt="php">
                <h3>PHP</h3>
            </div>
            <div class="langage"><img src="images/jQuery.png" alt="sQuery">
                <h3>jQuery</h3>
            </div>
        </div>

        <h2 class="soulignage">Client-Lourd</h2>

        <div id="Client-Leger">
            <div class="langage">
                <img src="images/python.png" alt="html">
                <h3>Python</h3>
            </div>
            <div class="langage">
                <img src="images/C.png" alt="css">
                <h3>C#</h3>
            </div>
            <div class="langage">
                <img src="images/pcsoft.svg" alt="pcsoft">
                <h3>PC Soft</h3>
            </div>
        </div>

        <h2 class="soulignage">Autre</h2>

        <div id="Client-Leger">
            <div class="langage">
                <img src="images/sql.png" alt="html">
                <h3>SQL</h3>
            </div>
            <div class="langage">
                <img src="images/api.png" alt="css">
                <h3>API</h3>
            </div>
        </div>

    </section>

    <!-- Top btn-->
    <div id="topButton">
        <i id="arrow" class="fa-solid fa-arrow-up"></i>
    </div>
    <!-- Formation -->
    <section id="formation">
        <h1 class="soulignage reveal">Formation</h1>
        <div class="box-timeline">
            <div class="ligne"></div>

            <div class="rond r1" data-anim="1">2015</div>
            <div class="rond r2" data-anim="2">2017</div>
            <div class="rond r3" data-anim="3">2018</div>
            <div class="rond r4" data-anim="4">2022</div>


            <div class="box b1" data-anim="1">
                <h2>Baccalauréat Pro SEN</h2>
                <p><strong>Lycée Montésquieu - Sorgues</strong><br />
                    Système Electronique et Numérique. Obtenu avec montion Assez Bien
                </p>
                <a class="btn">2015 - 2017</a>
            </div>
            <div class="box b2" data-anim="2">
                <h2>BTS SIO</h2>
                <p><strong>Service Informatique aux Organisations - Avignon</strong><br />
                    1ière année
                </p>
                <a class="btn">2017 - 2018</a>
            </div>
            <div class="box b3" data-anim="3">
                <h2>Université</h2>
                <p><strong>Univeristé - Avignon</strong><br />
                    1ière année
                </p>
                <a class="btn">2018 - 2019</a>
            </div>
            <div class="box b4" data-anim="4">
                <h2>BTS SIO</h2>
                <p><strong>Service Informatique aux Organisations - IFC - Avignon</strong><br />
                    En cours ... (en Alternance)</p>
                <a class="btn">2022 - 2024</a>
            </div>
        </div>
    </section>

    <!--Contact-->
    <section id="contact" class="column container">
        <h1 class="soulignage reveal">Contact</h1>
        <div id="Contact">
            <div class="row">
                <h2>Contactez-moi !</h2>
                <form class="column" method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                    <label for="nom">Nom :</label>
                    <input type="text" id="nom" name="nom" required><br><br>

                    <label for="email">E-mail :</label>
                    <input type="email" id="email" name="email" required><br><br>

                    <label for="message">Message :</label>
                    <textarea id="message" name="message" rows="4" required></textarea><br><br>

                    <input id="CV" type="submit" name="submit" value="Envoyer">
                </form>

                <p><span class="erreur"><?php echo $erreur; ?></span></p>
            </div>
            <div class="row">
                <div>
                    <div class="card" style="margin : 50px;">
                        <h3><i class="fa-solid fa-mobile"></i> +33 6 51 28 80 75</h3>
                        <h3><i class="fa-solid fa-envelope"></i> firas.jemaa@yahoo.fr</h3>
                        <div id="Link_Social">
                        <a href="https://github.com/FirasJemaa" target="_blank"><i class="fa-brands fa-github"></i></a>
                        <a href="https://www.linkedin.com/in/firas-jemaa-963336151/" target="_blank"><i class="fa-brands fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>
                <div class="column">
                    <h3>Adresse</h3>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2872.572307912419!2d4.814709076290871!3d43.94752433334495!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12b5ed5307ee6a1b%3A0xffad761489e7f8d7!2sMarengo!5e0!3m2!1sfr!2sfr!4v1694367059376!5m2!1sfr!2sfr" width="500" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </section>


    <script src="https://unpkg.com/typewriter-effect@latest/dist/core.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.8/ScrollMagic.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.8/plugins/animation.gsap.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.8/plugins/debug.addIndicators.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/gsap.min.js"></script>
    <script type='text/javascript'>
        document.addEventListener('DOMContentLoaded', function() {
            window.setTimeout(document.querySelector('svg').classList.add('animated'), 1000);
        })
    </script>
    <script src="script.js"></script>
</body>

</html>
<?php
    $bdd = new PDO('mysql:host=localhost;dbname=micro_blog;charset=utf8', 'root', '');    
    include('includes/header.inc.php');
    include_once 'Fonctions.php';
    if(isset($_POST['textinput']) && isset($_POST['passwordinput'])){ // Authentifie un utilisateur via un login et un mdp
        $Login = $_POST['textinput'];
        $mdp = $_POST['passwordinput'];
        $valeur = Connexion($Login, $mdp, $bdd);

        if($valeur != NULL){
            echo $valeur['id'];
            setcookie('email', $valeur['email'], time() + 365*24*3600);
            header('location:index.php');
        }
        else{   
            echo 'Mauvais Login ou Mot de Passe';
        }
    }
?>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Micro blog</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="css/freelancer.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" class="index">
    <form  action="connexion.php" method="post" class="form-horizontal">
        <fieldset>

            <!-- Form Name -->
            <h1>Connexion</h1>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="textinput">Login</label>  
                <div class="col-md-4">
                    <input id="textinput" name="textinput" type="text" class="form-control input-md">
                </div>
            </div>

            <!-- Password input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="passwordinput">Mot de Passe</label>
                <div class="col-md-4">
                    <input id="passwordinput" name="passwordinput" type="password" class="form-control input-md">
                </div>
            </div>

            <!-- Button -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="singlebutton"></label>
                <div class="col-md-4">
                    <button id="singlebutton" name="singlebutton" class="btn btn-primary">Connexion</button>
                </div>
            </div>

        </fieldset>
    </form>
    <?php
        include('includes/footer.inc.php');
    ?>
    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-top page-scroll hidden-sm hidden-xs hidden-lg hidden-md">
        <a class="btn btn-primary" href="#page-top">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <!-- Theme JavaScript -->
    <script src="js/freelancer.min.js"></script>

</body>

</html>

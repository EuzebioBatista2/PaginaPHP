<?php 
    if(!isset($_SESSION)) {
        session_start();
        $usuario = $_SESSION['nome'];
        $perfil = $_SESSION['perfil'];
        $email = $_SESSION['email'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Cliente</title>
    <link rel="stylesheet" href="../css/styleCliente.css">
</head>
<body>
    <header>
        <div class="container">
            <div class="welcome">
                <img src="../images/bxl-php.svg" width="60px" height="60px">
                <?php 
                    if(isset($_SESSION['nome']) != null) {
                        echo "<div class='perfil'><img src='" . $perfil . "'/></div>";
                        echo "<div class='dados'>
                                <h1> Usuário: " . $usuario . "</h1> 
                                <h2> Email: " . $email . "</h2>
                              </div>";
                    }
                    else { 
                        header('location: ../index.php');
                    }
                ?>
            </div>
                <a href="./logout.php"><button>Logout</button></a>
        </div>
    </header>
    <section>
        <div class="cards">
            <h1 class="title">Projeto PHP</h1>
            <h2 class="subtitle">Cards ilustrativos</h2>
            <div class="pages">
                <div class="pageSecondary">
                    <h2>These are what we call the Pulse Basics. They're what every customer gets.</h2>
                    <ul>
                        <li>Manage cash flow on a daily, weekly, monthly, or yearly basis</li>
                        <li>Forecast growth with recurring income or expenses that scale automatically</li>
                        <li>Works with any currency</li>
                        <li>See Money In and Money Out, categorize transactions, and run helpful reports</li>
                        <li>Toggle entries and accounts on and off to game out different scenarios</li>
                    </ul>
                    <p>Just need the Pulse Basics?</p>
                    <p><a href="#">Get them now</a>&nbsp;for $29 per month.</p>
                </div>
                <div class="pagePrincipal">
                    <h3>RECOMMENDED</h3>
                    <h1>Small<br>Business<br>Plan</h1>
                    <h2>$59 per month</h2>
                    <a href="#"><button>Sign Up Now</button></a>
                    <p class="primary">YOU GET PULSE BASICS, PLUS:</p>
                    <ul>
                        <li>Manager cash flow across multiple financial accounts</li>
                        <li>
                            Invite your investors, books keeper, or management team oto see reports or manage cash flow
                        </li>
                        <li>Integrate with QuickBooks Online for more accurate cash flow</li>
                        <li>Track your actual cash flow alongside your projected cash flow</li>
                    </ul>
                </div>
                <div class="pageThird">
                    <h3>Complex business with multiple financial accounts, currencies, or auditing needs?</h3>
                    <h1>Unlock Extra<br>Features</h1>
                    <h2>$89 per month</h2>
                    <a href="#"><button>Try Premium</button></a>
                    <p class="primary">GET IT ALL, PLUS:</p>
                    <ul>
                        <li>Manager cash flow across unlimited financial accounts</li>
                        <li>Convert to any currency for localized cash flow reporting and projections</li>
                        <li>Attach invoices or contracts to your cash flow entries for accountability and auditing</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <footer>
        <div class="footer-content">
            <div class="mark">
                <h1>Projeto</h1>
                <img src="../images/bxl-php.svg" width="72px" height="72px" >
            </div>
            <div class="links">
                <ul>
                    <li class="primary">Product</li>
                    <li><a href="#">Features</a></li>
                    <li><a href="#">Pricing<a href="#"></li>
                    <li><a href="#">Sign Up</a></li>
                </ul>
                <ul>
                    <li class="primary">Company</li>
                    <li><a href="#">Customer Stories</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
                <ul>
                    <li class="primary">Resources</li>
                    <li><a href="#">Support</a></li>
                    <li><a href="#">Blog</a></li>
                </ul>
            </div>
            <span class="rights">Copyright 2023, Desenvolvido por Euzebio - All rights reserved</span>
        </div>
    </footer>
    
</body>
</html>
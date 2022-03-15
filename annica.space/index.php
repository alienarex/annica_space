<!DOCTYPE html>
<html lang="sv">

<head>
    <meta charset="utf-8" />
    <title>Annica Alienus</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="keywords" />
    <meta content="" name="description" />

    <!-- Favicons -->
    <link rel="shortcut icon" href="img/favicon_tag.png">


    <!-- Font awsome -->
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf"> -->




    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic|Raleway:400,300,700" rel="stylesheet" />

    <!-- Bootstrap CSS File -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Libraries CSS Files -->
    <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet" />

    <!-- Main Stylesheet File -->
    <link href="css/style.css" rel="stylesheet" />

</head>

<body data-spy="scroll" data-offset="64" data-target="#section-topbar">
    <div id="section-topbar">
        <div id="topbar-inner">
            <div class="container">
                <div class="row">
                    <div class="dropdown">
                        <ul id="nav" class="nav">
                            <li class="menu-item">
                                <a class="smothscroll" href="#headerwrap" title="Om mig"><i class="fa fa-user"></i></a>
                            </li>
                            <li class="menu-item"><a class="smothscroll" href="#work" title="Arbete"><i class="fa fa-suitcase"></i></a>
                            </li>
                            <li class="menu-item">
                                <a class="smothscroll" href="#education" title="Utbildning"><i class="fa fa-graduation-cap" aria-hidden="true"></i>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a class="smothscroll" href="#contact" title="Kontakt"><i class="fa fa-envelope"></i></a>
                            </li>
                        </ul>
                        <!--/ uL#nav -->
                    </div>
                    <!-- /.dropdown -->

                    <div class="clear"></div>
                </div>
                <!--/.row -->
            </div>
            <!--/.container -->

            <div class="clear"></div>
        </div>
        <!--/ #topbar-inner -->
    </div>
    <!--/ #section-topbar -->

    <div id="headerwrap">
        <div class="container">
            <div class="row centered">
                <div class="col-12">

                    <p class="quote-paragraph">
                        Programming isn't about what you know; it's about what you can figure out.
                        <br /> - Chris Pine
                    </p>
                </div>
                <!--/.col-lg-12 -->
            </div>
            <!--/.row -->
        </div>
        <!--/.container -->
    </div>
    <!--/.#headerwrap -->

    <?php
    include 'php/main.php';

    // Get the contents of the JSON file 
    $strJsonFileContents = file_get_contents("info.json");
    // Convert to array 
    $array = json_decode($strJsonFileContents, true);

    // Variables
    $headWork = 'Arbete';
    $headEdu = 'Utbildning';
    $attributeWork = 'work';
    $attributeEdu = 'education';
    $personName = $array["name"];
    $personAbout = $array["about"];
    $splitOnNum = 300;

    // bootstrap classes differ between first and second article.
    $setClassFirstArticle = ' col-lg-7 col-md-7 col-sm-12';
    $setClassSecondArticle = ' col-lg-7 col-lg-offset-2 col-md-7 col-md-offset-2 col-sm-12';
    $isFirstArticle = true;

    get_html_section_intro($personName, $personAbout, $splitOnNum);
    get_html_start_section_for_articles_cv($attributeWork, $array["work"]["header"]);

    // End the section wrapping articles
    $htmlEndSectionForArticles = '
            </div>
            <!--/.row -->
        </div>
        <!--/.container -->
        </section>
        ';

    // Work section
    foreach ($array["work"]["workExperiences"] as $value) {
        $className = ($isFirstArticle == true) ? $setClassFirstArticle : $setClassSecondArticle;
        get_html_article($className, $value["title"][0], $value["title"][1], $value["description"], $value["organisation"],  $value["date"]);

        $isFirstArticle = false;
    }
    echo $htmlEndSectionForArticles;

    // Education section
    get_html_start_section_for_articles_cv($attributeEdu, $array["education"]["header"]);

    $isFirstArticle = true;
    foreach ($array["education"]["educations"] as $value1) {

        foreach ($value1["programs"] as $value) {


            $className = ($isFirstArticle == true) ? $setClassFirstArticle : $setClassSecondArticle;

            get_html_article($className, $value["title"][0], $value["title"][1], $value["description"], $value["organisation"],  $value["date"]);
            $isFirstArticle = false;
        }
    }

    echo $htmlEndSectionForArticles;


    //TODO Create new function in main.php and move this.
    // Prints the HTML for the skill section
    echo sprintf('
    <!--SKILLS DESCRIPTION -->
    <div id="skillswrap" class="desc">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-2 col-sm-12">
                    <h3>%s</h3>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="col-lg-10 col-lg-offset-2 col-md-ofset-2 col-sm-offset-2 skills">
                        ', $array["competence"]["header"]);

    foreach ($array["competence"]["competences"] as $competence) {
        echo sprintf('<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12"><h4>%s</h4> <ul>', $competence["title"]);

        foreach ($competence["skills"] as $val) {
            echo sprintf('<li>%s</li>', $val["skill"]);
        }
        echo '</ul></div>';
    }
    echo '  </div><!-- /.row -->
    <!--/.container -->
        </div>
        </div>
        </div>
        <!--/ #skillswrap -->
    </div>';
    ?>

    <section id="contact">
        <!--FOOTER DESCRIPTION -->
        <div class="container">
            <div class="row">
                <ul class="socials d-flex">
                    <li class="envelope"><a href="mailto:annica@alienus.se">annica@alienus.se</a></li>
                    <li class="github"><a href="https://github.com/alienarex">Github </a></li>
                    <li class="discord"><a href="https://discordapp.com/users/alienarex#3358/">Discord</a></li>
                    <li class="linkedin"><a href="https://linkedin.com/in/annica-alienus">LinkedIn</a></li>
                </ul>
            </div>
            <!--/.row -->
        </div>
        <!--/.container -->
        <!--/ #footer -->
    </section>

    <!-- JavaScript Libraries -->
    <script src="lib/jquery/jquery.min.js"></script>
    <script src="lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="lib/php-mail-form/validate.js"></script>
    <script src="lib/chart/chart.js"></script>
    <script src="lib/easing/easing.min.js"></script>

    <!-- Template Main Javascript File -->
    <script src="js/main.js"></script>
</body>

</html>
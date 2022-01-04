<!DOCTYPE html>
<html lang="sv">

<head>
    <meta charset="utf-8" />
    <title>Annica Alienus</title>
    <!-- <meta content="width=device-width, initial-scale=1.0" name="viewport" /> -->
    <!-- <meta content="" name="keywords" /> -->
    <!-- <meta content="" name="description" /> -->

    <!-- Favicons -->
    <link href="img/apple-touch-icon.png" rel="apple-touch-icon" />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic|Raleway:400,300,700" rel="stylesheet" />

    <!-- Bootstrap CSS File -->
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

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
                                <a class="smothscroll" href="#about" title="Om mig"><i class="fa fa-user"></i></a>
                            </li>
                            <li class="menu-item"><a class="smothscroll" href="#work" title="Work"><i class="fa fa-suitcase"></i></a>
                            </li>
                            <li class="menu-item">
                                <a class="smothscroll" href="#education" title="Utbildning"><i class="fa fa-graduation-cap" aria-hidden="true"></i>
                                </a>
                            </li>
                            <li class="menu-item"><a class="smothscroll" href="#contact" title="Contact"><i class="fa fa-envelope"></i></a>
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
                <div class="col-lg-12">

                    <p class="quote-paragraph">
                        Programming isn't about what you know; it's about what you can figure out.
                        <br /> - Chris Pine
                    </p>
                    <!-- <a href="mailto:annica@alienus.se"> Maila mig </a> -->
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
    function split_on($string, $num)
    {
        $output[0] = substr($string, 0, $num);
        $output[1] = substr($string, 0);
        return $output;
    }
    $sectionIntro = '';

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
    $splitStr = split_on($personAbout, $splitOnNum);

    // bootstrap classes differ between first and second article.
    $setClassFirstArticle = 'col-lg-6';
    $setClassSecondArticle = 'col-lg-6 col-lg-offset-3';
    $isFirstArticle = true;

    get_html_section_intro($personName, $personAbout, $splitOnNum);
    get_html_start_section_for_articles_cv($attributeWork, $attributeWork, $headWork);
    // HTML strings

    $htmlEndSection = '
            </div>
            <!--/.row -->
        </div>
        <!--/.container -->
    </section>';
    $htmlArticle = '
                <article>
                    <div class="%s">
                        <h3 class=" ">%s</h3>
                        <h4>%s</h4>
                        <p>%s</p> 
                    </div>
                    <div class="col-lg-3">
                        <p class="edu-item">%s</p>
                        <p class="edu-year">%s</p> 
                    </div>
                </article>';

    foreach ($array["workExperience"] as $value) {
        $className = ($isFirstArticle == true) ? $setClassFirstArticle : $setClassSecondArticle;
        get_html_article($className, $value["title"][0], $value["title"][1], $value["description"], $value["organisation"],  $value["date"]);

        $isFirstArticle = false;
    }
    echo $htmlEndSection;
    get_html_start_section_for_articles_cv($attributeEdu, $attributeEdu, $headEdu);

    $isFirstArticle = true;
    foreach ($array["educations"] as $value) {

        $className = ($isFirstArticle == true) ? $setClassFirstArticle : $setClassSecondArticle;
        get_html_article($className, $value["title"][0], $value["title"][1], $value["description"], $value["organisation"],  $value["date"]);
        $isFirstArticle = false;
    }
    foreach ($array["courses"] as $value) {

        $className = ($isFirstArticle == true) ? $setClassFirstArticle : $setClassSecondArticle;
        get_html_article($className, $value["title"][0], $value["title"][1], $value["description"], $value["organisation"],  $value["date"]);
        $isFirstArticle = false;
    }
    echo $htmlEndSection;

    ?>
    <!--SKILLS DESCRIPTION -->
    <div id="skillswrap" class="section-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-lg-offset-1">
                    <h3>SKILLS</h3>
                </div>

                <div class="row">
                    <div class="col-lg-9 col-lg-offset-3">
                        <h5>Databaser</h5>
                    </div>

                    <div class="col-lg-10 col-lg-offset-2 centered">
                        <ul class="list-group col-lg-4 col-lg-offset-2">
                            <li class="list-group-item">Postgresql</li>
                            <li class="list-group-item">Oracle</li>
                            <li class="list-group-item">MySQL</li>
                        </ul>
                    </div>

                    <div class="col-lg-9 col-lg-offset-3 ">
                        <h5>Språk</h5>
                    </div>

                    <div class="col-lg-10 col-lg-offset-2 centered">
                        <ul class="list-group col-lg-4 col-lg-offset-2">
                            <li class="list-group-item">C#</li>
                            <li class="list-group-item">JavaScript</li>
                            <li class="list-group-item">MicroPython</li>
                            <li class="list-group-item">PL/SQL</li>
                            <li class="list-group-item">CSS</li>
                        </ul>
                        <ul class="list-group col-lg-6">
                            <li class="list-group-item">c++</li>
                            <li class="list-group-item">HTML</li>
                            <li class="list-group-item">XML</li>
                            <li class="list-group-item">JSON</li>
                        </ul>
                    </div>
                    <div class="col-lg-9 col-lg-offset-3 ">
                        <h5>Versionhantering</h5>
                    </div>

                    <div class="col-lg-10 col-lg-offset-2 centered">
                        <ul class="list-group col-lg-4 col-lg-offset-2">
                            <li class="list-group-item">Github</li>
                            <li class="list-group-item">Bitbucket</li>
                        </ul>
                    </div>

                    <div class="col-lg-9 col-lg-offset-3 ">
                        <h5>Projektarbete</h5>
                    </div>

                    <div class="col-lg-10 col-lg-offset-2 centered">
                        <ul class="list-group col-lg-4 col-lg-offset-2">
                            <li class="list-group-item">Agile/Scrum</li>
                            <li class="list-group-item">Projektplanering</li>
                        </ul>
                        <ul class="list-group col-lg-6">
                            <li class="list-group-item">Krav</li>
                            <li class="list-group-item">Användartest</li>
                        </ul>
                    </div>


                    <div class="col-lg-9 col-lg-offset-3 ">
                        <h5>Övrigt</h5>
                    </div>

                    <div class="col-lg-10 col-lg-offset-2 centered">
                        <ul class="list-group col-lg-4 col-lg-offset-2">
                            <li class="list-group-item">Game engine Unity</li>
                            <li class="list-group-item">WPF</li>
                            <li class="list-group-item">ASP.NET</li>
                            <li class="list-group-item">Enity Framework</li>
                        </ul>
                        <ul class="list-group col-lg-6">
                            <li class="list-group-item">Node.js</li>
                            <li class="list-group-item">SQL Loader</li>
                            <li class="list-group-item">Migrering databas</li>
                        </ul>
                    </div>
                </div>
                <!--/.row -->
                <br />
            </div>
            <!--/.container -->
        </div>
        <!--/ #skillswrap -->
    </div>

    <section id="contact" name="contact" class="section-wrapper">
        <!--FOOTER DESCRIPTION -->
        <div id="footwrap">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2">
                        <h3>Kontakt</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-lg-offset-2">
                        <address>

                            <p class="mail-paragraph">
                                <i class="fa fa-envelope" aria-hidden="true"><a href="mailto:annica@alienus.se"> Mail</a></i>
                            </p>
                            <p class="linkedin-icon">
                                <a href="https://linkedin.com/in/annica-alienus"><img src="img/linkedin.svg"></img> LinkedIn
                                </a>
                            </p>
                        </address>
                    </div>
                </div>
                <!--/.row -->
            </div>
            <!--/.container -->
        </div>
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
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
                                <a class="smothscroll" href="#about" title="Om mig"><i class="fa fa-user"></i></a>
                            </li>
                            <li class="menu-item"><a class="smothscroll" href="#work" title="Arbete"><i class="fa fa-suitcase"></i></a>
                            </li>
                            <li class="menu-item">
                                <a class="smothscroll" href="#education" title="Utbildning"><i class="fa fa-graduation-cap" aria-hidden="true"></i>
                                </a>
                            </li>
                            <li class="menu-item"><a class="smothscroll" href="#contact" title="Kontakt"><i class="fa fa-envelope"></i></a>
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
    get_html_start_section_for_articles_cv($attributeWork, $headWork);

    // HTML
    $htmlEndSection = '
            </div>
            <!--/.row -->
        </div>
        <!--/.container -->
        </section>
        ';

    // Work section
    foreach ($array["workExperience"] as $value) {
        $className = ($isFirstArticle == true) ? $setClassFirstArticle : $setClassSecondArticle;
        get_html_article($className, $value["title"][0], $value["title"][1], $value["description"], $value["organisation"],  $value["date"]);

        $isFirstArticle = false;
    }
    echo $htmlEndSection;

    // Education section
    get_html_start_section_for_articles_cv($attributeEdu, $headEdu);

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
    <div id="skillswrap">
        <div class="container">
            <div>
                <h3>Översikt</h3>
            </div>

            <div class="row">
                <div class="col-12 col-md-3">
                    <h4>Databaser</h4>
                    <ul class="d-flex ">
                        <li>Postgresql</li>
                        <li>Oracle</li>
                        <li>MySQL</li>
                    </ul>
                </div>

                <div class="col-12 col-md-3">
                    <h4>Språk</h4>
                    <ul>
                        <li>C#</li>
                        <li>JavaScript</li>
                        <li>MicroPython</li>
                        <li>PL/SQL</li>
                        <li>CSS</li>
                        <li>c++</li>
                        <li>HTML</li>
                        <li>XML</li>
                        <li>JSON</li>
                    </ul>
                </div>


                <div class="col-12 col-md-3">
                    <h4>Versionhantering</h4>
                    <ul>
                        <li>Github</li>
                        <li>Bitbucket</li>
                    </ul>
                </div>


                <div class="col-12 col-md-3">
                    <h4>Projektarbete</h4>
                    <ul>
                        <li>Agile/Scrum</li>
                        <li>Projektplanering</li>
                        <li>Krav</li>
                        <li>Användartest</li>
                    </ul>
                </div>


                <div class="col-12 col-md-3">
                    <h4>Övrigt</h4>
                    <ul>
                        <li>Unity game engine</li>
                        <li>WPF</li>
                        <li>ASP.NET</li>
                        <li>Enity Framework</li>
                        <li>Node.js</li>
                        <li>SQLloader</li>
                        <li>Migrering av CMS</li>
                    </ul>
                </div>
            </div><!-- /.row -->
            <!--/.container -->
        </div>
        <!--/ #skillswrap -->
    </div>

    <section id="contact" class="section-wrapper divider">
        <!--FOOTER DESCRIPTION -->
        <div id="footwrap">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2">
                        <h3>Kontakt</h3>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <address>

                                <p class="mail-paragraph">
                                    <i class="fa fa-envelope" aria-hidden="true"><a href="mailto:annica@alienus.se"> Mail</a></i>
                                </p>
                                <p class="linkedin-icon">
                                    <a href="https://linkedin.com/in/annica-alienus"><img src="img/linkedin.svg" alt="linkedin" /> LinkedIn
                                    </a>
                                </p>
                            </address>
                        </div>
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
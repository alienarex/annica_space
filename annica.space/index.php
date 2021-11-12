<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Annica Alienus</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="keywords" />
    <meta content="" name="description" />

    <!-- Favicons -->
    <link href="img/favicon.png" rel="icon" />
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
                            <li class="menu-item">
                                <a class="smothscroll" href="#education" title="Utbildning"><i class="fa fa-graduation-cap" aria-hidden="true"></i>
                                </a>
                            </li>
                            <li class="menu-item"><a class="smothscroll" href="#work" title="Work"><i class="fa fa-suitcase"></i></a>
                            </li>
                            <li class="menu-item">
                                <a class="smothscroll" href="#project" title="Project"><i class="fa fa-file-text-o"></i></a>
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
    $strJsonFileContents = file_get_contents("C:\Users\annic\OneDrive\Dokument\Code\Projects\annica_space\annica.space\info.json");
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
    echo $htmlEndSection;

    ?>
    <!--SKILLS DESCRIPTION -->
    <div id="skillswrap">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-lg-offset-1">
                    <h3>SKILLS</h5>
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

    <section id="project" name="Project">
        <!--PORTFOLIO DESCRIPTION -->
        <div class="container desc">

            <div class="row">
                <div class="col-lg-2 col-lg-offset-1">
                    <h2>PORTFOLIO</h2>
                </div>
                <article>
                    <div class="col-lg-6 ">
                        <h3>
                            webbsida </h3>
                        <p>
                            Och plats färdväg där flera erfarenheter kunde kom samtidigt för, groda mot bäckasiner
                            miljoner sax färdväg händer både, sällan på dimma se mjuka bäckasiner varit sitt. År groda
                            gör smultron som när söka hans brunsås sorgliga sin sällan miljoner är, sin
                            ska räv gör ska på från söka dunge från händer. Bra rännil i sax dimma erfarenheter blev
                            sitt där faktor, strand i bra sällan nu annan smultron det, vi se stig kunde göras är mot
                            hav. Dock jäst precis söka del hwila, samma
                            bäckasiner faktor göras ingalunda, sig varit häst tid. Sällan hela dag dock regn tid och oss
                            icke på varit, är som ännu det att dimma är verkligen denna dunge, brunsås vi räv och därmed
                            både dimma kunde samtidigt. Gamla både
                            söka dag på rot sorgliga sig, blivit är tid helt söka tidigare både gamla, där om miljoner
                            blev vad kom.
                        </p>
                    </div>
                    <div class="col-lg-3">
                        <p class="edu-item">
                            <a href="https://annica.space">annica.space</a>
                        </p>
                        <p class="edu-year">
                            2000 - 2001
                        </p>
                    </div>

                </article>
            </div>
            <!--/.container -->
        </div>
    </section>

    <section id="contact" name="contact">
        <!--FOOTER DESCRIPTION -->
        <div id="footwrap">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2">
                        <address>
                            <h5>Kontakt</h5>
                    </div>
                    <div class="col-lg-4">
                        <p>
                            <i class="fa fa-envelope" aria-hidden="true"><a href="mailto:annica@alienus.se"> Maila
                                    mig!</a></i>
                        </p>
                        <p>
                            <i class="fa fa-mobile" aria-hidden="true"><a href="tel:0760-290292"> Ring mig!</a></i>
                        </p>
                        <p style="width: 20%; height: 10%;">
                            <a href="https://linkedin.com/in/annica-alienus"> <i> LinkedIn</i><img src="img/linkedin.svg"></img>
                            </a>
                        </p>
                        </address>
                    </div>
                    <div class="col-lg-6">
                        <p>
                            <sm>Kontakta mig</sm>
                        </p>
                        <form class="contact-form php-mail-form" role="form" action="contactform/contactform.php" method="POST">
                            <div class="form-group">
                                <label for="contact-name">Namn</label>
                                <input type="name" name="name" class="form-control" id="contact-name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                <div class="validate"></div>
                            </div>
                            <div class="form-group">
                                <label for="contact-email">Email</label>
                                <input type="email" name="email" class="form-control" id="contact-email" data-rule="email" data-msg="Please enter a valid email" />
                                <div class="validate"></div>
                            </div>
                            <div class="form-group">
                                <label for="contact-subject">Ämne</label>
                                <input type="text" name="subject" class="form-control" id="contact-subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                                <div class="validate"></div>
                            </div>

                            <div class="form-group">
                                <label for="contact-message">Meddelande</label>
                                <textarea class="form-control" name="message" id="contact-message" rows="5" data-rule="required" data-msg="Please write something for us"></textarea>
                                <div class="validate"></div>
                            </div>

                            <div class="loading"></div>
                            <div class="error-message"></div>
                            <div class="sent-message">
                                Vi hörs snart!
                            </div>

                            <div class="form-send">
                                <button type="submit" class="btn btn-large">Skicka</button>
                            </div>
                        </form>
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
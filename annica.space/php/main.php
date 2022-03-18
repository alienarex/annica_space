<?php

/** Get json in selected language
 * @param string $lang Selected language
 * @return array $array Converted json 
 */
function get_info(string $lang)
{
    switch ($lang) {
        case 'en':
            $strJsonFileContents = file_get_contents("info_eng.json");
            $array = json_decode($strJsonFileContents, true);
            break;
        case 'sv':
            $strJsonFileContents = file_get_contents("info.json");
            $array = json_decode($strJsonFileContents, true);
            break;
        default:
            $strJsonFileContents = file_get_contents("info.json");
            $array = json_decode($strJsonFileContents, true);
            break;
    }

    return $array;
}

/**
 * Prints the html for intro section. 
 * Splits the about string on the period after given index
 * @param string $name The persons name to show
 * @param string $strAbout The info about the person
 * @param int $splitStrAboutOn The index for spitting the string.
 * 
 */
function get_html_section_intro(string $name, string $strAbout, int $splitStrAboutOn)
{
    $includePeriod = 1;
    $strPos = strpos($strAbout, '.', $splitStrAboutOn) + $includePeriod;
    echo sprintf('
    <div id="intro" class="desc">
    <div id="about">
        <div class="container">
            <div class="row">
                <div id="presentation-profile" class="col-lg-2 col-md-2 col-sm-12">
                    <img class ="profile-pic" src="../img/profilPic.jpg" alt="profile picture" />
                    <h1>%s</h1>
                   <a class ="download" href="docs/AnnicaAlienus.pdf" download ="AnnicaAlienus">Ladda ner cv</a>
                </div>
                <div class=" col-lg-7 col-md-7 col-sm-12">
                <p class = "visible-text col-md-12 ">%s</p>
                    <p id="hidden-item-id" class="hidden-item col-md-12">%s</p>
                    <p id = "visible-item-id" class="readmore col-md-12 "></p>
                    
                </div>
            </div>
            <!--/.row -->
        </div>
        <!--/.container -->
    </div>
        <!--/ #intro -->
</div>', $name, substr($strAbout, 0, $strPos), substr($strAbout, $strPos));
}

/**
 * Builds the beginning of the section that are populated by articles.
 * @param string $sectionId The id of the specific section
 * @param string $headValue Sections header.
 */
function get_html_start_section_for_articles_cv(string $sectionId, string $headValue)
{
    echo sprintf('<section id="%s" class="desc">
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-md-2 col-sm-12">
                <h2>%s</h2>
            </div>', $sectionId, $headValue);
}

/**
 * A general template for creating articles
 * @param string $className 
 * @param string $firstheadValue Giving the name on the object
 * @param string $secondHeadValue HTML creates even if param has no value. Otherwise it messes up the layout.
 * @param string $description A description for the object
 * @param string $organization 
 * @param string $date
 *  
 */
function get_html_article(string $className, string $firstheadValue, string $secondHeadValue = null, string $description, string $organization, string $date)
{
    echo sprintf('
    <article>
        <div class="%s">
            <h3>%s</h3>
            <h4>%s</h4>
            <p>%s</p> 
        </div>
        <div class="col-lg-2 col-md-2">
            <p class="edu-item">%s</p>
            <p class="edu-year">%s</p> 
        </div>
    </article>', $className, $firstheadValue, $secondHeadValue, $description, $organization, $date);
}

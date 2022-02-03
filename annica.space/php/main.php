<?php
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
                    <img class ="profile-pic" src="img\profilPic.jpg" alt="profile picture" />
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

function get_html_start_section_for_articles_cv(
    string $sectionId,
    string $headValue

) {

    echo sprintf('<section id="%s" class="desc">
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-md-2 col-sm-12">
                <h2>%s</h2>
            </div>', $sectionId, $headValue);
}

function get_html_article(string $className, string $firstheadValue, string $secondHeadValue = null, string $description, string $organisation, string $date)
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
    </article>', $className, $firstheadValue, $secondHeadValue, $description, $organisation, $date);
}

<?php
function get_html_section_intro(string $name, string $strAbout, int $splitStrAboutOn)
{
    $addOneCharToOmitPeriod = 1;
    $strPos = strpos($strAbout, '.', 198) + $addOneCharToOmitPeriod;
    echo sprintf('
    <section id="intro" name="intro" class="divider">
    <div id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-lg-offset-1">
                    <h2>%s</h2>
                </div>
                <div class="col-lg-6">
                <p class = "visible-text">%s</p>
                    <p class="hidden-item">%s</p>
                    <p id = "visible-item-id" class="readmore"></p>
                </div>
                <div class="col-lg-3">
                </div>
            </div>
            <!--/.row -->
        </div>
        <!--/.container -->
    </div>
        <!--/ #intro -->
</section>', $name, substr($strAbout, 0, $strPos), substr($strAbout, $strPos));
}

function get_html_start_section_for_articles_cv(string $sectionId, string $sectionName = null, string $headValue)
{
    echo sprintf('<section id="%s" name="%s" class="divider">
    <div class="container desc ">
        <div class="row ">
            <div class="col-lg-2 col-lg-offset-1">
                <h2>%s</h2>
            </div>', $sectionId, $sectionName, $headValue);
}

function get_html_article(string $className, string $firstheadValue, string $secondHeadValue = null, string $description, string $organisation, string $date)
{
    echo sprintf('
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
    </article>', $className, $firstheadValue, $secondHeadValue, $description, $organisation, $date);
}

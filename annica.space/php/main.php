<?php
function get_html_section_intro(string $name, string $first_about, string $second_about = '')
{
    echo sprintf('
    <section id="intro" name="intro">
    <div id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-lg-offset-1">
                    <h2>%s</h2>
                </div>
                <div class="col-lg-6">
                    <p class="visible-item">%s ...</p>
                    <p class="hidden-item">
                        %s
                    </p>
                </div>
                <div class="col-lg-3">
                    <p>
                        <!-- <a href="#"><i class="icon-file"></i></a>
                        <sm>DOWNLOAD PDF</sm> -->
                    </p>
                </div>
            </div>
            <!--/.row -->
        </div>
        <!--/.container -->
    </div>
        <!--/ #intro -->
</section>', $name, $first_about, $second_about);
}

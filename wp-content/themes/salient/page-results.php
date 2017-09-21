<?php 
/*template name: Results*/
get_header(); ?>

<div class="results_top">
    <div>
        <p>Highlights -</p>
        <p class="results_description">
            Lorem ipsum dolor sit amet, est et esse moderatius, ne mei fugit semper impedit. 
            Ea oportere necessitatibus vim. An vide mundi dissentiet vis, ut sit dico inani ceteros. 
        </p>
    </div>
</div>
<div class="results_bottom_section">
    <div class="results_chart">
        <div class="chart_left">
            <img src="<?php echo $upload[baseurl] .'/wp-content/uploads/2017/09/chart.png'?>" alt="">
            <div><p>Lorem ipsum dolor sit amet, est et esse moderatius, ne mei fugit semper impedit. 
                Ea oportere necessitatibus vim. An vide mundi dissentiet vis, ut sit dico inani ceteros. </p></div>
        </div>
        <div class="chart_right">
            <div>
                <p>30</p>
                <p class="description">Lorem ipsum</p>
            </div>
            <div>
                <p>XX%</p>
                <p class="description">Eloqua ROI</p>
            </div>
        </div>
    </div>
    <div class="results_piechart">
        <div class="piechart_left">Lorem ipsum dolor sit amet, est et esse moderatius, ne mei fugit semper impedit.</div>
        <div class="piechart_right">
            <img src="<?php echo $upload[baseurl] .'/wp-content/uploads/2017/09/Data-Pie-Chart-icon.png'?>" alt="">
            <div class="piechart_overlay">
                Lorem ipsum dolor sit amet, est et esse moderatius, ne mei fugit semper impedit. 
                Ea oportere necessitatibus vim. An vide mundi dissentiet vis, ut sit dico inani ceteros. 
            </div>
        </div>
    </div>
    <div class="results_bottom">
        <div>
            <div class="overlay">
                <p>XX</p>
                <p>Lorem ipsum</p>
            </div>
        </div>
        <div>
            <div class="overlay">
                <p>XX</p>
                <p>Lorem ipsum</p>
            </div>
        </div>
        <div>
            <div class="overlay">
                <p>XX</p>
                <p>Lorem ipsum</p>
            </div>
        </div>
        <div>
            <div class="overlay">
                <p>XX</p>
                <p>Lorem ipsum</p>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
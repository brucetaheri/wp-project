<?php 
/*template name: Home*/
get_header();
?>
<div style="position: relative">
    <?php
    echo do_shortcode('[sangar-slider id=4092]');
    ?>
    <div class="dotted_line_box">
        <div style="height: 32%;"></div>
        <div style="width: 100%; height: 64%; border-left: dotted 5px white;"></div>
        <div style="height: 4%; border-left: dotted 5px rgba(6, 6, 3, 0.78)"></div>
    </div>
</div>

<div class="front_description">
    <p style="color: #fa4c06;
            font-family: 'Aller', Calibri, sans-serif;
            font-size: 3rem;
            letter-spacing: 0.5px;
            font-weight: bold;
            padding-left: 18px;
            margin-top: 40px;
            padding-bottom: 0;">
            About Tegrita
    </p>
    <p>Tegrita Consulting Group was founded in 2014. Our founders trace their marketing automation history back to 2007 where they were members of the Eloqua professional services team.</p>
    <p>Today, our team of more than 20 strategic and technology consultants, have dedicated more than 80,000 hours across more than 600 Oracle Marketing Cloud projects.</p>
</div>

<div class="testimonial">
    <div class="testimonial_image"></div>
    <div class="testimonial_description">
        <p>TESTIMONIALS-</p>
        <?php 
            echo do_shortcode('[testimonial_slider autorotate="15000"][testimonial title="Testimonial" id="1459471473153-0-1" name="Emily Ketchum, Senior Manager, Global Marketing Operations" quote="The Tegrita team helped us get up and running on Eloqua in just three weeks. The implementation process could not have been smoother – the team was extremely organized, highly skilled, and fun to work with. I’m excited to have Tegrita as a long term partner of Fuze."][testimonial title="Testimonial" id="1456678855143-0-0" name="Michelle Tackabery, Director of Marketing, Accelogix" quote="I have worked on many software implementation projects. It is very rare to have a team that is so pleasant to work with and so in tune with our company. I knew Tegrita was invested in our success. They took the time to learn about our business, our challenges, our goals, and the steps we hoped to take to get there. We will come back to them again when we are ready to move to the next step, because they have truly given us a Smart Start."][testimonial title="Testimonial" id="1456678859011-0-4" name="Erik Szymanski, IS Support &amp; Demand Generation Specialist, Root Inc." quote="This experience with Tegrita was truly a partnership. Staying focused on the strategic objectives and outcomes we needed to deliver with the Eloqua implementation, they looked at all aspects of the configuration and integration with our CRM to ensure nothing was overlooked. Their responsiveness and support significantly reduced our implementation time."][testimonial title="Testimonial" id="1456678860243-0-1" name="Angela Davis, Marketing Manager, Viavi" quote="Tegrita has been providing our organization with marketing automation services and support for more than 4 years. Tegrita ensures that our business requirements are translated seamlessly into our automation platform; and that each project is completed efficiently, with quality, and on budget. It has been a joy to work with Tegrita. We recommend them highly."][/testimonial_slider]');
        ?>

    </div>
</div>

<div class="blog_section_up">
    <div class="blog_left"></div>
    <div class="blog_middle"></div>
    <div class="blog_right"></div>

</div>
<div class="blog_section_down">
    <div class="blog_left"></div>
    <div class="blog_middle"></div>
    <div class="blog_right"></div>
</div>

<?php get_footer(); ?>
<?php 
/*template name: Services*/
get_header(); 
echo do_shortcode('[sangar-slider id=4069]');
$upload = wp_upload_dir();
?>


<div class="service_description">
  <div>
    <p class="service_description_title">SERVICES</p>
    <p class="service_description_content">Our focus on knowledge transfer, proven practices and enablement, ensures you will receice the service you need to maximize the return of your technology investment  </p>
  </div>
</div>

<div class="service_catagory_section">

<!-- Blank  -->
  <div style="height: 350px; width: 100%; background: white;"></div>

  <!-- Service Catagory Section -->
  <div class="service_catagory_section_top">
    <div class="service_card">
      <img src="<?php echo $upload[baseurl] .'/2017/09/implementation.png'?>" alt="">
      <p> Implementations </p>
      <button>LEARN MORE</button>
    </div>
    <div class="service_card">
      <img src="<?php echo $upload[baseurl] .'/2017/09/execution.png'?>" alt="">
      <p> Campaign </br> Execution </p>
      <button>LEARN MORE</button>
    </div>
    <div class="service_card">
      <img src="<?php echo $upload[baseurl] .'/2017/09/nurture.png'?>" alt="">
      <p> Nurture </br> Campaign </p>
      <button>LEARN MORE</button>
    </div>
    <div class="service_card">
      <img src="<?php echo $upload[baseurl] .'/2017/09/strategy.png'?>" alt="">
      <p> Strategy </br> Development </p>
      <button>LEARN MORE</button>
    </div>
  </div>
  <div class="service_catagory_section_bottom">
    <div class="service_card integration">
      <img src="<?php echo $upload[baseurl] .'/2017/09/integration1.png'?>" alt="">
      <p> Integrations </p>
      <button>LEARN MORE</button>
    </div>
    <div class="service_card">
      <img src="<?php echo $upload[baseurl] .'/2017/09/system.png'?>" alt="">
      <p> System </br> Maintainence </p>
      <button>LEARN MORE</button>
    </div>
    <div class="service_card">
      <img src="<?php echo $upload[baseurl] .'/2017/09/monitering.png'?>" alt="">
      <p> Monitoring </p>
      <button>LEARN MORE</button>
    </div>
    <div class="service_card eloqua">
      <img src="<?php echo $upload[baseurl] .'/2017/09/elogua.png'?>" alt="">
      <p> Eloqua <span style="color: #fa4c06">/</span> Content </br> Responsys <span style="color: #fa4c06">/</span>SRM </p>
      <button>LEARN MORE</button>
    </div>
  </div>

  <!-- Testimonial Section -->
  <div class="testimonial service">
    <div class="testimonial_image"></div>
    <div class="testimonial_description">
        <p>TESTIMONIALS-</p>
        <?php 
            echo do_shortcode('[testimonial_slider autorotate="15000"][testimonial title="Testimonial" id="1459471473153-0-1" name="Emily Ketchum, Senior Manager, Global Marketing Operations" quote="The Tegrita team helped us get up and running on Eloqua in just three weeks. The implementation process could not have been smoother – the team was extremely organized, highly skilled, and fun to work with. I’m excited to have Tegrita as a long term partner of Fuze."][testimonial title="Testimonial" id="1456678855143-0-0" name="Michelle Tackabery, Director of Marketing, Accelogix" quote="I have worked on many software implementation projects. It is very rare to have a team that is so pleasant to work with and so in tune with our company. I knew Tegrita was invested in our success. They took the time to learn about our business, our challenges, our goals, and the steps we hoped to take to get there. We will come back to them again when we are ready to move to the next step, because they have truly given us a Smart Start."][testimonial title="Testimonial" id="1456678859011-0-4" name="Erik Szymanski, IS Support &amp; Demand Generation Specialist, Root Inc." quote="This experience with Tegrita was truly a partnership. Staying focused on the strategic objectives and outcomes we needed to deliver with the Eloqua implementation, they looked at all aspects of the configuration and integration with our CRM to ensure nothing was overlooked. Their responsiveness and support significantly reduced our implementation time."][testimonial title="Testimonial" id="1456678860243-0-1" name="Angela Davis, Marketing Manager, Viavi" quote="Tegrita has been providing our organization with marketing automation services and support for more than 4 years. Tegrita ensures that our business requirements are translated seamlessly into our automation platform; and that each project is completed efficiently, with quality, and on budget. It has been a joy to work with Tegrita. We recommend them highly."][/testimonial_slider]');
        ?>

    </div>
</div>
</div>

<?php get_footer(); ?>
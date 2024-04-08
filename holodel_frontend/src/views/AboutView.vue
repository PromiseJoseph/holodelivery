<script setup>

import Header from '../components/Header.vue'
import Nav from '../components/Nav.vue'
import Heroes from '../components/Heroes.vue'

</script>

<template>
 
  <main id="main">
<Heroes>
  <template #sub-headings>
    <h1>ABOUT</h1>
  </template>
  <template #sub-heading-text>
   <p> this is an about page </p>
  </template>
</Heroes>
 <!-- ======= Our Team Section ======= -->
 <section id="team" class="team pt-0">
  <div class="container" data-aos="fade-up">

    <div class="section-header">
      <span>Our Team</span>
      <h2>Our Team</h2>

    </div>

    <div class="row" data-aos="fade-up" data-aos-delay="100">

      <div class="col-lg-4 col-md-6 d-flex">
        <div class="member">
          <img src="assets/img/team/team-1.jpg" class="img-fluid" alt="">
          <div class="member-content">
            <h4>Walter White</h4>
            <span>Web Development</span>
            <p>
              Magni qui quod omnis unde et eos fuga et exercitationem. Odio veritatis perspiciatis quaerat qui aut aut aut
            </p>
            <div class="social">
              <a href=""><i class="bi bi-twitter"></i></a>
              <a href=""><i class="bi bi-facebook"></i></a>
              <a href=""><i class="bi bi-instagram"></i></a>
              <a href=""><i class="bi bi-linkedin"></i></a>
            </div>
          </div>
        </div>
      </div><!-- End Team Member -->

      <div class="col-lg-4 col-md-6 d-flex">
        <div class="member">
          <img src="assets/img/team/team-2.jpg" class="img-fluid" alt="">
          <div class="member-content">
            <h4>Promise Odelola </h4>
            <span>Software Engineer</span>
            <p>
              Repellat fugiat adipisci nemo illum nesciunt voluptas repellendus. In architecto rerum rerum temporibus
            </p>
            <div class="social">
              <a href=""><i class="bi bi-twitter"></i></a>
              <a href=""><i class="bi bi-facebook"></i></a>
              <a href=""><i class="bi bi-instagram"></i></a>
              <a href=""><i class="bi bi-linkedin"></i></a>
            </div>
          </div>
        </div>
      </div><!-- End Team Member -->

      <div class="col-lg-4 col-md-6 d-flex">
        <div class="member">
          <img src="assets/img/team/team-3.jpg" class="img-fluid" alt="">
          <div class="member-content">
            <h4>William Anderson</h4>
            <span>Content</span>
            <p>
              Voluptas necessitatibus occaecati quia. Earum totam consequuntur qui porro et laborum toro des clara
            </p>
            <div class="social">
              <a href=""><i class="bi bi-twitter"></i></a>
              <a href=""><i class="bi bi-facebook"></i></a>
              <a href=""><i class="bi bi-instagram"></i></a>
              <a href=""><i class="bi bi-linkedin"></i></a>
            </div>
          </div>
        </div>
      </div><!-- End Team Member -->

    </div>

  </div>
</section><!-- End Our Team Section -->

<!-- ======= Testimonials Section ======= -->
<section id="testimonials" class="testimonials">
  <div class="container">

    <div class="" data-aos="fade-up">
      <div class="swiper-wrapper">

          <div class="testimonial-item">
            <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
            <h3>Promise Odelola</h3>
            <h4>Ceo &amp; Software Engineer</h4>
            <div class="stars">
              <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
            </div>
            <p>
              <i class="bi bi-quote quote-icon-left"></i>
              Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
              <i class="bi bi-quote quote-icon-right"></i>
            </p>
          </div>
        </div><!-- End testimonial item -->

       
      <div class="swiper-pagination"></div>
    </div>

  </div>
</section><!-- End Testimonials Section -->



</main>
</template>

<style>
@media (min-width: 1024px) {
  .about {
    min-height: 100vh;
    display: flex;
    align-items: center;
  }
}
</style>

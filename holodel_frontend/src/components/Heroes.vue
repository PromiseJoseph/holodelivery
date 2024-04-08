<script setup>

</script>
<template>
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="page-header d-flex align-items-center" style="background-image: url('assets/img/page-header.jpg');">
          <div class="container position-relative">
            <div class="row d-flex justify-content-center">
              <div class="col-lg-6 text-center">
                <slot name="sub-headings"></slot> <!--//heading <h1>-->
                <slot name="sub-heading-text"></slot> <!-- // paragraph  <p>-->
             </div>
            </div>
          </div>
        </div>
     </div>   
</template>
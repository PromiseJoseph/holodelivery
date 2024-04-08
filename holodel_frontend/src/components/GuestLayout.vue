<script setup>
defineProps({
    title: {
        type: String,
        required: true
    },
    accQst: {
        type: String,
        required: false
    },
   
    
})
</script>
<template>
<main class="main  border-rounded shadow-sm bg-dark bg-transparent align-center mx-5 px-5">
    <div class="forms">
            <!-- @csrf -->
            <p class="fs-2 col-lg-auto me-lg-3">HOLO<span>DEL</span></p>
            <h1 class="h3 mb-3 fw-normal fs-5">{{title}} </h1>
            <slot name="item" >

            </slot>
    </div>
</main>
</template>

<template>
    <the-calculator :language="language"></the-calculator>
</template>

<script>
import TheCalculator from './price-calculator/TheCalculator.vue';
import '@fortawesome/fontawesome-free/css/all.min.css';
import axios from 'axios';

export default {
    data() {
		return {
			language: '',
        }
    },
    components: {
        TheCalculator
    },
    created(){
        let appElement = document.getElementById("app");
        this.language = appElement.dataset.lang;
    }
}
</script>

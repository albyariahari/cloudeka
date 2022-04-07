require('./bootstrap');
import { createApp } from 'vue';

import PrototypeCalculator from './components/PrototypeCalculator.vue';
import BecomePartnerTable from './components/become-partner-table/BecomePartnerTable.vue';
import BenefitTierTable from './components/benefit-tier-table/BenefitTierTable.vue';

import store from './store';

// import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap/dist/js/bootstrap.js';

import 'popper.js/dist/popper';

import JQuery from 'jquery'
window.$ = JQuery

import AOS from 'aos';
AOS.init({
    startEvent: 'load',
});

let app = createApp({})
app.use(store)
app.component('prototype-calculator', PrototypeCalculator)
app.component('become-partner-table', BecomePartnerTable)
app.component('benefit-tier-table', BenefitTierTable)

app.mount("#app")
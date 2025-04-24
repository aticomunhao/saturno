import './bootstrap';

import '../css/app.css';

import '../sass/app.scss';

import './custom.js';

import 'bootstrap/dist/js/bootstrap.bundle.min.js';

import 'bootstrap5-toggle/js/bootstrap5-toggle.ecmas.min.js';

import $ from 'jquery';

import 'select2';

import Inputmask from "inputmask";

window.$ = window.jQuery = $;

import { createApp } from 'vue';
import ExampleComponent from './components/ExampleComponent.vue'; // ajuste o nome conforme seu componente

const app = createApp({});
app.component('example-component', ExampleComponent);
app.mount('#app');


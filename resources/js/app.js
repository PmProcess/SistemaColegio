/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import Vue from "vue";
import helperJs from "./helpers.js"


const plugin={
    install()
    {
        Vue.helperJs=helperJs,
        Vue.prototype.$helperJs=helperJs
    }
}
Vue.use(plugin)

require('./bootstrap');

window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('tipoempleadoindex-component', require('./Components/Personal/TipoEmpleadoIndexComponent.vue').default);
Vue.component('colegioindex-component',require('./Components/Administracion/Colegio/ColegioIndexComponent.vue').default);
Vue.component('empleadoindex-component', require('./Components/Personal/EmpleadoIndexComponent.vue').default);
Vue.component('empleadocreate-component', require('./Components/Personal/EmpleadoCreateComponent.vue').default);
Vue.component('empleadoedit-component', require('./Components/Personal/EmpleadoEditComponent.vue').default);

Vue.component('matriculaindex-component', require('./Components/Administracion/Matricula/MatriculaIndexComponent.vue').default);
Vue.component('matriculacreate-component', require('./Components/Administracion/Matricula/MatriculaCreateComponent.vue').default);
Vue.component('matriculaedit-component', require('./Components/Administracion/Matricula/MatriculaEditComponent.vue').default);

Vue.component('alumnoindex-component', require('./Components/Administracion/Alumno/AlumnoIndexComponent.vue').default);
Vue.component('alumnocreate-component', require('./Components/Administracion/Alumno/AlumnoCreateComponent.vue').default);
Vue.component('alumnoedit-component', require('./Components/Administracion/Alumno/AlumnoEditComponent.vue').default);

Vue.component('rolindex-component', require('./Components/Administracion/RolIndexComponent.vue').default);
Vue.component('rolcreate-component', require('./Components/Administracion/RolCreateComponent.vue').default);
Vue.component('roledit-component', require('./Components/Administracion/RolEditComponent.vue').default);

Vue.component('gradoindex-component', require('./Components/Administracion/GradoIndexComponent.vue').default);
Vue.component('gradoseccionindex-component', require('./Components/Administracion/GradoSeccionIndexComponent.vue').default);
Vue.component('gradocursoindex-component', require('./Components/Administracion/GradoCursoIndexComponent.vue').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});

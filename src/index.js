import axios from "axios";
import filterFormData from "./utilitis/formdata";
class CarsCatalog {


    constructor() {
        this.filterForm = document.querySelector('#filter');

        if ( this.filterForm  == null) {
            return false
        }

        this.filterForm.addEventListener('submit', event => {
            this.filterHandler(event)
        })

        document.querySelectorAll( '.page-link' ).forEach( link => {
            link.addEventListener( 'click', event => {
                this.paginationHandler( event );
            })
        })
    }

    async filterHandler(event) {
        event.preventDefault();

        let filterData = filterFormData( this.filterForm , 1 );

        const admin_ajax_url = theme_ajax.ajax_url;
        const response = await axios.post(admin_ajax_url, filterData );

        document.querySelector('#filter-response').innerHTML = response.data.data.posts;

        document.querySelectorAll( '.page-link' ).forEach( link => {
            link.addEventListener( 'click', event => {
                this.paginationHandler( event );
            })
        })
    }

    async paginationHandler(event) {
        event.preventDefault();

        let page = event.target.textContent,
            pageInt = parseInt(page);

        let data = filterFormData( this.filterForm , pageInt );

        const admin_ajax_url = theme_ajax.ajax_url;
        const response = await axios.post(admin_ajax_url, data);

        document.querySelector('#filter-response').innerHTML = response.data.data.posts;

        document.querySelectorAll( '.page-link' ).forEach( link => {
            link.addEventListener( 'click', event => {
                this.paginationHandler( event );
            })
        })
    }
}

new CarsCatalog();
import axios from "axios";
import filterFormData from "./utilitis/formdata";
class CarsCatalog {
    constructor() {
        this.filterForm = document.querySelector('#filter');

        if ( this.filterForm  == null) {
            return false
        }

        this.filterResponseBlock = document.querySelector('#filter-response');

        this.filterForm.addEventListener('submit', event => {
            this.filterHandler(event)
        })

        document.querySelectorAll( '.page-link' ).forEach( link => {
            link.addEventListener( 'click', event => {
                this.paginationHandler( event );
            })
        })

        document.querySelector('#btn-reset').addEventListener( 'click', event => {
            this.resetFormHandler( event )
        })

        this.postObserver();

    }

    async filterHandler(event) {
        event.preventDefault();

        let filterData = filterFormData( this.filterForm , 1 );

        const admin_ajax_url = theme_ajax.ajax_url;
        const response = await axios.post(admin_ajax_url, filterData );

        document.querySelector('#filter-response').innerHTML = response.data.data.posts;

    }

    async paginationHandler(event) {
        event.preventDefault();

        let page = event.target.textContent,
            pageInt = parseInt(page);

        let data = filterFormData( this.filterForm , pageInt );

        const admin_ajax_url = theme_ajax.ajax_url;
        const response = await axios.post(admin_ajax_url, data);

        document.querySelector('#filter-response').innerHTML = response.data.data.posts;

    }

    async resetFormHandler( event ) {
        event.preventDefault();

        this.filterForm.reset();
        let filterData = filterFormData( this.filterForm , 1 );

        const admin_ajax_url = theme_ajax.ajax_url;
        const response = await axios.post(admin_ajax_url, filterData );

        document.querySelector('#filter-response').innerHTML = response.data.data.posts;


    }

    postObserver() {
        this.observer = new MutationObserver((mutationsList, observer) => {
            for(let mutation of mutationsList) {
                if (mutation.type === 'childList') {

                    document.querySelectorAll( '.page-link' ).forEach( link => {
                        link.addEventListener( 'click', event => {
                            this.paginationHandler( event );
                        })
                    })

                }
            }
        });

        const config = { childList: true, subtree: true };
        this.observer.observe( this.filterResponseBlock , config);
    }
}

new CarsCatalog();
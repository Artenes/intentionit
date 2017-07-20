
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import env from './env';
const NProgrss = require('nprogress');
const Vue = require('vue');
const algoliasearch = require('algoliasearch');
const client = algoliasearch(env.ALGOLIA_ID, env.ALGOLIA_SEARCH_ONLY_KEY);
const index = client.initIndex('intents');

const app = new Vue({

    el: '#app',

    data: {

        timeout: null,
        results: null

    },

    methods: {

        type(event) {

            clearTimeout(this.timeout);
            this.timeout = setTimeout(function () {

                NProgrss.start();
                this.search(event.target.value);

            }.bind(this), 500);

        },

        search(query) {

            NProgrss.done();

            if (query.length == 0) {

                this.results = null;
                return;

            }

            index.search(query, function searchDone(err, content) {

                if (err) {
                    console.error(err);
                    return;
                }

                this.results = content.hits;

            }.bind(this));

        }

    }

});

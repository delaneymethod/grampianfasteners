/**
 * @link      https://www.delaneymethod.com/cms
 * @copyright Copyright (c) DelaneyMethod
 * @license   https://www.delaneymethod.com/cms/license
 */

window._ = require('lodash');

window.$ = window.jQuery = require('jquery');

window.Tether = require('tether');

window.Echo = require('laravel-echo');

window.Pusher = require('pusher-js');

window.Popper = require('popper.js').default;

window.Clipboard = require('clipboard');

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

window.axiosCancel = require('axios-cancel').default;

window.axiosCancel(window.axios, {
	debug: false
});

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

require('lazyload');

require('bootstrap');

require('bootstrap-datetime-picker');

require('chart.js');

require('../plugins/redactor/redactor');

require('../plugins/redactor/plugins/source');

require('../plugins/redactor/plugins/table');

require('../plugins/redactor/plugins/definedlinks');

require('../plugins/redactor/plugins/alignment/alignment');

require('../plugins/redactor/plugins/fullscreen');

require('../plugins/redactor/plugins/filemanager');

require('../plugins/redactor/plugins/imagemanager');

require('../plugins/redactor/plugins/video');

require('../plugins/jquery-ui/sortable');

require('../plugins/jquery-ui/sortable-nested');

require('../plugins/datatables/datatables');

require('../plugins/datatables/datatables-bootstrap');

require('../plugins/delaneymethod/cms/cp');

require('../plugins/delaneymethod/cms/cp/browse');

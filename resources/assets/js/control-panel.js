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

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

window.axiosCancel = require('axios-cancel').default;

window.axiosCancel(window.axios, {
	debug: false
});

window.FastClick = require('fastclick');

window.Clipboard = require('clipboard');

require('bootstrap');

require('bootstrap-datetime-picker');

require('chart.js');

require('../plugins/unveil');

require('../plugins/redactor/redactor');

require('../plugins/redactor/plugins/source');

require('../plugins/redactor/plugins/table');

require('../plugins/redactor/plugins/definedlinks');

require('../plugins/redactor/plugins/alignment/alignment');

require('../plugins/redactor/plugins/pagebreak/pagebreak');

/* require('../plugins/redactor/plugins/redbutton'); */

require('../plugins/redactor/plugins/fullscreen');

require('../plugins/redactor/plugins/filemanager');

require('../plugins/redactor/plugins/imagemanager');

require('../plugins/redactor/plugins/video');

require('../plugins/redactor/plugins/inlinestyle');

require('../plugins/redactor/plugins/fontcolor');

require('../plugins/redactor/plugins/properties');

require('../plugins/redactor/plugins/textexpander');

require('../plugins/redactor/plugins/codemirror');

window.CodeMirror = require('../plugins/codemirror/codemirror');

require('../plugins/codemirror/modes/htmlmixed');

require('../plugins/codemirror/modes/javascript');

require('../plugins/codemirror/modes/css');

require('../plugins/codemirror/modes/xml');

require('../plugins/jquery-ui/sortable');

require('../plugins/jquery-ui/sortable-nested');

require('../plugins/password-strength');

require('../plugins/datatables/datatables');

require('../plugins/datatables/datatables-bootstrap');

require('../plugins/delaneymethod/browse/index');

require('../plugins/delaneymethod/cms/library');

require('../plugins/delaneymethod/cms/control-panel');

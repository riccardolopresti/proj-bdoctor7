import './bootstrap';
import '~resources/scss/app.scss';
import '~resources/scss/table.scss';

import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
])

import select2 from 'select2';
select2();


document.querySelector('.navbar-toggler').addEventListener('click', () => {
    document.querySelector('.aside-container').classList.toggle('open');
});

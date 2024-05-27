import './bootstrap';

import '@fortawesome/fontawesome-free/css/all.min.css';

import 'livewire-sortable'

import Alpine from 'alpinejs';

(!window.Alpine) ? window.Alpine = Alpine : '';

Alpine.start();

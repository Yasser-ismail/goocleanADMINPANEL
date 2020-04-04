<?php

Breadcrumbs::for('dashboard.clients.index', function ($trail) {
    $trail->parent('dashboard.home');
    $trail->push(__('clients.plural'), route('dashboard.clients.index'));
});

Breadcrumbs::for('dashboard.clients.create', function ($trail) {
    $trail->parent('dashboard.clients.index');
    $trail->push(__('clients.actions.create'), route('dashboard.clients.create'));
});

Breadcrumbs::for('dashboard.clients.edit', function ($trail) {
    $trail->parent('dashboard.clients.index');
    $trail->push(__('clients.actions.edit'), route('dashboard.clients.edit', request()->route('client')));
});

Breadcrumbs::for('dashboard.clients.show', function ($trail) {
    $trail->parent('dashboard.clients.index');
    $trail->push(__('clients.actions.show'), route('dashboard.clients.show', request()->route('client')));
});

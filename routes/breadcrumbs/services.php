<?php

Breadcrumbs::for('dashboard.services.index', function ($trail) {
    $trail->parent('dashboard.home');
    $trail->push(__('services.plural'), route('dashboard.services.index'));
});

Breadcrumbs::for('dashboard.services.create', function ($trail) {
    $trail->parent('dashboard.services.index');
    $trail->push(__('services.actions.create'), route('dashboard.services.create'));
});

Breadcrumbs::for('dashboard.services.edit', function ($trail) {
    $trail->parent('dashboard.services.index');
    $trail->push(__('services.actions.edit'), route('dashboard.services.edit', request()->route('service')));
});

Breadcrumbs::for('dashboard.services.show', function ($trail) {
    $trail->parent('dashboard.services.index');
    $trail->push(__('services.actions.show'), route('dashboard.services.show', request()->route('service')));
});

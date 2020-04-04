<?php

Breadcrumbs::for('dashboard.cities.index', function ($trail) {
    $trail->parent('dashboard.home');
    $trail->push(__('cities.plural'), route('dashboard.cities.index'));
});

Breadcrumbs::for('dashboard.cities.create', function ($trail) {
    $trail->parent('dashboard.cities.index');
    $trail->push(__('cities.actions.create'), route('dashboard.cities.create'));
});

Breadcrumbs::for('dashboard.cities.edit', function ($trail) {
    $trail->parent('dashboard.cities.index');
    $trail->push(__('cities.actions.edit'), route('dashboard.cities.edit', request()->route('city')));
});

Breadcrumbs::for('dashboard.cities.show', function ($trail) {
    $trail->parent('dashboard.cities.index');
    $trail->push(__('cities.actions.show'), route('dashboard.cities.show', request()->route('city')));
});

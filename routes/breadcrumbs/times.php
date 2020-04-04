<?php

Breadcrumbs::for('dashboard.times.index', function ($trail) {
    $trail->parent('dashboard.home');
    $trail->push(__('times.plural'), route('dashboard.times.index'));
});

Breadcrumbs::for('dashboard.times.create', function ($trail) {
    $trail->parent('dashboard.times.index');
    $trail->push(__('times.actions.create'), route('dashboard.times.create'));
});

Breadcrumbs::for('dashboard.times.edit', function ($trail) {
    $trail->parent('dashboard.times.index');
    $trail->push(__('times.actions.edit'), route('dashboard.times.edit', request()->route('time')));
});

Breadcrumbs::for('dashboard.times.show', function ($trail) {
    $trail->parent('dashboard.times.index');
    $trail->push(__('times.actions.show'), route('dashboard.times.show', request()->route('time')));
});

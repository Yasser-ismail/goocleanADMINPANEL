<?php

Breadcrumbs::for('dashboard.appoientments.index', function ($trail) {
    $trail->parent('dashboard.home');
    $trail->push(__('appoientments.plural'), route('dashboard.appoientments.index'));
});

Breadcrumbs::for('dashboard.appoientments.create', function ($trail) {
    $trail->parent('dashboard.appoientments.index');
    $trail->push(__('appoientments.actions.create'), route('dashboard.appoientments.create'));
});

Breadcrumbs::for('dashboard.appoientments.edit', function ($trail) {
    $trail->parent('dashboard.appoientments.index');
    $trail->push(__('appoientments.actions.edit'), route('dashboard.appoientments.edit', request()->route('appoientment')));
});

Breadcrumbs::for('dashboard.appoientments.show', function ($trail) {
    $trail->parent('dashboard.appoientments.index');
    $trail->push(__('appoientments.actions.show'), route('dashboard.appoientments.show', request()->route('appoientment')));
});

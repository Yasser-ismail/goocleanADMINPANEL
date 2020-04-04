<?php

Breadcrumbs::for('dashboard.users.index', function ($trail) {
    $trail->parent('dashboard.home');
    $trail->push(__('users.plural'), route('dashboard.users.index'));
});

Breadcrumbs::for('dashboard.users.create', function ($trail) {
    $trail->parent('dashboard.users.index');
    $trail->push(__('users.actions.create'), route('dashboard.users.create'));
});

Breadcrumbs::for('dashboard.users.edit', function ($trail) {
    $trail->parent('dashboard.users.index');
    $trail->push(__('users.actions.edit'), route('dashboard.users.edit', request()->route('user')));
});

Breadcrumbs::for('dashboard.users.show', function ($trail) {
    $trail->parent('dashboard.users.index');
    $trail->push(__('users.actions.show'), route('dashboard.users.show', request()->route('user')));
});

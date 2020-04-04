<?php

Breadcrumbs::for('dashboard.settings.index', function ($trail) {
    $trail->parent('dashboard.home');
    $trail->push(__('settings.plural'), route('dashboard.settings.index'));
});

Breadcrumbs::for('dashboard.settings.create', function ($trail) {
    $trail->parent('dashboard.settings.index');
    $trail->push(__('settings.actions.create'), route('dashboard.settings.create'));
});

Breadcrumbs::for('dashboard.settings.edit', function ($trail) {
    $trail->parent('dashboard.settings.index');
    $trail->push(__('settings.actions.edit'), route('dashboard.settings.edit', request()->route('setting')));
});

Breadcrumbs::for('dashboard.settings.show', function ($trail) {
    $trail->parent('dashboard.settings.index');
    $trail->push(__('settings.actions.show'), route('dashboard.settings.show', request()->route('setting')));
});

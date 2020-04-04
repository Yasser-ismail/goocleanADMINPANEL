<?php

Breadcrumbs::for('dashboard.workinghours.index', function ($trail) {
    $trail->parent('dashboard.home');
    $trail->push(__('workinghours.plural'), route('dashboard.workinghours.index'));
});

Breadcrumbs::for('dashboard.workinghours.create', function ($trail) {
    $trail->parent('dashboard.workinghours.index');
    $trail->push(__('workinghours.actions.create'), route('dashboard.workinghours.create'));
});

Breadcrumbs::for('dashboard.workinghours.edit', function ($trail) {
    $trail->parent('dashboard.workinghours.index');
    $trail->push(__('workinghours.actions.edit'), route('dashboard.workinghours.edit', request()->route('workinghour')));
});

Breadcrumbs::for('dashboard.workinghours.show', function ($trail) {
    $trail->parent('dashboard.workinghours.index');
    $trail->push(__('workinghours.actions.show'), route('dashboard.workinghours.show', request()->route('workinghour')));
});

<?php

Breadcrumbs::for('dashboard.companies.index', function ($trail) {
    $trail->parent('dashboard.home');
    $trail->push(__('companies.plural'), route('dashboard.companies.index'));
});

Breadcrumbs::for('dashboard.companies.create', function ($trail) {
    $trail->parent('dashboard.companies.index');
    $trail->push(__('companies.actions.create'), route('dashboard.companies.create'));
});

Breadcrumbs::for('dashboard.companies.edit', function ($trail) {
    $trail->parent('dashboard.companies.index');
    $trail->push(__('companies.actions.edit'), route('dashboard.companies.edit', request()->route('company')));
});

Breadcrumbs::for('dashboard.companies.show', function ($trail) {
    $trail->parent('dashboard.companies.index');
    $trail->push(__('companies.actions.show'), route('dashboard.companies.show', request()->route('company')));
});

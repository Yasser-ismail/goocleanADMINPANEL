<?php

Breadcrumbs::for('dashboard.home', function ($trail) {
    $trail->push(__('backend.dashboard'), route('dashboard.home'));
});


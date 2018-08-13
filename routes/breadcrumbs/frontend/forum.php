<?php

Breadcrumbs::for('frontend.index', function ($trail) {
    $trail->push(__('strings.frontend.breadcrumb.home'), route('frontend.index'));
});

Breadcrumbs::for('frontend.forum.course.view', function ($trail, $course) {
    $trail->parent('frontend.index');
    $trail->push(__('strings.frontend.breadcrumb.course').' : '.$course->name,
        route('frontend.forum.course.view', $course));
});

Breadcrumbs::for('frontend.forum.assignment.view', function ($trail, $course, $assignment) {
    $trail->parent('frontend.forum.course.view', $course);
    $trail->push(__('strings.frontend.breadcrumb.assignment').' : '.$assignment->name,
        route('frontend.forum.assignment.view', [$course, $assignment]));
});

Breadcrumbs::for('frontend.forum.assignment.reverse', function ($trail, $course, $assignment) {
    $trail->parent('frontend.forum.course.view', $course);
    $trail->push(__('strings.frontend.breadcrumb.assignment').' : '.$assignment->name,
        route('frontend.forum.assignment.reverse', [$course, $assignment]));
});

Breadcrumbs::for('frontend.forum.post.edit', function ($trail, $course, $assignment, $post) {
    $trail->parent('frontend.forum.assignment.view', $course, $assignment);
    $trail->push(__('strings.frontend.breadcrumb.post.edit'),
        route('frontend.forum.post.edit', [$course, $assignment, $post]));
});
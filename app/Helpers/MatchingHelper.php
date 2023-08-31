<?php

function calculateMatchingCount($columns)
{
    return count(array_filter($columns, function ($column) {
        return !empty($column);
    }));
}
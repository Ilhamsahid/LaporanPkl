@props([
    'rows' => [],
    'mobileHeaders' => null,
    'mobileFields' => [],
    'desktopColumns' => [],
    'desktopFields' => [],
    'desktopActions' => [],
    'mobileAction' => null,
])


<x-mobile.mobile-card
:rows="$rows"
:headers="$mobileHeaders"
:fields="$mobileFields"
:mobileActions="$mobileAction"
/>

<x-table.table
:rows="$rows"
:columns="$desktopColumns"
:fields="$desktopFields"
:desktopActions="$desktopActions"
/>
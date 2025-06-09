@props([
    'rows' => [],
    'mobileHeaders' => null,
    'mobileFields' => [],
    'desktopColumns' => [],
    'desktopFields' => [],
    'desktopActions' => [],
    'mobileActions' => null,
])


<x-mobile.mobile-card
:rows="$rows"
:headers="$mobileHeaders"
:fields="$mobileFields"
:mobileActions="$mobileActions"
/>

<x-table.table
:rows="$rows"
:columns="$desktopColumns"
:fields="$desktopFields"
:desktopActions="$desktopActions"
/>
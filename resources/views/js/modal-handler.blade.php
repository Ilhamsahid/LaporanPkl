@push('script')
    <script>
        window.onload = function() {
            @if (session('modal-add'))
                openModal("{{ session('modal-add') }}");
            @endif

            @if (session('modal-edit'))
                openModal("{{ session('modal-edit') }}");
            @endif

            @if (session('success'))
                showNotification("success", "Berhasil", "{{ session('success') }}");
            @endif
        }
    </script>
@endpush
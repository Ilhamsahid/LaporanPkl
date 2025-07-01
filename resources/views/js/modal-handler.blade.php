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

            @if (session('warning'))
                showNotification("warning", "Gagal", "{{ session('warning') }}");
            @endif

            @if (session('error'))
                showNotification("error", "Error", "{{ session('error') }}");
            @endif
        }
    </script>
@endpush
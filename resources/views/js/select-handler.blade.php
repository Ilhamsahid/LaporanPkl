@push('script')
    <script>
        document.getElementById('kelas-select').addEventListener('change', function() {
            const kelasId = this.value;
            const siswaSelect = document.getElementById('siswa-select');

            // Reset pilihan siswa dulu
            siswaSelect.innerHTML = '<option value="" hidden>Pilih Siswa</option>';

            if (!kelasId) return;

            fetch(`/kelas/${kelasId}/siswa`)
                .then(response => response.json())
                .then(data => {
                    data.forEach(siswa => {
                        const option = document.createElement('option');
                        option.value = siswa.id;
                        option.textContent = siswa.nama; // Asumsi atribut nama ada
                        siswaSelect.appendChild(option);
                    });
                })
                .catch(error => {
                    console.error('Error fetching siswa:', error);
                });
        });
    </script>
@endpush

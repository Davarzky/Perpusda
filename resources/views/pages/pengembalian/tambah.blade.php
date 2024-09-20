@extends('layout.footer')
@extends('layout.content')

@section('content')
<div class="container mt-4">
    <h2>Form Pengembalian Buku</h2>
    <form id="pengembalianForm" action="{{ route('pengembalian.store') }}" method="POST">
        @csrf
        <div class="row mb-3">
            <label for="id_pengembalian" class="col-form-label col-3">ID Pengembalian</label>
            <div class="col-5">
                <input type="text" name="id_pengembalian" id="id_pengembalian" class="form-control bg-body-secondary" readonly>
            </div>
        </div>
        <div class="row mb-3">
            <label for="tanggal_kembali" class="col-form-label col-3">Tanggal Kembali</label>
            <div class="col-3">
                <input type="date" name="tanggal_kembali" id="tanggal_kembali" class="form-control">
            </div>
        </div>
        <div class="row mb-3">
            <label for="nisn" class="col-form-label col-3">NIS</label>
            <div class="col-5">
                <input type="number" name="nisn" id="nisn" class="form-control" required>
            </div>
        </div>
        
        <div class="row mb-3">
            <label for="nama_siswa" class="col-form-label col-3">Nama Siswa</label>
            <div class="col-5">
                <input type="text" name="nama_siswa" id="nama_siswa" class="form-control" disabled>
            </div>
        </div>

        <h4 class="mt-4">Detail Pengembalian</h4>
        <table class="table table-sm table-striped" id="detailTable">
            <thead>
                <tr class="align-middle">
                    <th>
                        <label for="kode_buku" class="form-label">Kode Buku</label>
                        <input type="text" id="kode_buku" class="form-control form-control-sm">
                    </th>
                    <th>
                        <label for="judul_buku" class="form-label">Judul Buku</label>
                        <input type="text" id="judul_buku" class="form-control form-control-sm" disabled>
                    </th>
                    <th>
                        <label for="jumlah" class="form-label">Jumlah</label>
                        <input type="number" id="jumlah" class="form-control form-control-sm">
                    </th>
                    <th>
                        <button type="button" id="addDetailBtn" class="btn btn-primary btn-sm mt-4">Tambah</button>
                    </th>
                </tr>
            </thead>
            <tbody id="detailBody">
                <!-- Detail rows will be added here dynamically -->
            </tbody>
        </table>

        <button type="submit" class="btn btn-success">Simpan Pengembalian</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const baseUrl = '{{ url('') }}';

        // Generate a unique ID for the return
        document.getElementById('id_pengembalian').value = 'PGM' + Date.now();

        // Set default return date
        const today = new Date().toISOString().split('T')[0];
        document.getElementById('tanggal_kembali').value = today;

        // Fetch student data when NIS is entered
        document.getElementById('nisn').addEventListener('blur', function() {
            const nis = this.value;
            if (nis) {
                axios.get(`${baseUrl}/data-siswa/${nis}`)
                    .then(response => {
                        const siswa = response.data;
                        document.getElementById('nama_siswa').value = siswa.nama;
                    })
                    .catch(error => {
                        alert('Siswa tidak ditemukan');
                        document.getElementById('nama_siswa').value = '';
                    });
            }
        });

        // Fetch book data when kode_buku is entered
        document.getElementById('kode_buku').addEventListener('blur', function() {
            const kodeBuku = this.value;
            if (kodeBuku) {
                axios.get(`${baseUrl}/buku/${kodeBuku}/show`)
                    .then(response => {
                        const buku = response.data;
                        document.getElementById('judul_buku').value = buku.judul;
                    })
                    .catch(error => {
                        alert('Buku tidak ditemukan');
                        document.getElementById('judul_buku').value = '';
                    });
            }
        });

        // Add detail to the table
        document.getElementById('addDetailBtn').addEventListener('click', function() {
            const kodeBuku = document.getElementById('kode_buku').value;
            const judulBuku = document.getElementById('judul_buku').value;
            const jumlah = document.getElementById('jumlah').value;

            if (kodeBuku && judulBuku && jumlah) {
                const detailBody = document.getElementById('detailBody');
                const newRow = detailBody.insertRow();
                newRow.innerHTML = `
                    <td>${kodeBuku}</td>
                    <td>${judulBuku}</td>
                    <td>${jumlah}</td>
                    <td><button type="button" class="btn btn-danger btn-sm" onclick="this.closest('tr').remove()">Hapus</button></td>
                `;

                // Clear input fields
                document.getElementById('kode_buku').value = '';
                document.getElementById('judul_buku').value = '';
                document.getElementById('jumlah').value = '';
            } else {
                alert('Harap isi semua detail buku');
            }
        });

        // Handle form submission
        document.getElementById('pengembalianForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const pengembalian = {
                id: document.getElementById('id_pengembalian').value,
                nisn: document.getElementById('nisn').value,
                tanggal_kembali: document.getElementById('tanggal_kembali').value,
                detail_pengembalian: []
            };

            const detailRows = document.querySelectorAll('#detailBody tr');

            if (detailRows.length === 0) {
                alert('Harap tambahkan detail pengembalian sebelum menyimpan.');
                return;
            }

            detailRows.forEach(row => {
                const kodeBuku = row.cells[0].textContent.trim();
                const jumlah = row.cells[2].textContent.trim();
                pengembalian.detail_pengembalian.push({ 
                    kode_buku: kodeBuku, 
                    jumlah: parseInt(jumlah) 
                });
            });

            // Send data
            axios.post('{{ route('pengembalian.store') }}', pengembalian)
                .then(response => {
                    alert('Pengembalian berhasil disimpan');
                    window.location.href = '/pengembalian';
                })
                .catch(error => {
                    alert('Terjadi kesalahan: ' + (error.response.data.message || 'Error tidak diketahui'));
                });
        });
    });
</script>
@endsection
@extends('layout.header')

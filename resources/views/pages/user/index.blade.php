@extends('layout-user.header')

@section('css')
    <link rel="stylesheet" href="/style/style.css">
@endsection

@section('js')
    <script src="/style/script.js"></script>
@endsection

@section('content')
<main class="container py-5">
    <!-- Search Bar -->
    <div class="d-flex justify-content-center mb-4">
        <form class="d-flex w-100" method="POST" action="#">
            @csrf
            <input type="text" name="query" class="form-control me-2" placeholder="Search" title="Enter search keyword">
            <button type="submit" class="btn btn-primary" title="Search"><i class="bi bi-search"></i></button>
        </form>
    </div>
    
    <h4 id="terbaru" class="mb-4">Buku Terfavorit</h4>
    <!-- Favorite Books Section -->
    <div id="favorite-books" class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-6 g-4">
        <!-- Buku 1 -->
        <div class="col book-item">
            <div class="card">
                <img src="/img/Atomic-Habits.jpeg" class="card-img-top book-cover" alt="Atomic Habits">
                <div class="card-body">
                    <h5 class="card-title">Atomic Habits</h5>
                    <p class="card-text">Rp100,000</p>
                </div>
            </div>
        </div>
        <!-- Buku 2 -->
        <div class="col book-item">
            <div class="card">
                <img src="/img/Dilan-1983.jpg" class="card-img-top book-cover" alt="Dilan 1983">
                <div class="card-body">
                    <h5 class="card-title">Dilan 1983</h5>
                    <p class="card-text">Rp85,000</p>
                </div>
            </div>
        </div>
        <!-- Buku 3 -->
        <div class="col book-item">
            <div class="card">
                <img src="/img/Dilan-1990.jpg" class="card-img-top book-cover" alt="Dilan 1990">
                <div class="card-body">
                    <h5 class="card-title">Dilan 1990</h5>
                    <p class="card-text">Rp90,000</p>
                </div>
            </div>
        </div>
        <!-- Buku 4 -->
        <div class="col book-item">
            <div class="card">
                <img src="/img/Dilan-1991.jpg" class="card-img-top book-cover" alt="Dilan 1991">
                <div class="card-body">
                    <h5 class="card-title">Dilan 1991</h5>
                    <p class="card-text">Rp88,000</p>
                </div>
            </div>
        </div>
        <!-- Buku 5 -->
        <div class="col book-item">
            <div class="card">
                <img src="/img/Filosofi-Teras.jpg" class="card-img-top book-cover" alt="Filosofi Teras">
                <div class="card-body">
                    <h5 class="card-title">Filosofi Teras</h5>
                    <p class="card-text">Rp75,000</p>
                </div>
            </div>
        </div>
        <div class="col book-item">
            <div class="card">
                <img src="/img/Filosofi-Teras.jpg" class="card-img-top book-cover" alt="Filosofi Teras">
                <div class="card-body">
                    <h5 class="card-title">Filosofi Teras</h5>
                    <p class="card-text">Rp75,000</p>
                </div>
            </div>
        </div>
        <!-- Buku 6 -->
        <div class="col book-item">
            <div class="card">
                <img src="/img/milea-suara-dilan.jpeg" class="card-img-top book-cover" alt="Milea: Suara Dilan">
                <div class="card-body">
                    <h5 class="card-title">Milea: Suara Dilan</h5>
                    <p class="card-text">Rp95,000</p>
                </div>
            </div>
        </div>
        <div class="col book-item">
            <div class="card">
                <img src="/img/Dilan-1990.jpg" class="card-img-top book-cover" alt="Dilan 1990">
                <div class="card-body">
                    <h5 class="card-title">Dilan 1990</h5>
                    <p class="card-text">Rp90,000</p>
                </div>
            </div>
        </div>
    </div>
    <a href="#" id="see-more-favorites" style="display: none;color:#0C3573;font-weight: bold">Lihat Semua</a>
    
    <h4 class="mt-5 mb-4">Buku Terbaru</h4>
    <!-- New Books Section -->
    <div id="new-books" class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-6 g-4">
        <!-- Buku 1 -->
        <div class="col book-item">
            <div class="card">
                <img src="/img/psychology-of-money.jpg" class="card-img-top book-cover" alt="Psychology of Money">
                <div class="card-body">
                    <h5 class="card-title">Psychology of Money</h5>
                    <p class="card-text">Rp120,000</p>
                </div>
            </div>
        </div>
        <!-- Buku 2 -->
        <div class="col book-item">
            <div class="card">
                <img src="/img/milea-suara-dilan.jpeg" class="card-img-top book-cover" alt="Milea: Suara Dilan">
                <div class="card-body">
                    <h5 class="card-title">Milea: Suara Dilan</h5>
                    <p class="card-text">Rp95,000</p>
                </div>
            </div>
        </div>
        <!-- Buku 3 -->
        <div class="col book-item">
            <div class="card">
                <img src="/img/milea-suara-dilan.jpeg" class="card-img-top book-cover" alt="Milea: Suara Dilan">
                <div class="card-body">
                    <h5 class="card-title">Milea: Suara Dilan</h5>
                    <p class="card-text">Rp95,000</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col book-item">
        <div class="card">
            <img src="/img/milea-suara-dilan.jpeg" class="card-img-top book-cover" alt="Milea: Suara Dilan">
            <div class="card-body">
                <h5 class="card-title">Milea: Suara Dilan</h5>
                <p class="card-text">Rp95,000</p>
            </div>
        </div>
    </div>
    <button id="see-more-new" class="btn btn-primary mt-3" style="display: none;">Lihat Semua</button>
</main>
@endsection

@extends('layout-user.footer')

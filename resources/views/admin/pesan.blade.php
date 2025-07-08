<style>
/* Container popup toast */
.toast-popup {
    position: fixed;
    top: 65px;
    left: 50%;
    transform: translateX(-50%);
    min-width: 700px;
    max-width: 90%;
    padding: 15px 25px;
    border-radius: 5px;
    color: #ffffff;
    font-weight: 600;
    box-shadow: 0 4px 10px rgba(0,0,0,0.3);
    opacity: 1;
    transition: opacity 0.5s ease;
    z-index: 1050;
    cursor: pointer;
    text-align: justify; 
}

/* Warna hijau untuk sukses */
.toast-success {
    background-color: #4E9258; /* bootstrap green */
}

/* Warna merah untuk error */
.toast-error {
    background-color: #e54756; /* bootstrap red */
}
</style>

@if (Session::has('sukses'))
    <div class="toast-popup toast-success" id="toast-popup">
        {{ Session::get('sukses') }}
    </div>
@endif

@if ($errors->any())
    <div class="toast-popup toast-error" id="toast-popup">
        <ul style="margin: 0; padding-left: 20px;">
            @foreach ($errors->all() as $item)
                <li>{{ $item }}</li>
            @endforeach
        </ul>
    </div>
@endif

<script>
document.addEventListener('DOMContentLoaded', function() {
    var toast = document.getElementById('toast-popup');
    if(toast){
        // Klik toast langsung hilang
        toast.addEventListener('click', function() {
            this.style.opacity = '0';
            setTimeout(() => this.remove(), 500);
        });

        // Hilang otomatis setelah 5 detik
        setTimeout(function() {
            toast.style.opacity = '0';
            setTimeout(function() {
                toast.remove();
            }, 500);
        }, 3000);
    }
});
</script>

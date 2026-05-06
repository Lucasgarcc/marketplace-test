<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-danger rounded-pill fw-semibold']) }}>
    {{ $slot }}
</button>

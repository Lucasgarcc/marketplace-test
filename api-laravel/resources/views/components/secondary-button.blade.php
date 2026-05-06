<button {{ $attributes->merge(['type' => 'button', 'class' => 'btn btn-outline-secondary rounded-pill']) }}>
    {{ $slot }}
</button>

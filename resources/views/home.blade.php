<x-vinylshop-layout>
    <x-slot name="description">Welcome to the Vinyl Shop</x-slot>
    <x-slot name="title">Welcome to the Vinyl Shop</x-slot>

    <p>Welcome to the website of The Vinyl Shop, a large online store with lots of (classic) vinyl records.</p>

    @push('script')
        <script>
            console.log('The Vinyl Shop JavaScript works! 🙂')
        </script>
    @endpush
</x-vinylshop-layout>

<x-vinylshop-layout>
    <x-slot name="title">Playground</x-slot>

    <h2>Sections</h2>
    <div class="grid grid-cols-3 gap-4">
        <x-tmk.section class="col-span-3 md:col-span-1">
            <h3>Section 1</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi ducimus fuga nesciunt nisi quo sequi
                voluptas. Accusantium consequuntur officiis veritatis.</p>
        </x-tmk.section>
        <x-tmk.section class="col-span-3 md:col-span-1">
            <h3>Section 2</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab distinctio eos ex excepturi possimus, reprehenderit vitae voluptatum. Accusamus eius eum ex, explicabo illo iste maxime odio soluta, vero voluptas, voluptate!</p>
        </x-tmk.section>
        <x-tmk.section class="col-span-3 md:col-span-1">
            <h3>Section 3</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nostrum, quasi?</p>
        </x-tmk.section>
    </div>

    <section class="my-4">
        <h2>Blade UI kit Icons</h2>
        <div class="flex gap-4 p-4 my-4 bg-white rounded border shadow">
            <div class="w-6">
                <x-fas-home/>
            </div>
            <div class="w-6 text-orange-600">
                <x-icon name="fas-home"/>
            </div>
            <div class="w-6 text-green-600">
                @svg('fas-home')
            </div>
            <div class="w-6 text-sky-600">
                {{ svg('fas-home') }}
            </div>
        </div>
    </section>

    <section class="my-4">
        <h2>Preloader</h2>
        <x-tmk.preloader class="px-0"/>
        <x-tmk.preloader class="bg-green-100 text-green-700 border border-green-700"/>
        <x-tmk.preloader class="bg-slate-600 text-white italic w-1/2">Loading records...</x-tmk.preloader>
    </section>

    <section class="my-4">
        <h2>Alerts</h2>
        <x-tmk.alert>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis dolores dolorum error eum eveniet
            exercitationem expedita, impedit itaque laudantium, natus, nobis numquam omnis praesentium quis reiciendis
            soluta sunt vel vero.
        </x-tmk.alert>
        <x-tmk.alert type="danger" class="mt-8 shadow-xl">
            lorem ipsum
        </x-tmk.alert>
        <x-tmk.alert type="info" class="mt-8">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus eligendi facilis libero maiores non,
            praesentium quam reiciendis sunt ut voluptatibus.
        </x-tmk.alert>
        <x-tmk.alert type="warning" dismissible="false" close-self="5000">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus eligendi facilis libero maiores non,
            praesentium quam reiciendis sunt ut voluptatibus.
        </x-tmk.alert>
    </section>

    <section class="my-4">
        <h2>Switch</h2>
        <div class="flex items-center gap-4">
            <x-tmk.form.switch/>
            <x-tmk.form.switch checked color-off="bg-red-200"/>
            <x-tmk.form.switch disabled/>
            <x-tmk.form.switch checked name="save" value="Save me"
                               class="text-white shadow-lg !rounded-full w-28"
                               color-off="bg-orange-800" color-on="bg-sky-800"
                               text-off="switch off" text-on="switch on"/>
            <x-tmk.form.switch name="user" value="on"
                               class="!h-20 !text-5xl"
                               color-off="bg-red-200" color-on="bg-green-500"
                               text-on="😊" text-off="😩"/>
        </div>
    </section>
</x-vinylshop-layout>

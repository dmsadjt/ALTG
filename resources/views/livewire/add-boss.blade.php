<div>
    <div class="d-grid pill-dark p-2 m-3">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <h1 class="mx-5">Add Boss</h1>
        <p class="mx-5 altona-sans-12">Add a new Boss</p>
        <form action="/admin/sirens/post" class="mx-5 p-1" method="POST" enctype="multipart/form-data">
            <div>
                <label class="form-label altona-sans-12" for="name">Boss Name</label>
                <input class="form-control" type="text" name="name" id="name">
            </div>
            <div class="columns-three">
                <div>
                    <label class="form-label altona-sans-12 mt-2" for="type">Boss type</label>
                    <select class="form-select" name="type" id="type">
                        <option value="stronghold">Stronghold
                        </option>
                        <option value="abyssal">Abyssal</option>
                        <option value="arbiter">Arbiter</option>
                        <option value="meta">Meta</option>
                        <option value="guild">Guild</option>
                    </select>
                </div>
                <div>
                    <label class="form-label altona-sans-12 mt-2" for="adaptability">Boss Adaptability</label>
                    <select class="form-select" name="adaptability" id="adaptability">
                        <option value="none">None</option>
                        <option value="full">Full</option>
                    </select>
                </div>


                <div>
                    <label class="form-label altona-sans-12 mt-2" for="weakness">Boss Weakness</label>
                    <input class="form-control" type="text" name="weakness" id="weakness">
                </div>

                <div class="my-1">
                    <label class="form-label altona-sans-12 mt-2" for="img">Boss Image</label>
                    <input class="form-control" type="file" name="img" id="img">
                </div>

            </div>

            <hr>
            <h2>Normal</h2>
            <div class="columns-three">
                <div>
                    <label class="form-label altona-sans-12 mt-2" for="level">Boss Level</label>
                    <input class="form-control" type="number" name="level" id="level">
                </div>
                <div>
                    <label class="form-label altona-sans-12 mt-2" for="armor">Boss Armor</label>
                    <select class="form-select" name="armor" id="armor">
                        <option value="Light">Light</option>
                        <option value="Medium">Medium</option>
                        <option value="Heavy">Heavy</option>
                    </select>
                </div>
                <div>
                    <label class="form-label altona-sans-12 mt-2" for="hull">Boss Hull</label>
                    <select class="form-select" name="hull" id="hull">
                        @foreach ($hulls as $h)
                            <option value="{{ $h->id }}">
                                {{ $h->hull_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="form-label altona-sans-12 mt-2" for="hp">HP</label>
                    <input class="form-control" type="number" name="hp" id="hp">
                </div>
                <div>
                    <label class="form-label altona-sans-12 mt-2" for="fp">FP</label>
                    <input class="form-control" type="number" name="fp" id="fp">
                </div>
                <div>
                    <label class="form-label altona-sans-12 mt-2" for="trp">TRP</label>
                    <input class="form-control" type="number" name="trp" id="trp">
                </div>
                <div>
                    <label class="form-label altona-sans-12 mt-2" for="aa">AA</label>
                    <input class="form-control" type="number" name="aa" id="aa">
                </div>
                <div>
                    <label class="form-label altona-sans-12 mt-2" for="avi">AVI</label>
                    <input class="form-control" type="number" name="avi" id="avi">
                </div>
                <div>
                    <label class="form-label altona-sans-12 mt-2" for="acc">ACC</label>
                    <input class="form-control" type="number" name="acc" id="acc">
                </div>
                <div>
                    <label class="form-label altona-sans-12 mt-2" for="eva">EVA</label>
                    <input class="form-control" type="number" name="eva" id="eva">
                </div>
                <div>
                    <label class="form-label altona-sans-12 mt-2" for="lck">LCK</label>
                    <input class="form-control" type="number" name="lck" id="lck">
                </div>
                <div>
                    <label class="form-label altona-sans-12 mt-2" for="spd">SPD</label>
                    <input class="form-control" type="number" name="spd" id="spd">
                </div>
            </div>



            <hr>

            <div>
                <label class="form-label" for="hardToggle">Is there a hard mode for this boss?</label>
                <input class="form-check-input" type="checkbox" wire:model="hardToggle" id="hardToggle">
            </div>

            @if ($hardToggle == true)
                <h2>Hard</h2>

                <div class="columns-three">
                    <div>
                        <label class="form-label altona-sans-12 mt-2" for="level-hard">Boss Level</label>
                        <input class="form-control" type="number" name="level-hard" id="level-hard">
                    </div>
                    <div>
                        <label class="form-label altona-sans-12 mt-2" for="armor-hard">Boss Armor</label>
                        <select class="form-select" name="armor-hard" id="armor-hard">
                            <option value="Light">Light</option>
                            <option value="Medium">Medium</option>
                            <option value="Heavy">Heavy</option>
                        </select>
                    </div>
                    <div>
                        <label class="form-label altona-sans-12 mt-2" for="hull-hard">Boss Hull</label>
                        <select class="form-select" name="hull-hard" id="hull-hard">
                            @foreach ($hulls as $h)
                                <option value="{{ $h->id }}">
                                    {{ $h->hull_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="form-label altona-sans-12 mt-2" for="hp-hard">HP</label>
                        <input class="form-control" type="number" name="hp-hard" id="hp-hard">
                    </div>
                    <div>
                        <label class="form-label altona-sans-12 mt-2" for="fp-hard">FP</label>
                        <input class="form-control" type="number" name="fp-hard" id="fp-hard">
                    </div>
                    <div>
                        <label class="form-label altona-sans-12 mt-2" for="trp-hard">TRP</label>
                        <input class="form-control" type="number" name="trp-hard" id="trp-hard">
                    </div>
                    <div>
                        <label class="form-label altona-sans-12 mt-2" for="aa-hard">AA</label>
                        <input class="form-control" type="number" name="aa-hard" id="aa-hard">
                    </div>
                    <div>
                        <label class="form-label altona-sans-12 mt-2" for="avi-hard">AVI</label>
                        <input class="form-control" type="number" name="avi-hard" id="avi-hard">
                    </div>
                    <div>
                        <label class="form-label altona-sans-12 mt-2" for="acc-hard">ACC</label>
                        <input class="form-control" type="number" name="acc-hard" id="acc-hard">
                    </div>
                    <div>
                        <label class="form-label altona-sans-12 mt-2" for="eva-hard">EVA</label>
                        <input class="form-control" type="number" name="eva-hard" id="eva-hard">
                    </div>
                    <div>
                        <label class="form-label altona-sans-12 mt-2" for="lck-hard">LCK</label>
                        <input class="form-control" type="number" name="lck-hard" id="lck-hard">
                    </div>
                    <div>
                        <label class="form-label altona-sans-12 mt-2" for="spd-hard">SPD</label>
                        <input class="form-control" type="number" name="spd-hard" id="spd-hard">
                    </div>
                </div>
                <hr>
            @endif



            <div class="d-grid">
                <input type="submit" class="btn btn-success mx-auto my-3 btn-lg" value="Add Boss">
            </div>
            @csrf

        </form>
    </div>
</div>

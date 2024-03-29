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
                <input class="form-control" type="text" name="name" id="name" value="{{ old('name') }}"
                    required>
            </div>

            <div class="columns-three">
                <div>
                    <label class="form-label altona-sans-12 mt-2" for="type">Boss type</label>
                    <select class="form-select" name="type" id="type" wire:model="bossType">
                        <option value="">Select Type</option>
                        <option value="stronghold">Stronghold
                        </option>
                        <option value="abyssal">Abyssal</option>
                        <option value="arbiter">Arbiter</option>
                        <option value="meta">Meta</option>
                        <option value="guild">Guild</option>
                    </select>
                </div>


                <div>
                    <label class="form-label altona-sans-12 mt-2" for="weakness">Boss Weakness</label>
                    <input class="form-control" type="text" name="weakness" id="weakness"
                        value="{{ old('weakness') }}" required>
                </div>

                <div class="my-1">
                    <label class="form-label altona-sans-12 mt-2" for="img">Boss Image</label>
                    <input class="form-control" type="file" name="img" id="img" required>
                </div>

            </div>

            <hr>
            <h2>None</h2>
            <h3>Normal</h3>
            <div class="columns-three">
                <div>
                    <label class="form-label altona-sans-12 mt-2" for="level">Boss Level</label>
                    <input class="form-control" type="number" name="level" id="level" value="{{ old('level') }}"
                        required>
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
                    <input class="form-control" type="number" name="hp" id="hp" value="{{ old('hp') }}"
                        required>
                </div>
                <div>
                    <label class="form-label altona-sans-12 mt-2" for="fp">FP</label>
                    <input class="form-control" type="number" name="fp" id="fp" value="{{ old('fp') }}"
                        required>
                </div>
                <div>
                    <label class="form-label altona-sans-12 mt-2" for="trp">TRP</label>
                    <input class="form-control" type="number" name="trp" id="trp" value="{{ old('trp') }}"
                        required>
                </div>
                <div>
                    <label class="form-label altona-sans-12 mt-2" for="aa">AA</label>
                    <input class="form-control" type="number" name="aa" id="aa" value="{{ old('aa') }}"
                        required>
                </div>
                <div>
                    <label class="form-label altona-sans-12 mt-2" for="avi">AVI</label>
                    <input class="form-control" type="number" name="avi" id="avi"
                        value="{{ old('avi') }}" required>
                </div>
                <div>
                    <label class="form-label altona-sans-12 mt-2" for="acc">ACC</label>
                    <input class="form-control" type="number" name="acc" id="acc"
                        value="{{ old('acc') }}" required>
                </div>
                <div>
                    <label class="form-label altona-sans-12 mt-2" for="eva">EVA</label>
                    <input class="form-control" type="number" name="eva" id="eva"
                        value="{{ old('eva') }}"required>
                </div>
                <div>
                    <label class="form-label altona-sans-12 mt-2" for="lck">LCK</label>
                    <input class="form-control" type="number" name="lck" id="lck"
                        value="{{ old('lck') }}" required>
                </div>
                <div>
                    <label class="form-label altona-sans-12 mt-2" for="spd">SPD</label>
                    <input class="form-control" type="number" name="spd" id="spd"
                        value="{{ old('spd') }}" required>
                </div>
            </div>

            <hr>

            @if ($bossType == 'arbiter')
                <h3>Hard</h3>

                <div class="columns-three">
                    <div>
                        <label class="form-label altona-sans-12 mt-2" for="level-hard">Boss Level</label>
                        <input class="form-control" type="number" name="level-hard" id="level-hard"
                            value="{{ old('level-hard') }}" required>
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
                        <input class="form-control" type="number" name="hp-hard" id="hp-hard"
                            value="{{ old('hp-hard') }}" required>
                    </div>
                    <div>
                        <label class="form-label altona-sans-12 mt-2" for="fp-hard">FP</label>
                        <input class="form-control" type="number" name="fp-hard" id="fp-hard"
                            value="{{ old('fp-hard') }}" required>
                    </div>
                    <div>
                        <label class="form-label altona-sans-12 mt-2" for="trp-hard">TRP</label>
                        <input class="form-control" type="number" name="trp-hard" id="trp-hard"
                            value="{{ old('trp-hard') }}" required>
                    </div>
                    <div>
                        <label class="form-label altona-sans-12 mt-2" for="aa-hard">AA</label>
                        <input class="form-control" type="number" name="aa-hard" id="aa-hard"
                            value="{{ old('aa-hard') }}" required>
                    </div>
                    <div>
                        <label class="form-label altona-sans-12 mt-2" for="avi-hard">AVI</label>
                        <input class="form-control" type="number" name="avi-hard" id="avi-hard"
                            value="{{ old('avi-hard') }}" required>
                    </div>
                    <div>
                        <label class="form-label altona-sans-12 mt-2" for="acc-hard">ACC</label>
                        <input class="form-control" type="number" name="acc-hard" id="acc-hard"
                            value="{{ old('acc-hard') }}" required>
                    </div>
                    <div>
                        <label class="form-label altona-sans-12 mt-2" for="eva-hard">EVA</label>
                        <input class="form-control" type="number" name="eva-hard" id="eva-hard"
                            value="{{ old('eva-hard') }}" required>
                    </div>
                    <div>
                        <label class="form-label altona-sans-12 mt-2" for="lck-hard">LCK</label>
                        <input class="form-control" type="number" name="lck-hard" id="lck-hard"
                            value="{{ old('lck-hard') }}" required>
                    </div>
                    <div>
                        <label class="form-label altona-sans-12 mt-2" for="spd-hard">SPD</label>
                        <input class="form-control" type="number" name="spd-hard" id="spd-hard"
                            value="{{ old('spd-hard') }}" required>
                    </div>
                </div>
                <hr>
            @endif


            @if ($bossType == 'stronghold' || $bossType == 'abyssal' || $bossType == 'arbiter')
                <div>
                    <h2>Full</h2>
                    <h3>Normal</h3>
                    <div class="columns-three">
                        <div>
                            <label class="form-label altona-sans-12 mt-2" for="full-level">Boss Level</label>
                            <input class="form-control" type="number" name="full-level" id="full-level"
                                value="{{ old('full-level') }}" required>
                        </div>
                        <div>
                            <label class="form-label altona-sans-12 mt-2" for="full-armor">Boss Armor</label>
                            <select class="form-select" name="full-armor" id="full-armor">
                                <option value="Light">Light</option>
                                <option value="Medium">Medium</option>
                                <option value="Heavy">Heavy</option>
                            </select>
                        </div>
                        <div>
                            <label class="form-label altona-sans-12 mt-2" for="full-hull">Boss Hull</label>
                            <select class="form-select" name="full-hull" id="full-hull">
                                @foreach ($hulls as $h)
                                    <option value="{{ $h->id }}">
                                        {{ $h->hull_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="form-label altona-sans-12 mt-2" for="full-hp">HP</label>
                            <input class="form-control" type="number" name="full-hp" id="full-hp"
                                value="{{ old('full-hp') }}" required>
                        </div>
                        <div>
                            <label class="form-label altona-sans-12 mt-2" for="full-fp">FP</label>
                            <input class="form-control" type="number" name="full-fp" id="full-fp"
                                value="{{ old('full-fp') }}" required>
                        </div>
                        <div>
                            <label class="form-label altona-sans-12 mt-2" for="full-trp">TRP</label>
                            <input class="form-control" type="number" name="full-trp" id="full-trp"
                                value="{{ old('full-trp') }}" required>
                        </div>
                        <div>
                            <label class="form-label altona-sans-12 mt-2" for="full-aa">AA</label>
                            <input class="form-control" type="number" name="full-aa" id="full-aa"
                                value="{{ old('full-aa') }}" required>
                        </div>
                        <div>
                            <label class="form-label altona-sans-12 mt-2" for="full-avi">AVI</label>
                            <input class="form-control" type="number" name="full-avi" id="full-avi"
                                value="{{ old('full-avi') }}" required>
                        </div>
                        <div>
                            <label class="form-label altona-sans-12 mt-2" for="full-acc">ACC</label>
                            <input class="form-control" type="number" name="full-acc" id="full-acc"
                                value="{{ old('full-acc') }}" required>
                        </div>
                        <div>
                            <label class="form-label altona-sans-12 mt-2" for="full-eva">EVA</label>
                            <input class="form-control" type="number" name="full-eva" id="full-eva"
                                value="{{ old('full-eva') }}" required>
                        </div>
                        <div>
                            <label class="form-label altona-sans-12 mt-2" for="full-lck">LCK</label>
                            <input class="form-control" type="number" name="full-lck" id="full-lck"
                                value="{{ old('full-lck') }}" required>
                        </div>
                        <div>
                            <label class="form-label altona-sans-12 mt-2" for="full-spd">SPD</label>
                            <input class="form-control" type="number" name="full-spd" id="full-spd"
                                value="{{ old('full-spd') }}" required>
                        </div>
                    </div>

                    @if ($bossType == 'arbiter')
                        <h3>Hard</h3>
                        <div class="columns-three">
                            <div>
                                <label class="form-label altona-sans-12 mt-2" for="full-level-hard">Boss Level</label>
                                <input class="form-control" type="number" name="full-level-hard"
                                    id="full-level-hard" value="{{ old('full-level-hard') }}" required>
                            </div>
                            <div>
                                <label class="form-label altona-sans-12 mt-2" for="full-armor-hard">Boss Armor</label>
                                <select class="form-select" name="full-armor-hard" id="full-armor-hard">
                                    <option value="Light">Light</option>
                                    <option value="Medium">Medium</option>
                                    <option value="Heavy">Heavy</option>
                                </select>
                            </div>
                            <div>
                                <label class="form-label altona-sans-12 mt-2" for="full-hull-hard">Boss Hull</label>
                                <select class="form-select" name="full-hull-hard" id="full-hull-hard">
                                    @foreach ($hulls as $h)
                                        <option value="{{ $h->id }}">
                                            {{ $h->hull_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label class="form-label altona-sans-12 mt-2" for="full-hp-hard">HP</label>
                                <input class="form-control" type="number" name="full-hp-hard" id="full-hp-hard"
                                    value="{{ old('full-hp-hard') }}" required>
                            </div>
                            <div>
                                <label class="form-label altona-sans-12 mt-2" for="full-fp-hard">FP</label>
                                <input class="form-control" type="number" name="full-fp-hard" id="full-fp-hard"
                                    value="{{ old('full-fp-hard') }}" required>
                            </div>
                            <div>
                                <label class="form-label altona-sans-12 mt-2" for="full-trp-hard">TRP</label>
                                <input class="form-control" type="number" name="full-trp-hard" id="full-trp-hard"
                                    value="{{ old('full-trp-hard') }}" required>
                            </div>
                            <div>
                                <label class="form-label altona-sans-12 mt-2" for="full-aa-hard">AA</label>
                                <input class="form-control" type="number" name="full-aa-hard" id="full-aa-hard"
                                    value="{{ old('full-aa-hard') }}" required>
                            </div>
                            <div>
                                <label class="form-label altona-sans-12 mt-2" for="full-avi-hard">AVI</label>
                                <input class="form-control" type="number" name="full-avi-hard" id="full-avi-hard"
                                    value="{{ old('full-avi-hard') }}" required>
                            </div>
                            <div>
                                <label class="form-label altona-sans-12 mt-2" for="full-acc-hard">ACC</label>
                                <input class="form-control" type="number" name="full-acc-hard" id="full-acc-hard"
                                    value="{{ old('full-acc-hard') }}" required>
                            </div>
                            <div>
                                <label class="form-label altona-sans-12 mt-2" for="full-eva-hard">EVA</label>
                                <input class="form-control" type="number" name="full-eva-hard" id="full-eva-hard"
                                    value="{{ old('full-eva-hard') }}" required>
                            </div>
                            <div>
                                <label class="form-label altona-sans-12 mt-2" for="full-lck-hard">LCK</label>
                                <input class="form-control" type="number" name="full-lck-hard" id="full-lck-hard"
                                    value="{{ old('full-lck-hard') }}" required>
                            </div>
                            <div>
                                <label class="form-label altona-sans-12 mt-2" for="full-spd-hard">SPD</label>
                                <input class="form-control" type="number" name="full-spd-hard" id="full-spd-hard"
                                    value="{{ old('full-spd-hard') }}" required>
                            </div>
                        </div>

                </div>
            @endif
            <hr>
            @endif
            <div class="d-grid">
                <input type="submit" class="btn btn-success mx-auto my-3 btn-lg" value="Add Boss">
            </div>
            @csrf

        </form>
    </div>
</div>

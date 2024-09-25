<div>
    <form wire:submit='CreateNewUSer' action="">
        <input wire:model='name' type="text" placeholder="name">
        @error('name')
            <small style="color: #F00; font-style:italic">{{ $message }}</small>
        @enderror

        <input wire:model='email' type="email" placeholder="email">
        @error('email')
            <small style="color: #F00; font-style:italic">{{ $message }}</small>
        @enderror

        <input wire:model='password' type="password" placeholder="password">
        @error('password')
            <small style="color: #F00; font-style:italic">{{ $message }}</small>
        @enderror

        <button type="submit">Save</button>
    </form>

    <hr>

    @foreach ($users as $user)
        <h3>{{ $user->name }} <a href="" wire:click='ClickDestroy({{ $user->id }})'
                style="text-decoration: none; color:#F00; font-style:italic;"> Hapus</a></h3>
    @endforeach
</div>

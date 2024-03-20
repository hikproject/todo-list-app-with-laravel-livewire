<div>
    <h3 class="mb-5">Todo List</h3>

    <form class="mb-4" wire:submit="save">
        <div class="mb-2">
            <label for="tittle">Judul Todo</label>
            <input type="text" id="title" wire:model="title" class="form-control shadow-none">
        </div>
        <button type="submit"class="btn btn-primary">{{$isEdit == true ? 'Edit Todo' : 'Buat'}}</button>
    </form>
    <hr class="mb-4">
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <td>No.</td>
                    <td>Todo</td>
                    <td>Aksi</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($todos as  $key => $item)
                <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{ $item->tittle }}</td>
                    <td>
                        <div class="d-flex gap-1">
                            <button type="button" wire:click="edit({{{ $item->id}}})"  class="btn btn-warning btn-sm">Edit</button>
                            <button type="button" 
                                    wire:click="delete({{{ $item->id}}})"
                                    wire:confirm ="Apakah Kamu yakin akan menghapusnya?" 
                                class="btn btn-danger btn-sm">Hapus</button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

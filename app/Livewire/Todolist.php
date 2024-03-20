<?php

namespace App\Livewire;

use App\Models\todo;
use Livewire\Component;

class Todolist extends Component
{
    public $title ='';
    public $id_todo = 0 ;
    public $isEdit = false;
    public function save()
    {
        if($this->id_todo != 0){
            todo::find($this->id_todo)->update(['tittle' => $this->title]);

        } else{
            todo::create(['tittle' => $this->title]);
        }
        $this->reset();
    }
    public function edit($id){
        $todo = todo::find($id);
        $this->id_todo = $todo->id;
        $this->title = $todo->tittle;
        $this->isEdit = true;
    }
    public function delete($id){
        $todo = todo::find($id)->delete();
    }
    public function render()
    {
        return view('livewire.todolist',[
            'todos'=> todo::orderby('id', 'desc')->get()
        ]);
    }
}

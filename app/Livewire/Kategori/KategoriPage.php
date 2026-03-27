<?php

namespace App\Livewire\Kategori;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class KategoriPage extends Component
{
     use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $name;
    public $idTerpilih, $idHapus;    
    public $kategori;
    public $search = '';


    public function render()
    {

        return view('livewire.kategori.kategori-page', ['list' => Category::where(function ($query) {
            $query->orWhere('name', 'LIKE', '%' . $this->search . '%');
        })->orderBy('id', 'DESC')->paginate(10)])->extends('layout.app')->section('content');

    }

    public function resetInput()
    {
        $this->reset(['name']);
    }

    public function store()
    {

        $data = $this->validate(
            [
                'name' => 'required',
                
            ],
            [
                '*.required' => 'Harap mengisi kolom',
            ],
        );
        Category::updateOrCreate(['id' => $this->idTerpilih], $data);
        session()->flash('store', $this->idTerpilih ? 'Data berhasil dirubah' : 'Data berhasil disimpan');
        $this->resetInput();
        $this->dispatch('showCentang');

    }

    public function edit($id)
    {
        $this->resetInput();
        $this->idTerpilih = $id;
        $data = Category::find($id);
        $this->name = $data->name;       
    }

    public function hapusKonfirmasi($id)
    {
        $this->idHapus = $id;
        $this->dispatch('hapus-konfirmasi');
    }

    public function hapus($id)
    {
        Category::find($id)->delete();
        $this->dispatch('hapus');
    }
}
